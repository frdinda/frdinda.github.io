<?php

namespace App\Models;

use CodeIgniter\Model;

class DivModel extends Model
{
    protected $table      = 'ms_div';
    protected $primaryKey = 'id_div';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_div', 'nama_div'];

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    public function get_ms_divisi()
    {
        return $this->db->table('ms_div')->get()->getResultArray();
    }
    public function get_detail_div($id_div)
    {
        return $this->db->table('ms_div')
            ->where('id_div', $id_div)
            ->get()->getRowArray();
    }
}
