@extends('layouts.app')
@section('content')
<div class="container">
    @include('components.user.sidebar')

    <h2>Profile saya</h2>

    <div class="col">
        <div class="card mb-4">
          <div class="card-body">
            @foreach ($user as $u)
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Full Name</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $u->fullname }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Username</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $u->username }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Kelas</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $u->kelas }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Join Date</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $u->join_date }}</p>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <p class="mb-0">Terakhir Login</p>
                  </div>
                  <div class="col-sm-9">
                    <p class="text-muted mb-0">{{ $u->terakhir_login }}</p>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
</div>
@endsection