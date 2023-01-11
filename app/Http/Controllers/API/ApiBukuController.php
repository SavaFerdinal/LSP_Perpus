<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class ApiBukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id = null)
    {
        if (isset($id)) {
            $buku = Buku::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $buku], 200);
        } else {
            $buku = Buku::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $buku], 200);
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
        $buku = Buku::create([
            'judul' => $request->judul,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
            'pengarang' => $request->pengarang,
            'tahun_terbit' => $request->tahun_terbit,
            'isbn' => $request->isbn,
            'j_buku_baik' => $request->j_buku_baik,
            'j_buku_rusak' => $request->j_buku_rusak,
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $buku], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Buku $buku, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $buku], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buku $buku, $id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
