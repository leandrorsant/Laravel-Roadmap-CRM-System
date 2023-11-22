<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;

class Status implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  array<string, mixed>  $attributes
     */
    const STATUS_LIST = [
        'Upcoming', 
        'Pending', 
        'Overdue', 
        'Not Started',
        'Active',
        'Priority',
        'Cancelled'
    ];

    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        
        return Status::STATUS_LIST[$value];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {

        return array_search($value, Status::STATUS_LIST);
    }
}
