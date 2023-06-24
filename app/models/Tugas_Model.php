<?php 
class Tugas_Model
{
  private $table = 'tugas';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllTugas()
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' INNER JOIN kelas ON kelas.id_kelas = tugas.id_kelas');
    return $this->db->resultSet();
  }
  public function addDataTugas($data)
  {
    $query = "INSERT INTO $this->table VALUES ('',:kelas, :judul, :desc, :deadline, :Status, :DateTime)";

    $this->db->query($query);
    $this->db->bind(':kelas', $data['kelas']);
    $this->db->bind(':judul', $data['judul']);
    $this->db->bind(':desc', $data['desc']);
    $this->db->bind(':deadline', $data['deadline']);
    $this->db->bind(':Status', $data['Status']);
    $this->db->bind(':DateTime', $data['DateTime']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function updateDataTugas($data)
  {
    $query = "UPDATE $this->table SET `judul` = :judul, `deskripsi` = :desc, `deadline` = :deadline WHERE `id_tugas` = :id_tugas";

    $this->db->query($query);
    $this->db->bind(':judul', $data['judul']);
    $this->db->bind(':desc', $data['desc']);
    $this->db->bind(':deadline', $data['deadline']);
    $this->db->bind(':id_tugas', $data['idTugas']);

    $this->db->execute();

    return $this->db->rowCount();
  }


  public function hapusDataTugas($id_tugas)
  {
    $query = "DELETE FROM $this->table WHERE id_tugas = :id_tugas";

    $this->db->query($query);
    $this->db->bind('id_tugas', $id_tugas);

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function addDataSoal($data)
  {
    
    $query = "INSERT INTO soal VALUES ('', :idTugas, :soal,:a, :b, :c, :d, :jwb)";
    $this->db->query($query);
    $this->db->bind(':idTugas', $data['idTugas']);
    $this->db->bind(':soal', "{$data["soal"]}");
    $this->db->bind(':a', "{$data["a"]}");
    $this->db->bind(':b', "{$data["b"]}");
    $this->db->bind(':c', "{$data["c"]}");
    $this->db->bind(':d', "{$data["d"]}");
    $this->db->bind(':jwb', "{$data["jwb"]}");

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function UpdStsTgs($data)
  {
    
    $query = "UPDATE $this->table SET `status` = 'Uploaded' WHERE `id_tugas` = :idTugas";
    $this->db->query($query);
    $this->db->bind(':idTugas',"$data");

    $this->db->execute();

    return $this->db->rowCount();
  }

  public function getTugasUser($id_kelas)
  {
    $this->db->query("SELECT * FROM tugas WHERE id_kelas = $id_kelas");
    return $this->db->resultSet();
  }
}