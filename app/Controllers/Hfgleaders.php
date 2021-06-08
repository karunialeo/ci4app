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
        // $hfgleaders = $this->hfgleadersModel->findAll();

        $data = [
            'title' => 'List of HFG Leaders',
            'hfgleaders' => $this->hfgleadersModel->getHfgleaders()
        ];

        return view('hfgleaders/index', $data);
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Details',
            'hfgleaders' => $this->hfgleadersModel->getHfgleaders($slug)
        ];

        // jika hfgleaders tidak ada dalam list
        if (empty($data['hfgleaders'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Leaders named ' . $slug . ' not found.');
        }

        return view('hfgleaders/detail', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'title' => 'Add HFG Leaders',
            'validation' => \Config\Services::validation()
        ];

        return view('hfgleaders/create', $data);
    }

    public function save()
    {

        //validation
        if (!$this->validate([
            'name' => [
                'rules' => 'required|is_unique[hfgleaders.name]',
                'errors' => [
                    'required' => 'Name required.',
                    'is_unique' => 'Name already registered.'
                ]
            ],
            'dob' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date of Birth required.',
                ]
            ],
            'insta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Instagram username required.',
                ]
            ],
            'division' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Division required.',
                ]
            ],
            'photo' => [
                'rules' => 'max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'File size cannot exceed 2MB.',
                    'is_image' => 'Your file is not an image.',
                    'mime_in' => 'Your file is not an image.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/hfgleaders/create')->withInput()->with('validation', $validation);
            return redirect()->to('/hfgleaders/create')->withInput();
        }

        // ambil gambar
        $filePhoto = $this->request->getFile('photo');
        // apakah tidak ada gambar yang di upload
        if ($filePhoto->getError() == 4) {
            $namePhoto = 'default.png';
        } else {
            // generate random file name
            $namePhoto = $filePhoto->getRandomName();
            // pindahkan file ke folder img
            $filePhoto->move('img', $namePhoto);
            // ambil nama file
            // $namePhoto = $filePhoto->getName();
        }

        $slug = url_title($this->request->getVar('name'), '-', true);

        $this->hfgleadersModel->save([
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'dob' => $this->request->getVar('dob'),
            'insta' => $this->request->getVar('insta'),
            'photo' => $namePhoto,
            'division' => $this->request->getVar('division')
        ]);

        session()->setFlashdata('message', 'Add Successful.');

        return redirect()->to('/hfgleaders');
    }

    public function delete($id)
    {
        // find photo by id
        $hfgleaders = $this->hfgleadersModel->find($id);

        // cek jika file gambarnya default
        if ($hfgleaders['photo'] != 'default.png') {
            // delete photo
            unlink('img/' . $hfgleaders['photo']);
        }

        $this->hfgleadersModel->delete($id);
        session()->setFlashdata('message', 'Delete Successful.');
        return redirect()->to('/hfgleaders');
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Edit HFG Leaders',
            'validation' => \Config\Services::validation(),
            'hfgleaders' => $this->hfgleadersModel->getHfgleaders($slug)
        ];

        return view('hfgleaders/edit', $data);
    }

    public function update($id)
    {
        $oldHfgleaders = $this->hfgleadersModel->getHfgleaders($this->request->getVar('slug'));
        if ($oldHfgleaders['name'] == $this->request->getVar('name')) {
            $rule_name = 'required';
        } else {
            $rule_name = 'required|is_unique[hfgleaders.name]';
        }

        //validation
        if (!$this->validate([
            'name' => [
                'rules' => $rule_name,
                'errors' => [
                    'required' => 'Name required.',
                    'is_unique' => 'Name already registered.'
                ]
            ],
            'dob' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Date of Birth required.',
                ]
            ],
            'insta' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Instagram username required.',
                ]
            ],
            'division' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Division required.',
                ]
            ],
            'photo' => [
                'rules' => 'max_size[photo,2048]|is_image[photo]|mime_in[photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'File size cannot exceed 2MB.',
                    'is_image' => 'Your file is not an image.',
                    'mime_in' => 'Your file is not an image.'
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            // return redirect()->to('/hfgleaders/edit')->withInput()->with('validation', $validation);
            return redirect()->to('/hfgleaders/edit')->withInput();
        }

        // ambil gambar
        $filePhoto = $this->request->getFile('photo');
        // apakah gambar tidak diubah
        if ($filePhoto->getError() == 4) {
            $namePhoto = $this->request->getVar('photoOld');
        } else {
            // generate random file name
            $namePhoto = $filePhoto->getRandomName();
            // pindahkan file ke folder img
            $filePhoto->move('img', $namePhoto);
            // hapus file lama
            unlink('img/' . $this->request->getVar('photoOld'));
        }

        $slug = url_title($this->request->getVar('name'), '-', true);

        $this->hfgleadersModel->save([
            'id' => $id,
            'name' => $this->request->getVar('name'),
            'slug' => $slug,
            'dob' => $this->request->getVar('dob'),
            'insta' => $this->request->getVar('insta'),
            'photo' => $namePhoto,
            'division' => $this->request->getVar('division')
        ]);

        session()->setFlashdata('message', 'Edit Successful.');

        return redirect()->to('/hfgleaders');
    }
}
