<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticlePreviewResource;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleController extends Controller
{
    public function index()
    {
        return ArticlePreviewResource::collection(Article::paginate(5));
    }

    public function show(int $id): JsonResource
    {
        return new ArticleResource(Article::findOrFail($id));
    }
}
