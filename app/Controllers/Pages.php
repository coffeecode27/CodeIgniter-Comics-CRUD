<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [

            'title' => 'About'
        ];

        return view('pages/about', $data);
    }


    public function contact()
    {

        $data = [

            'title' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Xnxx no. 123',
                    'kota' => 'Banda Aceh'
                ],

                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Keudah no. 140',
                    'kota' => 'Banda Aceh'
                ]

            ]
        ];

        return view('pages/contact', $data);
    }
}
