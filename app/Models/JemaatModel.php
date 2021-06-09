<?php

namespace App\Models;

use CodeIgniter\Model;

class JemaatModel extends Model
{
    protected $table = 'jemaat';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address'];

    public function search($keyword)
    {
        // $builder = $this->table('jemaat');
        // $builder->like('name', $keyword);
        // return $builder;
        return $this->table('jemaat')->like('name', $keyword)->orLike('address', $keyword);
    }
}
