@extends('layout.v_template')
@section('title', 'Edit Guru')


@section('content')
    <h1>Edit Guru</h1>

    <form action="/guru/update/{{$guru->id_guru}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" name="nip" class="form-control" value="{{$guru->nip}}" readonly>
                    <div class="text-danger">
                        @error('nip')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Nama">Nama Guru</label>
                    <input type="text" name="nama" class="form-control" value="{{$guru->nama}}">
                    <div class="text-danger">
                        @error('nama')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Mata Pelajaran">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" value="{{$guru->mapel}}">
                    <div class="text-danger">
                        @error('mapel')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <img src="{{url('foto/'.$guru->foto_guru)}}" alt="fotoguru" class="img-thumbnail">
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="foto_guru">Ganti Foto</label>
                            <input type="file" name="foto_guru" class="form-control">
                            <div class="text-danger">
                                @error('foto_guru')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>

        </div>
    </form>

@endsection
