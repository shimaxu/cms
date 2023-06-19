<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    public function index() {
        return Inertia::render('Index', [
            'articles' => Article::get()
        ]);
    }

    public function create(Article  $article) {
        return Inertia::render('Form', [
            'article' => Article::get()
        ]);
    }


    public function view(Article  $article) {
        return Inertia::render('View', [
            'article' => $article
        ]);
    }
}
