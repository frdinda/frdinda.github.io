<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class UserModel extends Model
{
    protected $table      = 'ms_user';
    protected $primaryKey = 'user_id';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['user_id', 'id_subbag', 'id_bag', 'id_div', 'id_akses', 'password', 'nama_kepala', 'nip_kepala'];

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
        return $this->db->table('ms_user')->get()->getResultArray();
    }

    public function get_user_join()
    {
        return $this->db->table('ms_user')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->get()->getResultArray();
    }

    public function insert_user($data)
    {
        return $this->db->table('ms_user')->insert($data);
    }

    public function get_detail_user($user_id)
    {
        return $this->db->table('ms_user')
            ->where('user_id', $user_id)
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->get()->getRowArray();
    }
}
