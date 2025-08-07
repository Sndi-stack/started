@extends('admin.layouts.app', ['activePage' => 'pemasukan'])

@section('content')
<div class="min-height-200px">
   <div class="page-header">
      <div class="row">
         <div class="col-md-6 col-sm-12">
            <div class="title">         
               <h2 class="mb-3">Pemasukan</h2>
               <nav aria-label="breadcrumb" class="mb-3">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item text-muted">Data Input</li>
                     <li class="breadcrumb-item active fw-bold" aria-current="page">Data Pemasukan</li>
                  </ol>
               </nav>
               <form action="{{ url('/admin/pemasukan') }}" method="GET" class="mb-3">
                  <div class="row g-2 align-items-center">
                     <div class="col-auto">
                           <input type="date" name="tanggal" class="form-control"
                              value="{{ old('tanggal', $tanggal ?? date('Y-m-d')) }}">
                     </div>
                     <div class="col-auto">
                           <button type="submit" class="btn btn-primary btn-sm">Filter</button>
                     </div>
                  </div>
               </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="pd-20 card-box mb-30">
      <div class="clearfix mb-3">
         <div class="pull-left">
            <h2 class="text-primary h2"><i class="icon-copy dw dw-list"></i> List Data Pemasukan</h2>
         </div>
         <div class="pull-right">
            <a href="/admin/pemasukan/add" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
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
      <th class="text-center">Tgl/Bulan/Tahun</th> {{-- Tambahkan kolom baru --}}
   </tr>
</thead>
<tbody>
   @foreach ($pemasukan as $key => $data)
   <tr>
      <td>{{ $key + 1 }}</td>
      <td>{{ $data->tanggal }}</td>
      <td>{{ $data->keterangan }}</td>
      <td>{{ $data->metode}}</td>
      <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
      <td class="text-center">
         <a href="/admin/pemasukan/edit/{{ $data->id }}" class="btn btn-success btn-xs"><i class="fa fa-edit"></i></a>
         <a href="/admin/pemasukan/delete/{{ $data->id }}" class="btn btn-danger btn-xs" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
      </td>
      <td class="text-center">
         {{-- Format tanggal sesuai kebutuhan --}}
         {{ \Carbon\Carbon::parse($data->tanggal)->format('d F Y') }}
      </td>
   </tr>
   @endforeach
</tbody>
      </table>
   </div>
</div>
@endsection
