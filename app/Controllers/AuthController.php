<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function doLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->where('is_active', 1)->first();

        if ($user && password_verify($password, $user['password_hash'])) {
            session()->set([
                'id_user'    => $user['id_user'],
                'username'   => $user['username'],
                'nama'       => $user['nama'],
                'role'       => $user['hak_akses'], // menggunakan hak_akses sebagai role
                'isLoggedIn' => true
            ]);
            return redirect()->to('/dashboard');
        }

        return redirect()->to('/login')->with('error', 'Username atau Password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
