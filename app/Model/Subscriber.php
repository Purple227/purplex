<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'subscribers';

    //Column that are fillable
    protected $fillable = ['email'];
}
