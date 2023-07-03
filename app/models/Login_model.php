<?php

class Login_model
{
    private $table = 'akun';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function cekAkun($data)
    {

        $query = "SELECT * FROM akun 
                    where username = :username AND pw = :pw";
        $this->db->query($query);
        $this->db->bind('username', $data['username']);
        $this->db->bind('pw', $data['pw']);
        $this->db->execute();

        return $this->db->resultSet();
    }


    public function getIdAkun($data)
    {

        $query = "SELECT * FROM akun 
                    where username = :username AND pw = :pw";


        return $this->db->single();
    }
}
?>