<?php

namespace App\Http\Controllers;

use App\Models\Pembeli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller3 extends Controller
{
    public function create()
    {
        return view('pembeli.create');
    }


    public function update($id_pembeli)
    {
        $data = Pembeli::find($id_pembeli);

        if ($data) {
            return view('pembeli.update', ['data' => $data]);
        } else {
            return redirect('readpm');
        }
    }

    public function edit(Request $request)
    {
        $data = Pembeli::find($request->id_pembeli);
        
        if ($data) {
            $data->nama_pembeli = $request->nama_pembeli;
            $data->alamat_pembeli = $request->alamat_pembeli;
            $data->jenis_transaksi = $request->jenis_transaksi;

            $data->save();
    
            return redirect('readpm')->with('pesan', 'Data berhasil diupdate');
        } else {
            return redirect('readpm')->with('pesan', 'Data tidak ditemukan/gagal update');
        }
    }
    

    public function save(Request $request)
    {
        try {
            $validateData = $request->validate([
                'nama_pembeli' => 'required|string|max:50',
                'alamat_pembeli' => 'required|string|max:50',
                'jenis_transaksi' => 'required|string|max:50',
            ]);
    
            $model = new Pembeli();
            $model->nama_pembeli = $request->nama_pembeli;
            $model->alamat_pembeli = $request->alamat_pembeli;
            $model->jenis_transaksi = $request->jenis_transaksi;
    
            $model->created_at = now();
            $model->save();
    
            return view('pembeli.view', ['data' => $request->all()]);
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }
    

    public function read()
    {
        $model = new Pembeli();
        $dataAll = $model->all();
        return view('pembeli.read', ['dataAll' => $dataAll]);
    }

    public function delete($id_pembeli)
    {
        $data = Pembeli::find($id_pembeli);

        if ($data) {
            $data->delete();
        } else {
            return redirect('readpm')->with('pesan', 'Data tidak ditemukan');
        }

        return redirect('readpm')->with('pesan', 'Data Berhasil dihapus');
    }
}