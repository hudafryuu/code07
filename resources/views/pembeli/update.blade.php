@extends('layout.admin')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DATA PEMBELI</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">DATA PEMBELI</li>
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
                Data PEMBELI
            </div>
            <div class="card-body">
                <form name="update-mahasiswa-form" id="update-mahasiswa-form" method="post" action="{{url('editpm')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_pembeli">No</label>
                        <input type="text" id="id_pembeli" name="id_pembeli" class="form-control form-control-sm" required="" value="{{ $data->id_pembeli}}" readonly ">
                    </div>
                    <div class="form-group">
                        <label for="nama_pembeli">NAMA</label>
                        <input type="text" id="nama_pembeli" name="nama_pembeli" class="form-control form-control-sm" required="" value="{{$data->nama_pembeli}}">
                    </div>
                    <div class="form-group">
                        <label for="alamat_pembeli">Alamat</label>
                        <input type="text" id="alamat_pembeli" name="alamat_pembeli" class="form-control form-control-sm" required="" value="{{$data->alamat_pembeli}}">
                    </div>
                    <div class="form-group">
                        <label for="jenis_transaksi">Jenis Transaksi</label>
                        <input type="text" id="jenis_transaksi" name="jenis_transaksi" class="form-control form-control-sm" required="" value="{{$data->jenis_transaksi}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

@endsection