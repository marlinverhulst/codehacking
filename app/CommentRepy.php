<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentRepy extends Model
{
    //

    protected $fillable = [
        'post_id',
        'author',
        'email',
        'body',
        'is_active'
    ]; 

    public function comment(){

        return $this->belongsTo('App\Comment');
    }
}
