<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use App\Models\Penerbit;
use App\Models\Pesan;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FirstSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create ([
            "kode" => "A1",
            "fullname" => "Sava",
            "username" => "sava",
            "password" => Hash::make('password'),
            "role" => "admin",
            "join_date" => "2023-05-01 23:09:03",
            "terakhir_login" => "2023-05-01 23:09:03",
            "foto" => ""
        ]);

        User::create ([
            "kode" => "A2",
            "nis" => "12345",
            "fullname" => "Ferdinal",
            "username" => "ferdinal",
            "password" => Hash::make('password'),
            "kelas" => "XII RPL",
            "role" => "user",
            "join_date" => "2023-05-01 23:09:03",
            "terakhir_login" => "2023-05-01 23:09:03",
        ]);

        User::create ([
            "kode" => "A3",
            "nis" => "12346",
            "fullname" => "Dusk",
            "username" => "dusk",
            "password" => Hash::make('password'),
            "kelas" => "XII RPL",
            "role" => "user",
            "join_date" => "2023-05-01 23:09:03",
            "terakhir_login" => "2023-05-01 23:09:03",
        ]);

        Kategori::create ([
            "kode" => "umum",
            "nama" => "Umum",
        ]);

        Kategori::create ([
            "kode" => "sains",
            "nama" => "Sains",
        ]);

        Kategori::create ([
            "kode" => "sejarah",
            "nama" => "Sejarah",
        ]);

        Penerbit::create([
            "kode" => "erlangga",
            "nama" => "Erlangga",
            "verif" => "",
        ]);

        Penerbit::create([
            "kode" => "bse",
            "nama" => "BSE",
            "verif" => "",
        ]);

        Penerbit::create([
            "kode" => "intermedia",
            "nama" => "Intermedia",
            "verif" => "",
        ]);

        Buku::create([
            "judul" => "Black Clover",
            "kategori_id" => "1",
            "penerbit_id" => "1",
            "pengarang" => "Ezhar",
            "tahun_terbit" => "2010",
            "isbn" => "23423442342",
            "j_buku_baik" => "25",
            "j_buku_rusak" => "5",
            "foto" => "BlackClover.jpg",
        ]);

        Buku::create([
            "judul" => "Naruto",
            "kategori_id" => "2",
            "penerbit_id" => "2",
            "pengarang" => "ali",
            "tahun_terbit" => "2015",
            "isbn" => "23423442343",
            "j_buku_baik" => "30",
            "j_buku_rusak" => "10",
            "foto" => "",
        ]);

        Buku::create([
            "judul" => "Dragon Ball",
            "kategori_id" => "3",
            "penerbit_id" => "3",
            "pengarang" => "Chairul",
            "tahun_terbit" => "2010",
            "isbn" => "23423442344",
            "j_buku_baik" => "15",
            "j_buku_rusak" => "5",
            "foto" => "",
        ]);

        Peminjaman::create ([
            "user_id" => "1",
            "buku_id" => "2",
            "tanggal_peminjaman" => "2023-05-05 23:09:03",
            "tanggal_pengembalian" => "2023-05-05 23:09:03",
            "kondisi_buku_saat_dipinjam" => "baik",
            "kondisi_buku_saat_dikembalikan" => "baik",
        ]);

        Peminjaman::create ([
            "user_id" => "3",
            "buku_id" => "2",
            "tanggal_peminjaman" => "2023-05-01 23:09:03",
            "tanggal_pengembalian" => "2023-05-05 23:09:03",
            "kondisi_buku_saat_dipinjam" => "baik",
            "kondisi_buku_saat_dikembalikan" => "rusak",
            "denda" => "100000",
        ]);

        Peminjaman::create ([
            "user_id" => "3",
            "buku_id" => "3",
            "tanggal_peminjaman" => "2023-05-05 23:09:03",
            "tanggal_pengembalian" => "2023-05-01 23:09:03",
            "kondisi_buku_saat_dipinjam" => "baik",
            "kondisi_buku_saat_dikembalikan" => "baik",
        ]);

        Pemberitahuan::create ([
            "isi" => "Maaf, perpus sedang tutup, hanya menerima pengembalian",
            "level_user" => "",
            "status" => "aktif",
        ]);

        Pemberitahuan::create ([
            "isi" => "Maaf, server sedang maintenance",
            "level_user" => "",
            "status" => "nonaktif",
        ]);

        Pemberitahuan::create ([
            "isi" => "Pengemmbilan buku paket sampai tanggal 30 januari 2023",
            "level_user" => "",
            "status" => "aktif",
        ]);

        Pesan::create ([
            "penerima_id" => "2",
            "pengirim_id" => "1",
            "judul" => "Buku dipinjam",
            "isi" => "Terimakasih Telah meminjam buku Di perpus",
            "status" => "terkirim",
            "tanggal_kirim" => "2023-05-05 23:09:03",
        ]);

        Pesan::create ([
            "penerima_id" => "3",
            "pengirim_id" => "1",
            "judul" => "Anda merusak Buku",
            "isi" => "Anda kena denda 100000",
            "status" => "terkirim",
            "tanggal_kirim" => "2023-05-05 23:09:03",
        ]);

        Pesan::create ([
            "penerima_id" => "2",
            "pengirim_id" => "1",
            "judul" => "Buku telah dikembalikan",
            "isi" => "Terimakasih Telah meminjam buku Di perpus",
            "status" => "dibaca ",
            "tanggal_kirim" => "2023-05-05 23:09:03",
        ]);

        Identitas::create ([
            "nama_app" => "PERPUS SMKN 10 JAKARTA",
            "alamat_app" => "Jl. SMEAN 6, Cawang, Kramat Jati, Jakarta Timur",
            "email_app" => "email@smkn10jakarta.sch.id",
            "nomor_hp" => "87840260498",
            "foto" => "",

        ]);
    }
}
