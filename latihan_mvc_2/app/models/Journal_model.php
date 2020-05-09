<?php

class Journal_model{
    private $table = 'tb_journal';
    private $db;
    public $tanggal_input;

    public function __construct(){
        $this->db = new Database;
        $tanggal_input = date("y-m-d h:i:s");
    }

    public function getAllDataJournal(){
        $this->db->query('SELECT * FROM ' .$this->table. ' ORDER BY tanggal_input');
        return $this->db->resultSet();
    }

    public function getDataJournalById($id){
        $this->db->query('SELECT * FROM ' .$this->table. 'WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataJournal($data){
        $tanggal_input = date("y-m-d h:i:s");
        $query = "INSERT INTO tb_journal VALUES (NULL, :tanggal_input, :judul, :isi)";
        $this->db->query($query);
        $this->db->bind('tanggal_input', $tanggal_input);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('isi', $data['isi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataJournal($data){
        $query = "UPDATE tb_journal SET tanggal_input = :tanggal_input, judul = :judul, isi = :isi WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('tanggal_input', $tanggal_input);
        $this->db->bind('judul', $data['judul']);
        $this->db->bind('isi', $data['isi']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataJournal($id){
        $query = "DELETE FROM tb_journal WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

}

?>