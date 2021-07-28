@extends('layout.v_template')

@section('title', 'Detail Guru')

@section('content')
    <h1>Ini Halaman Detail Guru</h1>

    <table class="table table-bordered text-center">
        <tr>
            <th width="100px">NIP</th>
            <th width="30px">:</th>
            <th>{{ $guru->nip }}</th>
        </tr>
        <tr>
            <th width="100px">Nama Guru</th>
            <th width="30px">:</th>
            <th>{{ $guru->nama }}</th>
        </tr>
        <tr>
            <th width="100px">Mata Pelajaran</th>
            <th width="30px">:</th>
            <th>{{ $guru->mapel }}</th>
        </tr>
        <tr>
            <th width="100px">Foto Guru</th>
            <th width="30px">:</th>
            <th><img src="{{ url('foto/' . $guru->foto_guru) }}" alt="foto" width="400px"></th>
        </tr>
        <th><a class="btn btn-success" href="/guru">Kembali</a></th>
    </table>
@endsection
