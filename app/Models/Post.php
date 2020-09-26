<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','body',
    ];

    //função de acesso ao usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
