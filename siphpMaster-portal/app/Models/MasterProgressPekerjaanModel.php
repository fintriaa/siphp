<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterProgressPekerjaanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_pekerjaan_subchild';
    protected $allowedFields = ['id_pekerjaan','kdes3','kdes4', 'satuan','kdkerjaan','kuantitastarget','kuantitasrealisasi','wakturealisasi','kdsatker','created_by','bukti','statuspenyelesaiiantarget','statuspenyelesaiianwaktu'];

    //Get dari tabel pekerjaan
    public function getAllPekerjaan()
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->get()
            ->getResultArray();
    }
    public function getAll($user_id)
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->where('created_by', $user_id)
            ->get()
            ->getResultArray();
    }

    public function getAllByUser($user_id)
    {

        return $this
            ->table($this->table)
            ->where('created_by', $user_id)
            ->orderBy('waktutarget', 'DESC');
    }


    public function getTotalByEselon($satker,$es4)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        return $this
            ->table($this->table)
            ->select('tbl_pekerjaan_child.*,mst_pekerjaan.nmkerjaan,tbl_pekerjaan.kdkerjaan,tbl_pekerjaan.satuan,tbl_pekerjaan.waktutarget')
            ->join('tbl_pekerjaan','tbl_pekerjaan.id = tbl_pekerjaan_child.id_pekerjaan')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan')
            ->where('tbl_pekerjaan_child.kdes4', $es4)
            ->where('kdsatker',$satker)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getTotalByUserDate($tgl_awal, $tgl_akhir, $user_id)
    {
        return $this
            ->table($this->table)
            ->where('created_by', $user_id)
            ->where('waktutarget >=', $tgl_awal)
            ->where('waktutarget <=', $tgl_akhir)
            ->orderBy('waktutarget', 'ASC')
            ->get()
            ->getResultArray();
    }




    public function getAllYear($user_id)
    {
        return $this
            ->table($this->table)
            ->select('waktutarget')
            ->where('created_by', $user_id)
            ->get()
            ->getResultArray();
    }


    public function getLaporan($user_id, $laporan_id)
    {
        return $this
            ->table($this->table)
            ->select('*')
            ->where('created_by', $user_id)
            ->where('id', $laporan_id)
            ->get()
            ->getRowArray();
    }

    public function getMaxDate($user_id)
    {
        return $this
            ->table($this->table)
            ->select('waktutarget')
            ->orderBy('waktutarget', 'DESC')
            ->where('created_by', $user_id)
            ->get()
            ->getRowArray();
    }


    public function search($user_id, $keyword)
    {
        return $this
            ->table($this->table)
            ->where('created_by', $user_id)
            ->where('waktutarget', $keyword);
    }


    public function getUserIdbyLaporanId($laporan_id)
    {
        return $this
            ->table($this->table)
            ->select('created_by')
            ->where('id', $laporan_id)
            ->get()
            ->getRowArray();
    }


    public function getMasterPekerjaanByUser($user_level, $user_es3, $user_es4)
    
    {
        $db = \Config\Database::connect();
        $builder = $db->table('mst_pekerjaan');
        

        if ($user_level == 5) {
            return $builder
                ->select('*')
                ->where('kdes3',$user_es3)
                ->get()
                ->getResultArray();
        } else {
            
            $a = $builder
            ->select('*')
            ->where('kdes4',$user_es4)
            ->get()
            ->getResultArray();
            return $a;

            
        }
    }

}
