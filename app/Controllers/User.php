<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function dashboardAdmin()
    {
    return view('user/dashboard-admin');
    }
    public function dashboardKasir()
    {
    return view('user/dashboard-kasir');
    }
    public function login()
    {
        return view('user/login');
    }

    public function prosesLogin()
    {
        $validasiForm = [
            'username' => 'required',
            'password' => 'required'
        ];

        if ($this->validate($validasiForm)) {
            // siapkan 2 var yaitu $user dan $pass
            $user = $this->user->getUser(
                $this->request->getPost('username'),
                $this->request->getPost('password')
            );

            if(count($user) == 1) {

                $dataSession = [
                    'id_user' => $user[0]['id_user'],
                    'nama_user' => $user[0]['nama_user'],
                    'password' => $user[0]['password'],
                    'level' => $user[0]['level'],
                    'sudahkahLogin' => true
                ];
                session()->set($dataSession);
                return redirect()->to('dashboard-admin');
            } else {
                return redirect()->back();
            }
        }
    }
    public function registrasi()
    {
        {
            $validasiForm = [
                'nama_user' => 'required',
                'username' => 'required',
                'password' => 'required',
                'level' => 'required'
            ];
    
            //ini menandakan apakah tombol daftar diklik
            if ($this->validate($validasiForm)) {
                //menampung data dari form registrasi
                $dataUser = [
                    'nama_user' => $this->request->getPost('nama_user'),
                    'username' => $this->request->getPost('username'),
                    'password' => $this->request->getPost('password'),
                    'level' => $this->request->getPost('level')
                ];
    
                //menyimpan ke mysql tabel user
                $this->user->insert($dataUser);
                // jika berhasil simpan diarahkan ke halaman dashboard
                return redirect()->to('/data-user')->with('info', '<span class="text-success">Registrasi berhasil</span>');
            }   
        return view('user/registrasi');
    }
}
    public function profile()
    {
        return view('user/profile');
    }
    public function dataUser()
    {
        $data = [
            'listUser' => $this->user->findAll(),
            'akses' => session()->get('level')
        ];
        return view('user/data-user', $data);
    }
    public function hapusUser($id)
    {
        $this->user->delete($id);
        return redirect()->to('data-user')->with('pesan', 'Data Berhasil Dihapus');
    }
   
    public function editUser($id)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'enumValues' => $this->user->getEnumValues(),
            'listUser' => $this->user->find($id)
        ];
        return view('user/edit-user', $data);
    }
    public function simpanEditUser()
    {
        $data = [
            'nama_user' => $this->request->getVar('nama_user'),
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'level' => $this->request->getVar('level')
        ];
        $this->user->update($this->request->getVar('id_user'), $data);
        return redirect()->to('data-user')->with('pesan', 'Data User Berhasil Ditambah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
