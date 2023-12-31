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

    <div class="container">
        <table class="table custom-table mt-4">
            <thead>
                <tr>
                    <th style="background-color: #2A2F4F; color: #fff;">No</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Nama</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Jumlah</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Harga</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>{{ $data['nama_barang'] }}</td>
                    <td>{{ $data['jumlah_barang'] }}</td>
                    <td>{{ $data['harga_barang'] }}</td>
                    <td>
                        @if ($data['foto'])
                        <img src="{{ url('storage/' . $data['foto']) }}" alt="Foto barang">
                        @else
                        No Image
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>

        <a href="/readbr" class="btn btn-success">Tampilkan data</a>
    </div>

    @endsection