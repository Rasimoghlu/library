<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'book_name'     => $this->name,
            'authors'       => AuthorResource::collection($this->whenLoaded('authors')),
            'bookHouse'    => (new BookHouseResource($this->whenLoaded('bookHouse'))),
        ];
    }
}
