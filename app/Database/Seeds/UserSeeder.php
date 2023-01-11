<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;
use Myth\Auth\Models\PermissionModel;

class UserSeeder extends Seeder
{
	public function run()
	{
         //Auth Group User
        // $data_auth_group = [
        //     [
        //         'name' => 'Admin',
        //         'description'  => 'Site Administrator',
        //     ],
        //     [
        //         'name' => 'User',
        //         'description'  => 'Regular User',
        //     ]
        // ];

        // foreach ($data_auth_group as $data) {
        //     // insert semua data ke tabel
        //     $this->db->table('auth_groups')->insert($data);
        // }

		$user_object = new UserModel();

		$user_object->insertBatch([
			[
				"name" => "Administrator",
				"email" => "admin@mail.com",
				"username" => "admin",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			],
		]);

        //Auth Group User
        $data_auth_group_users = [
            [
                'group_id' => 1,
                'user_id'  => 1,
            ]
        ];

        foreach ($data_auth_group_users as $data) {
            // insert semua data ke tabel
            $this->db->table('auth_groups_users')->insert($data);
        }

	}
}