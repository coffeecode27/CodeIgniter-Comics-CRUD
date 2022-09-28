<?php

namespace App\Models;

use CodeIgniter\Model;

class OrangModel extends Model {
   
    protected $table = 'orang';
    protected $useTimestamps = true;
    // field db yg diizinkan isi manual
    protected $allowedFields = ['nama', 'alamat'];

    public function search($keyword) {

        // deskripsi nama table
        // $builder = $this->table('orang');
        // lalu cari field didalam table orang 
        // $builder->like('nama', $keyword);
        // return $builder;

        return $this->table('orang')->like('nama', $keyword)->orLike('alamat', $keyword);
    }   
}