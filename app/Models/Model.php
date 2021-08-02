<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Str;

abstract class Model extends Eloquent
{
    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Indicates if all mass assignment is enabled.
     *
     * @var boolean
     */
    protected static $unguarded = true;

    /**
     * Boot the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if ($model->{$model->getKeyName()} === null) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
