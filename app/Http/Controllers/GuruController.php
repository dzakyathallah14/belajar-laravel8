<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruModel;

class GuruController extends Controller
{
    
    public function __construct()
    {
        $this->GuruModel = new GuruModel();
    }
    
    public function index()
    {   
        
        $data = [
            'guru' => $this->GuruModel->allData(),
        ];
        return view('v_guru', $data);
    }

    public function detail($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id_guru)
        ];
        return view('v_detailguru', $data);
    }

    public function add()
    {
        return view('v_addguru');
    }
    
    public function insert()
    {
        Request()->validate([
            'nip' => 'required|unique:tbl_guru,nip|min:4|max:5',
            'nama' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'required|mimes:jpg,jpeg,bmp,png|max:1024',
        ], [
            'nip.required' => 'NIP Wajib Diisi',
            'nip.unique' => 'NIP Sudah Ada',
            'nip.min' => 'NIP Minimal 4 Karakter',
            'nip.max' => 'NIP Maksimal 5 Karakter',
            'nama.required' => 'Nama Wajib Diisi',
            'mapel.required' => 'Mata Pelajaran Wajib Diisi',
            'foto_guru.required' => 'Wajib Upload Foto Anda',
            'foto_guru.mimes' => 'Ekstensi Gambar jpg, jpeg, bmp, png',
            'foto_guru.max' => 'Ukuran Gambar Maksimal 1 MB',
        ]);

        //upload gambar
        $fileFoto = Request()->foto_guru;
        $fileName = Request()->nip . '.' . $fileFoto->extension();
        $fileFoto->move(public_path('foto'), $fileName);
        
        $data = [
            'nip' => Request()->nip,
            'nama' => Request()->nama,
            'mapel' => Request()->mapel,
            'foto_guru' => $fileName,
        ];
        
        $this->GuruModel->tambahData($data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Ditambahkan');
    }
    
    public function edit($id_guru)
    {
        if (!$this->GuruModel->detailData($id_guru)) {
            abort(404);
        }
        $data = [
            'guru' => $this->GuruModel->detailData($id_guru)
        ];
        return view('v_editguru', $data);
    }

    public function update($id_guru)
    {
        Request()->validate([
            'nip' => 'required|min:4|max:5',
            'nama' => 'required',
            'mapel' => 'required',
            'foto_guru' => 'mimes:jpg,jpeg,bmp,png|max:1024',
        ], [
            'nip.required' => 'NIP Wajib Diisi',
            'nip.unique' => 'NIP Sudah Ada',
            'nip.min' => 'NIP Minimal 4 Karakter',
            'nip.max' => 'NIP Maksimal 5 Karakter',
            'nama.required' => 'Nama Wajib Diisi',
            'mapel.required' => 'Mata Pelajaran Wajib Diisi',
            'foto_guru.mimes' => 'Ekstensi Gambar jpg, jpeg, bmp, png',
            'foto_guru.max' => 'Ukuran Gambar Maksimal 1 MB',
        ]);

        if (Request()->foto_guru <> "") {
           //Jika akan mengganti foto
            //upload gambar
            $fileFoto = Request()->foto_guru;
            $fileName = Request()->nip . '.' . $fileFoto->extension();
            $fileFoto->move(public_path('foto'), $fileName);
            
            $data = [
                'nip' => Request()->nip,
                'nama' => Request()->nama,
                'mapel' => Request()->mapel,
                'foto_guru' => $fileName,
            ];
        }else {
            //Jika tidak mengganti foto
            $data = [
                'nip' => Request()->nip,
                'nama' => Request()->nama,
                'mapel' => Request()->mapel,
            ];
        }
        
        
        $this->GuruModel->editData($id_guru, $data);
        return redirect()->route('guru')->with('pesan', 'Data Berhasil Di-Update');
    }
    
}
