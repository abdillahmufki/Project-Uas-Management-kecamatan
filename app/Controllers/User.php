<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \Hermawan\DataTables\DataTable;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Models\GroupModel;

class User extends BaseController
{
    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index()
    {
        $data['title'] = 'Data User';
        $groupModel = new GroupModel();
        $data['roles'] = $groupModel->findAll();
        return view('admin/users/index', $data);
    }

    public function ajaxDatatable()
    {
        if ($this->request->isAJAX()) {
            $this->builder->select('users.id as userid, username, email, name');
            $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left');
            $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');
            $this->builder->where('users.deleted_at', NULL);
            return DataTable::of($this->builder)
                ->add('action', function ($row) {
                    return '<a class="btn btn-warning btn-sm text-white" href="' . base_url('admin/users/edit/' . $row->userid) . '">Edit&nbsp;<i class="bi bi-pencil-fill"></i></a> <a class="btn btn-danger btn-sm" data-href="' . base_url('admin/users/delete/' . $row->userid . '/delete') . '" onclick="confirmToDelete(this)"><i class="bi bi-trash-fill"></i>&nbsp; Hapus</a>';
                }, 'last')
                ->toJson(true);
        }
    }

    public function create()
    {
        $groupModel = new GroupModel();
        $data = [
            'validation' => \Config\Services::validation(),
            'users'     => null,
            'title'     => 'Data User',
            'roles'     => $groupModel->findAll()
        ];
        return view('admin/users/create', $data);
    }

    //--------------------------------------------------------------------------

    public function store()
    {

        //init users
            //code...
            $users = new UserModel();

            // lakukan validasi
            $id = $this->request->getPost('id');
            // $rules = [
            //     'id'  => [
            //         'rules'     => ['permit_empty', 'numeric']
            //     ],
            //     'fullname'  => [
            //         'rules' => ['required', 'string'],
            //         'errors'    => [
            //             'required'      => 'Nama Lengkap wajib diisi!'
            //         ]
            //     ],
            //     'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
            //     'email'    => 'required|valid_email|is_unique[users.email,id,{id}]',
            //     // 'username'  => [
            //     //     'rules'     => ['required', 'string', 'is_unique[users.username,id,{id}]'],
            //     //     'errors'    => [
            //     //         'required'      => 'Username wajib diisi!',
            //     //         'is_unique' => 'Username sudah tersedia!'

            //     //     ]
            //     // ],
            //     // 'email' => [
            //     //     'rules' => 'required|valid_email',
            //     //     'errors' => [
            //     //         'required' => '{field} Harus diisi',
            //     //         'valid_email' => 'Format Email Harus Valid'
            //     //     ]
            //     // ],
            //     // 'password' => [
            //     //     'rules' => 'required',
            //     //     'errors' => [
            //     //         'required' => '{field} Harus diisi'
            //     //     ]
            //     // ],
            // ];
            // if (!$this->validate($rules)) {
            //     $validation =  \Config\Services::validation();
            //     return redirect()->back()->withInput();
            // } else {

                $data = [
                    "fullname"  => $this->request->getVar('fullname'),
                    "username"  => $this->request->getVar('username'),
                    "email"     => $this->request->getVar('email'),
                    "active"    => 1,
                    'password_hash' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
                ];
                if ($id) { //Untuk Edit
                    return $users->update($id, $data);
                    $users->update($id, $data);
                    session()->setFlashdata('message', 'Data berhasil diedit');
                } else { //Untuk Tambah
                    return $users
                    ->withGroup($this->request->getVar('role'))
                    ->insert($data);

                    $activator = service('activator');
                    $sent      = $activator->send($users);


                    session()->setFlashdata('message', 'Data berhasil ditambahkan');
                }

                return redirect()->to('admin/users');
            //}

    }


    public function edit($id)
    {
        session()->setFlashdata('message', 'Data berhasil diedit');
        $users = new UserModel();
        $groupModel = new GroupModel();

        $users = $users->where('id', $id)->first()->toArray();
        $data = [
            'validation' => \Config\Services::validation(),
            'users'     => $users,
            'title'     => 'Data User',
            'roles'     => $groupModel->findAll()
        ];
        return view('admin/users/create', $data);
    }

    //--------------------------------------------------------------------------

    public function delete($id)
    {
        $userss = new UserModel();
        $userss->delete($id);
        return redirect('admin/users');
    }
}
