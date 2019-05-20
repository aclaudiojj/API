<?php

namespace Api\Entities;

use \Illuminate\Database\Eloquent\Model;

class Shoe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand',  'color',  'size'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'brand' => 'string',
        'color' => 'string',
        'size' => 'number'
    ];
}