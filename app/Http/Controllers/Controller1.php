<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Pembeli;

class Controller1 extends Controller
{
    public function create()
    {
        return view('pesanan.create');
    }


    public function update($id_pesanan)
    {
        $data = Pesanan::find($id_pesanan);

        if ($data) {
            return view('pesanan.update', ['data' => $data]);
        } else {
            return redirect('readps');
        }
    }

    public function edit(Request $request)
    {
        $data = Pesanan::find($request->id_pesanan);
        
        if ($data) {
            $data->nama_pesanan = $request->nama_pesanan;
            $data->barang_dibeli = $request->barang_dibeli;
            $data->alamat_pesanan = $request->alamat_pesanan;
            $data->jenis_transaksi_pesanan = $request->jenis_transaksi_pesanan;
            $data->total_bayar = $request->total_bayar;

            $data->save();
    
            return redirect('readps')->with('pesan', 'Data berhasil diupdate');
        } else {
            return redirect('readps')->with('pesan', 'Data tidak ditemukan/gagal update');
        }
    }
    

    public function save(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nama_pesanan' => 'required|string|max:50',
                'barang_dibeli' => 'required|string|max:50',
                'alamat_pesanan' => 'required|string|max:100',
                'jenis_transaksi_pesanan' => 'required|string|max:50',
                'total_bayar' => 'required|string|max:50',
            ]);
    
            $model = new Pesanan();
            $model->nama_pesanan = $request->nama_pesanan;
            $model->barang_dibeli = $request->barang_dibeli;
            $model->alamat_pesanan = $request->alamat_pesanan;
            $model->jenis_transaksi_pesanan = $request->jenis_transaksi_pesanan;
            $model->total_bayar = $request->total_bayar;
    
            $model->created_at = now();
            $model->save();
    
            return view('pesanan.view', ['data' => $request->all()]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    public function read()
    {
        $model = new Pesanan();
        $dataAll = $model->all();
        return view('pesanan.read', ['dataAll' => $dataAll]);
    }

    public function delete($id_pesanan)
    {
        $data = Pesanan::find($id_pesanan);

        if ($data) {
            $data->delete();
        } else {
            return redirect('readps')->with('pesan', 'Data tidak ditemukan');
        }

        return redirect('readps')->with('pesan', 'Data Berhasil dihapus');
    }

}