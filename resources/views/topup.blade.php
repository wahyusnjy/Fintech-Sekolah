@extends('layouts.app')

<?php
$page = "Top Up"
?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Datang {{ Auth::user()->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                 <h5>Saldo: Rp.{{ $saldo->saldo }}</h5>

                <form method="POST" action="{{ route("transaksi_create") }}">
                    @csrf
                    <div class="form-group">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah" class="form-control" placeholder="Masukan Nominal Top up">
                        <input type="hidden" name="type" value="1">
                    </div>
                    <button class="btn btn-primary mt-2" type="submit">Top Up</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
