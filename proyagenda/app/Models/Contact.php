<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contact extends Model
{
    use HasFactory;
    
    protected $fillable = ['direction', 'gener', 'user_id'];


    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function emails(){
        return $this->hasMany(Email::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }


}
