<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class UserMagangModel extends Model
{
    protected $table      = 'user_izin_magang';
    protected $primaryKey = 'email';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'nama', 'tanggal_lahir', 'alamat_tinggal', 'instansi_asal', 'nomor_telepon', 'password', 'jenis_akses', 'auth', 'auth_code'];

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

    public function get_user()
    {
        return $this->db->table('user_izin_magang')->get()->getResultArray();
    }

    public function insert_user($data)
    {
        return $this->db->table('user_izin_magang')->insert($data);
    }

    public function get_detail_user($email)
    {
        return $this->db->table('user_izin_magang')
            ->where('email', $email)
            ->get()->getRowArray();
    }

    public function get_detail_user_by_authcode($authcode)
    {
        return $this->db->table('user_izin_magang')
            ->where('auth_code', $authcode)
            ->get()->getRowArray();
    }
}
