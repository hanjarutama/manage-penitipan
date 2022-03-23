<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Lemari;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('lemari')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes get all barang",
            'data' => $barang
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = Barang::create([
            'lemari_id' => $request->lemari_id,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang

        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes create barang",
            'data' => $barang
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $barang = Barang::where('id', $barang->id)->with('lemari')->first();
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes get barang with id = ".$barang->id,
            'data' => $barang
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $barang->update([
            'lemari_id' => $request->lemari_id,
            'nama_barang' => $request->nama_barang,
            'jenis_barang' => $request->jenis_barang
        ]);
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes update barang with id = ".$barang->id,
            'data' => $barang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes delete barang with id = ".$barang->id,
            'data' => ""
        ]);
    }
}
