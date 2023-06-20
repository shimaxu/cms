<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function index() {
        return Inertia::render('Index', [
            'articles' => Article::get()
        ]);
    }

    public function create(Article  $article) {
        return Inertia::render('Form');
    }

    public function store(Request $request) {

        $request->merge([
            'slug' => Str::slug($request->title),
            'excerpt' => $request->get('excerpt') ? $request->get('excerpt') : Str::limit($request->get('content', 255))
        ]);

        $request->validate([
            'title' => 'required',
            'slug' =>  'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2024'
        ]);

        $article = Article::create($request->all());

        if ($request->file('featured_image')) {
            $filename = time().'.'.$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('/images', $filename,['disk' => 'public_uploads']);
            $article->update(['featured_image' => '/images/'. $filename]);
        }

        return Redirect::route('home');
    }

    public function edit($slug) {
        $article = Article::whereSlug($slug)->firstOrfail();
        return Inertia::render('Form', [
            'article' => $article
        ]);
    }

    public function update(Request $request, $slug) {
        $article = Article::whereSlug($slug)->firstOrfail();

//        dd( $request->all());

        $request->merge([
            'slug' => Str::slug($request->title),
            'excerpt' => $request->get('excerpt') ? $request->get('excerpt') : Str::limit($request->get('content', 255))
        ]);

        $request->validate([
            'title' => 'required',
            'slug' =>  'required',
            'featured_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2024'
        ]);

        $article->update($request->all());


        if ($request->file('featured_image')) {
            $filename = time().'.'.$request->file('featured_image')->extension();
            $request->file('featured_image')->storeAs('/images', $filename,['disk' => 'public_uploads']);
            $article->update(['featured_image' => '/images/'. $filename]);
        }

        return Redirect::route('view', $article->slug);
    }


    public function view($slug) {
        $article = Article::whereSlug($slug)->firstOrfail();
        return Inertia::render('View', [
            'article' => $article
        ]);
    }


    public function delete($slug) {
        $article = Article::whereSlug($slug)->firstOrfail();

        $article->delete();

        return Redirect::route('home');
    }
}
