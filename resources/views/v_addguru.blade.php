@extends('layout.v_template')

@section('title', 'Tambah Data Guru')

@section('content')

    <form action="/guru/insert" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-6">

                <div class="form-group">
                    <label for="NIP">NIP</label>
                    <input type="text" name="nip" class="form-control">
                    <div class="text-danger">
                        @error('nip')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Nama">Nama Guru</label>
                    <input type="text" name="nama" class="form-control">
                    <div class="text-danger">
                        @error('nama')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="Mata Pelajaran">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control">
                    <div class="text-danger">
                        @error('mapel')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="foto_guru">Upload Foto</label>
                    <input type="file" name="foto_guru" class="form-control">
                    <div class="text-danger">
                        @error('foto_guru')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>

            </div>

        </div>
    </form>


@endsection
