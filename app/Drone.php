<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Drone extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'image', 'name', 'address', 'battery', 'max_speed','average_speed','status'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}