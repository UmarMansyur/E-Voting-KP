<?php
namespace App\Models;
use CodeIgniter\Model;

class DataKandidat extends Model{
    protected $table = 'data_kandidat';
    protected $primaryKey = 'id_kandidat';
    protected $allowedFields = ['id_kandidat', 'no_urut', 'nama_kandidat', 'visi_misi', 'priode', 'gambar_kandidat', 'created_at', 'updated_at']; 
    public function getNama()
    {
        return $this->table('data_kandidat')->select('nama_kandidat')->find();
    }
    public function getSuara()
    {
        return $this->table('data_kandidat')->selectCount('data_suara.no_urut')->join('data_suara', 'data_kandidat.no_urut = data_suara.no_urut', 'left')->groupBy('data_kandidat.no_urut')->findAll();
    }
}