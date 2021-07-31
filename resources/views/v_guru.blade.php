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

    @if (session('pesan_dihapus'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="fa fa-exclamation"></i>Perhatian</h4>
            {{ session('pesan_dihapus') }}.
        </div>
    @endif
    <div class="row">
        <div class="mt-4">
            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead>
                        <tr>
                            <th class="align-middle">No</th>
                            <th class="align-middle">NIP</th>
                            <th class="align-middle">Nama</th>
                            <th class="align-middle">Mata Pelajaran</th>
                            <th class="align-middle">Foto</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1 ?>
                        @foreach ($guru as $data)
                            <tr>
                                <td class="align-middle">{{ $no++}}</td>
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
                                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete{{ $data->id_guru }}">Delete</button>
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
    <div class="modal bg-danger fade" data-bs-backdrop="static" data-bs-keyboard="false" id="delete{{ $data->id_guru }}" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Apakah Anda yakin akan menghapus data dibawah ini?</h5>
                
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body p-4">
                    <div class="row">
                        <div class="col-sm-4">NIP</div>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-6">{{ $data->nip }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Nama Guru</div>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-6">{{ $data->nama }}</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">Mata Pelajaran</div>
                        <div class="col-sm-1">:</div>
                        <div class="col-sm-6">{{ $data->mapel }}</div>
                    </div>
                    <div class="row mt-2">
                        <img class="img-thumbnail" src="{{ url('foto/' . $data->foto_guru) }}" alt="foto_guru" width="150px">
                    </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline pull-left" data-bs-dismiss="modal">Tidak</button>
              <a href="/guru/delete/{{$data->id_guru}}" class="btn btn-outline">Ya</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
@endsection
