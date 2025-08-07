<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function read()
    {
        $barang = DB::table('barang')
            ->join('kategori', 'barang.id_kategori', '=', 'kategori.id')
            ->join('jenis', 'barang.id_jenis', '=', 'jenis.id')
            ->select('barang.*', 'kategori.nama as kategori', 'jenis.nama as jenis')
            ->orderBy('barang.id', 'DESC')
            ->get();

        return view('admin.barang.index', compact('barang'));
    }

    public function add()
    {
        $kategori = DB::table('kategori')->get();
        $jenis = DB::table('jenis')->get();
        return view('admin.barang.tambah', compact('kategori', 'jenis'));
    }

    public function create(Request $request){
    $data = [
        'id_kategori' => $request->id_kategori,
        'id_jenis' => $request->id_jenis,
        'nama' => $request->nama,
        'harga' => $request->harga,
    ];

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/barang'), $namaFile);
        $data['foto'] = $namaFile;
    }

    DB::table('barang')->insert($data);
    
    return redirect('/admin/barang')->with("success","Data Berhasil Ditambah !");
}

    public function edit($id)
    {
        $barang = DB::table('barang')->where('id', $id)->first();
        $kategori = DB::table('kategori')->get();
        $jenis = DB::table('jenis')->get();

        return view('admin.barang.edit', compact('barang', 'kategori', 'jenis'));
    }

    public function update(Request $request, $id)
{
    $barang = DB::table('barang')->where('id', $id)->first();

    $foto = $barang->foto;
    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($foto && file_exists(public_path('uploads/barang/' . $foto))) {
            unlink(public_path('uploads/barang/' . $foto));
        }

        // Simpan foto baru
        $file = $request->file('foto');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/barang'), $namaFile);
        $foto = $namaFile;
    }

    DB::table('barang')->where('id', $id)->update([
        'id_kategori' => $request->id_kategori,
        'id_jenis' => $request->id_jenis,
        'nama' => $request->nama,
        'harga' => $request->harga,
        'foto' => $foto,
    ]);

    return redirect('/admin/barang')->with('success', 'Data berhasil diperbarui.');
}

    public function delete($id)
    {
        $barang = DB::table('barang')->where('id', $id)->first();
        if ($barang->foto) {
            Storage::disk('public')->delete($barang->foto);
        }

        DB::table('barang')->where('id', $id)->delete();
        return redirect('/admin/barang')->with('success', 'Data berhasil dihapus.');
    }
}