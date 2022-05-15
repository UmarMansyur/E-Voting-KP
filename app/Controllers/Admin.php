<?php

namespace App\Controllers;

use App\Models\DataKandidat;
use App\Models\SiswaModel;
use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\I18n\Time;

class Admin extends BaseController
{
    protected $db;
    protected $siswaModel;
    protected $dataKandidat;
    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->siswaModel   = new SiswaModel();
        $this->dataKandidat = new DataKandidat();
    }

    public function Dashboard()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'tittle' => 'Dashboard'
        ];
        return view('admin/dashboard', $data);
    }

    public function data_siswa()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        $db      = \Config\Database::connect();
        $builder = $db->table('data_siswa');
        $query   = $builder->get()->getResultArray();

        // dd($query);


        $data = [
            'tittle' => 'Data Siswa',
            'siswa' => $query
        ];
        return view('admin/data_siswa', $data);
    }

    public function tambah_siswa()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        $getRand = (rand(1000, 9999));

        $builder = $this->db->table('kelas');
        $get_kelas =  $builder->get()->getResultArray();

        $data = [
            'tittle' => 'Tambah Data Siswa',
            'validation' => \Config\Services::validation(),
            'getPass' => $getRand,
            'kelas' => $get_kelas
        ];
        return view('admin/tambah_siswa', $data);
    }

    public function simpan_siswa()
    {

        if (!$this->validate([
            'nis_siswa' => [
                'rules'  => 'required|is_unique[data_siswa.nis_siswa]',
                'errors' => [
                    'required' => 'nis harus di isi!',
                    'is_unique' => 'nis sudah terdaftar!'
                ],
            ],
            'nama_siswa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama harus di isi!',
                ],
            ],
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'kelas harus di isi!',
                ],
            ],
            'jenis_kelamin' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'jenis kelamin harus di isi!',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'password harus di isi!',
                ],
            ],
        ])) {
            return redirect()->to(site_url('admin/tambah_siswa'))->withInput();
        }

        $username = $this->request->getPost('nis_siswa');
        $password = $this->request->getPost('password');
        $level = $this->request->getPost('level');
        $status_vote = $this->request->getPost('status_memilih');

        $data_user = [
            'username' => $username,
            'password' => $password,
            'status_vote' => $status_vote,
            'level' => $level,
            'created_at' => Time::now()
        ];
        // $siswa_userid = $this->request->getPost('siswa_userid');
        $nis_siswa = $this->request->getPost('nis_siswa');
        $nama_siswa = $this->request->getPost('nama_siswa');
        $kelas = $this->request->getPost('kelas');
        $jenis_kelamin = $this->request->getPost('jenis_kelamin');
        $status_memilih = $this->request->getPost('status_memilih');
        $status_aktif = $this->request->getPost('status_aktif');
        $tahun = $this->request->getVar('tahun');

        $data = [
            // 'siswa_userid  ' => $siswa_userid,
            'nis_siswa ' => $nis_siswa,
            'nama_siswa' => $nama_siswa,
            'kelas' => $kelas,
            'jenis_kelamin' => $jenis_kelamin,
            'status_memilih' => $status_memilih,
            'status_aktif' => $status_aktif,
            'tahun' => $tahun,
            'created_at' => Time::now()
        ];

        $this->siswaModel->saveSiswa($data_user, $data);

        session()->setFlashdata('pesan_hijau', 'Data Berhasil Di Tambahkan');
        return redirect()->to(site_url('admin/data_siswa'));
    }

    public function hapus_siswa($id)
    {
        if (session()->get('log') != true) {
            return redirect()->to(site_url('/'));
        }

        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $builder->delete();

        session()->setFlashdata('pesan_merah', 'data berhasil di hapus');
        return redirect()->to(site_url('admin/data_siswa'));
    }

    public function ubah_siswa($siswa_userid)
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        $builder = $this->db->table('data_siswa')->select('*')->join('users', 'users.id = data_siswa.siswa_userid');
        $query = $builder->where('siswa_userid', $siswa_userid)->get()->getRow();

        // dd($query);

        $data = [
            'tittle' => 'Ubah Data Siswa',
            'siswa' => $query,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/ubah_siswa', $data);
    }

    public function update_siswa()
    {
        if (!$this->validate([
            'nama_siswa' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'nama harus di isi!',
                ],
            ],
            'kelas' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'kelas harus di isi!',
                ],
            ],
            'jenis_kelamin' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'jenis kelamin harus di isi!',
                ],
            ],
            'password' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'password harus di isi!',
                ],
            ],
        ])) {
            return redirect()->to(site_url('admin/ubah_siswa'))->withInput();
        }
        $id = $this->request->getVar('id');
        $username = $this->request->getVar('nis_siswa');
        $password = $this->request->getVar('password');
        $level = $this->request->getVar('level');
        $status_vote = $this->request->getVar('status_memilih');

        $data_user = [
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'status_vote' => $status_vote,
            'level' => $level,
            'updated_at' => Time::now()
        ];
        $builder = $this->db->table('users');
        $builder->where('id', $id);
        $builder->update($data_user);

        $siswa_userid = $this->request->getVar('siswa_userid');
        $nis_siswa = $this->request->getVar('nis_siswa');
        $nama_siswa = $this->request->getVar('nama_siswa');
        $kelas = $this->request->getVar('kelas');
        $jenis_kelamin = $this->request->getVar('jenis_kelamin');
        $status_memilih = $this->request->getVar('status_memilih');
        $status_aktif = $this->request->getVar('status_aktif');

        $data = [
            'siswa_userid  ' => $siswa_userid,
            'nis_siswa ' => $nis_siswa,
            'nama_siswa' => $nama_siswa,
            'kelas' => $kelas,
            'jenis_kelamin' => $jenis_kelamin,
            'status_memilih' => $status_memilih,
            'status_aktif' => $status_aktif,
            'updated_at' => Time::now()
        ];

        $builder = $this->db->table('data_siswa');
        $builder->where('siswa_userid', $siswa_userid);
        $builder->update($data);

        session()->getFlashdata('pesan_hijau', 'Data Berhasil Di Ubah');
        return redirect()->to(site_url('admin/data_siswa'));
    }



    public function data_kandidat()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        $builder = $this->db->table('data_kandidat');
        $query = $builder->get()->getResultArray();

        $data = [
            'tittle' => 'Data Kandidat',
            'kandidat' => $query
        ];

        return view('admin/data_kandidat', $data);
    }

    public function tambah_kandidat()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        $data = [
            'tittle' => 'Tambah Kandidat',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/tambah_kandidat', $data);
    }

    public function save_kandidat()
    {
        if (session()->get('level') <> 1) {
            return redirect()->to(base_url('/'));
        }

        if (!$this->validate([
            'no_urut' => [
                'rules' => 'required|is_unique[data_kandidat.no_urut]',
                'errors' => [
                    'required' => 'no urut harus di isi',
                    'is_unique' => 'no urut sudah terdaftar'
                ]
            ],
            'nama_kandidat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama kandidat harus di isi'
                ]
            ],
            'priode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'priode harus di isi'
                ]
            ],
            'visi_misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'visi misi harus di isi'
                ]
            ],
            'gambar_kandidat' => [
                'rules' => 'max_size[gambar_kandidat,4032]|is_image[gambar_kandidat]|mime_in[gambar_kandidat,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'gambar maksimal 4mb',
                    'is_image' => 'yang anda input bukan gambar',
                    'mime_in' => 'yang anda masukan bukan gambar',
                ]
            ]
        ])) {
            return redirect()->to(site_url('admin/tambah_kandidat'))->withInput();
        }

        //ambil gambar
        $fileGambarKandidat = $this->request->getFile('gambar_kandidat');

        //jika tidak ada gambar yang di upload
        if ($fileGambarKandidat->getError() == 4) {
            $namaGambarKandidat = 'default.jpg';
        } else {
            //ambil nama gambar
            $namaGambarKandidat = $fileGambarKandidat->getRandomName();
            //pindahkan file ke assets
            $fileGambarKandidat->move('assets/fotokandidat', $namaGambarKandidat);
        }


        $data = [
            'no_urut' => $this->request->getVar('no_urut'),
            'nama_kandidat' => $this->request->getVar('nama_kandidat'),
            'priode' => $this->request->getVar('priode'),
            'visi_misi' => $this->request->getVar('visi_misi'),
            'gambar_kandidat' => $namaGambarKandidat
        ];

        $builder = $this->db->table('data_kandidat');
        $builder->insert($data);

        session()->setFlashdata('pesan_hijau', 'data berhasil di tambahkan');
        return redirect()->to(site_url('admin/data_kandidat'));

        // dd($query);
    }

    public function hapus_kandidat($id_kandidat)
    {
        if (session()->get('level') != 1) {
            return redirect()->to('auth/login_siswa');
        }
        $builder = $this->db->table('data_kandidat')->where('id_kandidat', $id_kandidat);
        $get = $builder->get()->getRowArray();

        if ($get['gambar_kandidat'] != 'default') {
            unlink('assets/fotokandidat/' . $get['gambar_kandidat']);
        }

        $builder = $this->db->table('data_kandidat');
        $builder->where('id_kandidat', $id_kandidat)->delete();

        session()->setFlashdata('pesan_merah', 'data berhasil di hapus');
        return redirect()->to(site_url('admin/data_kandidat'));
    }

    public function ubah_kandidat($id_kandidat)
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $builder = $this->db->table('data_kandidat');
        $builder->where('id_kandidat', $id_kandidat);
        $query = $builder->get()->getRow();

        $data = [
            'tittle' => 'Ubah Kandidat',
            'kandidat' => $query,
            'validation' => \Config\Services::validation()
        ];

        return view('admin/ubah_kandidat', $data);
    }

    public function update_kandidat()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        if (!$this->validate([
            'nama_kandidat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'nama kandidat harus di isi'
                ]
            ],
            'priode' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'priode harus di isi'
                ]
            ],
            'visi_misi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'visi misi harus di isi'
                ]
            ],
            'gambar_kandidat' => [
                'rules' => 'max_size[gambar_kandidat,4032]|is_image[gambar_kandidat]|mime_in[gambar_kandidat,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'gambar maksimal 4mb',
                    'is_image' => 'yang anda input bukan gambar',
                    'mime_in' => 'yang anda masukan bukan gambar',
                ]
            ]
        ])) {
            return redirect()->to(site_url('admin/ubah_kandidat'))->withInput();
        }

        //ambil gambar
        $fileGambarKandidat = $this->request->getFile('gambar_kandidat');

        //jika tidak ada gambar yang di upload
        if ($fileGambarKandidat->getError() == 4) {
            $namaGambarKandidat = $this->request->getVar('gambar_lama');
        } else {
            //ambil nama gambar
            $namaGambarKandidat = $fileGambarKandidat->getRandomName();
            //pindahkan file ke assets
            $fileGambarKandidat->move('assets/fotokandidat', $namaGambarKandidat);
            //hapus gambar lama jika tidak sama dengan default 
            if ($this->request->getVar('gambarLama') != 'default.jpg') {
                unlink('assets/fotokandidat/' . $this->request->getVar('gambarLama'));
            }
        }
        $id_kandidat = $this->request->getVar('id_kandidat');

        $data = [
            'id_kandidat' => $id_kandidat,
            'no_urut' => $this->request->getVar('no_urut'),
            'nama_kandidat' => $this->request->getVar('nama_kandidat'),
            'priode' => $this->request->getVar('priode'),
            'visi_misi' => $this->request->getVar('visi_misi'),
            'gambar_kandidat' => $namaGambarKandidat
        ];

        $builder = $this->db->table('data_kandidat');
        $builder->where('id_kandidat', $id_kandidat)->update($data);

        session()->setFlashdata('pesan_hijau', 'data berhasil di update');
        return redirect()->to(site_url('admin/data_kandidat'));
    }



    //import data
    public function import_data()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }
        $tahun = Time::createFromDate();

        $data = [
            'tittle' => 'Import Data Excel',
            'validation' => \Config\Services::validation(),
            'tahun' => $tahun
        ];

        return view('admin/import_data', $data);
    }

    public function save_import()
    {

        if (!$this->validate([
            'tahun' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'tahun harus di isi'
                ]
            ],
            'fileimport' => [
                'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                'errors' => [
                    'uploaded' => 'file harus di isi',
                    'ext_in' => 'file bukan extensi xls atau xlsx'
                ]
            ]
        ])) {
            return redirect()->to(site_url('admin/import_data'))->withInput();
        }

        $file_excel = $this->request->getFile('fileimport');

        $ext = $file_excel->getClientExtension();

        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        $spreadsheet = $render->load($file_excel);

        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $x => $row) {
            if ($x == 0) {
                continue;
            }

            $username = $row[1];
            $password = $row[5];
            $level = $this->request->getPost('level');
            $status_vote = $this->request->getVar('status_memilih');

            $data_user = [
                'username' => $username,
                'password' => $password,
                'status_vote' => $status_vote,
                'level' => $level,
                'created_at' => Time::now()
            ];
            // $siswa_userid = $this->request->getPost('siswa_userid');
            $nis_siswa = $row[1];
            $nama_siswa = $row[2];
            $kelas = $row[3];
            $jenis_kelamin = $row[4];
            $status_memilih = $this->request->getVar('status_memilih');
            $status_aktif = $this->request->getVar('status_aktif');
            $tahun = $this->request->getVar('tahun');

            $data = [
                // 'siswa_userid  ' => $siswa_userid,
                'nis_siswa ' => $nis_siswa,
                'nama_siswa' => $nama_siswa,
                'kelas' => $kelas,
                'jenis_kelamin' => $jenis_kelamin,
                'status_memilih' => $status_memilih,
                'status_aktif' => $status_aktif,
                'tahun' => $tahun,
                'created_at' => Time::now()
            ];

            $this->siswaModel->saveSiswa($data_user, $data);
        }
        session()->setFlashdata('pesan_hijau', 'data berhasil di import');
        return redirect()->to(site_url('admin/data_siswa'));
    }

    //kelas dan print
    public function data_kelas()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $builder = $this->db->table('kelas');
        $query = $builder->get()->getResultArray();

        $data = [
            'tittle' => 'Data Kelas',
            'kelas' => $query
        ];

        return view('admin/data_kelas', $data);
    }

    public function simpan_kelas()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        if ($this->request->getVar('nama_kelas') == null) {
            session()->setFlashdata('pesan_merah', 'tidak ada data di inputkan');
            return redirect()->to(site_url('admin/data_kelas'));
        }

        $data = [
            'nama_kelas' => $this->request->getVar('nama_kelas')
        ];

        $builder = $this->db->table('kelas');
        $builder->insert($data);

        session()->setFlashdata('pesan_hijau', 'data kelas berhasil di tambahkan');
        return redirect()->to(site_url('admin/data_kelas'));
    }

    public function hapus_kelas($id_kelas)
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $builder = $this->db->table('kelas');
        $builder->where('id_kelas', $id_kelas);
        $builder->delete();

        session()->setFlashdata('pesan_hijau', 'data kelas berhasil di hapus');
        return redirect()->to(site_url('admin/data_kelas'));
    }

    public function detail_kelas($kelas)
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $builder = $this->db->table('data_siswa');
        $builder->where('kelas', $kelas);
        $query = $builder->get()->getResultArray();

        // dd($query);

        $data = [
            'tittle' => 'Detail Kelas',
            'siswa' => $query
        ];

        return view('admin/detail_kelas', $data);
    }

    public function update_kelas()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        if ($this->request->getVar('nama_kelas') == null) {
            session()->setFlashdata('pesan_merah', 'tidak ada data di inputkan');
            return redirect()->to(site_url('admin/data_kelas'));
        }

        $builder = $this->db->table('kelas');
        $builder->where('id_kelas', $this->request->getVar('id_kelas'));
        $builder->set('nama_kelas', $this->request->getVar('nama_kelas'));
        $builder->update();

        session()->setFlashdata('pesan_hijau', 'nama kelas berhasil di update');
        return redirect()->to(site_url('admin/data_kelas'));
    }

    public function data_suara()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $builder = $this->db->table('data_kandidat');
        $jml_kandidat = $builder->countAllResults();
        // dd($this->dataKandidat->getSuara());
        $data = [
            'tittle' => 'Data Suara',
            'jml_kandidat' => $jml_kandidat,
            'nama_kandidat' => $this->dataKandidat->getNama(),
            'banyak_suara' => $this->dataKandidat->getSuara()
        ];
        // dd($data['nama_kandidat']);
        return view('admin/data_suara', $data);
    }
    public function pengumuman()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }
        $builder = $this->db->table('pengumuman');
        $query = $builder->get()->getResultArray();

        $data = [
            'tittle' => 'pengumuman',
            'pengumuman' => $query
        ];

        return view('admin/pengumuman', $data);
    }

    public function tambah_pengumuman()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $data = [
            'tittle' => 'Tambah Pengumuman',
            'validation' => \Config\Services::validation()
        ];

        return view('admin/tambah_pengumuman', $data);
    }

    public function save_pengumuman()
    {
        if (session()->get('level') != 1) {
            return redirect()->to(site_url('auth/login_siswa'));
        }

        $data = [
            'judul_p' => $this->request->getVar('judul_p'),
            'deskripsi_p' => $this->request->getVar('deskripsi_p'),
            'tgl_mulai' => $this->request->getVar('tgl_mulai') . ' ' . $this->request->getVar('jam_mulai'),
            'tgl_tutup' => $this->request->getVar('tgl_tutup') . ' ' . $this->request->getVar('jam_tutup'),
            'created_at' => Time::now()
        ];

        $builder = $this->db->table('pengumuman');
        $builder->insert($data);

        session()->setFlashdata('pesan_hijau', 'Pengumuman berhasil di tambahkan');
        return redirect()->to(site_url('admin/pengumuman'));
    }
    public function getDataKandidat() 
    {
        dd($this->dataKandidat->findAll());
        return view('admin/data_suara');
        
    }
}
