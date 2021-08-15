<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class SuratModel extends Model
{
    protected $table      = 'tr_surat';
    protected $primaryKey = 'no_surat';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['no_surat', 'perihal', 'user_id', 'nama_pegawai', 'tanggal_surat', 'tanggal_pengambilan', 'kode_unit', 'kode_masalah', 'masalah_substantif_1', 'masalah_substantif_2'];

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

    public function get_surat()
    {
        return $this->db->table('tr_surat')->get()->getResultArray();
    }

    public function get_surat_join()
    {
        return $this->db->table('tr_surat')
            ->join('ms_user', 'tr_surat.user_id=ms_user.user_id', 'left')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->join('tr_revisi', 'tr_surat.no_surat=tr_revisi.no_surat', 'left')
            ->join('(select r1.id_revisi, r1.tanggal_revisi, r1.no_surat from tr_revisi as r1 join (select max(id_revisi) id_revisi from tr_revisi group by no_surat) as r2 on r1.id_revisi=r2.id_revisi) as revisi', 'tr_surat.no_surat=revisi.no_surat', 'left')
            ->join('tr_surat as s', 's.no_surat=tr_surat.no_surat', 'left')
            ->groupBy('tr_surat.no_surat')
            ->get()->getResultArray();
    }

    public function get_surat_join_user($user_id)
    {
        return $this->db->table('tr_surat')
            ->where('tr_surat.user_id', $user_id)
            ->join('ms_user', 'tr_surat.user_id=ms_user.user_id', 'left')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->join('tr_revisi', 'tr_surat.no_surat=tr_revisi.no_surat', 'left')
            ->join('(select r1.id_revisi, r1.tanggal_revisi, r1.no_surat from tr_revisi as r1 join (select max(id_revisi) id_revisi from tr_revisi group by no_surat) as r2 on r1.id_revisi=r2.id_revisi) as revisi', 'tr_surat.no_surat=revisi.no_surat', 'left')
            ->join('tr_surat as s', 's.no_surat=tr_surat.no_surat', 'left')
            ->groupBy('tr_surat.no_surat')
            ->get()->getResultArray();
    }

    public function get_surat_join_div($id)
    {
        return $this->db->table('tr_surat')
            ->join('ms_user', 'tr_surat.user_id=ms_user.user_id', 'left')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->where('ms_div.id_div', $id)
            ->orWhere('ms_bag.id_div', $id)
            ->orWhere('ms_user.id_div', $id)
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->join('tr_revisi', 'tr_surat.no_surat=tr_revisi.no_surat', 'left')
            ->join('(select r1.id_revisi, r1.tanggal_revisi, r1.no_surat from tr_revisi as r1 join (select max(id_revisi) id_revisi from tr_revisi group by no_surat) as r2 on r1.id_revisi=r2.id_revisi) as revisi', 'tr_surat.no_surat=revisi.no_surat', 'left')
            ->join('tr_surat as s', 's.no_surat=tr_surat.no_surat', 'left')
            ->groupBy('tr_surat.no_surat')
            ->get()->getResultArray();
    }

    public function get_surat_join_kbg($id)
    {
        return $this->db->table('tr_surat')
            ->join('ms_user', 'tr_surat.user_id=ms_user.user_id', 'left')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->where('ms_bag.id_bag', $id)
            ->orWhere('ms_subbag.id_bag', $id)
            ->orWhere('ms_user.id_bag', $id)
            ->join('tr_revisi', 'tr_surat.no_surat=tr_revisi.no_surat', 'left')
            ->join('(select r1.id_revisi, r1.tanggal_revisi, r1.no_surat from tr_revisi as r1 join (select max(id_revisi) id_revisi from tr_revisi group by no_surat) as r2 on r1.id_revisi=r2.id_revisi) as revisi', 'tr_surat.no_surat=revisi.no_surat', 'left')
            ->join('tr_surat as s', 's.no_surat=tr_surat.no_surat', 'left')
            ->groupBy('tr_surat.no_surat')
            ->get()->getResultArray();
    }

    public function get_surat_search($keyword)
    {
        return $this->db->table('tr_surat')
            ->join('ms_user', 'tr_surat.user_id=ms_user.user_id', 'left')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->where('ms_bag.nama_bag', $keyword)
            ->orWhere('ms_div.nama_div', $keyword)
            ->orWhere('ms_subbag.nama_subbag', $keyword)
            ->orWhere('ms_user.nama_kepala', $keyword)
            ->orWhere('tr_surat.perihal', $keyword)
            ->orWhere('tr_surat.nama_pegawai', $keyword)
            ->orWhere('tr_surat.no_surat', $keyword)
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->join('tr_revisi', 'tr_surat.no_surat=tr_revisi.no_surat', 'left')
            ->join('(select r1.id_revisi, r1.tanggal_revisi, r1.no_surat from tr_revisi as r1 join (select max(id_revisi) id_revisi from tr_revisi group by no_surat) as r2 on r1.id_revisi=r2.id_revisi) as revisi', 'tr_surat.no_surat=revisi.no_surat', 'left')
            ->join('tr_surat as s', 's.no_surat=tr_surat.no_surat', 'left')
            ->groupBy('tr_surat.no_surat')
            ->get()->getResultArray();
    }

    public function get_detail_revisi($no_surat)
    {
        return $this->db->table('tr_revisi')
            ->where('no_surat', $no_surat)
            ->get()->getResultArray();
    }
    public function get_tanggal_max($no_surat)
    {
        return $this->db->table('tr_revisi')
            ->where('no_surat', $no_surat)
            ->selectMax('tanggal_revisi')
            ->get()->getRowArray();
    }
    public function get_detail_surat($no_surat)
    {
        return $this->db->table('tr_surat')
            ->where('tr_surat.no_surat', $no_surat)
            ->join('ms_user', 'tr_surat.user_id=ms_user.user_id', 'left')
            ->join('ms_subbag', 'ms_user.id_subbag=ms_subbag.id_subbag', 'left')
            ->join('ms_bag', 'ms_user.id_bag=ms_bag.id_bag OR ms_subbag.id_bag=ms_bag.id_bag', 'left')
            ->join('ms_div', 'ms_user.id_div=ms_div.id_div OR ms_bag.id_div=ms_div.id_div', 'left')
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->join('ms_kn_unit', 'tr_surat.kode_unit=ms_kn_unit.kode_unit', 'left')
            ->join('ms_kn_masalah', 'tr_surat.kode_masalah=ms_kn_masalah.kode_masalah', 'left')
            ->join('ms_kn_subs_1', 'ms_kn_subs_1.masalah_substantif_1=tr_surat.masalah_substantif_1 AND ms_kn_subs_1.kode_masalah=tr_surat.kode_masalah', 'left')
            ->join('ms_kn_subs_2', 'ms_kn_subs_2.masalah_substantif_2=tr_surat.masalah_substantif_2 AND ms_kn_subs_2.kode_masalah=tr_surat.kode_masalah AND ms_kn_subs_2.masalah_substantif_1=tr_surat.masalah_substantif_1', 'left')
            ->join('(select max(id_revisi) id_revisi, tanggal_revisi, no_surat from tr_revisi group by no_surat) as revisi', 'revisi.no_surat=tr_surat.no_surat', 'left')
            ->groupBy('tr_surat.no_surat')
            ->get()->getRowArray();
    }
    public function get_last_surat($tanggal_hari_ini)
    {
        $no_surat_terakhir = $this->db->table('tr_surat')
            ->selectMax('no_surat')
            ->where('tr_surat.tanggal_surat', $tanggal_hari_ini)
            ->get()->getRowArray();
        return $this->db->table('tr_surat')
            ->select('no_surat, kode_masalah')
            ->where('tr_surat.no_surat', $no_surat_terakhir['no_surat'])
            ->get()->getRowArray();
    }
    public function get_last_no_surat()
    {
        return $this->db->table('tr_surat')
            ->selectMax('no_surat')
            ->get()->getRowArray();
    }
    public function get_last_no_surat_ver()
    {
        $no_surat_terakhir = $this->db->table('tr_surat')
            ->selectMax('no_surat')
            ->get()->getRowArray();
        return $this->db->table('tr_surat')
            ->select('tanggal_surat')
            ->where('tr_surat.no_surat', $no_surat_terakhir['no_surat'])
            ->get()->getRowArray();
    }
    public function get_nomor_mundur($tanggal_mundur)
    {
        return $this->db->table('tr_surat')
            ->select('no_surat, kode_masalah')
            ->where('tr_surat.tanggal_surat', $tanggal_mundur)
            ->where('tr_surat.kode_masalah', null, true)
            ->get()->getResultArray();
    }
}
