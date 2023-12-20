<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;
       

    protected $guarded = ['id' , 'created_at' , 'updated_at'];

    public function contact(){
        return $this->belongsToMany(Contact::class);
    }
}
