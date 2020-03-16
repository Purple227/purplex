<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{   
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = ['title', 'view', 'description', 'slug', 'edited', 'status' ];

    /**
     * The roles that belong to the user.
    */
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag')->withTimestamps();
    }

}
