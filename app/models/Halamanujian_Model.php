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
    $this->db->query('SELECT * FROM ' . $this->table.' WHERE id_tugas = 1');
    return $this->db->resultSet();
  }
  public function jumlahUser()
  {
    $query = "SELECT COUNT(*) AS total_count
        FROM " . $this->table . "
        WHERE id_tugas = 1";
    $this->db->query($query);

    $this->db->execute();

    return $this->db->single();
  }
  public function cekjawaban($id_soal,$jwb)
  {
    $query = "SELECT COUNT(*) AS total_count
        FROM " . $this->table . "
        WHERE id_tugas = 1 AND id_soal = '$id_soal' AND jwb_benar = '$jwb'";
    $this->db->query($query);

    $this->db->execute();

    return $this->db->single();
  }
}