<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    public function saveSiswa($data_user, $data)
    {
        $this->db->table('users')->insert($data_user);
        $data['siswa_userid'] = $this->db->insertID();
        return $this->db->table('data_siswa')->insert($data);
    }
}
