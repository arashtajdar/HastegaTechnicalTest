<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @property mixed name
 * @property mixed created_at
 * @property mixed id
 */
class AuthorCollection extends JsonResource
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
            "Author_id" => $this->id,
            "Author_name" => $this->name,
            "Creation_date" => $this->created_at
        ];
    }
}
