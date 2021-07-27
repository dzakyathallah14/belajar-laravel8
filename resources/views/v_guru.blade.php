@extends('layout.v_template')

@section('title', 'Guru')

@section('content')
    <h1>Ini Halaman Guru</h1>

    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>No</th>
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
                    <td>{{ $data->id_guru }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->mapel }}</td>
                    <td><img src="{{ url('foto/' . $data->foto_guru) }}" alt="foto_guru" width="150"></td>
                    <td>
                        <a class="btn btn-primary" href="">Detail</a>
                        <a class="btn btn-success" href="">Edit</a>
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                </tr>

            @endforeach
        </tbody>
    </table>
@endsection
