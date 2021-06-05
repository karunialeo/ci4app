<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Karunia Leo Gultom',
            'tes' => ['satu', 'dua', 'tiga']
        ];
        return view('pages/home', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About | Karunia Leo Gultom'
        ];
        return view('pages/about', $data);
    }
    public function contact()
    {
        $data = [
            'title' => 'Contact Us | Karunia Leo Gultom',
            'address' => [
                [
                    'type' => 'Home',
                    'address' => 'Jl. H. Som no. 118',
                    'city' => 'Tangerang Selatan'
                ],
                [
                    'type' => 'Office',
                    'address' => 'Jl. HR Rasuna Said Kavling A5 No. 5',
                    'city' => 'Tangerang Selatan'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }
}
