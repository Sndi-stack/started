<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class PengeluaranController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function read(Request $request)
{
    $tanggal = $request->tanggal ?? date('Y-m-d'); // default ke hari ini

    $pengeluaran = DB::table('pengeluaran')
        ->join('pembayaran', 'pengeluaran.id_metode', '=', 'pembayaran.id')
        ->select('pengeluaran.*', 'pembayaran.nama as metode')
        ->whereDate('tanggal', $tanggal)
        ->orderBy('pengeluaran.id', 'DESC')
        ->get();

    return view('admin.pengeluaran.index', compact('pengeluaran', 'tanggal'));
}


    public function add() {
    $Metode = DB::table('pembayaran')->orderBy('nama', 'ASC')->get();
    return view('admin.pengeluaran.tambah', compact('Metode'));
}

    public function create(Request $request) {
    DB::table('pengeluaran')->insert([
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan,
        'id_metode' => $request->id_metode,
        'total' => $request->total,
    ]);

    return redirect('/admin/pengeluaran')->with('success', 'Data berhasil ditambahkan!');
}

    public function edit($id){
    $pengeluaran = DB::table('pengeluaran')->where('id', $id)->first();
    $pembayaran = DB::table('pembayaran')->get(); // jika dropdown metode juga dibutuhkan

    return view('admin.pengeluaran.edit', [
        'pengeluaran' => $pengeluaran,
        'pembayaran' => $pembayaran
    ]);
}


    public function update(Request $request, $id) {
        DB::table('Pengeluaran')->where('id', $id)->update([
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan,
            'id_metode' => $request->id_metode,
            'total' => $request->total,
            'updated_at' => now(),
        ]);

        return redirect('/admin/Pengeluaran')->with('success', 'Data berhasil diupdate!');
    }

    public function delete($id) {
        DB::table('pengeluaran')->where('id', $id)->delete();

        return redirect('/admin/pengeluaran')->with('success', 'Data berhasil dihapus!');
    }
}
