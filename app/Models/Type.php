<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    public function project(){
        //un project può avere tanti type
        return $this->hasMany(Project::class);
    }
}
