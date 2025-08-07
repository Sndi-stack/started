<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PemasukanController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function read(Request $request)
{
    $tanggal = $request->tanggal ?? date('Y-m-d'); // default ke hari ini jika kosong

    $pemasukan = DB::table('pemasukan')
        ->join('pembayaran', 'pemasukan.id_metode', '=', 'pembayaran.id')
        ->select('pemasukan.*', 'pembayaran.nama as metode')
        ->whereDate('tanggal', $tanggal)
        ->orderBy('pemasukan.id', 'DESC')
        ->get();

    return view('admin.pemasukan.index', compact('pemasukan', 'tanggal'));
}

        public function add() {
        $Metode = DB::table('pembayaran')->orderBy('nama', 'ASC')->get();
        return view('admin.pemasukan.tambah', compact('Metode'));
}

    public function create(Request $request) {
        DB::table('pemasukan')->insert([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'id_metode' => $request->id_metode,
            'total' => $request->total,
            'created_at' => now(),
        ]);

        return redirect('/admin/pemasukan')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id) {
        $pemasukan = DB::table('pemasukan')->where('id', $id)->first();
        $pembayaran = DB::table('pembayaran')->get();

        return view('admin.pemasukan.edit', compact('pemasukan', 'pembayaran'));
    }

    public function update(Request $request, $id) {
        DB::table('pemasukan')->where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'id_metode' => $request->id_metode,
            'total' => $request->total,
            'updated_at' => now(),
        ]);

        return redirect('/admin/pemasukan')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id) {
        DB::table('pemasukan')->where('id', $id)->delete();
        return redirect('/admin/pemasukan')->with('success', 'Data berhasil dihapus!');
    }
}

