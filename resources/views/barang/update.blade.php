@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DATA BARANG</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">DATA BARANG</li>
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
                Data Barang
            </div>
            <div class="card-body">
                <form name="update-mahasiswa-form" id="update-mahasiswa-form" method="post" action="{{url('editbr')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_barang">No</label>
                        <input type="text" id="id_barang" name="id_barang" class="form-control form-control-sm" required="" value="{{ $data->id_barang}}" readonly ">
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">NAMA</label>
                        <input type="text" id="nama_barang" name="nama_barang" class="form-control form-control-sm" required="" value="{{$data->nama_barang}}">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah</label>
                        <input type="text" id="jumlah_barang" name="jumlah_barang" class="form-control form-control-sm" required="" value="{{$data->jumlah_barang}}">
                    </div>
                    <div class="form-group">
                        <label for="harga_barang">Harga</label>
                        <input type="text" id="harga_barang" name="harga_barang" class="form-control form-control-sm" required="" value="{{$data->harga_barang}}">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" id="foto" name="foto" class="form-control-file">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection