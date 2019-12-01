<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{   

    use SoftDeletes;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    protected $fillable = ['title', 'image', 'view', 'description', 'slug', 'edited', 'status' ];

    /**
     * The roles that belong to the user.
    */
    public function tags()
    {
        return $this->belongsToMany('App\Model\Tag')->withTimestamps();
    }

}
