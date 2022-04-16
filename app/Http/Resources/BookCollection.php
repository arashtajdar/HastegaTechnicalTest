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
            "Book name" => $this->name,
            "Book author" => $this->author->name?$this->author->name:"No author",
            "creation date" => $this->created_at,
        ];
    }
}
