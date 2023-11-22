<?php

namespace App\Models;

use App\Casts\Status;
use App\Casts\DateCustom;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "deadline",
        "status",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }

    protected $casts = [
        "deadline" => 'datetime:m-d-Y',
        "status"=> Status::class,
    ];

   
    
}
