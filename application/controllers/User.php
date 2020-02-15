<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel');
    $this->load->model('DriveModel');
    $this->load->library('form_validation');
  }

  public function create()
  {
    $this->form_validation->set_rules('name', 'Name', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim|matches[password1]', ['matches' => 'Password not match!']);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password]');

    if ($this->form_validation->run() == false) {
      $this->register();
    } else {
      $user = array(
        'name'      => $this->input->post('name'),
        'email'     => $this->input->post('email'),
        'password'  => $this->input->post('password')
      );

      //membuat folder baru utk user baru
      // $path = "./" . $user['email'] . "/";
      $now = date('Y-m-d H:i:s');
      $folder = array(
        'folder_name' => $this->input->post('email'),
        'make_time'   => $now
        // 'path'        => $path
      );

      if (($this->UserModel->create($user)) && (mkdir($user['email'], 0777))) {
        // mkdir & chmod 777 hanya untuk linux jika windows 0777 dihapus
        chmod($user['email'], 0777);
        $this->DriveModel->insert_folder($folder);

        $this->session->set_flashdata('success', '<b>Registration Success!</b>');

        redirect('user/login');
      } else {
        $this->session->set_flashdata('failed', '<b>Registration Failed!</b>');
        redirect('user/register');
      }
    }
  }

  public function auth()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->login();
    } else {
      $email    = $this->input->post('email');
      $password = $this->input->post('password');

      $user     = $this->UserModel->findByEmail($email);
      $is_valid = $this->UserModel->auth($email, $password);

      if ($is_valid) {
        $data = array(
          'name'      => $user['name'],
          'email'     => $user['email'],
          'logged_in' => TRUE
        );

        $this->session->set_userdata($data);
        foreach ($this->DriveModel->getfolder() as $folder) {
          $folder['id_folder'];
        }

        if ('logged_in') {
          $this->session->set_flashdata('login', '<small class="text-success"><b>Login Success!</b></small>');
          redirect('/mydrive/index/' . $folder['id_folder']);
        }
      } else {
        if (!$user) {
          $this->session->set_flashdata('email_failed', '<small class="text-danger pl-3"><b>Email not found!</b></small>');
        } else if (!$is_valid) {
          $this->session->set_flashdata('pass_failed', '<small class="text-danger pl-3"><b>Wrong password!</b></small>');
        }
        redirect('user/login');
      }
    }
  }

  public function index()
  {
    $this->load->view('templates/log_header');
    $this->load->view('templates/navbar');
    $this->load->view('user/index');
    $this->load->view('templates/log_footer');
  }

  public function register()
  {
    if ($this->session->userdata('logged_in')) {
      redirect('user/login');
    } else {
      $this->load->view('templates/log_header');
      $this->load->view('user/user_register');
      $this->load->view('templates/log_footer');
    }
  }

  public function login()
  {
    $this->load->view('templates/log_header');
    $this->load->view('user/user_login');
    $this->load->view('templates/log_footer');
  }

  public function logout()
  {
    $userdata = array('email', 'name');
    $this->session->set_userdata('logged_in', 0);

    $this->session->unset_userdata($userdata);
    redirect('/user');
  }
}
