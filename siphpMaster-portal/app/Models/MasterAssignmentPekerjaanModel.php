<?php

namespace App\Models;

use CodeIgniter\Model;

class MasterAssignmentPekerjaanModel extends Model
{
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $table = 'tbl_pekerjaan_child';
    // protected $primaryKey = ['kdsatker','id_pekerjaan'];
    protected $allowedFields = ['kdes3', 'kdes4', 'satuan', 'kdkerjaan', 'kuantitastarget', 'kuantitasrealisasi', 'wakturealisasi', 'kdsatker', 'created_by', 'id_pekerjaan', 'assign','bukti','statuspenyelesaiiantarget','statuspenyelesaiianwaktu'];

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


    public function getTotalKab($satker, $es4)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        return $this
            ->table($this->table)
            ->select('tbl_pekerjaan_child.*,mst_pekerjaan.nmkerjaan,tbl_pekerjaan.kdkerjaan,tbl_pekerjaan.satuan,tbl_pekerjaan.waktutarget')
            ->join('tbl_pekerjaan', 'tbl_pekerjaan.id = tbl_pekerjaan_child.id_pekerjaan')
            ->join('mst_pekerjaan', 'mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan')
            ->where('tbl_pekerjaan_child.kdes4', $es4)
            ->where('kdsatker', $satker)
            ->orderBy('created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getTotalKabByFungsi($satker, $es4)
    {
        // $db = \Config\Database::connect();
        // $builder = $db->table('mst_pekerjaan');

        return $this
            ->table($this->table)
            ->select('tbl_pekerjaan_child.*,mst_pekerjaan.nmkerjaan,tbl_pekerjaan.kdkerjaan,tbl_pekerjaan.satuan,tbl_pekerjaan.waktutarget')
            ->join('tbl_pekerjaan', 'tbl_pekerjaan.id = tbl_pekerjaan_child.id_pekerjaan')
            ->join('mst_pekerjaan', 'mst_pekerjaan.id = tbl_pekerjaan.kdkerjaan')
            ->where('tbl_pekerjaan_child.kdes4', $es4)
            ->where('kdsatker', $satker)
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
                ->where('kdes3', $user_es3)
                ->get()
                ->getResultArray();
        } else {

            $a = $builder
                ->select('*')
                ->where('kdes4', $user_es4)
                ->get()
                ->getResultArray();
            return $a;


        }
    }

    public function upsertData($data)
    {
        // Get the columns that make up the composite primary key
        $primaryKeyColumns = ['id_pekerjaan','satker'];

        // Get the unique keys from the provided data
        $uniqueKeys = array_map(function ($entry) use ($primaryKeyColumns) {
            return array_intersect_key($entry, array_flip($primaryKeyColumns));
        }, $data);

        // Check for existing entries
        $existingEntries = [];
        foreach ($uniqueKeys as $uniqueKey) {
            $existingEntry = $this->where($uniqueKey)->get()->getRowArray();
            if ($existingEntry) {
                $existingEntries[] = $existingEntry;
            }
        }

        // dd($existingEntries);

        // Prepare the data for insertion and update
        $insertData = [];
        $updateData = [];

        foreach ($data as $entry) {
            $primaryKeyValues = array_intersect_key($entry, array_flip($primaryKeyColumns));
            
            // Check if the entry exists in the existing entries
            $exists = false;
            foreach ($existingEntries as $existingEntry) {
                $existingEntryValues = array_intersect_key($existingEntry, array_flip($primaryKeyColumns));
                // dd($primaryKeyValues);
                $a = $existingEntryValues === $primaryKeyValues;
                d($existingEntryValues);
                d($primaryKeyValues);
                // dd($a);
                if ($existingEntryValues === $primaryKeyValues) {
                    $exists = true;
                    break;
                }
            }

            if ($exists) {
                // Entry already exists, prepare for update
                $updateData[] = $entry;
            } else {
                // Entry doesn't exist, prepare for insertion
                $insertData[] = $entry;
            }
        }

        // Perform batch insert and update
        if (!empty($insertData)) {
            // exit();
            $this->insertBatch($insertData);
        }

        if (!empty($updateData)) {
            foreach ($updateData as $entry) {
                $primaryKeyValues = array_intersect_key($entry, array_flip($primaryKeyColumns));
                $this->where($primaryKeyValues)->set($entry)->update();
            }
        }
    }

    public function countByKab()
    {
        
        $builder = $this->db->table('mst_satker');
        $builder->select('kd_satker, COUNT(tbl_pekerjaan_child.kdsatker) as count');
        $builder->join('tbl_pekerjaan_child', 'tbl_pekerjaan_child.kdsatker = mst_satker.kd_satker', 'left');
        $builder->groupBy('kd_satker');

        $result = $builder->get()->getResultArray();

        // $data = [];
        // foreach ($result as $row) {
        //     $data[$row->kd_satker] = $row->count;
        // }

        return $result;

        // return $this->table($this->table)
        //     ->select('mst_satker.kd_satker,COUNT(*) as total_pekerjaan')
        //     ->join('mst_satker','mst_satker.kd_satker = tbl_pekerjaan_child.kdsatker','left')
        //     ->groupBy('kdsatker')
        //     ->get()
        //     ->getResultArray();
    }

}