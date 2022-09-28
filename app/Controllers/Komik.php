<?php

namespace App\Controllers;

use App\Models\KomikModel;
use CodeIgniter\HTTP\Request;

class Komik extends BaseController
{

    protected $komikModel;

    public function __construct()
    {

        $this->komikModel = new KomikModel();
    }


    public function index()
    {

        $data = [

            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];

        return view('komik/index', $data);
    }


    public function detail($slug)
    {

        $data = [

            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)

        ];

        //jika data komik kosong/tidak ada di table
        if (empty($data['komik'])) {

            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' Tidak ditemukan.');
        }

        return view('komik/detail', $data);
    }


    public function create()
    {
        // session();

        $data = [

            'title' => 'Form Tambah Data Komik',
            'validation' => \Config\Services::validation()
        ];

        return view('komik/create', $data);
    }


    public function save()
    {
        // Validasi input data
        if (!$this->validate([

            'judul' => [
                'rules' => 'required|is_unique[komik.judul]',
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],

            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi.'
                ]
            ],


            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi.'
                ]
            ],


            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ]


        ])) {

            // mengambil pesan kesalahan
            // $validation = \Config\Services::validation();
            // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
            return redirect()->to('/komik/create')->withInput();
        }

        // kelola dan ambil gambar
        $fileSampul = $this->request->getFile('sampul');


        // cek apakah gambar tidak di upload
        // 4 artinya, tidak ada file yg di upload
        if ($fileSampul->getError() == 4) {

            //jika gambar tidak di upload, maka tampilkan gambar default
            $namaSampul = 'default.png';
        } else {

            // Generate nama random untuk gambar
            $namaSampul = $fileSampul->getRandomName();

            // Pindahkan file gambar ke folder img dengan nama random
            $fileSampul->move('img', $namaSampul);
        }

        // lalu ambil nama file gambarnya untuk di insert ke database
        // $namaSampul = $fileSampul->getName();


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            //getVar mengambil request dari url (get/post)
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        return redirect()->to('/komik');
    }


    public function delete($id)
    {

        // cari gambar berdasarkan id
        $komik = $this->komikModel->find($id);

        // cek jika gambarnya bukan default.png
        if ($komik['sampul'] != 'default.png') {

            // maka hapus gambar 
            unlink('img/' . $komik['sampul']);
        }

        // dan jika gambarnya adalah default.png, maka hapus datanya saja (kecuali gambar)
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/komik');
    }



    public function edit($slug)
    {

        $data = [

            'title' => 'Form Ubah Data Komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];

        return view('komik/edit', $data);
    }


    public function update($id)
    {
        // cek judul lama
        $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));

        // jika judul lama sama dengan judul baru (tidak diubah)
        if ($komikLama['judul'] == $this->request->getVar('judul')) {

            $rule_judul = 'required';
        } else {

            $rule_judul = 'required|is_unique[komik.judul]';
        }
        // Validasi input data
        if (!$this->validate([

            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} komik harus diisi.',
                    'is_unique' => '{field} komik sudah terdaftar.'
                ]
            ],

            'penulis' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi.'
                ]
            ],


            'penerbit' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} komik harus diisi.'
                ]
            ],

            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ]


        ])) {

            // mengambil pesan kesalahan
            // $validation = \Config\Services::validation();
            return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput();
        }


        // Kelola gambar
        $fileSampul = $this->request->getFile('sampul');

        // cek gambar, apakah tetap gambar lama atau gambar baru
        if($fileSampul->getError() == 4) {

            // jika gambar lama
            $namaSampul = $this->request->getVar('sampulLama');
        
        }else{

            // jika gambar baru, maka generate nama gambar random
            $namaSampul = $fileSampul->getRandomName();
            
            // lalu upload atau pindahkan gambar 
            $fileSampul->move('img', $namaSampul);

            //lalu hapus file gambar yg lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }


        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            //getVar mengambil request dari url (get/post)
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');
        return redirect()->to('/komik');
    }
}
