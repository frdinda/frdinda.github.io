<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class MagangModel extends Model
{
    protected $table      = 'magang_penelitian';
    protected $primaryKey = 'email';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_mgpn', 'email', 'tanggal_input', 'jenis_permohonan', 'dokumen_permohonan', 'status_permohonan', 'tanggal_update', 'dokumen_balasan', 'keterangan_balasan'];

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // protected $validationRules    = [];
    // // protected $validationMessages = [];
    // // protected $skipValidation     = false;

    // // protected $db;
    // // public function __construct(ConnectionInterface &$db)
    // // {
    // //     $this->db = &$db;
    // // }

    public function get_magang()
    {
        return $this->db->table('magang_penelitian')->get()->getResultArray();
    }

    public function insert_magang($data)
    {
        return $this->db->table('magang_penelitian')->insert($data);
    }

    public function get_detail_magang($id_magang)
    {
        return $this->db->table('magang_penelitian')
            ->where('email', $id_magang)
            ->get()->getRowArray();
    }
}
