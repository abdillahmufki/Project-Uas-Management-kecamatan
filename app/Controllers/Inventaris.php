<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\InventarisModel;

class Inventaris extends BaseController
{
  public function getRules()
  {
    return [
      'id'  => [
        'rules'     => ['permit_empty', 'numeric']
      ],
      'jenis_barang_bangunan'  => [
        'rules'     => ['required', 'string', 'max_length[255]'],
        'errors'    => [
          'required'      => 'Jenis Barang/Bangunan wajib diisi!',
          'max_length'  => 'Maksimal 255 karakter!'
        ]
      ],
      'jml_brg_dibelisendiri' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'max_length'  => 'Maksimal 20 karakter!',
        ]
      ],
      'jml_brg_bantuanpemerintah' => [
        'rules' => ['permit_empty', 'numeric', 'max_length[20]'],
        'errors'    => [
          'max_length'  => 'Maksimal 20 karakter!',
        ]
      ],
      'jml_brg_sumbangan' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'keadaan_baik_awal' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'keadaan_rusak_awal' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'hapus_rusak' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'hapus_dijual' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'hapus_disumbangkan' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'tanggal_penghapusan'   => [
        'rules' => ['permit_empty', 'valid_date[Y-m-d]'],
        // 'errors'    => [
        //   'valid_date'  => 'Format tanggal tidak sesuai!'
        // ]
      ],
      'keadaan_baik_akhir' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'keadaan_rusak_akhir' => [
        'rules' => ['permit_empty', 'numeric'],
        'errors'    => [
          'numeric'  => 'Masukkan Angka!',
        ]
      ],
      'kecamatan'          => [
        'rules' => ['required', 'string', 'max_length[255]'],
        'errors'    => [
          'required'  => 'Kecamatan wajib diisi!'
        ]
      ],
      'kelurahan'          => [
        'rules' => ['required', 'string', 'max_length[255]'],
        'errors'    => [
          'required'  => 'Kelurahan wajib diisi!'
        ]
      ],
      'tahun'                => [
        'rules' => ['required', 'valid_date[Y]'],
        'errors'    => [
          'required'  => 'Tahun wajib diisi!'
        ]
      ]
    ];
  }

  public function index()
  {
    echo view('admin/inventaris/index');
  }

  public function ajaxDatatable()
  {
    if ($this->request->isAJAX()) {
      $db = \Config\Database::connect();
      $builder = $db->table('inventariss');
      return DataTable::of($builder)
        ->add('action', function ($row) {
          return '<a class="btn btn-warning btn-sm text-white" href="' . base_url('admin/inventaris/edit/' . $row->id) . '">Edit&nbsp;<i class="bi bi-pencil-fill"></i></a> <a class="btn btn-danger btn-sm" data-href="' . base_url('admin/inventaris/delete/' . $row->id . '/delete') . '" onclick="confirmToDelete(this)"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>';
        }, 'last')
        ->toJson(true);
    }
  }


  public function create()
  {
    $data = [
      'validation' => \Config\Services::validation(),
      'inventaris'     => null
    ];
    return view('admin/inventaris/create', $data);
  }

  public function store()
  {
    // lakukan validasi
    $id = $this->request->getPost('id');
    $rules = $this->getRules();
    if (!$this->validate($rules)) {
      return $this->create();
    } else {
      $inventaris = new InventarisModel();
      $data = [
        "jenis_barang_bangunan"          => $this->request->getVar('jenis_barang_bangunan'),
        "jml_brg_dibelisendiri"          => $this->request->getVar('jml_brg_dibelisendiri'),
        "jml_brg_bantuanpemerintah"                   => $this->request->getVar('jml_brg_bantuanpemerintah'),
        "jml_brg_sumbangan"         => $this->request->getVar('jml_brg_sumbangan'),
        "keadaan_baik_awal"          => $this->request->getVar('keadaan_baik_awal'),
        "keadaan_rusak_awal"         => $this->request->getVar('keadaan_rusak_awal'),
        "hapus_rusak"                => $this->request->getVar('hapus_rusak'),
        "hapus_dijual"      => $this->request->getVar('hapus_dijual'),
        "hapus_disumbangkan"               => $this->request->getVar('hapus_disumbangkan'),
        "tanggal_penghapusan"  => ($this->request->getVar('tanggal_penghapusan') == "") ? NULL : $this->request->getVar('tanggal_penghapusan'),
        "keadaan_baik_akhir"    => $this->request->getVar('keadaan_baik_akhir'),
        "keadaan_rusak_akhir"          => $this->request->getVar('keadaan_rusak_akhir'),
        "keterangan"            => $this->request->getVar('keterangan'),
        "kecamatan"          => $this->request->getVar('kecamatan'),
        "kelurahan"          => $this->request->getVar('kelurahan'),
        "tahun"                 => $this->request->getVar('tahun')
      ];
      if ($this->request->getPost('id')) { //Untuk Edit
        $inventaris->update($this->request->getPost('id'), $data);
        session()->setFlashdata('message', 'Data berhasil diedit');
      } else { //Untuk Tambah
        $inventaris->insert($data);
        session()->setFlashdata('message', 'Data berhasil ditambahkan');
      }
      return redirect()->to('admin/inventaris');
    }
  }

  public function edit($id)
  {
    session()->setFlashdata('message', 'Data berhasil diedit');
    $inventaris = new InventarisModel();
    $inventaris = $inventaris->where('id', $id)->first();
    $data = [
      'validation' => \Config\Services::validation(),
      'inventaris'     => $inventaris
    ];
    return view('admin/inventaris/edit', $data);
  }

  public function handleEdit()
  {
    $id = $this->request->getPost('id');
    $rules = $this->getRules();
    if (!$this->validate($rules)) {
      return $this->edit($id);
    } else {
      $inventaris = new InventarisModel();
      $data = [
        "jenis_barang_bangunan"          => $this->request->getVar('jenis_barang_bangunan'),
        "jml_brg_dibelisendiri"          => $this->request->getVar('jml_brg_dibelisendiri'),
        "jml_brg_bantuanpemerintah"                   => $this->request->getVar('jml_brg_bantuanpemerintah'),
        "jml_brg_sumbangan"         => $this->request->getVar('jml_brg_sumbangan'),
        "keadaan_baik_awal"          => $this->request->getVar('keadaan_baik_awal'),
        "keadaan_rusak_awal"         => $this->request->getVar('keadaan_rusak_awal'),
        "hapus_rusak"                => $this->request->getVar('hapus_rusak'),
        "hapus_dijual"      => $this->request->getVar('hapus_dijual'),
        "hapus_disumbangkan"               => $this->request->getVar('hapus_disumbangkan'),
        "tanggal_penghapusan"  => ($this->request->getVar('tanggal_penghapusan') == "") ? NULL : $this->request->getVar('tanggal_penghapusan'),
        "keadaan_baik_akhir"    => $this->request->getVar('keadaan_baik_akhir'),
        "keadaan_rusak_akhir"          => $this->request->getVar('keadaan_rusak_akhir'),
        "keterangan"            => $this->request->getVar('keterangan'),
        "kecamatan"          => $this->request->getVar('kecamatan'),
        "kelurahan"          => $this->request->getVar('kelurahan'),
        "tahun"                 => $this->request->getVar('tahun')
      ];
      if ($this->request->getPost('id')) { //Untuk Edit
        $inventaris->update($this->request->getPost('id'), $data);
        session()->setFlashdata('message', 'Data berhasil diedit');
      } else { //Untuk Tambah
        $inventaris->insert($data);
        session()->setFlashdata('message', 'Data berhasil ditambahkan');
      }
      return redirect()->to('admin/inventaris');
    }
  }

  public function delete($id)
  {
    $inventaris = new InventarisModel();
    $inventaris->delete($id);
    session()->setFlashdata('message', 'Data berhasil dihapus!');
    return redirect('admin/inventaris');
  }
}
