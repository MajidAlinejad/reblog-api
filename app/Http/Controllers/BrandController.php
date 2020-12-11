<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;

class BrandController extends Controller
{

    public function all()
    {
        $brand = Brand::all();
        return Response::json($brand);
    }

    public function post($id)
    {
        $brand = Brand::where('id', $id)->with('posts')->get();
        return Response::json($brand);
    }


    public function cat($id)
    {
        $brand = Category::where('id', $id)->first()->brands()->get();
        return Response::json($brand);
    }

    public function wire($id, Request $request)
    {
        $brand = Brand::find($id);
        $wires = $request->input('cats');
        $brand->categories()->sync($wires);
        return redirect('/brands')->with('message', 'با موفقیت مرتبط شد.');
    }


    public function index()
    {
        $brands = Brand::where('id', '>', 0)->with('categories')->get();
        $category = Category::where('category_id', '>', 0)->get();
        return view('dashboard.brand.brands')->with('brands', $brands)->with('category', $category);
    }

    public function read($id)
    {
        $brand = Brand::find($id);
        return view('dashboard.brand.brand-edit')->with('brand', $brand);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->fa_name = $request->fa_name;
        $brand->desc = $request->desc;
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $brand->img = $spath;
        }
        $brand->n_grams = $this->createNGrams($request->name . " " . $request->fa_name);
        $brand->save();
        Artisan::call("trigram:brand");

        return redirect('/brands')->with('message', 'با موفقیت اضافه شد.');

        // return "done";
        // return $brand;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = new Brand;
        $brand->name = $request->name;
        $brand->fa_name = $request->fa_name;
        $brand->desc = $request->desc;
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $brand->img = $spath;
        }
        $brand->n_grams = $this->createNGrams($request->name . " " . $request->fa_name);
        $brand->save();
        Artisan::call("trigram:brand");

        // return redirect('/brands');
        return Response::json($brand);

        // return "done";
        // return $brand;
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
        $brand = Brand::find($id);
        return Response::json($brand);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->fa_name = $request->fa_name;
        $brand->desc = $request->desc;
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $brand->img = $spath;
        }
        $brand->n_grams = $this->createNGrams($request->name . " " . $request->fa_name);
        $brand->save();
        Artisan::call("trigram:brand");
        return redirect('/brands')->with('message', 'با موفقیت آپدیت شد.');

        // return "done";
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
        $request->validate([
            'name' => 'required',
        ]);
        $brand = Brand::find($id);
        $brand->name = $request->name;
        $brand->fa_name = $request->fa_name;
        $brand->desc = $request->desc;
        if ($request->file('img')) {
            $spath = $request->file('img')->store('images');
            $brand->img = $spath;
        }
        $brand->n_grams = $this->createNGrams($request->name . " " . $request->fa_name);
        $brand->save();
        // Artisan::call("trigram:brand");
        // return $this->index();

        return "done";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        // return redirect('/brands');
        return "done";
    }


    public function wipe($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('/brands')->with('message', 'با موفقیت حذف شد.');
        // return "done";
    }
}
