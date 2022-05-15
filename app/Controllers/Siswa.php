<?php

namespace App\Controllers;

use App\Models\DataKandidat;
use CodeIgniter\I18n\Time;

class Siswa extends BaseController
{
    protected $db;
    protected $dataKandidat;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->dataKandidat = new DataKandidat();
    }

    public function home()
    {
        if (session()->get('log') != true) {
            return redirect()->to(base_url('/'));
        }

        if (session()->get('level') <> 2) {
            return redirect()->to(base_url('/'));
        }
        $data = [
            'tittle' => 'HOME | SISWA'
        ];

        return view('siswa/index', $data);
    }

    public function dashboard()
    {
        if (session()->get('level') <> 2) {
            return redirect()->to(base_url('/'));
        }

        $builder = $this->db->table('data_siswa');
        $builder->select('*');
        $builder->join('users', 'users.id = data_siswa.siswa_userid');
        $builder->where('siswa_userid', session()->get('id'));
        $query = $builder->get()->getRow();

        // dd($query);

        $data = [
            'tittle' => 'Dashboard',
            'siswa' => $query
        ];

        return view('siswa/dashboard', $data);
    }

    public function voting()
    {
        if (session()->get('level') != 2) {
            return redirect()->to(base_url('/'));
        }

        if (session()->get('status_vote') == 'sudah') {
            session()->setFlashdata('pesan_merah', 'Anda Sudah Memilih');
            return redirect()->to(base_url('siswa/dashboard'));
        }
        if (session()->get('status_vote') == '') {
            session()->setFlashdata('pesan_merah', 'Anda Sudah Memilih');
            return redirect()->to(base_url('siswa/dashboard'));
        }

        $builder = $this->db->table('data_siswa');
        $builder->select('*');
        $builder->join('users', 'users.id = data_siswa.siswa_userid');
        $builder->where('siswa_userid', session()->get('id'));
        $query = $builder->get()->getRow();

        // dd($query);
        $builder = $this->db->table('data_kandidat');
        $query_kandidat = $builder->get()->getResultArray();

        $data = [
            'tittle' => 'Voting',
            'get_data' => $query,
            'get_kandidat' => $query_kandidat
        ];
        return view('siswa/voting', $data);
    }

    public function vote()
    {
        if (session()->get('level') != 2) {
            return redirect()->to(base_url('/'));
        }
        if (session()->get('status_vote') == 'sudah') {
            session()->setFlashdata('pesan_merah', 'Anda Sudah Memilih');
            return redirect()->to(base_url('siswa/dashboard'));
        }
        if (session()->get('status_vote') == '') {
            session()->setFlashdata('pesan_merah', 'Anda Sudah Memilih');
            return redirect()->to(base_url('siswa/dashboard'));
        }

        $id_pemilih = $this->request->getVar('id_pemilih');
        $kandidat_id = $this->request->getVar('no_urut');

        $data_suara = [
            'id_pemilih' => $id_pemilih,
            'no_urut' => $kandidat_id,
            'created_at' => Time::now()
        ];

        $builder = $this->db->table('data_suara');
        $builder->insert($data_suara);

        // $data_siswa = [
        //     'status_memilih' => $status_memilih
        // ];

        $id = $this->request->getVar('id');
        // $username = $this->request->getVar('username');
        // $password = $this->request->getVar('password');
        // $level = $this->request->getVar('level');
        $status_vote = $this->request->getVar('status_memilih');

        // $data_user = [
        //     'id' => $id,
        //     'username' => $username,
        //     'password' => $password,
        //     'status_vote' => $status_vote,
        //     'level' => $level
        // ];

        $builder = $this->db->table('users');
        $builder->set('status_vote', $status_vote);
        $builder->where('id', $id);
        $builder->update();


        $siswa_userid = $this->request->getVar('siswa_userid');
        // $nis_siswa = $this->request->getVar('nis_siswa');
        // $nama_siswa = $this->request->getVar('nama_siswa');
        // $kelas = $this->request->getVar('kelas');
        // $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $status_memilih = $this->request->getVar('status_memilih');
        // $status_aktif = $this->request->getVar('status_aktif');

        // $data = [
        //     'id_siswa' => $id_pemilih,
        //     'siswa_userid  ' => $siswa_userid,
        //     'nis_siswa ' => $nis_siswa,
        //     'nama_siswa' => $nama_siswa,
        //     'kelas' => $kelas,
        //     'jenis_kelamin' => $jenis_kelamin,
        //     'status_memilih' => $status_memilih,
        //     'status_aktif' => $status_aktif
        // ];


        $builder = $this->db->table('data_siswa');
        $builder->set('status_memilih', $status_memilih);
        $builder->where('siswa_userid', $siswa_userid);
        $builder->update();

        session()->remove('status_vote');
        session()->setFlashdata('pesan_hijau', 'Terimakasih sudah memilih');
        return redirect()->to(site_url('siswa/dashboard'));
    }
    public function perolehanSuara()
    {
        $builder = $this->db->table('data_kandidat');
        $jml_kandidat = $builder->countAllResults();
        $status_pilih = $this->db->table('data_siswa')
                                 ->select('status_memilih')
                                 ->selectCount('status_memilih')
                                 ->groupBy('status_memilih')->get()->getResultArray();
        $data = [
            'tittle'         => 'Perolehan Suara',
            'jml_kandidat' => $jml_kandidat,
            'nama_kandidat' => $this->dataKandidat->getNama(),
            'banyak_suara' => $this->dataKandidat->getSuara(),
            'sudah' => $status_pilih[0]['status_memilih'],
            'belum' => $status_pilih[1]['status_memilih'],
        ];
        return view('siswa/perolehanSuara', $data);
    }
}
