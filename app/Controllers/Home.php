<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (session()->get('log') != true) {
            return redirect()->to(site_url('auth/login_siswa'));
        }
        if (session()->get('level') == 2) {
            return redirect()->to(site_url('siswa/home'));
        }

        $data = [
            'tittle' => 'Home'
        ];
        return view('home', $data);
    }
}
