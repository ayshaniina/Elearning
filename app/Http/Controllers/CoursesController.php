<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    // method untuk tampilkan data Courses
    public function index(){
        //tarik data dbase Courses
       $courses = Courses::all();

        //panggil view dan kirim data Courses
        return view('admin.contents.courses.index', [
            'courses' => $courses,
        ]);
    }
    // Method untuk Menampilkan Form Tambah Courses
    public function create()
    {
        return view('admin.contents.courses.create');
    }

    // Method untuk Menyimpan Data courses Baru
    public function store(Request $request)
    {
        // Validasi Request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // Simpan ke Database
        Courses::create([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,

        ]);

        // Kemballikan ke Halaman Courses
        return redirect('/admin/courses')->with('message', 'Berhasil Menambahkan Courses');
    }

    // Method untuk Menampilkan Halaman Edit
    public function edit($id)
    {
        // Cari Data Courses Berdasarkan ID
        $courses = Courses::find($id); // Select * From Courses WHERE id = $id;

        return view('admin.contents.courses.edit', [
            'courses' => $courses
        ]);
    }

    // Method untuk Menyimpan Hasil Update    
    public function update($id, Request $request)
    {
        // Cari Data Courses Berdasarkan ID
        $courses = Courses::find($id); // Select * From Courses WHERE id = $id;

        // Validasi Request
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
        ]);

        // Simpan ke Perubahan
        $courses->update([
            'name' => $request->name,
            'category' => $request->category,
            'desc' => $request->desc,
        ]);

        // Kemballikan ke Halaman Courses
        return redirect('/admin/courses')->with('message', 'Berhasil Mengedit Courses');
    }

    // Method untuk Menghapus Courses
    public function destroy($id){
        // Cari Data Courses Berdasarkan ID
        $courses = Courses::find($id); // Select * From Courses WHERE id = $id;

        // Hapus Courses
        $courses->delete();

        // Kembalikan ke Halaman Courses
        return redirect('/admin/courses')->with('message', 'Berhasil Mengedit Courses');
    }
}