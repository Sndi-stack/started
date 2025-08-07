@extends('admin.layouts.app', [
    'activePage' => 'pembayaran',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">
               <h4>Data Pembayaran</h4>
            </div>
            <nav aria-label="breadcrumb" role="navigation">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-2">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Pembayaran</h2>
         </div>
         <div class="pull-right">
             <a href="/admin/pembayaran/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
         </div>
      </div>

      @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
         {{ session('success') }}
         <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
      @endif

      <table class="table table-striped table-bordered data-table hover">
         <thead class="bg-primary text-white">
            <tr>
               <th width="5%">#</th>
               <th>Nama Pembayaran</th>
               <th class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            @php $no = 1; @endphp
            @foreach ($pembayaran as $data)
            <tr>
               <td class="text-center">{{ $no++ }}</td>
               <td>{{ $data->nama }}</td>
               <td class="text-center" width="15%">
                  <a href="/admin/pembayaran/edit/{{ $data->id }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
                  <button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#delete-{{ $data->id }}"><i class="fa fa-trash"></i></button>
               </td>
            </tr>

            <!-- Modal Hapus -->
            <div class="modal fade" id="delete-{{ $data->id }}" tabindex="-1" role="dialog">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-body">
                        <h4 class="text-center">Yakin ingin menghapus data ini?</h4>
                        <hr>
                        <div class="form-group">
                           <label>Nama Pembayaran</label>
                           <input class="form-control" value="{{ $data->nama }}" readonly>
                        </div>
                        <div class="row mt-3">
                           <div class="col-md-6">
                              <a href="/admin/pembayaran/delete/{{ $data->id }}" class="btn btn-primary btn-block">Ya</a>
                           </div>
                           <div class="col-md-6">
                              <button type="button" class="btn btn-danger btn-block" data-dismiss="modal">Tidak</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
         </tbody>
      </table>
   </div>
</div>
@endsection
