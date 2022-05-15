<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('users')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();

        // return $builder =  $this->db->table('users');
        // $builder->select('*');
        // $builder->join('data_pembina', 'data_pembina.id_pembina = users.id');
        // $builder->where([
        //     'username' => $username,
        //     'password' => $password,
        // ])->get()->getRowArray();
    }
}
