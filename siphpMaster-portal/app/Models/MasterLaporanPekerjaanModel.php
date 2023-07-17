<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterLaporanPekerjaanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_pekerjaan';
    protected $allowedFields = ['kdes3','kdes4','created_by', 'waktutarget', 'satuan','kdkerjaan','kuantitastarget','kuantitasrealisasi','wakturealisasi','statusverifikasi'];

    //Get dari tabel pekerjaan
    public function getAllPekerjaan()
    {
        return $this
            ->table($this->table)
            ->select('*, statusverifikasi')
            ->get()
            ->getResultArray();
    }
    public function getAll($user_id)
    {
        return $this
            ->table($this->table)
            ->select('*, statusverifikasi')
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


    public function getTotalProvinsi($user_id)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        // $subquery = $this->db->table('tbl_pekerjaan_child')
        //     ->select('id_pekerjaan, SUM(kuantitasrealisasi) AS kuantitasrealisasi, wakturealisasi')
        //     ->groupBy('id_pekerjaan');
        $subquery = '(SELECT id_pekerjaan, SUM(kuantitasrealisasi) AS kuantitasrealisasi, MAX(wakturealisasi) as wakturealisasi FROM tbl_pekerjaan_child GROUP BY id_pekerjaan) AS subquery';

        $a =  $this
            ->table($this->table)
            ->select('tbl_pekerjaan.*,mst_pekerjaan.nmkerjaan,kuantitasrealisasi,wakturealisasi')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan','left')
            ->join($subquery,'tbl_pekerjaan.id = subquery.id_pekerjaan','left')
            ->where('tbl_pekerjaan.created_by', $user_id)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    // dd($a);
        return $a;
    }

    public function getTotalProvinsiByFungsi($user_es3)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        // $subquery = $this->db->table('tbl_pekerjaan_child')
        //     ->select('id_pekerjaan, SUM(kuantitasrealisasi) AS kuantitasrealisasi, wakturealisasi')
        //     ->groupBy('id_pekerjaan');
        $subquery = '(SELECT id_pekerjaan, COALESCE(SUM(kuantitasrealisasi),0) AS kuantitasrealisasi, MAX(wakturealisasi) as wakturealisasi FROM tbl_pekerjaan_child GROUP BY id_pekerjaan) AS subquery';

        $a =  $this
            ->table($this->table)
            ->select('tbl_pekerjaan.*,mst_pekerjaan.nmkerjaan,kuantitasrealisasi,wakturealisasi,(kuantitasrealisasi/kuantitastarget*100) as percentage')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan','left')
            ->join($subquery,'tbl_pekerjaan.id = subquery.id_pekerjaan','left')
            ->where('tbl_pekerjaan.kdes3', $user_es3)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    // dd($a);
        return $a;
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
            ->select('tbl_pekerjaan.id,mst_pekerjaan.nmkerjaan,tbl_pekerjaan.created_at,tbl_pekerjaan.updated_at, tbl_pekerjaan_child.bukti, tbl_pekerjaan_child.kuantitastarget,tbl_pekerjaan.waktutarget,tbl_pekerjaan_child.statuspenyelesaiiantarget,tbl_pekerjaan_child.statuspenyelesaiianwaktu,tbl_pekerjaan_child.kdsatker,mst_satker.satker,tbl_pekerjaan_child.kuantitasrealisasi,tbl_pekerjaan_child.wakturealisasi')
            ->join('mst_pekerjaan','mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan','left')
            ->join('tbl_pekerjaan_child','tbl_pekerjaan.id = tbl_pekerjaan_child.id_pekerjaan')
            ->join('mst_satker','mst_satker.kd_satker = tbl_pekerjaan_child.kdsatker','left')
            ->where('tbl_pekerjaan.created_by', $user_id)
            ->where('tbl_pekerjaan.id', $laporan_id)
            ->get()
            ->getResultArray();
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

    //Get dari tabel master pekerjaan
    public function getMasterPekerjaan()
    {
        return $this
            ->table($this->table_mst)
            ->select('*')
            ->get()
            ->getResultArray();
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
