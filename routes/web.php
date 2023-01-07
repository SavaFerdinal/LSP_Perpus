<?php

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->group(function() {
    Route::get('/dashboard', function(){
        $pemberitahuan = Pemberitahuan::where('status', 'aktif')->get();

        $buku = Buku::all();
        
        return view('user.dashboard', compact('pemberitahuan', 'buku'));
    })->name('user.dashboard');

    
    Route::get('/form_peminjaman', function(){
        return view('user.form_peminjaman');
    })->name('user.form_peminjaman');

    Route::get('/peminjaman', function(){
        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)->get();
        return view('user.peminjaman', compact('peminjaman'));
    })->name('user.peminjaman');

    Route::get('/pengembalian', function(){
        $peminjaman = Peminjaman::where('user_id', Auth::user()->id)->get();
        return view('user.pengembalian', compact('peminjaman'));
    })->name('user.pengembalian');

    Route::get('/pesan', function(){
        $pesan = Pesan::where('penerima_id', Auth::user()->id)->get();
        return view('user.pesan', compact('pesan'));
    })->name('user.pesan');

    Route::get('/profil', function(){
        $user = User::where('id', Auth::user()->id)->get();
        return view('user.profil', compact('user'));
    })->name('user.profil');
});

Route::prefix('admin')->group(function() {
    Route::get('/dashboard', function(){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});