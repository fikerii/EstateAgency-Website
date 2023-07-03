<?php

class Registrasi_model
{
    private $table = 'akun';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function tambahAkun($data)
    {

        $query = "INSERT INTO akun
                    VALUES
                    ('', :username, :pw, :role)";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('pw', $data['pw']);
        $this->db->bind('role', $data['role']);
        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function setProfile($data, $id)
    {
        $direktori = "img/profile/";
        $file_name = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $direktori . $file_name);

        $query = "INSERT INTO data_akun
                    VALUES
                    (:id, :nama_lengkap, '', '', :images)";
        $this->db->query($query);
        $this->db->bind('id', $id['id_akun']);
        $this->db->bind('nama_lengkap', $data['nama_lengkap']);
        $this->db->bind('images', $file_name);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
?>