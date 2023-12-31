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



    <div class="container mt-4">
        @if(session('pesan'))
        <div class="alert alert-success">
            {{ session('pesan') }}
        </div>
        @endif
        <a href="createbr" class="btn btn-success">Tambah data +</a>
        <table class="table custom-table mt-4">
            <thead>
                <tr>
                    <th style="background-color: #2A2F4F; color: #fff;">No</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Nama</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Jumlah</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Harga</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Foto</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Created_at</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp

                @foreach ($dataAll as $row)
                <tr>
                    <th scope="row">{{ $no++ }}</th>
                    <td>{{ $row->nama_barang }}</td>
                    <td>{{ $row->jumlah_barang }}</td>
                    <td>{{ $row->harga_barang }}</td>
                    <td>
                        @if ($row->foto)
                        <img src="{{ asset('storage/' . $row['foto']) }}" alt="Foto barang" style="width: 50px;">
                        @else
                        No Image
                        @endif
                    </td>
                    <td>{{ $row->created_at }}</td>
                    <td>
                        <a href="{{ url('/updatebr/' . $row['id_barang']) }}" onclick="return confirm('Yakin data mau diupdate?');" class="btn btn-info"">Update</a>
                        <a href="{{ url('/deletebr/' . $row['id_barang']) }}" onclick="return confirm('Yakin data mau dihapus?');" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection