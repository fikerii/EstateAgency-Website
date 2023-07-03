<?php

class Home_model
{
    private $table = 'data_rumah';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getLatestRumah()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY id_rumah DESC LIMIT 4');
        return $this->db->resultSet();
    }

    public function getBestRumah()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' ORDER BY harga DESC LIMIT 3');
        return $this->db->resultSet();
    }
}