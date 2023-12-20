<?php

namespace App\Models;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Phone extends Model
{
    use HasFactory;
  
    protected $fillable = ['cellphone'];
    
    public function contact(){
        return $this->belongsTo(Contact::class);
    }
}
