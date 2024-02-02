<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return response()->json([
            'mahasiswas' => $mahasiswas
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            "nama"      => ['required'],
            "alamat"    => ['required']
        ];

        $validated = Validator::make($request->all(),$rules);
        if($validated->fails()) {
            return response()->json([
                "status"    => 403,
                "errors"    => $validated->errors()
            ]);
        }

        $mahasiswa = Mahasiswa::create([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ]);

        return response()->json([
            'message' => 'Mahasiswa berhasil dibuat',
            'mahasiswa' => $mahasiswa
            ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }
        return response()->json(['data' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->alamat = $request->input('alamat');
        $mahasiswa->save();

        return response()->json([
            'message' => 'Mahasiswa berhasil diperbarui',
            'mahasiswa' => $mahasiswa
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        $mahasiswa->delete();

    return response()->json([
            'message' => 'Mahasiswa berhasil dihapus'
        ], 200);
    }
}
