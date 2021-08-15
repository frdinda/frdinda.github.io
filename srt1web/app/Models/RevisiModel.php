<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class RevisiModel extends Model
{
    protected $table      = 'tr_revisi';
    protected $primaryKey = 'id_revisi';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['no_surat', 'perihal_sblm', 'user_id', 'nama_pegawai_sblm', 'tanggal_revisi', 'jenis_perubahan', 'kode_unit_sblm', 'kode_masalah_sblm', 'masalah_substantif_1_sblm', 'masalah_substantif_2_sblm'];

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
}
