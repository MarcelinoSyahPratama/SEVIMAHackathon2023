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
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }
  public function addDataTugas($data)
  {
    $query = "INSERT INTO $this->table VALUES ('',:idguru, :judul, :desc, :deadline, :Status, :DateTime)";

    $this->db->query($query);
    $this->db->bind(':idguru', $data['idguru']);
    $this->db->bind(':judul', $data['judul']);
    $this->db->bind(':desc', $data['desc']);
    $this->db->bind(':deadline', $data['deadline']);
    $this->db->bind(':Status', $data['Status']);
    $this->db->bind(':DateTime', $data['DateTime']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function updateDataUser($data)
  {
    $query = "UPDATE $this->table SET `Username` = :username, `Password` = :password, `Role` = :role WHERE `id_user` = :id_user";

    $this->db->query($query);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', $data['role']);
    $this->db->bind(':id_user', $data['id_user']);

    $this->db->execute();

    return $this->db->rowCount();
  }


  public function hapusDataUser($id_user)
  {
    $query = "DELETE FROM $this->table WHERE id_user = :id_user";

    $this->db->query($query);
    $this->db->bind('id_user', $id_user);

    $this->db->execute();

    return $this->db->rowCount();
  }
}