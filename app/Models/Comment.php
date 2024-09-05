<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['id_articulo', 'nombre_comentarista', 'contenido'];

    public function post()
    {
        return $this->belongsTo(Post::class, 'id_articulo');
    }
}
