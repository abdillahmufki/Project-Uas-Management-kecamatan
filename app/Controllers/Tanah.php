<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\TanahModel;

class Tanah extends BaseController
{
  public function index()
    {
        echo view('admin/tanah/index');
    }

    public function ajaxDatatable()
    {
        if($this->request->isAJAX()){
            $db = \Config\Database::connect();
            $builder = $db->table('tanah');
            return DataTable::of($builder)
            ->add('action', function($row){
              return '<a class="btn btn-warning btn-sm text-white" href="'.base_url('tanah/edit/'.$row->id).'">Edit&nbsp;<i class="bi bi-pencil-fill"></i></a> <a class="btn btn-danger btn-sm" data-href="'.base_url('tanah/delete/'.$row->id.'/delete').'" onclick="confirmToDelete(this)"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>';
          }, 'last')
          ->toJson(true);
        }
    }


    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'tanah'     => null
        ];
        return view('admin/tanah/create',$data);
    }

    public function store()
    {
      // lakukan validasi
      $id = $this->request->getPost('id');
      $rules = [
        'id'  => [
          'rules'     => ['permit_empty','numeric']
        ],
        'namaPemilik'  => [
          'rules'     => ['required','string','max_length[60]'],
          'errors'    => [
            'required'      => 'Nama pemilik wajib diisi!',
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'luasTanah'          => [
          'rules' => ['required','numeric'],
          'errors'    => [
            'required'  => 'Luas tanah wajib diisi!'
          ]
        ],
        'statusTanah'         => [
          'rules'     => ['required','string','in_list[HM,HGB,HGU,HPL,MA,VP,TN]'],
          'errors'    => [
            'required'  => 'Status tanah wajib diisi!',
            'in_list'   => 'Hanya bisa memilih HM,HGB,HGU,HPL,HP,MA,VP dan TN!'
          ]
        ],
        'statusSertifikat'         => [
          'rules'     => ['required','string','in_list[Sudah,Belum]'],
          'errors'    => [
            'required'  => 'Status sertifikat wajib diisi!',
            'in_list'   => 'Hanya bisa memilih Sudah dan Belum!'
          ]
        ],
        'penggunaanTanah'  => [
          'rules'     => ['permit_empty','string','max_length[60]'],
          'errors'    => [
            'required'      => 'Penggunaan Tanah wajib diisi!',
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'kecamatan'  => [
          'rules'     => ['required','string','max_length[60]'],
          'errors'    => [
            'required'      => 'Kecamatan wajib diisi!',
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'kelurahan'  => [
          'rules'     => ['required','string','max_length[60]'],
          'errors'    => [
            'required'      => 'Kelurahan wajib diisi!',
            'max_length'  => 'Maksimal 60 karakter!'
          ]
        ],
        'keterangan'           => ['permit_empty','string'],
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
        $tanah = new TanahModel();
        $data = [
          "nama_pemilik"          => $this->request->getVar('namaPemilik'),
          "luas_tanah"            => $this->request->getVar('luasTanah'),
          "status_tanah"          => $this->request->getVar('statusTanah'),
          "status_sertifikat"     => $this->request->getVar('statusSertifikat'),
          "penggunaan_tanah"      => $this->request->getVar('penggunaanTanah'),
          "keterangan"            => $this->request->getVar('keterangan'),
          "kecamatan"             => $this->request->getVar('kecamatan'),
          "kelurahan"             => $this->request->getVar('kelurahan'),
          "tahun"                 => $this->request->getVar('tahun')
        ];
        if($this->request->getPost('id')){ //Untuk Edit
          $tanah->update($this->request->getPost('id'),$data);
          session()->setFlashdata('message','Data berhasil diedit');
        }else{ //Untuk Tambah
          $tanah->insert($data);
          session()->setFlashdata('message','Data berhasil ditambahkan');
        }
        return redirect()->to('tanah');
      }
    }

    public function edit($id)
    {
      session()->setFlashdata('message','Data berhasil diedit');
      $tanah = new TanahModel();
      $tanah = $tanah->where('id',$id)->first();
      $data = [
          'validation' => \Config\Services::validation(),
          'tanah'     => $tanah
      ];
      return view('admin/tanah/create',$data);
    }

    public function delete($id)
    {
      $tanah = new TanahModel();
      $tanah->delete($id);
      session()->setFlashdata('message','Data berhasil dihapus!');
      return redirect('tanah');
    }
}
