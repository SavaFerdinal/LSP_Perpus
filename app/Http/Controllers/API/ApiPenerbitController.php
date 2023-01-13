<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class ApiPenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id = null)
    {
        if (isset($id)) {
            $penerbit = Penerbit::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $penerbit], 200);
        } else {
            $penerbit = Penerbit::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $penerbit], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penerbit = Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'verif' => $request->verif,
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $penerbit], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penerbit $penerbit, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $penerbit], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penerbit $penerbit, $id)
    {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
