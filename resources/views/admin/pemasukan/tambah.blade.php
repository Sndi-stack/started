@extends('admin.layouts.app', ['activePage' => 'pemasukan'])

@section('content')
<div class="min-height-200px">
   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-3">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Pemasukan</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/pemasukan" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
         </div>
      </div>
      <form action="/admin/pemasukan/create" method="POST">
         @csrf
         <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
         </div>
         <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" required></textarea>
         </div>
         <div class="form-group">
            <label>Metode Pembayaran</label>
            <select name="id_metode" class="form-control select2" required>
               <option value="">-- Pilih Metode --</option>
               @foreach($Metode as $m)
               <option value="{{ $m->id }}">{{ $m->nama }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label>Total</label>
            <input type="number" name="total" class="form-control" required>
         </div>
         <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
   </div>
</div>
@endsection
