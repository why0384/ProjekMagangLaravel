<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function student() 
    {
        $data = [
                "title"         => "Data Siswa",
                "menuStudent"   => "active",
                "student"       => Student::get(),
            ];
        return view('student/student', $data);
    }

    public function create()
    {
        $data = [
            "title"             => "Tambah Data Siswa",
            "menuStudent"       => "active",
            "users"             => User::where('role', 'Siswa')->get(),
        ];
        return view('student/create', $data);

    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name_student' => 'required',
            'class_student' => 'required',
            'address_student' => 'required',
            'phone_student' => 'required',
        ], [
            'user_id.required' => 'User wajib diisi ',
            'user_id.exists' => 'User tidak ditemukan',
            'name_student.required' => 'Nama siswa wajib diisi',
            'class_student.required' => 'Kelas siswa wajib diisi',
            'address_student.required' => 'Alamat siswa wajib diisi',
            'phone_student.required' => 'No. Telepon siswa wajib diisi',
        ]);

 
        $student = new Student();
        $student->user_id = $request->user_id;
        $student->name_student = $request->name_student;
        $student->class_student = $request->class_student;
        $student->address_student = $request->address_student;
        $student->phone_student = $request->phone_student;
        $student->save();     

        return redirect()->route('student')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $status_student = $student->status_student;

        $data = [
            "title"             => "Edit Data Siswa",
            "menuStudent"       => "active",
            "student"           => $student,
            "status_student"    => $status_student,
            "users"             => User::where('role', 'Siswa')->get(),
        ];
        return view('student/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name_student' => 'required',
            'class_student' => 'required',
            'address_student' => 'required',
            'phone_student' => 'required',
        ], [
            'user_id.required' => 'User wajib diisi ',
            'user_id.exists' => 'User tidak ditemukan',
            'name_student.required' => 'Nama siswa wajib diisi',
            'class_student.required' => 'Kelas siswa wajib diisi',
            'address_student.required' => 'Alamat siswa wajib diisi',
            'phone_student.required' => 'No. Telepon siswa wajib diisi',
        ]);
 
        $student = Student::findOrFail($id);
        $student->user_id = $request->user_id;
        $student->name_student = $request->name_student;
        $student->class_student = $request->class_student;
        $student->address_student = $request->address_student;
        $student->phone_student = $request->phone_student;
        $student->save();     

        return redirect()->route('student')->with('success', 'Data siswa berhasil diperbarui!');
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('student')->with('success', 'Data siswa berhasil dihapus!');
    }

}