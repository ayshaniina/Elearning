<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Method untuk Menampilkan Data Student
    public function index()
    {
        // Tarik Data Student dari DB
        $students = Student::all();

        // Panggil View dan Kirim Data Students
        return view('admin.contents.student.index', [
            'students' => $students,
        ]);
    }

    // Method untuk Menampilkan Form Tambah Student
    public function create()
    {
        // Mendapatkan Data Courses
        $course = Courses::all();

        // Panggil View
        return view('admin.contents.student.create', [
            'courses' => $course
        ]);
    }

    // Method untuk Menyimpan Data Student Baru
    public function store(Request $request)
    {

        // Validasi Request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'courses_id' => 'nullable',
        ]);

        // Simpan ke Database
        Student::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->courses_id,
        ]);

        // Kemballikan ke Halaman Student
        return redirect('/admin/student')->with('message', 'Berhasil Menambahkan Student');
    }

    // Method untuk Menampilkan Halaman Edit
    public function edit($id)
    {
        // Cari Data Student Berdasarkan ID
        $student = Student::find($id); // Select * From Students WHERE id = $id;

        // Dapatkan Data Courses
        $course = Courses::all();

        // Panggil View
        return view('admin.contents.student.edit', [
            'student' => $student,
            'courses' => $course,
        ]);
    }

    // Method untuk Menyimpan Hasil Update    
    public function update($id, Request $request)
    {
        // Cari Data Student Berdasarkan ID
        $student = Student::find($id); // Select * From Students WHERE id = $id;

        // Validasi Request
        $request->validate([
            'name' => 'required',
            'nim' => 'required|numeric',
            'major' => 'required',
            'class' => 'required',
            'courses_id' => 'nullable',
        ]);

        // Simpan ke Perubahan
        $student->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'major' => $request->major,
            'class' => $request->class,
            'courses_id' => $request->courses_id,
        ]);

        // Kemballikan ke Halaman Student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }

    // Method untuk Menghapus Student
    public function destroy($id)
    {
        // Cari Data Student Berdasarkan ID
        $student = Student::find($id); // Select * From Students WHERE id = $id;

        // Hapus Student
        $student->delete();

        // Kembalikan ke Halaman Student
        return redirect('/admin/student')->with('message', 'Berhasil Mengedit Student');
    }
}
