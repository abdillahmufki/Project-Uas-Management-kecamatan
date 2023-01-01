<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

use function PHPSTORM_META\type;

class KeputusanCamat extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'tanggalKeputusan' => [
                'type' => 'date',
            ],
            'nomor' => [
                'type' => 'smallInt'
            ],
            'tentang' => [
                'type' => 'VARCHAR',
                'constraint' => '255'
            ],
            'uraian_singkat' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'tanggal_laporan' => [
                'type' => 'date'
            ],
            'nomor_laporan' => [
                'type' => 'smallInt',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'kecamatan_id' => [
                'type' => 'INT',
            ],
            'kelurahan_id' => [
                'type' => 'INT',
            ],
            'tahun' => [
                'type' => 'year',
            ],
            'createdAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updatedAt' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        // Membuat primary key
        $this->forge->addKey('id', true);

        // Membuat tabel news
        $this->forge->createTable('KeputusanCamat', true);
    }

    public function down()
    {
        // menghapus tabel news
        $this->forge->dropTable('KeputusanCamat');
    }
}
