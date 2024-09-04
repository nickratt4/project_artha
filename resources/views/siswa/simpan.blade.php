<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function index()
    {
        $data_siswa = DB::table('data_siswa')->get();
        return view('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function tambah()
    {
        return view('siswa.tambah');
    }

    public function simpan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|regex:/^[a-zA-Z\s\']+$/',
            'email' => 'required|email',
            'address' => 'required',
            'birth_date' => 'required|date_format:m-d-Y'
        ]);

        if ($validator->fails()) {
            return redirect('/siswa/tambah')
                        ->withErrors($validator)
                        ->withInput();
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'birth_date' => \Carbon\Carbon::createFromFormat('m-d-Y', $request->birth_date)->format('Y-m-d')
        ];

        $simpan = DB::table('data_siswa')->insert($data);

        if ($simpan) {
            return redirect('/aplikasisekolah')->with('success', 'Data berhasil disimpan!');
        } else {
            return redirect('/siswa/tambah')->with('error', 'Gagal menyimpan data!')->withInput();
        }
    }
}
