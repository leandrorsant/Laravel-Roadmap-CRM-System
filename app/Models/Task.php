<?php

namespace App\Models;

use App\Casts\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "deadline",
        "status"
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    protected $casts = [
        "status"=> Status::class,
    ];
}
