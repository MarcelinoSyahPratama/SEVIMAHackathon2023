<?php 
class Halamanujian_Model
{
  private $table = 'soal';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllSoal($idtugas)
  {
    $this->db->query('SELECT * FROM ' . $this->table.' WHERE id_tugas = '.$idtugas);
    return $this->db->resultSet();
  }
  public function jumlahSoal($idtugas)
  {
    $query = "SELECT COUNT(*) AS total_count
        FROM " . $this->table . "
        WHERE id_tugas = $idtugas";
    $this->db->query($query);

    $this->db->execute();

    return $this->db->single();
  }
  public function cekjawaban($id_soal,$jwb,$idtugas)
  {
    $query = "SELECT COUNT(*) AS total_count
        FROM " . $this->table . "
        WHERE id_tugas = '$idtugas' AND id_soal = '$id_soal' AND jwb_benar = '$jwb'";
    $this->db->query($query);

    $this->db->execute();

    return $this->db->single();
  }
  public function catatnilai($id_tugas,$nilai)
  {
    session_start();
    $id_user = $_SESSION["user"]["id_user"];
    $query = "INSERT INTO nilai VALUES ('', :id_tugas, :id_user, :nilai)";
    $this->db->query($query);
    $this->db->bind(':id_tugas', $id_tugas);
    $this->db->bind(':id_user', $id_user);
    $this->db->bind(':nilai', $nilai);

    $this->db->execute();

    return $this->db->rowCount();
  }
}