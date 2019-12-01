<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tags';

    //Column that are fillable
    protected $fillable = ['name', 'slug'];

    /**
     * The users that belong to the role.
     */
    public function posts()
    {
        return $this->belongsToMany('App\Model\Post')->withTimestamps();
    }

}
