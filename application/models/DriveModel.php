<?php

class DriveModel extends CI_Model
{
  const TABLE_NAME = 'file';

  public function __constract()
  {
    parent::__constract();
    if (!$this->session->userdata('logged_in')) {
      redirect('user/login');
    }
  }

  public function insert_file($file)
  {
    return $this->db->insert($this::TABLE_NAME, $file);
  }

  public function insert_folder($folder)
  {
    return $this->db->insert('folder', $folder);
  }

  public function getfile()
  {
    $user_email = $this->session->userdata('email');
    return $this->db->get_where($this::TABLE_NAME, array('email' => $user_email))->result_array();
  }

  public function getfile_id($id_file)
  {
    return $this->db->get_where($this::TABLE_NAME, array('id_file' => $id_file))->result_array();
  }

  public function getfile_id_folder($id_folder)
  {
    return $this->db->order_by('file_name', 'ASC')->get_where($this::TABLE_NAME, array('id_folder' => $id_folder))->result_array();
  }

  public function getfile_share()
  {
    return $this->db->get_where($this::TABLE_NAME, array('share' => 1))->result_array();
  }

  public function getfolder()
  {
    $user_email = $this->session->userdata('email');
    return $this->db->get_where('folder', array('folder_name' => $user_email))->result_array();
  }

  public function getfolder_path()
  {
    $user_email = $this->session->userdata('email');
    return $this->db->get_where('folder', array('path' => $user_email))->result_array();
  }

  public function getfolder_id($id_folder)
  {
    return $this->db->get_where('folder', array('id_folder' => $id_folder))->result_array();
  }

  public function delete_file($id_file)
  {
    return $this->db->delete($this::TABLE_NAME, array('id_file' => $id_file));
  }

  public function delete_file_folder($id_folder)
  {
    return $this->db->delete($this::TABLE_NAME, array('id_folder' => $id_folder));
  }

  public function delete_folder($id_folder)
  {
    return $this->db->delete('folder', array('id_folder' => $id_folder));
  }

  public function share_on($id_file)
  {
    $share = 1;
    $this->db->set('share', $share);
    $this->db->where('id_file', $id_file);
    $this->db->update($this::TABLE_NAME);
  }

  public function share_off($id_file)
  {
    $share = 0;
    $this->db->set('share', $share);
    $this->db->where('id_file', $id_file);
    $this->db->update($this::TABLE_NAME);
  }
}
