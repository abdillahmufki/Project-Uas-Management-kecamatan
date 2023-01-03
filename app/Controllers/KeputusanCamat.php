<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use App\Models\KeputusanCamatModel;

class KeputusanCamat extends BaseController
{
    public function index()
    {
        echo view(
            'admin/keputusan-camat/index'
        );
    }

    public function ajaxDatatable()
    {
        if ($this->request->isAJAX()) {
            $db = \Config\Database::connect();
            $builder = $db->table('KeputusanCamat');
            return DataTable::of($builder)
                ->add('action', function ($row) {
                    return '<a class="btn btn-warning btn-sm text-white" href="' . base_url('keputusan-camat/edit/' . $row->id) . '">Edit&nbsp;<i class="bi bi-pencil-fill"></i></a> <a class="btn btn-danger btn-sm" data-href="' . base_url('aparat/delete/' . $row->id . '/delete') . '" onclick="confirmToDelete(this)"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>';
                }, 'last')
                ->toJson(true);
        }
    }

    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'keputusanCamat'     => null
        ];
        return view('admin/keputusan-camat/create', $data);
    }

    //--------------------------------------------------------------------------

    public function store()
    {
        // lakukan validasi
        $id = $this->request->getPost('id');
        $rules = [
            'id'  => [
                'rules'     => ['permit_empty', 'numeric']
            ],
            'nomor'  => [
                'rules'     => ['required', 'string', 'is_unique[KeputusanCamat.nomor,id,{id}]'],
                'errors'    => [
                    'required'      => 'Nomor wajib diisi!',
                    'is_unique' => 'Nomor sudah tersedia!'

                ]
            ],
            'tanggalLaporan' => [
                'rules' => ['required', 'string', 'valid_date[Y-m-d]'],
                'errors'    => [
                    'required'      => 'Tanggal laporan wajib diisi!',
                    'valid_date'  => 'Format tanggal tidak sesuai!'
                ]
            ],
            'tanggalKeputusan' => [
                'rules' => ['required', 'string', 'valid_date[Y-m-d]'],
                'errors'    => [
                    'required'      => 'Tanggal keputusan wajib diisi!',
                    'valid_date'  => 'Format tanggal tidak sesuai!'
                ]
            ],
            'tentang'  => [
                'rules' => ['required', 'string'],
                'errors'    => [
                    'required'      => 'NIP wajib diisi!'
                ]
            ],
            'nomorLaporan'  => [
                'rules'     => ['required', 'string', 'is_unique[KeputusanCamat.nomor_laporan,id,{id}]'],
                'errors'    => [
                    'required'      => 'Nomor laporan wajib diisi!',
                    'is_unique' => 'Nomor laporan sudah tersedia!'

                ]
            ],
            'keterangan'           => ['permit_empty', 'string'],
            'uraianSingkat'           => ['permit_empty', 'string'],
            'kecamatanId'          => [
                'rules' => ['required', 'numeric'],
                'errors'    => [
                    'required'  => 'Kecamatan wajib diisi!'
                ]
            ],
            'kelurahanId'          => [
                'rules' => ['required', 'numeric'],
                'errors'    => [
                    'required'  => 'Kecamatan wajib diisi!'
                ]
            ],
            'tahun'                => [
                'rules' => ['required', 'valid_date[Y]'],
                'errors'    => [
                    'required'  => 'Tahun wajib diisi!'
                ]
            ]
        ];
        if (!$this->validate($rules)) {
            $validation =  \Config\Services::validation();
            return redirect()->back()->withInput();
        } else {
            $keputusanCamat = new KeputusanCamatModel();
            $data = [
                "nomor"          => $this->request->getVar('nomor'),
                "tanggal_laporan"                  => $this->request->getVar('tanggalLaporan') ?? NULL,
                "tanggal_keputusan"                  => $this->request->getVar('tanggalKeputusan') ?? NULL,
                "tentang"                   => $this->request->getVar('tentang'),
                "nomor_laporan"         => $this->request->getVar('nomorLaporan'),
                "keterangan"          => $this->request->getVar('keterangan'),
                "uraian_singkat"         => $this->request->getVar('uraianSingkat'),
                "kecamatan_id"          => $this->request->getVar('kecamatanId'),
                "kelurahan_id"          => $this->request->getVar('kelurahanId'),
                "tahun"                 => $this->request->getVar('tahun')
            ];
            if ($this->request->getPost('id')) { //Untuk Edit
                $keputusanCamat->update($this->request->getPost('id'), $data);
                session()->setFlashdata('message', 'Data berhasil diedit');
            } else { //Untuk Tambah
                $keputusanCamat->insert($data);
                session()->setFlashdata('message', 'Data berhasil ditambahkan');
            }
            return redirect()->to('keputusan-camat');
        }
    }


    public function edit($id)
    {
        // ambil artikel yang akan diedit
        $keputusanCamats = new KeputusanCamatModel();
        $data['keputusanCamats'] = $keputusanCamats->where('id', $id)->first();

        // lakukan validasi data artikel
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'id' => 'required',
            'nomor' => 'required',
            'tentang' => 'required',
            'tanggalKeputusan' => 'required',
            'uraianSingkat' => 'required',
            'tanggalLaporan' => 'required',
            'nomorLaporan' => 'required',
            'keterangan' => 'required',
            'kecamatanId' => 'required',
            'tahun' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        // jika data vlid, maka simpan ke database
        if ($isDataValid) {
            $keputusanCamats->update($id, [
                "nomor" => $this->request->getPost('nomor'),
                "tentang" => $this->request->getPost('tentang'),
                "tanggalKeputusan" => $this->request->getPost('tanggalKeputusan'),
                "uraian_singkat" => $this->request->getPost('uraianSingkat'),
                "tanggal_laporan" => $this->request->getPost('tanggalLaporan'),
                "nomor_laporan" => $this->request->getPost('nomorLaporan'),
                "keterangan" => $this->request->getPost('keterangan'),
                "kecamatan_id" => $this->request->getPost('kecamatanId'),
                "tahun" => $this->request->getPost('tahun'),
            ]);
            return redirect('keputusan-camat');
        }

        // tampilkan form edit
        echo view('admin/keputusan-camat/edit', $data);
    }

    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $keputusanCamats = new KeputusanCamatModel();
        $keputusanCamats->delete($id);
        return redirect('keputusan-camat');
    }
}
