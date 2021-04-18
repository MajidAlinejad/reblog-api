<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;
use stdClass;
use TeamTNT\TNTSearch\Indexer\TNTIndexer;
use TeamTNT\TNTSearch\TNTSearch;

class SearchController extends Controller
{

    public function instantSearch()
    {
        $key = \Request::get('key');
        $res = Post::search($key)->paginate(10);
        if (isset($res[0])) {
            return [
                'didyoumean' => true,
                'res'       => $res[0],
                'guess'       => $this->getSuggestions($key)
            ];
        }

        return [
            'didyoumean' => true,
            'data'       => $this->getSuggestions($key)
        ];
    }

    public function search()
    {
        $key = \Request::get('key');
        $res = Post::search($key)->paginate(10);

        if (isset($res[0])) {
            return [
                'suggest' => false,
                'data'    => $res[0]
            ];
        }

        return [
            'suggest' => true,
            'brand'    => $this->getBrandSuggestions($key),
            'data'    => $this->getSuggestions($key)
        ];
    }


    public function getSuggestions($key)
    {
        $TNTIndexer = new TNTIndexer;
        $trigrams   = $TNTIndexer->buildTrigrams($key);

        $tnt = new TNTSearch;

        $driver = config('database.default');
        $config = config('scout.tntsearch') + config("database.connections.$driver");

        $tnt->loadConfig($config);
        $tnt->setDatabaseHandle(app('db')->connection()->getPdo());

        $tnt->selectIndex("tagngrams.index");
        $res  = $tnt->search($trigrams, 3);

        $keys = collect($res['ids'])->values()->all();
        $suggestions = Tag::whereIn('id', $keys)->get();
        $tag = Tag::whereIn('id', $keys)->with('posts')->get();
        // var_dump($tag);
        $related = new Collection();
        foreach ($tag as $tag) {
            $post = new stdClass;
            if (isset($tag->post[0])) {
                $post->id = $tag->post[0]->id;
                $post->title = $tag->post[0]->title;
                $related->push($post);
            }
        }

        $suggestions->map(function ($tag) use ($key) {
            $tag->distance = levenshtein($key, $tag->n_grams);
        });

        $sorted = $suggestions->sort(function ($a, $b) {
            if ($a->distance === $b->distance) {
                if ($a->population === $b->population) {
                    return 0;
                }
                return $a->population > $b->population ? -1 : 1;
            }
            return $a->distance < $b->distance ? -1 : 1;
        });

        return [
            'suggest' => $sorted,
            'related' => $related
        ];
    }



    public function getBrandSuggestions($key)
    {
        $TNTIndexer = new TNTIndexer;
        $trigrams   = $TNTIndexer->buildTrigrams($key);

        $tnt = new TNTSearch;

        $driver = config('database.default');
        $config = config('scout.tntsearch') + config("database.connections.$driver");

        $tnt->loadConfig($config);
        $tnt->setDatabaseHandle(app('db')->connection()->getPdo());

        $tnt->selectIndex("brandngrams.index");
        $res  = $tnt->search($trigrams, 1);

        $keys = collect($res['ids'])->values()->all();
        $suggestions = Brand::whereIn('id', $keys)->get();
        return $suggestions;
    }
}
