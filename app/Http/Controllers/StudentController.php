<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // method untuk tampilkan data student
    public function index(){
        //tarik data dbase student
       $students = Student::all();

        //panggil view dan kirim data Students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }
}
