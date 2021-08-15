<?php

namespace App\Models;

use CodeIgniter\Model;

class DynamicBagianModel extends Model
{
    public function get_divisi()
    {
        return $this->db->table('ms_div')->get()->getResultArray();
    }
    public function get_akses()
    {
        return $this->db->table('ms_akses')->get()->getResultArray();
    }
    public function get_all_bagian()
    {
        return $this->db->table('ms_bag')->get()->getResultArray();
    }
    public function get_all_subbagian()
    {
        return $this->db->table('ms_subbag')->get()->getResultArray();
    }
    public function get_bagian($id_div)
    {
        return $this->db->table('ms_bag')
            ->where('id_div', $id_div)
            ->get()->getResultArray();
    }
    public function get_subbagian($id_bag)
    {
        return $this->db->table('ms_subbag')
            ->where('id_bag', $id_bag)
            ->get()->getResultArray();
    }


    public function get_all_kode_masalah()
    {
        return $this->db->table('ms_kn_masalah')->get()->getResultArray();
    }
    public function get_all_masalah_subs_1($kode_masalah)
    {
        return $this->db->table('ms_kn_subs_1')
            ->where('kode_masalah', $kode_masalah)
            ->get()->getResultArray();
    }
    public function get_all_masalah_subs_2($kode_masalah, $masalah_substantif_1)
    {
        return $this->db->table('ms_kn_subs_2')
            ->where('kode_masalah', $kode_masalah)
            ->where('masalah_substantif_1', $masalah_substantif_1)
            ->get()->getResultArray();
    }
}
