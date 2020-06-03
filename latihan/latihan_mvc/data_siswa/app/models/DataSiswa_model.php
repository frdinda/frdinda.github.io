<?php

class DataSiswa_model{
    private $table = 'ms_siswa';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllDataSiswa(){
        $this->db->query('SELECT * FROM ' .$this->table. ' ORDER BY id');
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

    public function ubahDataSiswa($data){
        $query = "UPDATE ms_siswa SET nama = :nama, nis = :nis, tanggal_lahir = :tanggal_lahir WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nis', $data['nis']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataSiswa($id){
        $query = "DELETE FROM ms_siswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}

?>