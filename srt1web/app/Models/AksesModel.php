<?php

namespace App\Models;

use CodeIgniter\Model;

class AksesModel extends Model
{
    protected $table      = 'ms_akses';
    protected $primaryKey = 'id_akses';

    // protected $useAutoIncrement = true;

    // protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_akses', 'jenis_akses'];

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // protected $validationRules    = [];
    // protected $validationMessages = [];
    // protected $skipValidation     = false;
    public function get_ms_akses()
    {
        return $this->db->table('ms_akses')->get()->getResultArray();
    }
    public function get_detail_akses($id_akses)
    {
        return $this->db->table('ms_akses')
            ->where('id_akses', $id_akses)
            ->get()->getRowArray();
    }
}
