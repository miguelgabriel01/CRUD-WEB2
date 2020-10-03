<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title','body',
    ];


    //
    protected static function booted(){

        /*
        //quando a img for exibida
        static::retrieved(function(Post $post){
            Log::channel('stderr')->info('RETRIEVED..  ' .$post->id);//o id do post recuperado
        });

        //quando começa a salvar...
        static::creating(function(Post $post){
            Log::channel('stderr')->info('CREATING..  ' .$post->title);//titulo do post que está sendo criado
        });

        //QUANDO O POST FOR CRIADO
        static::created(function(Post $post){
            Log::channel('stderr')->info('CREATED..  ' .$post->id);//id do post já criado
        });
        */

        //evento para deletar o post com a img
        static::deleting(function(Post $post){
            Log::channel('stderr')->info('Evento PostDeletado..  ' .$post->image->path);
            Storage::disk('public')->delete($post->image->url);
        });


    }

    //metodo de acesso ao usuario
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function image(){
        return $this->hasOne('App\Models\Image');
    }
}


