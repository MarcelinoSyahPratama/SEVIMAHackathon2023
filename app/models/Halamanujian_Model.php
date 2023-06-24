<?php 
class Halamanujian_Model
{
  private $table = 'soal';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllSoal()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }
}