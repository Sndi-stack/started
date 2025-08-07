<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Auth;

class pembayaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function read(){
        $pembayaran = DB::table('pembayaran')->orderBy('id','DESC')->get();

        return view('admin.pembayaran.index',['pembayaran'=>$pembayaran]);
    }

    public function add(){
        return view('admin.pembayaran.tambah');
    }

    public function create(Request $request){
        DB::table('pembayaran')->insert([  
            'nama' => $request->nama]);

        return redirect('/admin/pembayaran')->with("success","Data Berhasil Ditambah !");
    }

    public function edit($id){
        $pembayaran = DB::table('pembayaran')->where('id',$id)->first();
        
        return view('admin.pembayaran.edit',['pembayaran'=>$pembayaran]);
    }

    public function update(Request $request, $id) {
        DB::table('pembayaran')  
            ->where('id', $id)
            ->update([
            'nama' => $request->nama]);

        return redirect('/admin/pembayaran')->with("success","Data Berhasil Diupdate !");
    }

    public function delete($id)
    {
        DB::table('pembayaran')->where('id',$id)->delete();

        return redirect('/admin/pembayaran')->with("success","Data Berhasil Dihapus !");
    }
}
