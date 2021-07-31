@extends('layout.v_template')

@section('title', 'Guru')

@section('content')
    <div class="text-center">
        <h1>List User</h1>
        <a class="btn btn-primary" href="/guru/add">Tambah Data Guru</a>
    </div>
    @if (session('pesan'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i>Berhasil</h4>
            {{ session('pesan') }}.
        </div>
    @endif
    <div class="row">
        <div class="mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th class="align-middle">NIP</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">Mata Pelajaran</th>
                            <th class="align-middle">Foto</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($guru as $data)
                            <tr>
                                <td class="align-middle">{{ $data->nip }}</td>
                                <td class="align-middle">{{ $data->nama }}</td>
                                <td class="align-middle">{{ $data->mapel }}</td>
                                <td class="align-middle"><img class="img-thumbnail" src="{{ url('foto/' . $data->foto_guru) }}" alt="foto_guru" width="150px"></td>
                                <td class="align-middle">
                                    <div class="row justify-content-md-center">
                                        <div class="col-sm-3">
                                            <a class="btn btn-primary" href="/guru/detail/{{ $data->id_guru }}">Detail</a>
                                        </div>
                                        <div class="col-sm-3">
                                            <a class="btn btn-success" href="/guru/edit/{{$data->id_guru}}">Edit</a>
                                        </div>
                                        <div class="col-sm-3">
                                            <button class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $data->id_guru }}">Delete</button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
