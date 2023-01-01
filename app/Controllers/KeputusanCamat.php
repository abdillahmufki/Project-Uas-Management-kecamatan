<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KeputusanCamatModel;

class KeputusanCamat extends BaseController
{
    public function index()
    {
        // buat object model $news
        $keputusanCamats = new KeputusanCamatModel();

        /*
		siapkan data untuk dikirim ke view dengan nama $newses
		dan isi datanya dengan news yang sudah terbit
		*/
        $data['keputusanCamats'] = $keputusanCamats->findAll();

        // kirim data ke view
        echo view(
            'admin/keputusan-camat/index',
            $data
        );
    }

    public function create()
    {
        // lakukan validasi
        $validation =  \Config\Services::validation();
        $validation->setRules([
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

        // jika data valid, simpan ke database
        if ($isDataValid) {
            $keputusanCamats = new KeputusanCamatModel();
            $keputusanCamats->insert([
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

        // tampilkan form create
        echo view('admin/keputusan-camat/create');
    }

    //--------------------------------------------------------------------------

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
