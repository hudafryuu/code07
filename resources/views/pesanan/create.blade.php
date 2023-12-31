@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DATA PESANAN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">DATA PESANAN</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

@if ($errors->any())
    <div style="color: red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Data Pesanan
        </div>
        <div class="card-body">
            <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('saveps')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="nama_pesanan">NAMA</label>
                    <input type="text" id="nama_pesanan" name="nama_pesanan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="barang_dibeli">BARANG DIBELI</label>
                    <input type="text" id="barang_dibeli" name="barang_dibeli" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="alamat_pesanan">ALAMAT</label>
                    <textarea name="alamat_pesanan" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="jenis_transaksi_pesanan">JENIS TRANSAKSI</label>
                    <input type="text" id="jenis_transaksi_pesanan" name="jenis_transaksi_pesanan" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="total_bayar">TOTAL BAYAR</label>
                    <input type="text" id="total_bayar" name="total_bayar" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

@endsection