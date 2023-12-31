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

    <div class="container mt-4">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Data PESANAN
            </div>
            <div class="card-body">
                <form name="update-mahasiswa-form" id="update-mahasiswa-form" method="post" action="{{url('editps')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_pesanan">No</label>
                        <input type="text" id="id_pesanan" name="id_pesanan" class="form-control form-control-sm" required="" value="{{ $data->id_pesanan}}" readonly ">
                    </div>
                    <div class="form-group">
                        <label for="nama_pesanan">NAMA</label>
                        <input type="text" id="nama_pesanan" name="nama_pesanan" class="form-control form-control-sm" required="" value="{{$data->nama_pesanan}}">
                    </div>
                    <div class="form-group">
                        <label for="barang_dibeli">BARANG</label>
                        <input type="text" id="barang_dibeli" name="barang_dibeli" class="form-control form-control-sm" required="" value="{{$data->barang_dibeli}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_pesanan">Alamat</label>
                        <input type="text" id="alamat_pesanan" name="alamat_pesanan" class="form-control form-control-sm" required="" value="{{$data->alamat_pesanan}}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_transaksi_pesanan">Jenis Transaksi</label>
                        <input type="text" id="jenis_transaksi" name="jenis_transaksi_pesanan" class="form-control form-control-sm" required="" value="{{$data->jenis_transaksi_pesanan}}">
                    </div>
                    <div class="form-group">
                        <label for="total_bayar">Tota Bayar</label>
                        <input type="text" id="total_bayar" name="total_bayar" class="form-control form-control-sm" required="" value="{{$data->total_bayar}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection