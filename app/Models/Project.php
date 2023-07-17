<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable= [
        "title",
        "content",
        "image",
        "type_id"
    ];
    public function type(){
        //un type appartiene a un progetto
        return $this->belongsTo(Type::class);
    }
    public function tecnologies(){
        return $this->belongsToMany(Tecnology::class);
    }
}
