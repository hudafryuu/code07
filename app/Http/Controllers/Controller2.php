<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Controller2 extends Controller
{
    public function create()
    {
        return view('barang.create');
    }


    public function update($id_barang)
    {
        $data = Barang::find($id_barang);

        if ($data) {
            return view('barang.update', ['data' => $data]);
        } else {
            return redirect('readbr');
        }
    }

    public function edit(Request $request)
    {
        $data = Barang::find($request->id_barang);
        
        if ($data) {
            $data->nama_barang = $request->nama_barang;
            $data->jumlah_barang = $request->jumlah_barang;
            $data->harga_barang = $request->harga_barang;
    
            // Check if a new file is uploaded
            if ($request->hasFile('foto')) {
                // Delete existing file (if any)
                if ($data->foto) {
                    Storage::delete($data->foto);
                }
    
                // Store the new file
                $fotoPath = $request->file('foto')->store('public');
                $data->foto = basename($fotoPath);
            }
    
            $data->updated_at = now();
            $data->save();
    
            return redirect('readbr')->with('pesan', 'Data berhasil diupdate');
        } else {
            return redirect('readbr')->with('pesan', 'Data tidak ditemukan/gagal update');
        }
    }
    
    

    public function save(Request $request)
    {
        $validateData = $request->validate([
            'nama_barang' => 'required|string|max:50',
            'jumlah_barang' => 'required|integer|between:1,1000',
            'harga_barang' => 'required|string|max:50',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $model = new Barang();
        $model->id_barang = $request->id_barang;
        $model->nama_barang = $request->nama_barang;
        $model->jumlah_barang = $request->jumlah_barang;
        $model->harga_barang = $request->harga_barang;

        // Check if a file is uploaded
        if ($request->hasFile('foto')) {
            // Store the file
            $fotoPath = $request->file('foto')->store('public');
            $model->foto = basename($fotoPath);
        }

        $model->created_at = now();
        $model->save();

        return view('barang.view', ['data' => $request->all()]);
    }

    public function read()
    {
        $model = new Barang();
        $dataAll = $model->all();
        return view('barang.read', ['dataAll' => $dataAll]);
    }

    public function delete($id_barang)
    {
        $data = Barang::find($id_barang);

        if ($data) {
            // Delete the associated file
            if ($data->foto) {
                Storage::delete($data->foto);
            }

            $data->delete();
        } else {
            return redirect('readbr')->with('pesan', 'Data tidak ditemukan');
        }

        return redirect('readbr')->with('pesan', 'Data Berhasil dihapus');
    }
}