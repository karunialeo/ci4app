<?php

namespace App\Models;

use CodeIgniter\Model;

class HfgleadersModel extends Model
{
    protected $table = 'hfgleaders';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'slug', 'dob', 'insta', 'division', 'photo'];

    public function getHfgleaders($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}
