<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterTargetModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_target';
    protected $allowedFields = ['nama_target'];

    public function getAll()
    {
        return $this
            ->table($this->table)
            ->select('id')
            ->select('nama_target')
            ->get()
            ->getResultArray();
    }
}
