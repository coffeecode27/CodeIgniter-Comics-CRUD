<?php

namespace App\Controllers;

use App\Models\OrangModel;
use CodeIgniter\HTTP\Request;

class Orang extends BaseController
{

    protected $orangModel;

    public function __construct()
    {

        $this->orangModel = new OrangModel();
    }


    public function index()
    {
        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        // Cari nama berdasarkan keyword
        $keyword = $this->request->getVar('keyword');

        // cek jika ada keyword
        if($keyword) {
            
            // jika ada, maka panggil method search didalam model
           $orang = $this->orangModel->search($keyword);
        
        }else{

            //jika tidak ada keyword pencarian, maka tampilkan semua data
            $orang = $this->orangModel;
        }

        $data = [

            'title' => 'Daftar Orang',
            // 'orang' => $this->orangModel->findAll()

            // paginate untuk menentukan berapa data yang akan tampil di setiap halamannya
            'orang' => $orang->paginate(5, 'orang'),

            // pager untuk menampilkan link nomer halaman
            'pager' => $this->orangModel->pager,
            
            // penomoran data pada tiap halaman
            'currentPage' => $currentPage
        ];  

        return view('orang/index', $data);
    }

}
