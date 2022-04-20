<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use JsonSerializable;

/**
 * @property mixed name
 * @property mixed author
 * @property mixed created_at
 * @property mixed user
 * @property mixed view_count
 * @property mixed id
 */
class BookCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "Book_id" => $this->id,
            "Book_name" => $this->name,
            "Book_author" => $this->author?$this->author->name:"No author",
            "view_count" => $this->view_count,
            "Created_user" => $this->user?$this->user->name:"No user assigned",
            "Creation_date" => $this->created_at,
        ];
    }
}
