<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model {
   
    protected $table = 'komik';
    protected $useTimestamps = true;
    // field db yg diizinkan isi manual
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getKomik($slug = false) {

        //untuk menampilkan data pada method index
        if($slug==false){
            
            return $this->findAll();
        }
        //untuk menampilkan data pada method detail
        return $this->where(['slug' => $slug])->first();

    }

}