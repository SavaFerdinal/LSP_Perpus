@extends('layouts.master')
@section('content')
<div class="container">

    @foreach ($pemberitahuan as $p)
        <div class="alert alert-primary">
            {{ $p->isi }}
        </div>
    @endforeach

    <div class="row">
        @foreach ($buku as $b)
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        <img src="{{ url('/img' . '/' . $b->foto) }}" style="height: 150px;object-fit: cover;"
                        class="card-img" alt="....">
                    </div>
                    <div class="card-body">
                        <div><b>Nama Buku:</b> {{ $b->judul }}</div>
                        <div><b>Penerbit:</b> {{ $b->penerbit->nama}}</div>
                        <div><b>Pengarang:</b> {{ $b->pengarang }}</div>
                    </div>
                    <div class="card-footer">
                        <form action="{{ route('user.form_peminjaman') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $b->id }}" name="buku_id">
                        <button class="btn btn-primary" type="submit">Pinjam</button>
                    </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection