<?php 
class Kelas_Model
{
  private $table = 'kelas';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllKelas()
  {
    session_start();
    $id_guru = $_SESSION["user"]["id_user"];
    $this->db->query('SELECT * FROM ' . $this->table . " WHERE id_guru = $id_guru");
    return $this->db->resultSet();
  }
  public function addDataKelas($data)
  {
    session_start();
    $query = "INSERT INTO $this->table VALUES ('', :namakelas, :kodeKelas, :idguru, :datetime)";
    $kodeKelas = bin2hex(random_bytes(2));
    $datetime = date('Y-m-d H:s:i');
    $this->db->query($query);
    $this->db->bind(':namakelas', $data['namakelas']);
    $this->db->bind(':kodeKelas', $kodeKelas);
    $this->db->bind(':datetime', $datetime);
    $this->db->bind(':idguru', $_SESSION["user"]["id_user"]);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function hapusDataKelas($id_kelas)
  {
    $query = "DELETE FROM $this->table WHERE id_kelas = :id_kelas";

    $this->db->query($query);
    $this->db->bind('id_kelas', $id_kelas);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function updateDataKelas($data)
  {
    $query = "UPDATE $this->table SET `nama` = :Nama WHERE `id_kelas` = :idKelas";

    $this->db->query($query);
    $this->db->bind(':idKelas', $data['idKelas']);
    $this->db->bind(':Nama', $data['Nama']);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function joinkelas($data)
  {
    session_start();
    $id_user = $_SESSION["user"]["id_user"];
    $query = "INSERT INTO kelasuser VALUES ('', :id_user, :kodekelas)";
    $this->db->query($query);
    $this->db->bind(':kodekelas', $data["kodekelas"]);
    $this->db->bind(':id_user', $id_user);

    $this->db->execute();

    return $this->db->rowCount();
  }
  
  public function getKelasUser()
  {
    session_start();
    $id_user = $_SESSION["user"]["id_user"];
    $this->db->query("SELECT * FROM kelasuser INNER JOIN kelas ON kelasuser.kodekelas = kelas.kode INNER JOIN user ON kelas.id_guru = user.id_user WHERE kelasuser.id_user = $id_user");
    return $this->db->resultSet();
  }
  
}