<?php

namespace App\Models;

use CodeIgniter\Model;

class BagModel extends Model
{
    protected $table      = 'ms_bag';
    protected $primaryKey = 'id_bag';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_bag', 'nama_bag', 'id_div'];

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    public function get_ms_bag()
    {
        return $this->db->table('ms_bag')
            ->join('ms_div', 'ms_div.id_div=ms_bag.id_div', 'left')
            ->get()->getResultArray();
    }
    public function get_detail_bag($id_bag)
    {
        return $this->db->table('ms_bag')
            ->where('id_bag', $id_bag)
            ->join('ms_div', 'ms_div.id_div=ms_bag.id_div', 'left')
            ->get()->getRowArray();
    }
}
