<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'projects';

    //Column that are fillable
    protected $fillable = ['title', 'description'];


}
