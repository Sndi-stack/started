@extends('admin.layouts.app', ['activePage' => 'barang'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Barang</h4>
            </div>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-3">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Barang</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/barang/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
         </div>
      </div>
      @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      <table class="table table-striped table-bordered data-table hover">
         <thead class="bg-primary text-white">
            <tr>
               <th>#</th>
               <th>Nama</th>
               <th>Kategori</th>
               <th>Jenis</th>
               <th>Harga</th>
               <th>Foto</th>
               <th class="text-center">Aksi</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($barang as $key => $data)
            <tr>
               <td>{{ $key + 1 }}</td>
               <td>{{ $data->nama }}</td>
               <td>{{ $data->kategori }}</td>
               <td>{{ $data->jenis }}</td>
               <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
               <td>
                  @if($data->foto)
                  <img src="{{ asset('uploads/barang/' . $data->foto) }}">
                  @else
                  -
                  @endif
               </td>
               <td class="text-center">
                  <a href="/admin/barang/edit/{{ $data->id }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                  <a href="/admin/barang/delete/{{ $data->id }}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection