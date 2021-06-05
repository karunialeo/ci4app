<?php

namespace App\Controllers;

use App\Models\HfgleadersModel;

class Hfgleaders extends BaseController
{
    protected $hfgleadersModel;

    public function __construct()
    {
        $this->hfgleadersModel = new HfgleadersModel();
    }
    public function index()
    {
        $hfgleaders = $this->hfgleadersModel->findAll();

        $data = [
            'title' => 'List of HFG Leaders',
            'hfgleaders' => $hfgleaders
        ];

        return view('hfgleaders/index', $data);
    }

    public function detail($slug)
    {
        echo $slug;
    }
}
