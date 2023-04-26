<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
