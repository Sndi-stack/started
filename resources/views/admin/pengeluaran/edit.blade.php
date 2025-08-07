@extends('admin.layouts.app', ['activePage' => 'pengeluaran'])

@section('content')
<div class="min-height-200px">
   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-3">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-edit-1"></i> Edit Data Pengeluaran</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/pengeluaran" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
         </div>
      </div>
      <form action="/admin/pengeluaran/update/{{ $pengeluaran->id }}" method="POST">
         @csrf
         <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" value="{{ $pengeluaran->tanggal }}" class="form-control" required>
         </div>
         <div class="form-group">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" required>{{ $pengeluaran->keterangan }}</textarea>
         </div>
         <div class="form-group">
            <label>Metode Pembayaran</label>
            <select name="id_metode" class="form-control select2" required>
               @foreach($metode as $m)
               <option value="{{ $m->id }}" @if($pengeluaran->id_metode == $m->id) selected @endif>{{ $m->nama }}</option>
               @endforeach
            </select>
         </div>
         <div class="form-group">
            <label>Total</label>
            <input type="number" name="total" value="{{ $pengeluaran->total }}" class="form-control" required>
         </div>
         <button type="submit" class="btn btn-primary">Update</button>
      </form>
   </div>
</div>
@endsection
