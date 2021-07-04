<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    public static $wrap = null;

    public function toArray($request) {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'title' => $this->title,
            'description' => $this->description,
            'body' => $this->body,
            'tags' => TagResource::collection($this->tags),
        ];
    }
}