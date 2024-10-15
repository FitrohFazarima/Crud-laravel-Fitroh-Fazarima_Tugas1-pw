<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store;
use App\Http\Requests\Update;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataKendaraan = Kendaraan::all();
        return view('index')->with([
            'Kendaraan'=>$dataKendaraan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Store $request)
    {
        $validate = $request->validated();
        $Kendaraan = new Kendaraan();
        $Kendaraan->nama = $request->txtnama;
        $Kendaraan->jenis = $request->txtjenis;
        $Kendaraan->cc = $request->txtcc;
        $Kendaraan->brand = $request->txtbrand;
        $Kendaraan->tahun = $request->txttahun;
        $Kendaraan->harga = $request->txtharga;
        $Kendaraan->save();

        return redirect('/')->with('msg','Input Kendaraan Berhasil');
    
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Kendaraan::find($id);
        return view('edit')->with([
            'txtid'=>$data->id,
            'txtnama'=>$data->nama,
            'txtjenis'=>$data->jenis,
            'txtcc'=>$data->cc,
            'txtbrand'=>$data->brand,
            'txttahun'=>$data->tahun,
            'txtharga'=>$data->harga
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Update $request, $id)
    {
        $data = Kendaraan::find($id);
        $data->nama = $request->txtnama;
        $data->jenis = $request->txtjenis;
        $data->cc = $request->txtcc;
        $data->brand = $request->txtbrand;
        $data->tahun = $request->txttahun;
        $data->harga = $request->txtharga;
        $data->save();

        return redirect('/')->with('msg','Update Kendaraan "'.$data->nama.'" Berhasil');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Kendaraan::find($id);
        $data ->delete();

        return redirect('/')->with('msg','"'.$data->nama.'" Berhasil Dihapus');
    
    }
}
