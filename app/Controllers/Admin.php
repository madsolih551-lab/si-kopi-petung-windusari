<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }

        return view('admin/dashboard');
    }
}