<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class PelantikanModel extends Model
{
    protected $table      = 'pelantikan_npk';
    protected $primaryKey = 'email';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_npk', 'email', 'tanggal_input', 'jenis_permohonan', 'dokumen_permohonan', 'status_permohonan', 'tanggal_update', 'dokumen_balasan', 'keterangan_balasan', 'tanggal_pelantikan'];

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

    public function get_pelantikan()
    {
        return $this->db->table('pelantikan_npk')
            ->join('user_izin_pelantikan', 'user_izin_pelantikan.email=pelantikan_npk.email', 'left')
            ->get()->getResultArray();
    }

    public function get_pelantikan_spesifik($email)
    {
        return $this->db->table('pelantikan_npk')
            ->where('pelantikan_npk.email', $email)
            ->join('user_izin_pelantikan', 'user_izin_pelantikan.email=pelantikan_npk.email', 'left')
            ->get()->getResultArray();
    }

    public function insert_pelantikan($data)
    {
        return $this->db->table('pelantikan_npk')->insert($data);
    }

    public function get_detail_pelantikan($code)
    {
        return $this->db->table('pelantikan_npk')
            ->where('pelantikan_npk.dokumen_permohonan', $code)
            ->join('user_izin_pelantikan', 'user_izin_pelantikan.email=pelantikan_npk.email', 'left')
            ->get()->getRowArray();
    }

    public function update_pelantikan($id_npk, $data)
    {
        return $this->db->table('pelantikan_npk')
            ->where('id_npk', $id_npk)
            ->update($data);
    }
}
