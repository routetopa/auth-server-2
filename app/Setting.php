<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * A setting that can be customized by an administrator.
 *
 * @package App
 */
class Setting extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key', 'value',
    ];

    /**
     * The primary key field.
     *
     * @var array
     */
    protected $primaryKey = 'key';

    /**
     * Tells Eloquent that our key is non-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

}