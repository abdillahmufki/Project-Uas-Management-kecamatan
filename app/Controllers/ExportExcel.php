<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\InventarisModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportExcel extends Controller
{
    public function index()
    {
        return view('download-excel');
    }

    public function export()
    {
        $mobil = new InventarisModel();
        $dataMobil = $mobil->findAll();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'jenis_barang_bangunan')
            ->setCellValue('B1', 'jml_brg_dibelisendiri')
            ->setCellValue('C1', 'jml_brg_sumbangan')
            ->setCellValue('D1', 'keadaan_baik_awal')
            ->setCellValue('E1', 'keadaan_rusak_awal')
            ->setCellValue('F1', 'hapus_rusak')
            ->setCellValue('G1', 'hapus_dijual')
            ->setCellValue('H1', 'hapus_disumbangkan')
            ->setCellValue('I1', 'tanggal_penghapusan')
            ->setCellValue('J1', 'keadaan_baik_akhir')
            ->setCellValue('K1', 'keterangan')
            ->setCellValue('L1', 'kecamatan')
            ->setCellValue('M1', 'kelurahan')
            ->setCellValue('N1', 'tahun');

        $column = 2;
        // tulis data mobil ke cell
        foreach ($dataMobil as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $data['jenis_barang_bangunan'])
                ->setCellValue('B' . $column, $data['jml_brg_dibelisendiri'])
                ->setCellValue('C' . $column, $data['jml_brg_sumbangan'])
                ->setCellValue('D' . $column, $data['keadaan_baik_awal'])
                ->setCellValue('E' . $column, $data['keadaan_rusak_awal'])
                ->setCellValue('F' . $column, $data['hapus_rusak'])
                ->setCellValue('G' . $column, $data['hapus_dijual'])
                ->setCellValue('H' . $column, $data['hapus_disumbangkan'])
                ->setCellValue('I' . $column, $data['tanggal_penghapusan'])
                ->setCellValue('J' . $column, $data['keadaan_baik_akhir'])
                ->setCellValue('K' . $column, $data['keterangan'])
                ->setCellValue('L' . $column, $data['kecamatan'])
                ->setCellValue('M' . $column, $data['kelurahan'])
                ->setCellValue('N' . $column, $data['tahun']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Inventaris';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
