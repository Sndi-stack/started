@extends('admin.layouts.app', [
    'activePage' => 'pembayaran',
])
@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-12 col-sm-12">
            <div class="title">
               <h4>Tambah Data Pembayaran</h4>
            </div>
            <nav aria-label="breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                  <li class="breadcrumb-item"><a href="/admin/pembayaran">Data Pembayaran</a></li>
                  <li class="breadcrumb-item active">Tambah Data</li>
               </ol>
            </nav>
         </div>
      </div>
   </div>

   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-2">
         <div class="pull-left">
            <h2 class="text-primary"><i class="icon-copy dw dw-add-file-1"></i> Tambah Data Pembayaran</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/pembayaran" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
         </div>
      </div>
      <form action="/admin/pembayaran/create" method="POST">
         @csrf
         <div class="form-group">
            <label>Nama Pembayaran <span class="text-danger">*</span></label>
            <input type="text" name="nama" required class="form-control" placeholder="Masukkan Nama Pembayaran...">
         </div>
         <button type="submit" class="btn btn-primary"><i class="ti-save"></i> Tambah Data</button>
      </form>
   </div>
</div>
@endsection
