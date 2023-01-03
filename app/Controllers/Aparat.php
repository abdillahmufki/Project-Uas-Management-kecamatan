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
            $builder = $db->table('aparats');
            return DataTable::of($builder)
            ->add('action', function($row){
              return '<a class="btn btn-warning btn-sm text-white" href="'.base_url('aparat/edit/'.$row->id).'">Edit&nbsp;<i class="bi bi-pencil-fill"></i></a> <a class="btn btn-danger btn-sm" data-href="'.base_url('aparat/delete/'.$row->id.'/delete').'" onclick="confirmToDelete(this)"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>';
          }, 'last')
          ->toJson(true);
        }
    }


    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'aparat'     => null
        ];
        return view('admin/aparat/create',$data);
    }

    public function store()
    {
      // lakukan validasi
      $id = $this->request->getPost('id');
      $rules = [
        'id'  => [
          'rules'     => ['permit_empty','numeric']
        ],
        'nama'  => [
          'rules'     => ['required','string','max_length[60]'],
          'errors'    => [
            'required'      => 'Nama lengkap wajib diisi!',
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'niap' => [
          'rules' => ['required','string','max_length[18]','is_unique[aparats.NIAP,id,{id}]'],
          'errors'    => [
            'required'      => 'NIAP wajib diisi!',
            'max_length'  => 'Maksimal 18 karakter!',
            'is_unique'     => 'NIAP sudah tersedia!'
          ]
        ],
        'nip'  => [
          'rules' => ['required','string','max_length[18]','is_unique[aparats.NIP,id,{id}]'],
          'errors'    => [
            'required'      => 'NIP wajib diisi!',
            'max_length'  => 'Maksimal 18 karakter!',
            'is_unique'     => 'NIP sudah tersedia!'
          ]
        ],
        'jenisKelamin'         => [
          'rules'     => ['required','string','in_list[Laki - laki,Perempuan]'],
          'errors'    => [
            'required'  => 'Jenis Kelamin wajib diisi!',
            'in_list'   => 'Hanya bisa memilih Laki - laki/Perempuan!'
          ]
        ],
        'tempatLahir'          => [
          'rules'   => ['required','string','max_length[40]'],
          'errors'  => [
            'required'  => 'Tempat lahir wajib diisi!',
            'max_length'  => 'Maksimal 40 karakter!'
          ]
        ],
        'tanggalLahir'         => [
          'rules' => ['required','valid_date[Y-m-d]'],
          'errors'    => [
            'required'  => 'Tanggal lahir wajib diisi!',
            'valid_date'  => 'Format tanggal tidak sesuai!'
          ]
        ],
        'agama'                => [
          'rules' => ['required','string','in_list[Islam,Kristen,Hindu,Buddha,Katolik,Kong Hu Chu]'],
          'errors'    => [
            'required'  => 'Agama wajib diisi!',
            'in_list' => 'Hanya bisa memilih Islam,Kristen,Hindu,Buddha,Katolik atau Kong Hu Chu!'
          ]
        ],
        'pangkatGolongan'      => [
          'rules'   => ['permit_empty','string','max_length[100]'],
          'errors'  => [
            'max_length'  => 'Maksimal 100 karakter!'
          ]
        ],
        'jabatan'              => [
          'rules' => 'permit_empty','string','max_length[80]',
          'errors'  => [
            'max_length'  => 'Maksimal 80 karakter!'
          ]
        ],
        'pendidikanTerakhir'   => [
          'rules'   => ['permit_empty','string','in_list[SD,SMP,SMA/SMK,D3,S1,S2,S3]'],
          'errors'  => [
            'in_list'   => 'Hanya bisa memilih SD,SMP,SMA/SMK,D3,S1,S2 atau S3'
          ]
        ],
        'tanggalPengangkatan'  => [
          'rules'   => 'permit_empty','valid_date[Y-m-d]',
          'errors'  => [
            'valid_date'  => 'Format tanggal tidak sesuai!'
          ]
        ],
        'nomorPengangkatan'    => [
          'rules'   => ['permit_empty','string','max_length[60]'],
          'errors'  => [
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'tanggalPemberhentian' => [
          'rules'   => ['permit_empty','valid_date[Y-m-d]'],
          'errors'  => [
            'valid_date'  => 'Format tanggal tidak sesuai!'
          ]
        ],
        'nomorPemberhentian'   => [
          'rules'   => ['permit_empty','string','max_length[60]'],
          'errors'  => [
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'keterangan'           => ['permit_empty','string'],
        'kecamatanId'          => [
          'rules' => ['required','numeric'],
          'errors'    => [
            'required'  => 'Kecamatan wajib diisi!'
          ]
        ],
        'kelurahanId'          => [
          'rules' => ['required','numeric'],
          'errors'    => [
            'required'  => 'Kecamatan wajib diisi!'
          ]
        ],
        'tahun'                => [
          'rules' => ['required','valid_date[Y]'],
          'errors'    => [
            'required'  => 'Tahun wajib diisi!'
          ]
        ]
      ];
      if (!$this->validate($rules)){
          $validation =  \Config\Services::validation();
          return redirect()->back()->withInput();
      }else{
        $aparat = new AparatModel();
        $data = [
          "nama_lengkap"          => $this->request->getVar('nama'),
          "NIAP"                  => $this->request->getVar('niap'),
          "NIP"                   => $this->request->getVar('nip'),
          "jenis_kelamin"         => $this->request->getVar('jenisKelamin'),
          "tempat_lahir"          => $this->request->getVar('tempatLahir'),
          "tanggal_lahir"         => $this->request->getVar('tanggalLahir') ?? NULL,
          "agama"                 => $this->request->getVar('agama'),
          "pangkat_golongan"      => $this->request->getVar('pangkatGolongan'),
          "jabatan"               => $this->request->getVar('jabatan'),
          "pendidikan_terakhir"   => $this->request->getVar('pendidikanTerakhir'),
          "tanggal_pengangkatan"  => ($this->request->getVar('tanggalPengangkatan') == "") ? NULL : $this->request->getVar('tanggalPengangkatan'),
          "nomor_pengangkatan"    => $this->request->getVar('nomorPengangkatan'),
          "tanggal_pemberhentian" => ($this->request->getVar('tanggalPemberhentian') == "") ? NULL : $this->request->getVar('tanggalPemberhentian'),
          "nomor_pemberhentian"   => $this->request->getVar('nomorPemberhentian'),
          "keterangan"            => $this->request->getVar('keterangan'),
          "kecamatan_id"          => $this->request->getVar('kecamatanId'),
          "kelurahan_id"          => $this->request->getVar('kelurahanId'),
          "tahun"                 => $this->request->getVar('tahun')
        ];
        if($this->request->getPost('id')){ //Untuk Edit
          $aparat->update($this->request->getPost('id'),$data);
          session()->setFlashdata('message','Data berhasil diedit');
        }else{ //Untuk Tambah
          $aparat->insert($data);
          session()->setFlashdata('message','Data berhasil ditambahkan');
        }
        return redirect()->to('aparat');
      }
    }

    public function edit($id)
    {
      session()->setFlashdata('message','Data berhasil diedit');
      $aparat = new AparatModel();
      $aparat = $aparat->where('id',$id)->first();
      $data = [
          'validation' => \Config\Services::validation(),
          'aparat'     => $aparat
      ];
      return view('admin/aparat/create',$data);
    }

    public function delete($id)
    {
      $aparat = new AparatModel();
      $aparat->delete($id);
      session()->setFlashdata('message','Data berhasil dihapus!');
      return redirect('aparat');
    }
}
