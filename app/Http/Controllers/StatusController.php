<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function status()
    { 
        $data = [
            "title"       => "Status Aplikasi",
            "menuStatus"  => "active",
            "status"      => Status::orderBy('kode_status', 'asc')->get(),
        ];
        return view('status/status', $data); 
    } 

    public function create()
    {
        $data = [
            "title"      => "Tambah Status Aplikasi",
            "menuStatus" => "active",
        ];
        return view('status/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_status' => 'required|unique:status,kode_status',
            'nama_status' => 'required',
        ], [
            'kode_status.required' => 'Kode status wajib diisi',
            'kode_status.unique'   => 'Kode status sudah digunakan',
            'nama_status.required' => 'Nama status wajib diisi',
        ]);

        Status::create([
            'kode_status' => $request->kode_status,
            'nama_status' => $request->nama_status,
        ]);

        return redirect()->route('status')->with('success', 'Status berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = [
            "title"      => "Edit Status Aplikasi",
            "menuStatus" => "active",
            "status"     => Status::findOrFail($id),
        ];
        return view('status/edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_status' => 'required|unique:status,kode_status,' . $id,
            'nama_status' => 'required',
        ], [
            'kode_status.required' => 'Kode status wajib diisi',
            'kode_status.unique'   => 'Kode status sudah digunakan',
            'nama_status.required' => 'Nama status wajib diisi',
        ]);

        $status = Status::findOrFail($id);
        $status->kode_status = $request->kode_status;
        $status->nama_status = $request->nama_status;
        $status->save();

        return redirect()->route('status')->with('success', 'Status berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $status = Status::findOrFail($id);
        $status->delete();

        return redirect()->route('status')->with('success', 'Status berhasil dihapus!');
    }   
}
