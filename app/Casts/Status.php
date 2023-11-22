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
    /*Upcoming: This is a project that's still under review by a client. */

    public const STATUS_UPCOMING = 0; 
    /*Pending: Pending refers to projects that have been approved and started but need 
    to pause work temporarily. */
    public const STATUS_PENDING = 1;

    /*Overdue: This means that a project is still in progress but that the deadline for 
    completion has passed. */
    public const STATUS_OVERDUE = 2; 

    //Not started: This term shows that a project is approved but has not been started yet.
    public const STATUS_NOT_STARTED = 3;

    //Active: This means that a project iss approved and still being completed.
    public const STATUS_ACTIVE = 4;

    //Priority: Priority indicates that a project should be addressed immediately before other projects.
    public const STATUS_PRIORITY = 5;
    //Canceled: The term canceled means that a project is no longer active but that you can still access the information about its progress from reports.
    public const STATUS_CANCELED = 6;
    
    

    public function get(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $statusList = [
            self::STATUS_UPCOMING => 'Upcoming', 
            self::STATUS_PENDING => 'Pending', 
            self::STATUS_OVERDUE => 'Overdue', 
            self::STATUS_NOT_STARTED => 'Not Started',
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_PRIORITY => 'Priority',
            self::STATUS_CANCELED => 'Cancelled'
        ];
        return $statusList[$value];
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  array<string, mixed>  $attributes
     */
    public function set(Model $model, string $key, mixed $value, array $attributes): mixed
    {
        $statusList = [
            'Upcoming' => self::STATUS_UPCOMING, 
            'Pending'=> self::STATUS_PENDING, 
            'Overdue' => self::STATUS_OVERDUE, 
            'Not Started' => self::STATUS_NOT_STARTED,
            'Active' => self::STATUS_ACTIVE,
            'Priority' => self::STATUS_PRIORITY,
            'Cancelled' => self::STATUS_CANCELED
        ];
        return $statusList[$value];
    }
}
