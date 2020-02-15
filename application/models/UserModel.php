<?php

class UserModel extends CI_Model
{
  const TABLE_NAME = 'member';

  public function __constract()
  {
    parent::__constract();

    $this->load->database();
  }

  public function create($user)
  {
    $user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
    return $this->db->insert($this::TABLE_NAME, $user);
  }

  public function findAll()
  {
    return $this->db->get($this::TABLE_NAME)->row_array();
  }

  public function findByEmail($email)
  {
    return $this->db->get_where($this::TABLE_NAME, array('email' => $email))->row_array();
  }

  public function auth($email, $password)
  {
    $user = $this->findByEmail($email);

    if (!$user) {
      return false;
    }
    return password_verify($password, $user['password']);
  }
}
