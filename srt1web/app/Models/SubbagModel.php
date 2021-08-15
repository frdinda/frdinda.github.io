<?php

namespace App\Models;

use CodeIgniter\Model;

class SubbagModel extends Model
{
    protected $table      = 'ms_subbag';
    protected $primaryKey = 'id_subbag';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_subbag', 'nama_subbag', 'id_bag'];

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    public function get_ms_subbag()
    {
        return $this->db->table('ms_subbag')
            ->join('ms_bag', 'ms_bag.id_bag=ms_subbag.id_bag', 'left')
            ->join('ms_div', 'ms_div.id_div=ms_bag.id_div', 'left')
            ->get()->getResultArray();
    }
    public function get_detail_subbag($id_subbag)
    {
        return $this->db->table('ms_subbag')
            ->where('id_subbag', $id_subbag)
            ->join('ms_bag', 'ms_bag.id_bag=ms_subbag.id_bag', 'left')
            ->join('ms_div', 'ms_div.id_div=ms_bag.id_div', 'left')
            ->get()->getRowArray();
    }
}
