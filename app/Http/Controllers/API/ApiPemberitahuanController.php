<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class ApiPemberitahuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id = null)
    {
        if (isset($id)) {
            $pemberitahuan = Pemberitahuan::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $pemberitahuan], 200);
        } else {
            $pemberitahuan = Pemberitahuan::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $pemberitahuan], 200);
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
        $pemberitahuan = Pemberitahuan::create([
            'isi' => $request->isi,
            'level_user' => $request->level_user,
            'status' => $request->status
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $pemberitahuan], 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemberitahuan $pemberitahuan, $id)
    {
        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $pemberitahuan], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemberitahuan $pemberitahuan, $id)
    {
        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }
}
