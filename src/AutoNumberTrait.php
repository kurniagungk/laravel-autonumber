<?php

namespace Alfa6661\AutoNumber;

use Alfa6661\AutoNumber\Observers\AutoNumberObserver;

trait AutoNumberTrait
{
    /**
     * Boot the soft deleting trait for a model.
     *
     * @return void
     */
    public static function bootAutoNumberTrait()
    {
        static::creating(function ($model) {
            app(\Alfa6661\AutoNumber\AutoNumber::class)->generate($model);
        });

        static::updating(function ($model) {
            if (config('autonumber.onUpdate', false)) {
                app(\Alfa6661\AutoNumber\AutoNumber::class)->generate($model);
            }
        });
    }

    /**
     * Return the autonumber configuration array for this model.
     *
     * @return array
     */
    abstract public function getAutoNumberOptions();
}
