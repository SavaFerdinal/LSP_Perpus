@extends('layouts.app')
@section('content')
<div class="container">
    @include('components.user.sidebar')
    <div class="row">
        <div class="col">
            <h2>Pesan Untuk Anda</h2>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Pesan</th>
                <th>Isi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pesan as $key => $p)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->isi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($pesan as $psn)

    @endforeach
</div>
@endsection