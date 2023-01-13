<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class ApiIdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id = null)
    {
        if (isset($id)) {
            $identitas = Identitas::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $identitas], 200);
        } else {
            $identitas = Identitas::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $identitas], 200);
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
        $identitas = Identitas::create([
            'nama_app' => $request->nama_app,
            'alamat_app' => $request->alamat_app,
            'email_app' => $request->penerbit_id,
            'nomer_hp' => $request->nomer_hp
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $identitas], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Identitas $identitas, $id)
    {
        $identitas = Identitas::findOrFail($id);
        $identitas->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $identitas], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Identitas $identitas, $id)
    {
        $identitas = Identitas::findOrFail($id);
        $identitas->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
