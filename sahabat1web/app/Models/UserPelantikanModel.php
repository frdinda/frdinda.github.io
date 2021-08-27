<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class UserPelantikanModel extends Model
{
    protected $table      = 'user_izin_pelantikan';
    protected $primaryKey = 'email';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'nama', 'tanggal_lahir', 'alamat_tinggal', 'nomor_telepon', 'password', 'jenis_akses', 'auth', 'auth_code'];

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
        return $this->db->table('user_izin_pelantikan')->get()->getResultArray();
    }

    public function insert_user($data)
    {
        return $this->db->table('user_izin_pelantikan')->insert($data);
    }

    public function get_detail_user($email)
    {
        return $this->db->table('user_izin_pelantikan')
            ->where('email', $email)
            ->get()->getRowArray();
    }

    public function get_detail_user_by_authcode($authcode)
    {
        return $this->db->table('user_izin_pelantikan')
            ->where('auth_code', $authcode)
            ->get()->getRowArray();
    }
}
