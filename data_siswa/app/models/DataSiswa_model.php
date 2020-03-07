<?php

class DataSiswa_model{
    private $table = 'ms_siswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllDataSiswa(){
        $this->db->query('SELECT * FROM ' .$this->table);
        return $this->db->resultSet();
    }

    public function getDataSiswaById($id){
        $this->db->query('SELECT * FROM ' .$this->table. ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function tambahDataSiswa($data){
        $query = "INSERT INTO ms_siswa VALUES (NULL, :nama, :nis, :tanggal_lahir)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

?>