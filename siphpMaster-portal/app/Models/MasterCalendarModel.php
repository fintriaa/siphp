<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterCalendarModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'mst_laporanharian';
    protected $allowedFields = ['user_id', 'tgl_kegiatan', 'waktu_mulai', 'waktu_selesai', 'uraian_kegiatan', 'hasil_kegiatan', 'kd_target', 'bukti_dukung', 'status'];


    function getEvents()
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->get()
            ->getResultArray();
    }
}
