<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mydrive extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('DriveModel');
    $this->load->model('UserModel');
    if (!$this->session->userdata('logged_in')) {
      redirect('user/login');
    }
  }

  public function index($id_folder)
  {
    $file['file'] = $this->DriveModel->getfile_id_folder($id_folder);
    $file['getfolder'] = $this->DriveModel->getfolder();
    $file['folder_path'] = $this->DriveModel->getfolder_path();
    $file['folder'] = $this->DriveModel->getfolder_id($id_folder);
    $this->load->view('templates/log_header');
    $this->load->view('templates/side_navbar', $file);
    $this->load->view('mydrive/home', $file);
    $this->load->view('templates/footer');
    $this->load->view('templates/log_footer');
  }

  public function uploads($id_folder)
  {
    $file['folder'] = $this->DriveModel->getfolder_id($id_folder);
    $file['getfolder'] = $this->DriveModel->getfolder();
    $this->load->view('templates/log_header');
    $this->load->view('templates/side_navbar', $file);
    $this->load->view('mydrive/uploads', $file);
    $this->load->view('templates/footer');
    $this->load->view('templates/log_footer');
  }

  public function inFolder($id_folder)
  {
    $file['file'] = $this->DriveModel->getfile_id_folder($id_folder);
    $file['getfolder'] = $this->DriveModel->getfolder();
    $file['folder'] = $this->DriveModel->getfolder_id($id_folder);
    $this->load->view('templates/log_header');
    $this->load->view('templates/side_navbar', $file);
    $this->load->view('mydrive/in_folder', $file);
    $this->load->view('templates/footer');
    $this->load->view('templates/log_footer');
  }

  public function sharing($id_folder)
  {
    $file['file'] = $this->DriveModel->getfile_share();
    $file['getfolder'] = $this->DriveModel->getfolder();
    $file['folder'] = $this->DriveModel->getfolder_id($id_folder);
    $this->load->view('templates/log_header');
    $this->load->view('templates/side_navbar', $file);
    $this->load->view('mydrive/sharing', $file);
    $this->load->view('templates/footer');
    $this->load->view('templates/log_footer');
  }

  public function create($id_folder)
  {
    // time zone
    $now = date('Y-m-d H:i:s');
    $user_email = $this->session->userdata('email');
    $folder = $this->DriveModel->getfolder_id($id_folder);
    $ext = 'doc|docx|xls|xlsx|ppt|pptx|pdf|png|jpeg|gif|svg|rar|zip|mp3|mp4|php|html';

    foreach ($folder as $folder) {
      $folder['id_folder'];
      $folder['folder_name'];
    }

    if ($folder['folder_name'] == $user_email) {
      // dapatkan id_folder dari table folder
      foreach ($this->DriveModel->getfolder_id($id_folder) as $folder) {
        $folder['id_folder'];
        $folder['folder_name'];
      }
      $config['upload_path']        = './' . $user_email . '/';
    } else {
      $config['upload_path']        = './' . $user_email . '/' . $folder['folder_name'] . '/';
    }
    $config['allowed_types']        = $ext;
    $config['max_size']             = 0;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('file_name')) {
      foreach ($this->DriveModel->getfolder() as $id_folder) {
        redirect('/mydrive/uploads/' . $id_folder['id_folder']);
      }
    } else {
      $data = $this->upload->data();

      $file = array(
        'email'       => $user_email,
        'file_name'   => $data['file_name'],
        'file_type'   => $data['file_ext'],
        'file_size'   => $data['file_size'],
        'location'    => $config['upload_path'],
        'id_folder'   => $folder['id_folder'],
        'upload_time' => $now
      );
      // print_r($file);

      $this->DriveModel->insert_file($file);

      foreach ($this->DriveModel->getfolder() as $id_folder) {
        $id_folder['id_folder'];
      }
      foreach ($this->DriveModel->getfile() as $file_id) {
        foreach ($this->DriveModel->getfolder_id($file_id['id_folder']) as $id_dir) {
          $id_dir['id_folder'];
        }
      }

      if ($folder['folder_name'] == $user_email) {
        redirect('/mydrive/index/' . $id_dir['id_folder']);
      } else {
        redirect('/mydrive/infolder/' . $id_dir['id_folder']);
      }
    }
  }

  public function create_folder()
  {
    //membuat folder baru
    $email        = $this->session->userdata('email');
    $folder_name  = $this->input->post('folder_name');
    $path         = "./" . $email . "/" . $folder_name;
    $now          = date('Y-m-d H:i:s');
    $folder = array(
      'folder_name' => $folder_name,
      'make_time'   => $now,
      'path'        => $email
    );

    if (mkdir($path, 0777)) {
      // mkdir & chmod 777 hanya untuk linux jika windows 0777 dihapus
      chmod($path, 0777);
      $this->DriveModel->insert_folder($folder);

      foreach ($this->DriveModel->getfolder() as $id_folder) {
        redirect('/mydrive/index/' . $id_folder['id_folder']);
      }
    } else {
      echo "gagal";
    }
  }

  public function delete($id_file)
  {
    foreach ($this->DriveModel->getfile_id($id_file) as $file) {
      $file['id_file'];
      $file['id_folder'];
      $file['location'];
      $file['file_name'];
    }

    if (!$this->DriveModel->delete_file($file['id_file'])) {
      echo "gagal delete";
    } else {
      $delete = $file['location'] . $file['file_name'];
      if (!unlink($delete)) {
        echo "Error Deleting " . $file['file_name'];
      } else {
        if ($file['location'] != './' . $this->session->userdata('email') . '/') {
          foreach ($this->DriveModel->getfolder_id($file['id_folder']) as $id_dir) {
            redirect('/mydrive/infolder/' . $id_dir['id_folder']);
          }
        } else {
          foreach ($this->DriveModel->getfolder() as $id_folder) {
            redirect('/mydrive/index/' . $id_folder['id_folder']);
          }
        }
      }
    }
  }

  public function delete_folder($id_folder)
  {
    foreach ($this->DriveModel->getfolder_id($id_folder) as $folder) {
      foreach ($this->DriveModel->getfile_id_folder($folder['id_folder']) as $file) {
        $delete_file = $file['location'] . $file['file_name'];
        if (is_file($delete_file)) {
          unlink($delete_file);
          $this->DriveModel->delete_file_folder($folder['id_folder']);
        } else {
          echo "Error Deleting File " . $file['file_name'];
        }
      }
      $delete_dir = $folder['path'] . '/' . $folder['folder_name'];
      if (is_dir($delete_dir)) {
        rmdir($delete_dir);
        $this->DriveModel->delete_folder($folder['id_folder']);
        foreach ($this->DriveModel->getfolder() as $id_folder) {
          redirect('/mydrive/index/' . $id_folder['id_folder']);
        }
      } else {
        echo "Error Deleting " . $folder['folder_name'];
      }
    }
  }

  public function share($id_file)
  {
    if ($this->DriveModel->share_on($id_file)) {
      foreach ($this->DriveModel->getfile_id($id_file) as $file) {
        if ($file['location'] != './' . $this->session->userdata('email') . '/') {
          foreach ($this->DriveModel->getfolder_id($file['id_folder']) as $id_dir) {
            redirect('/mydrive/infolder/' . $id_dir['id_folder']);
          }
        } else {
          foreach ($this->DriveModel->getfolder() as $id_folder) {
            redirect('/mydrive/index/' . $id_folder['id_folder']);
          }
        }
      }
    } else {
      foreach ($this->DriveModel->getfile_id($id_file) as $file) {
        if ($file['location'] != './' . $this->session->userdata('email') . '/') {
          foreach ($this->DriveModel->getfolder_id($file['id_folder']) as $id_dir) {
            redirect('/mydrive/infolder/' . $id_dir['id_folder']);
          }
        } else {
          foreach ($this->DriveModel->getfolder() as $id_folder) {
            redirect('/mydrive/index/' . $id_folder['id_folder']);
          }
        }
      }
    }
  }

  public function notshare($id_file)
  {
    if ($this->DriveModel->share_off($id_file)) {
      foreach ($this->DriveModel->getfile_id($id_file) as $file) {
        if ($file['location'] != './' . $this->session->userdata('email') . '/') {
          foreach ($this->DriveModel->getfolder_id($file['id_folder']) as $id_dir) {
            redirect('/mydrive/infolder/' . $id_dir['id_folder']);
          }
        } else {
          foreach ($this->DriveModel->getfolder() as $id_folder) {
            redirect('/mydrive/index/' . $id_folder['id_folder']);
          }
        }
      }
    } else {
      foreach ($this->DriveModel->getfile_id($id_file) as $file) {
        if ($file['location'] != './' . $this->session->userdata('email') . '/') {
          foreach ($this->DriveModel->getfolder_id($file['id_folder']) as $id_dir) {
            redirect('/mydrive/infolder/' . $id_dir['id_folder']);
          }
        } else {
          foreach ($this->DriveModel->getfolder() as $id_folder) {
            redirect('/mydrive/index/' . $id_folder['id_folder']);
          }
        }
      }
    }
  }
}
