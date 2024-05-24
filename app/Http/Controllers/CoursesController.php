<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // method untuk tampilkan data student
    public function index(){
        //tarik data dbase student
       $courses = Courses::all();

        //panggil view dan kirim data Students
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }
}