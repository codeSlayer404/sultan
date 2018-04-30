<?php
     class Siswa extends CI_Controller{
          function _construct(){
               parent:: _construct();
               $this->load->model('m_data');
          }

          function index(){
               $siswa = $this->db->get("data_siswa");

               $data["query"] = $siswa;
               $data["content"] = "pages/siswa_index";
               $this->load->view("template", $data);
          }

          function tambah(){
               $siswa = $this->db->get("data_siswa");

               $data["query"] = $siswa;
               $data["content"] = "pages/siswa_form";
               $this->load->view("template", $data);
          }
          function tambah_aksi(){
            $siswa = $this->db->get("data_siswa");
            $siswa_nisn = $this->input->post('nisn');
            $siswa_nis = $this->input->post('nis');
            $siswa_nama_lengkap = $this->input->post('nama_lengkap');
            $siswa_jk = $this->input->post('jenis_kel');
            $siswa_tempat_lahir = $this->input->post('tempat_lahir');
            $siswa_tanggal_lahir = $this->input->post('tanggal_lahir');
            $siswa_alamat = $this->input->post('alamat');
            $siswa_jurusan = $this->input->post('jurusan');

            $data = array(
              'nisn' => $siswa_nisn,
              'nis' => $siswa_nis,
              'nama_lengkap' => $siswa_nama_lengkap,
              'jenis_kel' => $siswa_jk,
              'tempat_lahir' => $siswa_tempat_lahir,
              'tanggal_lahir' => $siswa_tanggal_lahir,
              'alamat' => $siswa_alamat,
              'jurusan' => $siswa_jurusan
            );
            $this->db->insert('data_siswa',$data);
            redirect(base_url('index.php/siswa'));

          }


          function edit(){
               $siswa = $this->db->get("data_siswa");

               $data["query"] = $siswa;
               $data["content"] = "pages/v_edit";
               $this->load->view("template", $data);
          }
          function update(){
            $siswa = $this->db->get("data_siswa");
            $siswa_nisn = $this->input->post('nisn');
            $siswa_nis = $this->input->post('nis');
            $siswa_nama_lengkap = $this->input->post('nama_lengkap');
            $siswa_jk = $this->input->post('jenis_kel');
            $siswa_tempat_lahir = $this->input->post('tempat_lahir');
            $siswa_tanggal_lahir = $this->input->post('tanggal_lahir');
            $siswa_alamat = $this->input->post('alamat');
            $siswa_jurusan = $this->input->post('jurusan');

            $data = array(
              'nisn' => $siswa_nisn,
              'nis' => $siswa_nis,
              'nama_lengkap' => $siswa_nama_lengkap,
              'jenis_kel' => $siswa_jk,
              'tempat_lahir' => $siswa_tempat_lahir,
              'tanggal_lahir' => $siswa_tanggal_lahir,
              'alamat' => $siswa_alamat,
              'jurusan' => $siswa_jurusan
            );
            $this->db->update('data_siswa',$data);
            redirect(base_url('index.php/siswa'));

          }


          function hapus($siswa_id){
                $this->db->where('siswa_id',$siswa_id);
            		$this->db->delete('data_siswa');
            		redirect(base_url('index.php/siswa'));
            	}

          function laporan(){
             $siswa = $this->db->get("data_siswa");

               $data["query"] = $siswa;
               $data["content"] = "pages/cetak";
               $this->load->view("template", $data);
          }
      }
?>
