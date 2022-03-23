<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Lemari;
use App\Models\Barang;

class LemariController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lemari = Lemari::with('barang')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes get all lemari",
            'data' => $lemari
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lemari = Lemari::create([
            'nama_lemari' => $request->nama_lemari

        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes create lemari",
            'data' => $lemari
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Lemari $lemari)
    {
        $lemari = Lemari::where('id', $lemari->id)->with('barang')->first();
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes get lemari with id = ".$lemari->id,
            'data' => $lemari
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
    public function update(Request $request, Lemari $lemari)
    {
        $lemari ->update([
            'nama_lemari' => $request->nama_lemari

        ]);
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes update lemari with id = ".$lemari->id,
            'data' => $lemari
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lemari $lemari)
    {
        $lemari->delete();
        return response()->json([
            'code' => 200,
            'status' => true,
            'massage' => "succes delete lemari with id = ".$lemari->id,
            'data' => ""
        ]);
    }
}
