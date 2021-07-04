<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlePreviewResource;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticlePreviewResource::collection(Article::paginate(10));
    }
}
