<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get($id = null)
    {
        if (isset($id)) {
            $user = User::findOrFail($id);
            return response()->json(['msg' => 'Data retrieved', 'data' => $user], 200);
        } else {
            $user = User::get();
            return response()->json(['msg' => 'Data retrieved', 'data' => $user], 200);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_admin(Request $request)
    {
        $now = new DateTime();
        $formated = $now->format('Y-m-d H:i:s');

        $user = User::create([
            'kode' => $request->kode,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => $request->password,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'photo' => $request->photo,
            'verif' => $request->verif,
            'role' => $request->role,
            'join_date' => $formated,
            'terakhir_login' => null,
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $user], 201);
    }

    public function store_user(Request $request)
    {
        $now = new DateTime();
        $formated = $now->format('Y-m-d H:i:s');

        $user = User::create([
            'kode' => $request->kode,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => $request->password,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'photo' => $request->photo,
            'verif' => $request->verif,
            'role' => 'user',
            'join_date' => $formated,
            'terakhir_login' => null,
        ]);
        return response()->json(['msg' => 'Data created', 'data' => $user], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    public function update(Request $request, User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return response()->json(['msg' => 'Data updated', 'data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['msg' => 'Data deleted'], 200);
    }

    // AUTHENTICATION
    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('username', 'password')))
        {
            return response()->json(['msg' => 'unauthorized'], 401);
        }

        $user = User::where('username', $request['username'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['msg' => 'Hi ' . $user->fullname . ',welcome to Perpus', 'access_token' => $token, 'token_type' => 'Bearer']);
    }
}
