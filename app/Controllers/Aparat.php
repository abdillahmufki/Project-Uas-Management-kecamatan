<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\AparatModel;

class Aparat extends BaseController
{
    public function index()
    {
        echo view('admin/aparat/index');
    }

    public function ajaxDatatable()
    {
        if($this->request->isAJAX()){
            $db = \Config\Database::connect();
            $builder = $db->table('aparats')->select('nama_lengkap,NIAP,NIP,jenis_kelamin,tempat_lahir,tanggal_lahir,agama,pangkat_golongan,jabatan,pendidikan_terakhir,tanggal_pengangkatan,
                                nomor_pengangkatan,tanggal_pemberhentian,nomor_pemberhentian,keterangan,kecamatan_id,kelurahan_id,tahun');
    
            return DataTable::of($builder)->toJson(true);
        }
    }


    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('admin/aparat/create',$data);
    }

    public function store()
    {
        // lakukan validasi
        $rules = [
          'nama'  => [
            'rules'     => ['required','string'],
            'errors'    => [
                'required'      => 'Nama lengkap harus diisi!'
            ]
          ],
          'niap' => [
            'rules' => ['required','string','max_length[18]'],
            'errors'    => [
              'required'      => 'NIAP harus diisi!'
            ]
          ],
          'nip'  => [
            'rules' => ['required','string','max_length[18]'],
            'errors'    => [
              'required'      => 'NIP harus diisi!'
            ]
          ],
          'jenisKelamin'         => [
            'rules'     => ['required','string','in_list[Laki - laki,Perempuan]'],
            'errors'    => [
              'required'  => 'Jenis Kelamin harus diisi!'
            ]
          ],
          'tempatLahir'          => ['permit_empty','string'],
          'tanggalLahir'         => ['permit_empty','valid_date[Y-m-d]'],
          'agama'                => [
            'rules' => ['required','string','in_list[Islam,Kristen,Hindu,Buddha,Katolik,Kong Hu Chu]'],
            'errors'    => [
              'required'  => 'Agama harus diisi!'
            ]
          ],
          'pangkatGolongan'      => ['permit_empty','string'],
          'jabatan'              => ['permit_empty','string'],
          'pendidikanTerakhir'   => [
            'rules' => ['required','string','in_list[SD,SMP,SMA/SMK,D3,S1,S2,S3]'],
            'errors'    => [
              'required'  => 'Pendidikan harus diisi!'
            ]
          ],
          'tanggalPengangkatan'  => ['permit_empty','valid_date[Y-m-d]'],
          'nomorPengangkatan'    => ['permit_empty','string'],
          'tanggalPemberhentian' => ['permit_empty','valid_date[Y-m-d]'],
          'nomorPemberhentian'   => ['permit_empty','string'],
          'keterangan'           => ['permit_empty','string'],
          'kecamatanId'          => [
            'rules' => ['required','numeric'],
            'errors'    => [
              'required'  => 'Kecamatan harus diisi!'
            ]
          ],
          'kelurahanId'          => [
            'rules' => ['required','numeric'],
            'errors'    => [
              'required'  => 'Kecamatan harus diisi!'
            ]
          ],
          'tahun'                => [
            'rules' => ['required','valid_date[Y]'],
            'errors'    => [
              'required'  => 'Tahun harus diisi!'
            ]
          ]
        ];
        if (!$this->validate($rules)){
            $validation =  \Config\Services::validation();
            return redirect()->to('aparat-new')->withInput();
        }else{
          // var_dump($this->request->getVar("nama"));
          // die();
          $aparat = new AparatModel();
          $aparat->insert([
            "nama_lengkap"          => $this->request->getPost('nama'),
            "NIAP"                  => $this->request->getPost('niap'),
            "NIP"                   => $this->request->getPost('nip'),
            "jenis_kelamin"         => $this->request->getPost('jenisKelamin'),
            "tempat_lahir"          => $this->request->getPost('tempatLahir'),
            "tanggal_lahir"         => $this->request->getPost('tanggalLahir'),
            "agama"                 => $this->request->getPost('agama'),
            "pangkat_golongan"      => $this->request->getPost('pangkatGolongan'),
            "jabatan"               => $this->request->getPost('jabatan'),
            "pendidikan_terakhir"   => $this->request->getPost('pendidikanTerakhir'),
            "tanggal_pengangkatan"  => $this->request->getPost('tanggalPengangkatan'),
            "nomor_pengangkatan"    => $this->request->getPost('nomorPengangkatan'),
            "tanggal_pemberhentian" => $this->request->getPost('tanggalPemberhentian'),
            "nomor_pemberhentian"   => $this->request->getPost('nomorPemberhentian'),
            "keterangan"            => $this->request->getPost('keterangan'),
            "kecamatan_id"          => $this->request->getPost('kecamatanId'),
            "kelurahan_id"          => $this->request->getPost('kelurahanId'),
            "tahun"                 => $this->request->getPost('tahun')
          ]);
          session()->setFlashdata('pesan','Data berhasil ditambahkan');
          return redirect()->to('aparat');
        }
    }
}
