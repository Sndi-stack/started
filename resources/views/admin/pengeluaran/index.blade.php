@extends('admin.layouts.app', ['activePage' => 'pengeluaran'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Pengeluaran</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-3">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Pengeluaran</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/pengeluaran/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
         </div>
      </div>
      @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <table class="table table-striped table-bordered data-table hover">
         <thead class="bg-primary text-white">
            <tr>
               <th>#</th>
               <th>Tanggal</th>
               <th>Keterangan</th>
               <th>Metode Pembayaran</th>
               <th>Total</th>
               <th class="text-center">Aksi</th>
            </tr>
         </thead>
         <tbody>
         @foreach ($pengeluaran as $key => $data)
            <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $data->tanggal }}</td>
            <td>{{ $data->keterangan }}</td>
            <td>{{ $data->metode }}</td> {{-- perbaikan nama kolom --}}
            <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
               <td class="text-center">
                  <a href="/admin/pengeluaran/edit/{{ $data->id }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                  <a href="/admin/pengeluaran/delete/{{ $data->id }}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection
