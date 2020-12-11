<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Category;
use App\Models\Detail;
use App\Models\Group;
use App\Models\Spec;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;

class PostController extends Controller
{
    public function index($id)
    {

        $posts = Post::where('blog_id', $id)->orderBy('created_at', 'ASC')->paginate(30);
        // $param = Spec::where('spec_id')
        $blog = Blog::find($id);
        return view('dashboard.post.posts')->with('posts', $posts)->with('blog', $blog);
    }



    public function read($id)
    {

        $post = Post::find($id);
        $group = Group::all();
        $category = Category::where('category_id', '>', 0)->get();

        return view('dashboard.post.edit')
            ->with('post', $post)
            ->with('group', $group)
            ->with('category', $category);
    }

    public function view($id)
    {

        $post = Post::find($id);
        $spec = Spec::where('cat_id', $post->category->id)->where('spec_id', '>', 0)->get();

        return view('dashboard.post.view')
            ->with('post', $post)
            ->with('spec', $spec);
        // ->with('group', $group)
        // ->with('category', $category);
    }


    public function new($blog)
    {
        $blog = Blog::find($blog);
        $group = Group::all();
        $category = Category::where('category_id', '>', 0)->get();
        // $posts = Post::where('blog_id', $id)->orderBy('created_at', 'ASC')->paginate(30);
        return view('dashboard.post.new')
            ->with('blog', $blog)
            ->with('group', $group)
            ->with('category', $category);
    }

    public function all($id)
    {
        $per_page = \Request::get('per_page') ?: 30;
        $category = \Request::get('cat') ?: null;
        $rawtags = \Request::get('tags') ?: null;

        if ($rawtags) {
            $tags = explode(',', $rawtags);
            $query = Post::whereHas('tags', function ($q) use ($tags) {
                $q->whereIn('id', $tags);
            });
            $query->where('blog_id', $id)->with('user');
        } else {
            $query = Post::where('blog_id', $id)->with('user');
        }
        if ($category) {
            $query->where('category_id', $category);
        }
        //  if ($brand) {
        //     $query->whereIn('brand_id',$brand);
        // } 

        //  if ($price) {
        //     $query->whereBetween('price', [$price[0], $price[1]]);
        // }   

        $posts = $query
            ->orderBy('created_at', 'ASC')
            ->paginate($per_page);
    }


    public function filter(Request $request, $id)
    {
        $per_page = \Request::get('per_page') ?: 30;
        // $category = \Request::get('cat') ?: null;
        // $rawtags = \Request::get('tags') ?: null;
        $arrange = 'DESC';
        if ($request->brands && count($request->brands)) {
            $brands = $request->brands;
            $brand = array_column($brands, 'key');
        } else {
            $brand = false;
        }

        if ($request->order) {
            if ($request->order == 'costly') {
                $order = 'price';
                $arrange = 'DESC';
            } else if ($request->order == 'cheap') {
                $order = 'price';
                $arrange = 'ASC';
            } else {
                $order = $request->order;
            }
        } else {
            $order = 'expire';
        }


        if ($request->category) {
            $category = $request->category;
        } else {
            $category = false;
        }

        if ($request->tags && count($request->tags)) {
            $tags = $request->tags;
        } else {
            $tags = false;
        }

        if ($request->price && count($request->price)) {
            $price = $request->price;
        } else {
            $price = false;
        }

        if ($request->params && count($request->params)) {
            $params = $request->params;
        } else {
            $params = false;
        }



        $id = $request->id;
        if ($tags) {
            // $tags = explode(',', $rawtags);
            $query = Post::whereHas('tags', function ($q) use ($tags) {
                $q->whereIn('id', $tags);
            });
            $query->where('blog_id', $id)->with('user');
        } else {
            $query = Post::where('blog_id', $id)->with('user');
        }
        if ($category) {
            $query->where('category_id', $category);
        }
        if ($brand) {
            $query->whereIn('brand_id', $brand);
        }

        if ($price) {
            $query->whereBetween('price', [$price[0], $price[1]]);
        }

        if ($params) {
            // $query->whereHas('details', function($q) use ($params)
            // {
            //    $q->whereIn('spec_id',$params);
            // });
            // var_dump($query);

            foreach ($params as $p => $value) {
                $query->whereHas('details', function ($q) use ($value) {
                    $q->whereIn('id', $value['param']);
                });
            }
        }

        $posts = $query
            ->orderBy($order, $arrange)
            ->paginate($per_page);





        return Response::json($posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function base($id)
    {
        $post = Post::find($id);
        $category = $post->category_id;
        $base = $post->blog->base;
        $blog_id = $post->blog->id;
        return Response::json(compact('base', 'blog_id', 'category'));
    }





    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'caption' => 'required',
            'status' => 'required',
            'meta' => 'required',
            'thumbnail' => 'required',
            'img' => 'required',
            // 'expire' => 'required',
            // 'stream' => 'required',
            // 'block' => 'required',
            // 'like' => 'required',
            // 'unlike' => 'required',
            // 'attach' => 'required',
            // 'icon' => 'required',
            // 'lable' => 'required',
            // 'special' => 'required',
            // 'link' => 'required',
            'blog_id' => 'required',
            // 'user_id' => 'required',
            'cat_id' => 'required',
            // 'group_id' => 'required',
        ]);


        $post = new Post;
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->status = $request->status;
        $post->meta = $request->meta;
        $post->tag = $request->tag;
        $post->seo = $request->seo;
        $post->meta_desc = $request->meta_desc;
        if ($request->file('thumbnail')) {
            $spath = $request->file('thumbnail')->store('images');
            $post->thumbnail = $spath;
        }

        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $post->img = $spath;
        }
        $post->expire = $request->expire;
        if ($request->alt_stream) {
            $post->stream = $request->alt_stream;
        } else if ($request->file('stream')) {
            $spath = $request->file('stream')->store('stream');
            $post->stream = $spath;
        }


        $post->block = $request->block;
        $post->price = $request->price;
        $post->off = $request->off;
        $post->like = $request->like;
        $post->unlike = $request->unlike;
        $post->attach = $request->attach;
        $post->icon = $request->icon;
        $post->lable = $request->lable;
        $post->product = $request->product;
        $post->special = $request->special;
        $post->link = $request->link;
        $post->blog_id = $request->blog_id;
        $post->category_id = $request->cat_id;
        $post->group_id = $request->group_id;
        $post->user_id = Auth::id();

        // $post->tags()->n_grams    = $this->createNGrams($post->meta);
        // return "done";
        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return back()->withErrors($validator->errors());
        } else {
            $post->save();
            $tags_id = [];
            if ($request->meta) {
                $tags = explode(',', $request->meta);
                foreach ($tags as $tag) {
                    $n_grams =  $this->createNGrams($tag);
                    // var_dump($n_grams);
                    $tag_ref = Tag::firstOrCreate(['text' => $tag, 'n_grams' => $n_grams]);
                    $tags_id[] = $tag_ref->id;
                }
            }
            $post->tags()->sync($tags_id);
            // $post->tags()->attach($request->meta);
            Artisan::call("trigram:tag");
            // return $post;
            return redirect("/posts/" . $request->blog_id)->with('message', 'با موفقیت افزوده شد.');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'caption' => 'required',
            'status' => 'required',
            'meta' => 'required',
            'thumbnail' => 'required',
            'img' => 'required',
            // 'expire' => 'required',
            // 'stream' => 'required',
            // 'block' => 'required',
            // 'like' => 'required',
            // 'unlike' => 'required',
            // 'attach' => 'required',
            // 'icon' => 'required',
            // 'lable' => 'required',
            // 'special' => 'required',
            // 'link' => 'required',
            'blog_id' => 'required',
            'user_id' => 'required',
            'cat_id' => 'required',
            // 'group_id' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->status = $request->status;
        $post->meta = $request->meta;
        $post->tag = $request->tag;
        $post->seo = $request->seo;
        $post->meta_desc = $request->meta_desc;
        $post->thumbnail = $request->thumbnail;
        $post->img = $request->img;
        $post->expire = $request->expire;
        $post->stream = $request->stream;
        $post->block = $request->block;
        $post->like = $request->like;
        $post->unlike = $request->unlike;
        $post->attach = $request->attach;
        $post->icon = $request->icon;
        $post->lable = $request->lable;
        $post->price = $request->price;
        $post->off = $request->off;
        $post->lable = $request->lable;
        $post->user_id = Auth::id();

        $post->special = $request->special;
        $post->link = $request->link;
        $post->blog_id = $request->blog_id;
        $post->category_id = $request->cat_id;
        $post->group_id = $request->group_id;
        $post->user_id = $request->user_id;
        // $post->tags()->n_grams    = $this->createNGrams($post->meta);
        // return "done";
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $post->save();
            $tags_id = [];
            if ($request->meta) {
                $tags = explode(',', $request->meta);
                foreach ($tags as $tag) {
                    $n_grams =  $this->createNGrams($tag);
                    // var_dump($n_grams);
                    $tag_ref = Tag::firstOrCreate(['text' => $tag, 'n_grams' => $n_grams]);
                    $tags_id[] = $tag_ref->id;
                }
            }
            $post->tags()->sync($tags_id);
            // $post->tags()->attach($request->meta);
            Artisan::call("trigram:tag");
            return $post;
        }
    }

    public function createNGrams($word)
    {
        $TNTIndexer = new TNTIndexer;
        return $TNTIndexer->buildTrigrams($word);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cm = Comment::where('post_id', $id)->count();
        $post = Post::find($id);
        $breadcrumb = Category::where('id', $post->category_id)->with('grandparent');
        $breadcrumb = $breadcrumb->get();
        $username = $post->user->name;
        unset($post->user);
        $b = $post->blog->base; // be comment
        $post->cm = $cm;
        $post->brand =  $post->brand;
        $post->username = $username;

        // $breadcrumb = $breadcrumb->pluck('grandparent');
        $bra = [];
        do {
            array_push($bra, [
                'id' => $breadcrumb[0]->id,
                'text' => $breadcrumb[0]->title,
            ]);
            $breadcrumb = $breadcrumb->pluck('grandparent');
        } while ($breadcrumb[0] != null);

        $post->breadcrumb = array_reverse($bra);
        // $post->b = $b;// be comment
        return Response::json($post);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'caption' => 'required',
            'status' => 'required',
            'meta' => 'required',
            // 'thumbnail' => 'required',
            // 'img' => 'required',
            // 'expire' => 'required',
            // 'stream' => 'required',
            // 'block' => 'required',
            // 'like' => 'required',
            // 'unlike' => 'required',
            // 'attach' => 'required',
            // 'icon' => 'required',
            // 'lable' => 'required',
            // 'special' => 'required',
            // 'link' => 'required',
            // 'blog_id' => 'required',
            // 'user_id' => 'required',
            // 'cat_id' => 'required',
            // 'group_id' => 'required',
        ]);


        $post = Post::find($id);
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->status = $request->status;
        $post->meta = $request->meta;
        $post->tag = $request->tag;
        $post->seo = $request->seo;
        $post->meta_desc = $request->meta_desc;
        if ($request->file('thumbnail')) {
            $spath = $request->file('thumbnail')->store('images');
            $post->thumbnail = $spath;
        }

        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $post->img = $spath;
        }
        $post->expire = $request->expire;
        if ($request->alt_stream) {
            $post->stream = $request->alt_stream;
        } else if ($request->file('stream')) {
            $spath = $request->file('stream')->store('stream');
            $post->stream = $spath;
        }
        $post->block = $request->block;
        $post->price = $request->price;
        $post->off = $request->off;
        $post->like = $request->like;
        $post->unlike = $request->unlike;
        $post->attach = $request->attach;
        $post->icon = $request->icon;
        $post->lable = $request->lable;
        // $post->product = $request->product;
        $post->special = $request->special;
        $post->link = $request->link;
        // $post->blog_id = $request->blog_id;
        $post->category_id = $request->cat_id;
        $post->group_id = $request->group_id;
        // $post->user_id = Auth::id();


        if ($validator->fails()) {
            // return response()->json($validator->errors(), 422);
            return back()->withErrors($validator->errors());
        } else {
            $post->save();
            $tags_id = [];
            if ($request->meta) {
                $tags = explode(',', $request->meta);
                foreach ($tags as $tag) {
                    $n_grams =  $this->createNGrams($tag);
                    // var_dump($n_grams);
                    $tag_ref = Tag::firstOrCreate(['text' => $tag, 'n_grams' => $n_grams]);
                    $tags_id[] = $tag_ref->id;
                }
            }
            $post->tags()->sync($tags_id);
            // $post->tags()->attach($request->meta);
            Artisan::call("trigram:tag");
            // return $post;
            return redirect("/posts/" . $post->blog_id)->with('message', 'با موفقیت ویرایش شد.');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'caption' => 'required',
            'status' => 'required',
            'meta' => 'required',
            'thumbnail' => 'required',
            'img' => 'required',
            'expire' => 'required',
            'stream' => 'required',
            'block' => 'required',
            'like' => 'required',
            'unlike' => 'required',
            'attach' => 'required',
            'icon' => 'required',
            'lable' => 'required',
            'special' => 'required',
            'link' => 'required',
            'blog_id' => 'required',
            'user_id' => 'required',
            'cat_id' => 'required',
            'group_id' => 'required',
        ]);



        $post = Post::find($id);
        $post->title = $request->title;
        $post->caption = $request->caption;
        $post->status = $request->status;
        $post->meta = $request->meta;
        $post->tag = $request->tag;
        $post->seo = $request->seo;
        $post->meta_desc = $request->meta_desc;
        $post->thumbnail = $request->thumbnail;
        $post->img = $request->img;
        $post->expire = $request->expire;
        $post->stream = $request->stream;
        $post->block = $request->block;
        $post->like = $request->like;
        $post->unlike = $request->unlike;
        $post->attach = $request->attach;
        $post->icon = $request->icon;
        $post->lable = $request->lable;
        $post->special = $request->special;
        $post->link = $request->link;
        $post->blog_id = $request->blog_id;
        $post->category_id = $request->cat_id;
        $post->group_id = $request->group_id;
        $post->user_id = $request->user_id;



        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        } else {
            $post->save();
            return Response::json($post);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }


    public function wipe($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('message', 'با موفقیت حذف شد.');
    }
}
