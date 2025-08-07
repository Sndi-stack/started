@extends('admin.layouts.app', ['activePage' => 'barang'])

@section('content')
<div class="min-height-200px">
    <div class="page-header">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h4>Tambah Data Barang</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Data Master</a></li>
                        <li class="breadcrumb-item"><a href="/admin/barang">Data Barang</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="pd-20 card-box mb-30">
        <form action="/admin/barang/create" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Kategori</label>
                <select name="id_kategori" class="form-control select2" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($kategori as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jenis</label>
                <select name="id_jenis" class="form-control select2" required>
                    <option value="">-- Pilih Jenis --</option>
                    @foreach ($jenis as $j)
                    <option value="{{ $j->id }}">{{ $j->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/admin/barang" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
