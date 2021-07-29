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
    <div class="justify-content-center mt-4">
        <table class="table table-bordered table-md text-center">
            <thead>
                <tr>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                    <th>Foto</th>
                    <th class="col-sm-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $data)
                    <tr>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->mapel }}</td>
                        <td><img src="{{ url('foto/' . $data->foto_guru) }}" alt="foto_guru" width="150"></td>
                        <td class="col-sm-2">
                            <a class="btn btn-primary" href="/guru/detail/{{ $data->id_guru }}">Detail</a>
                            <a class="btn btn-success" href="/guru/edit/{{$data->id_guru}}">Edit</a>
                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_guru }}">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @foreach ($guru as $data)
    <div class="modal modal-danger fade" id="delete{{ $data->id_guru }}">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Apakah Anda Yakin?</h4>
            </div>
            <div class="modal-body">
                <table>
                    <tr>
                        <th width="100px">NIP</th>
                        <th width="30px">:</th>
                        <th>{{ $data->nip }}</th>
                    </tr>
                    <tr>
                        <th width="100px">Nama Guru</th>
                        <th width="30px">:</th>
                        <th>{{ $data->nama }}</th>
                    </tr>
                    <tr>
                        <th width="100px">Mata Pelajaran</th>
                        <th width="30px">:</th>
                        <th>{{ $data->mapel }}</th>
                    </tr>
                    <tr>
                        <th width="100px">Foto Guru</th>
                        <th width="30px">:</th>
                        <th><img src="{{ url('foto/' . $data->foto_guru) }}" alt="foto" width="400px"></th>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      @endforeach
@endsection
