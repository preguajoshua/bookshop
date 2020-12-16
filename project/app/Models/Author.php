<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Author extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function books(){
        return $this->hasMany(Book::class);
    }


    public function getinitialsAttribute($value){
        return ucwords($value);
    }

    public function getlastnameAttribute($value){
        return ucwords($value);
    }

    public function getcountryAttribute($value){
        return ucwords($value);
    }

    public function setinitialsAttribute($value){
        $this->attributes['initials'] = ucwords($value);
    }

    public function setlastnameAttribute($value){
        $this->attributes['lastname'] = ucwords($value);
    }

    public function setcountryAttribute($value){
        $this->attributes['country'] = ucwords($value);
    }

}
