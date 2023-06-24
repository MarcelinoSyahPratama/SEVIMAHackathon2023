<?php 
class User_Model
{
  private $table = 'user';
  private $db;
  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllUser()
  {
    $this->db->query('SELECT * FROM ' . $this->table);
    return $this->db->resultSet();
  }
  public function addDataUser($data)
  {
    $query = "INSERT INTO $this->table VALUES ('', :username, :password, :role)";

    $this->db->query($query);
    $this->db->bind(':username', $data['username']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', $data['role']);

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