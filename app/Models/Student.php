<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
     // Mendefinisikan Field Yang Boleh Diisi
     protected $fillable = ['name', 'nim', 'major', 'class', 'courses_id'];
    
     /**
      * Laravel Relationship
      * 1. One to One      - Tabel saat ini minjemin ID/KEY ke tabel lain
      * - hasOne()         - Tabel saat ini minjem ID tabel lain
      * - belongsTo()
      * 2. One to Many
      * - hasMany()        - Tabel saat ini minjemin ID ke tabel lain
      * - belongsToMany()  - Tabel saat ini minjem ID tabel lain
      */
     //Definisikan Relasi ke Model Courses
     public function course(){
        return $this->belongsTo(Courses::class, 'courses_id');
     }
}

