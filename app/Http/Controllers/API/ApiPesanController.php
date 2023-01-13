<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use DateTime;
use Illuminate\Http\Request;

class ApiPesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id = null)
    {
        if (isset($id)) {
            $pesan = Pesan::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $pesan], 200);
        } else {
            $pesan = Pesan::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $pesan], 200);
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
        $now = new DateTime();
        $formated = $now->format('Y-m-d');

        $pesan = Pesan::create([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'tanggal_kirim' => $formated,
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $pesan], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pesan $pesan, $id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $pesan], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pesan $pesan, $id)
    {
        $pesan = Pesan::findOrFail($id);
        $pesan->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
