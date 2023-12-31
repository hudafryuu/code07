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

    <div class="container">
        <table class="table custom-table mt-4">
            <thead>
                <tr>
                    <th style="background-color: #2A2F4F; color: #fff;">No</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Nama</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Barang</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Alamat</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Jenis Transaksi</th>
                    <th style="background-color: #2A2F4F; color: #fff;">Total Bayar</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#</td>
                    <td>{{ $data['nama_pesanan'] }}</td>
                    <td>{{ $data['barang_dibeli'] }}</td>
                    <td>{{ $data['alamat_pesanan'] }}</td>
                    <td>{{ $data['jenis_transaksi_pesanan'] }}</td>
                    <td>{{ $data['total_bayar'] }}</td>
            </tbody>
        </table>

        <a href="/readps" class="btn btn-success">Tampilkan data</a>
    </div>

    @endsection