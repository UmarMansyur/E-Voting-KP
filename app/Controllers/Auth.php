<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\I18n\Time;

class Auth extends BaseController
{
    protected $db;
    protected $authModel;
    public function __construct()
    {

        $this->db      = \Config\Database::connect();
        $this->authModel = new AuthModel();
    }
    public function login()
    {

        $data = [
            'tittle' => 'LOGIN | E-Voting',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login', $data);
    }

    public function login_siswa()
    {
        $data = [
            'tittle' => 'LOGIN | SISWA',
            'validation' => \Config\Services::validation()
        ];

        return view('auth/login_siswa', $data);
    }

    public function cek_login()
    {
        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],

        ])) {

            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->authModel->login($username, $password);

            if ($cek['level'] == 2) {
                session()->setFlashdata('pesan_merah', 'Anda tidak berhak login');
                return redirect()->to(site_url('auth/login'));
            }

            if ($cek) {
                //jika data ditemuka
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('username', $cek['username']);
                session()->set('password', $cek['password']);
                session()->set('status_vote', $cek['status_vote']);
                session()->set('level', $cek['level']);


                return redirect()->to(site_url('home'));
            } else {
                //jika tidak cocok
                session()->setFlashdata('pesan', 'passwoord atau username salah');
                return redirect()->to(base_url('auth/login'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('pesan', 'username dan password kosong');
            return redirect()->to(base_url('auth/login'));
        }
    }

    public function cek_loginSiswa()
    {

        $builder = $this->db->table('pengumuman');
        $pengumuman = $builder->get()->getRowArray();

        $now = date('Y-m-d H:i:s');

        if ($pengumuman != null) {
            if ($now > $pengumuman['tgl_tutup']) {
                // dd('terlambat');
                session()->setFlashdata('pesan_merah', 'Pemilihan sudah di tutup');
                return redirect()->to(site_url('auth/login_siswa'));
            }
        } else {
            // dd('belum dibuka');
            session()->setFlashdata('pesan_merah', 'Pemilihan belum dibuka. silahkan tunggu info pembukaan pemilihan');
            return redirect()->to(site_url('auth/login_siswa'));
        }

        if ($this->validate([
            'username' => [
                'label' => 'username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'password' => [
                'label' => 'password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],

        ])) {

            //jika valid
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $cek = $this->authModel->login($username, $password);

            if ($cek) {
                //jika data ditemuka
                session()->set('log', true);
                session()->set('id', $cek['id']);
                session()->set('username', $cek['username']);
                session()->set('password', $cek['password']);
                session()->set('status_vote', $cek['status_vote']);
                session()->set('level', $cek['level']);


                return redirect()->to(site_url('siswa/home'));
            } else {
                //jika tidak cocok
                session()->setFlashdata('pesan_merah', 'password atau username salah');
                return redirect()->to(base_url('auth/login_siswa'));
            }
        } else {
            //jika tidak valid
            session()->setFlashdata('pesan_merah', 'username dan password kosong');
            return redirect()->to(base_url('auth/login_siswa'));
        }
    }

    public function logout_admin()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        session()->remove('status_vote');
        session()->remove('level');
        session()->setFlashdata('pesan_hijau', 'logout sukses');
        return redirect()->to(base_url('auth/login'));
    }
    public function logout_siswa()
    {
        session()->remove('log');
        session()->remove('username');
        session()->remove('password');
        if (session()->get('status_vote') == true) {
            session()->remove('status_vote');
        }
        session()->remove('level');
        session()->setFlashdata('pesan_hijau', 'logout sukses');
        return redirect()->to(base_url('auth/login_siswa'));
    }
}
