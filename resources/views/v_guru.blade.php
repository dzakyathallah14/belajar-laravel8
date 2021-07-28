@extends('layout.v_template')

@section('title', 'Guru')

@section('content')
    <h1>Ini Halaman Guru</h1>
    <a class="btn btn-primary" href="/guru/add">Tambah Data Guru</a>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Berhasil</h4>
            {{ session('pesan') }}.
        </div>
    @endif
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Mata Pelajaran</th>
                <th>Foto</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($guru as $data)
                <tr>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->mapel }}</td>
                    <td><img src="{{ url('foto/' . $data->foto_guru) }}" alt="foto_guru" width="150"></td>
                    <td>
                        <a class="btn btn-primary" href="/guru/detail/{{ $data->id_guru }}">Detail</a>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
