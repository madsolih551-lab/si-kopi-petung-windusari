<?php

namespace App\Controllers;

class Pelanggan extends BaseController
{
    public function beranda()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'pelanggan') {
            return redirect()->to('/login');
        }

        return view('pelanggan/beranda');
    }
}