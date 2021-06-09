<?php

namespace App\Controllers;

use App\Models\JemaatModel;

class Jemaat extends BaseController
{
    protected $jemaatModel;

    public function __construct()
    {
        $this->jemaatModel = new JemaatModel();
    }
    public function index()
    {
        $currentPage = $this->request->getVar('page_jemaat') ? $this->request->getVar('page_jemaat') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $jemaat = $this->jemaatModel->search($keyword);
        } else {
            $jemaat = $this->jemaatModel;
        }

        $data = [
            'title' => 'Daftar Jemaat',
            // 'jemaat' => $this->jemaatModel->findAll()
            'jemaat' => $jemaat->paginate(5, 'jemaat'),
            'pager' => $this->jemaatModel->pager,
            'currentPage' => $currentPage
        ];

        return view('jemaat/index', $data);
    }
}
