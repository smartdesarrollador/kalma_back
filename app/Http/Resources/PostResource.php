<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /* return parent::toArray($request); */

        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'contenido' => $this->contenido,
            'estado' => $this->estado,
            'fecha_publicacion' => $this->fecha_publicacion,
            'autor' => new UserResource($this->whenLoaded('autor')),
            'categorias' => CategoryResource::collection($this->whenLoaded('categorias')),
            'comentarios' => CommentResource::collection($this->whenLoaded('comentarios')),
            'tags' => TagResource::collection($this->whenLoaded('tags')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
