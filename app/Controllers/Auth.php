<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PelangganModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $sessionData = [
                'id_user'   => $user['id_user'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'isLoggedIn' => true,
            ];

            // Kalau role pelanggan, coba cari data pelanggan berdasarkan nama = username
            if ($user['role'] === 'pelanggan') {
                $pelangganModel = new PelangganModel();
                $pelanggan = $pelangganModel->findByNama($user['username']);
                if ($pelanggan) {
                    $sessionData['id_pelanggan'] = $pelanggan['id_pelanggan'];
                }
            }

            session()->set($sessionData);

            if ($user['role'] === 'admin') {
                return redirect()->to('/admin/dashboard');
            }
            return redirect()->to('/pelanggan/beranda');
        }

        return redirect()->to('/login')->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}