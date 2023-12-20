<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bencana extends Operator_Controller
{

  public function __construct()
  {
    parent::__construct();

    /* Load :: Common */
    $this->load->helper('number');
    $this->load->model('operator/m_bencana');
    $this->data['module'] = "operator/bencana/";
  }

  public function index()
  {

    $this->page_title->push(lang('menu_bencana'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $this->data['bencana'] = $this->m_bencana->get_data();

    /* Load Template */
    // print_r($this->data['bencana']);
    $this->template->operator_render('operator/bencana/v_bencana_index', $this->data);
  }

  public function detail($id)
  {
    $this->page_title->push(lang('menu_bencana'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['bencana'] = $this->m_bencana->get_detail($id);
    $this->data['lainnya'] = $this->m_bencana->get_lainnya($id);
    $this->data['pengungsi'] = $this->m_bencana->get_pengungsi($id);
    $this->data['petugas'] = $this->m_bencana->get_petugas($id);
    $this->data['kerusakan'] = $this->m_bencana->get_kerusakan($id);
    $this->data['peralatan'] = $this->m_bencana->get_peralatan($id);
    $this->data['korban'] = $this->m_bencana->get_korban($id);
    $this->data['foto'] = $this->m_bencana->get_foto($id);
    $this->load->model('operator/m_chain_wilayah');
    $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();

    $this->data['properties'] = $this->m_bencana->getProperty();
    // datamodal
    $this->load->model('operator/m_petugas');
    $this->data['mdl_petugas'] = $this->m_petugas->get_data();
    $this->load->model('operator/m_peralatan');
    $this->data['mdl_peralatan'] = $this->m_peralatan->get_data();
    $this->template->operator_render('operator/bencana/v_bencana_detail', $this->data);
  }
  public function delete($id)
  {
    $proses = $this->m_bencana->delete($id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));
    }
    redirect('operator/bencana');
  }

  public function add_bencana()
  {
    $this->form_validation->set_rules('jenis', 'Jenis Bencana', 'required');
    $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
    $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    $this->form_validation->set_rules('idkecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('iddesa', 'Desa', 'required');
    $this->form_validation->set_rules('iddusun', 'Dusun', 'required');
    $this->form_validation->set_rules('bujur', 'Bujur Timur', 'required');
    $this->form_validation->set_rules('lintang', 'Lintang Selatan', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');




    if (true == $this->form_validation->run()) {
      $hari = array(
        1 =>    'Senin',
        'Selasa',
        'Rabu',
        'Kamis',
        'Jumat',
        'Sabtu',
        'Minggu'
      );
      $data = array(
        'bencanaIdJenisBencana'               => $this->input->post('jenis'),
        'bencanaTgl'  => date('Y-m-d', strtotime($this->input->post('tanggal'))),
        'bencanaWaktu' => $this->input->post('waktu'),
        'bencanaIdKecamatan' => $this->input->post('idkecamatan'),
        'bencanaIdDesa' => $this->input->post('iddesa'),
        'bencanaIdDusun' => $this->input->post('iddusun'),
        'bencanaNamaKampung' => $this->input->post('namakampung'),
        'bencanaBt'     => $this->input->post('bujur'),
        'bencanaLs'     => $this->input->post('lintang'),

        // lapor
        'bencanaLaporNama' => $this->input->post('nama_pelapor'),
        'bencanaLaporTelp' => $this->input->post('telp_pelapor'),
        'bencanaLaporInstansi' => $this->input->post('instansi_pelapor'),
        'bencanaLaporNoSurat' => $this->input->post('no_surat_pelapor'),
        'bencanaLaporTglSurat' => $this->input->post('tanggal_surat_pelapor'),

        'bencanaHari' => $hari[date('N', strtotime($this->input->post('tanggal')))],
        // 'bencanaFoto1' => $foto1,
        // 'bencanaFoto2' => $foto2,
        // 'bencanaFoto3' => $foto3,   


      );
      if ($data['bencanaIdJenisBencana'] != null) {
        $proses = $this->m_bencana->add($data);
      }



      /* Conf */
      $config['upload_path']      = './upload/foto_bencana/';
      $config['allowed_types']    = 'jpeg|jpg|png';
      $config['max_size']         = 5000;
      // $config['max_width']        = 1024;
      // $config['max_height']       = 1024;
      $config['file_ext_tolower'] = TRUE;

      $this->load->library('upload', $config);
      // add photo
      if ($this->upload->do_upload('foto')) {
        /* Data */
        $this->data['upload_data'] = $this->upload->data();
        $data = array(
          'foto_bencanaNama' => $this->upload->data('file_name'),
          'foto_bencanaIdBencana' => $proses,
          'foto_bencanaSize' => $this->upload->data('file_size'),
          'foto_bencanaType' => $this->upload->data('file_ext'),
          'foto_bencanaPath' => base_url('upload/foto_bencana/' . $this->upload->data('file_name'))
        );
        $this->m_bencana->add_foto($data);
      }
      if ($proses) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      } else {
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));
      }
      redirect($this->data['module']);
    } else {

      $this->load->model('operator/m_chain_wilayah');
      $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();

      $this->page_title->push(lang('menu_bencana'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah bencana';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['bencana'] = $this->m_bencana->get_data();
      $this->data['jen_ben'] = $this->db->get('jenisbencana')->result();
      $this->data['subtitle'] = "Tambah bencana";
      $this->template->operator_render('operator/bencana/v_bencana_add', $this->data);
      // $this->load->view('operator/bencana/v_findcoordinate');
    }
  }


  public function pilih_desa()
  {
    $this->load->model('operator/m_chain_wilayah');
    $data['desa'] = $this->m_chain_wilayah->get_desa($this->uri->segment(4));
    $this->load->view('operator/bencana/v_dropdown_desa', $data);
  }

  // dijalankan saat kecamatan di klik
  public function pilih_dusun()
  {
    $this->load->model('operator/m_chain_wilayah');
    $data['dusun'] = $this->m_chain_wilayah->get_dusun($this->uri->segment(4));
    $this->load->view('operator/bencana/v_dropdown_dusun', $data);
  }

  public function setLocToMaps($idDusun)
  {
    $getLoc = $this->db->query('SELECT dusunNama, desaNama, kecamatanNama FROM dusun JOIN desa ON desa.`iddesa`=dusun.`dusunIdDesa` JOIN kecamatan ON kecamatan.`idkecamatan`=desa.`desaIdKecamatan` WHERE iddusun=' . $idDusun)->result();

    return json_encode($getLoc);
  }


  public function ajax()
  {
    if ($this->input->get('tampil') == "petugas") {
      $this->load->model('operator/m_petugas');
      $data['petugas'] = $this->m_petugas->get_data();
      $this->load->view('operator/bencana/v_ajax_petugas', $data);
    }
  }
  // end ajax


  public function update_lokasi($id)
  {
    $data = array(
      'bencanaIdKecamatan' => $this->input->post('idkecamatan'),
      'bencanaIdDesa' => $this->input->post('iddesa'),
      'bencanaIdDusun' => $this->input->post('iddusun'),
      'bencanaNamaKampung' => $this->input->post('namakampung'),
      'bencanaBt' => $this->input->post('bujur'),
      'bencanaLs' => $this->input->post('lintang'),
    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  public function update_penyebab($id)
  {
    $data = array(
      'bencanaPenyebab' => $this->input->post('penyebab'),
    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  public function update_kronologi($id)
  {
    $data = array(
      'bencanaKronologi' => $this->input->post('kronologi'),
    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  /* Update Saddam 31-03-2018 */
  public function update_ancaman($id)
  {
    $data = array(
      'bencanaAncaman' => $this->input->post('bencanaAncaman')
    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  /* End Update Saddam */

  public function update_kendala($id)
  {
    $data = array(
      'bencanaKendala' => $this->input->post('kendala'),
    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  public function update_pelapor($id)
  {
    $data = array(
      'bencanaLaporNama' => $this->input->post('nama_pelapor'),
      'bencanaLaporTelp' => $this->input->post('telp_pelapor'),
      'bencanaLaporInstansi' => $this->input->post('instansi_pelapor'),

    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  public function update_lain($id)
  {
    $data = array(
      'bencanaRskJalan' => $this->input->post('jalan'),
      'bencanaRskJembatan' => $this->input->post('jembatan'),
      'bencanaRskSawah' => $this->input->post('sawah'),
      'bencanaRskKebun' => $this->input->post('kebun'),
      'bencanaRskKolam' => $this->input->post('kolam'),
      'bencanaRskIrigasi' => $this->input->post('irigasi'),

      'bencanaRskJalanKet' => $this->input->post('jalanKet'),
      'bencanaRskJembatanKet' => $this->input->post('jembatanKet'),
      'bencanaRskSawahKet' => $this->input->post('sawahKet'),
      'bencanaRskKebunKet' => $this->input->post('kebunKet'),
      'bencanaRskKolamKet' => $this->input->post('kolamKet'),
      'bencanaRskIrigasiKet' => $this->input->post('irigasiKet'),

    );
    $proses = $this->m_bencana->update($data, $id);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $id);
  }

  public function update_petugas()
  {
    $idbencana = $this->input->get('idbencana');
    $data = array(
      'bpidpetugas' => $this->input->get('idpetugas'),
      'bpidbencana' => $idbencana
    );
    $proses = $this->db->insert('bencana_petugas', $data);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $idbencana);
  }
  public function delete_petugas()
  {
    $idbencana = $this->input->get('idbencana');
    $idpetugas = $this->input->get('idpetugas');
    $proses = $this->db->where('bpidbencana', $idbencana)->where('bpidpetugas', $idpetugas)->delete('bencana_petugas');
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $idbencana);
  }



  // korban jiwa
  public function korban_jiwa($id)
  {

    $this->page_title->push(lang('menu_korban_jiwa'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $this->data['korban'] = $this->m_bencana->get_korban($id);
    $this->data['bencana'] = $this->m_bencana->get_detail($id);

    /* Load Template */
    // print_r($this->data['bencana']);
    $this->template->operator_render('operator/bencana/v_korban_bencana_index', $this->data);
  }

  public function add_korban_jiwa($idbencana)
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('usia', 'Usia', 'required');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('kondisi', 'Kondisi', 'required');
    $this->form_validation->set_rules('idkecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('iddesa', 'Desa', 'required');
    $this->form_validation->set_rules('iddusun', 'Dusun', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');

    if (true == $this->form_validation->run()) {
      $data = array(
        'korbanNama'               => $this->input->post('nama'),
        'korbanUsia'  => $this->input->post('usia'),
        'korbanJk' => $this->input->post('jk'),
        'korbanIdKecamatan' => $this->input->post('idkecamatan'),
        'korbanIdDesa' => $this->input->post('iddesa'),
        'korbanIdDusun' => $this->input->post('iddusun'),
        'korbanIdBencana' => $idbencana,
        'korbanKondisi' => $this->input->post('kondisi'),

      );

      $proses = $this->m_bencana->add_korban($data);


      if ($proses) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      } else {
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));
      }
      redirect($this->data['module'] . 'korban_jiwa/' . $idbencana);
    } else {

      $this->load->model('operator/m_chain_wilayah');
      $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();

      $this->page_title->push(lang('menu_korban_jiwa'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah korban jiwa';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);
      $this->data['subtitle'] = "Tambah korban jiwa";
      $this->template->operator_render('operator/bencana/v_korban_jiwa_add', $this->data);
    }
  }

  public function delete_korban()
  {
    $idbencana = $this->input->get('bencana');
    $idkorban = $this->input->get('korban');
    $proses = $this->db->where('idkorban', $idkorban)->delete('korban');
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus'));
    }
    redirect($this->data['module'] . 'korban_jiwa/' . $idbencana);
  }

  public function kerusakan($id)
  {

    $this->page_title->push(lang('kerusakan'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $this->data['kerusakan'] = $this->m_bencana->get_kerusakan($id);
    $this->data['bencana'] = $this->m_bencana->get_detail($id);

    /* Load Template */
    // print_r($this->data['bencana']);
    $this->template->operator_render('operator/bencana/v_kerusakan_index', $this->data);
  }

  public function add_kerusakan($idbencana)
  {
    $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required');
    $this->form_validation->set_rules('alamat_pemilik', 'Alamat Pemilik', 'required');
    $this->form_validation->set_rules('idkecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('iddesa', 'Desa', 'required');
    $this->form_validation->set_rules('iddusun', 'Dusun', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');

    if (true == $this->form_validation->run()) {
      $data = array(
        'kerusakanNamaPemilik' => $this->input->post('nama_pemilik'),
        'kerusakanAlamatPemilik'  => $this->input->post('alamat_pemilik'),
        'kerusakanKontakPemilik' => $this->input->post('kontak_pemilik'),
        'kerusakanProperti' => $this->input->post('properti'),
        'kerusakanTingkatRusak' => $this->input->post('tingkat_rusak'),
        'kerusakanIdKecamatan' => $this->input->post('idkecamatan'),
        'kerusakanIdDesa' => $this->input->post('iddesa'),
        'kerusakanIdDusun' => $this->input->post('iddusun'),
        'kerusakanIdBencana' => $idbencana,
        'kerusakanKerugian' => $this->input->post('kerugian'),
      );
      // // Dummy data
      // $data["kerusakanIdKecamatan"] = "25";    
      // $data["kerusakanIdDesa"] = "82";    
      // $data["kerusakanIdDusun"] = "583";    

      $proses = $this->m_bencana->add_kerusakan($data);


      if ($proses) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      } else {
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));
      }
      redirect($this->data['module'] . 'kerusakan/' . $idbencana . '/sukses');
    } else {

      $this->load->model('operator/m_chain_wilayah');
      $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();

      $this->page_title->push(lang('kerusakan'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah Kerusakan';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);
      $this->data['properti'] = $this->m_bencana->get_properti();
      $this->data['tingkat_rusak'] = $this->m_bencana->get_tingkat_rusak();
      $this->data['subtitle'] = "Tambah Kerusakan";
      $this->template->operator_render('operator/bencana/v_kerusakan_add', $this->data);
    }
  }

  public function delete_kerusakan()
  {
    $idbencana = $this->input->get('bencana');
    $idkerusakan = $this->input->get('kerusakan');
    $proses = $this->db->where('idkerusakan', $idkerusakan)->delete('kerusakan');
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus'));
    }
    redirect($this->data['module'] . 'kerusakan/' . $idbencana . '/sukses');
  }

  // end kerusakan

  // peralatan

  public function add_peralatan()
  {
    $idbencana = $this->input->post('idbencana');
    $data = array(
      'bpIdPeralatan' => $this->input->post('idperalatan'),
      'bpIdBencana' => $idbencana,
      'bpJml' => $this->input->post('jml_tambah')
    );
    $proses = $this->db->insert('bencana_peralatan', $data);
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $idbencana);
  }
  public function delete_peralatan()
  {
    $idbencana = $this->input->get('idbencana');
    $idperalatan = $this->input->get('idperalatan');
    $proses = $this->db->where('bpIdBencana', $idbencana)->where('bpIdPeralatan', $idperalatan)->delete('bencana_peralatan');
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $idbencana);
  }

  // pengungsi
  public function pengungsi($id)
  {

    $this->page_title->push(lang('pengungsi'));
    $this->data['pagetitle'] = $this->page_title->show();

    /* Breadcrumbs */
    $this->data['breadcrumb'] = $this->breadcrumbs->show();

    $this->data['pengungsi'] = $this->m_bencana->get_pengungsi($id);
    $this->data['bencana'] = $this->m_bencana->get_detail($id);

    /* Load Template */
    // print_r($this->data['bencana']);
    $this->template->operator_render('operator/bencana/v_pengungsi_index', $this->data);
  }

  public function add_pengungsi($idbencana)
  {
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('usia', 'Usia', 'required');
    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
    $this->form_validation->set_rules('idkecamatan', 'Kecamatan', 'required');
    $this->form_validation->set_rules('iddesa', 'Desa', 'required');
    $this->form_validation->set_rules('iddusun', 'Dusun', 'required');
    $this->form_validation->set_rules('lokasi', 'Lokasi Mengungsi', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');

    if (true == $this->form_validation->run()) {
      $data = array(
        'pengungsiNama'               => $this->input->post('nama'),
        'pengungsiUsia'  => $this->input->post('usia'),
        'pengungsiJk' => $this->input->post('jk'),
        'pengungsiIdKecamatan' => $this->input->post('idkecamatan'),
        'pengungsiIdDesa' => $this->input->post('iddesa'),
        'pengungsiIdDusun' => $this->input->post('iddusun'),
        'pengungsiIdBencana' => $idbencana,
        'pengungsiLokasi' => $this->input->post('lokasi'),

      );

      $proses = $this->m_bencana->add_pengungsi($data);


      if ($proses) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      } else {
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));
      }
      redirect($this->data['module'] . 'pengungsi/' . $idbencana);
    } else {

      $this->load->model('operator/m_chain_wilayah');
      $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();

      $this->page_title->push(lang('pengungsi'));
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah Pengungsi';
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['bencana'] = $this->m_bencana->get_detail($idbencana);
      $this->data['subtitle'] = "Tambah Pengungsi";
      $this->template->operator_render('operator/bencana/v_pengungsi_add', $this->data);
    }
  }

  public function delete_pengungsi()
  {
    $idbencana = $this->input->get('bencana');
    $idpengungsi = $this->input->get('pengungsi');
    $proses = $this->db->where('idpengungsi', $idpengungsi)->delete('pengungsi');
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus'));
    }
    redirect($this->data['module'] . 'pengungsi/' . $idbencana);
  }

  // end pengungsi


  //  foto
  public function add_foto($idbencana)
  {
    /* Conf */
    $config['upload_path']      = './upload/foto_bencana/';
    $config['allowed_types']    = 'jpeg|jpg|png';
    $config['max_size']         = 5000;
    // $config['max_width']        = 1024;
    // $config['max_height']       = 1024;
    $config['file_ext_tolower'] = TRUE;

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('foto')) {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan. Error:' . $this->upload->display_errors()));
      redirect($this->data['module'] . 'detail/' . $idbencana);
    } else {
      /* Data */
      $this->data['upload_data'] = $this->upload->data();
      $data = array(
        'foto_bencanaNama' => $this->upload->data('file_name'),
        'foto_bencanaIdBencana' => $idbencana,
        'foto_bencanaSize' => $this->upload->data('file_size'),
        'foto_bencanaType' => $this->upload->data('file_ext'),
        'foto_bencanaPath' => base_url('upload/foto_bencana/' . $this->upload->data('file_name'))
      );
      $this->m_bencana->add_foto($data);
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      redirect($this->data['module'] . 'detail/' . $idbencana);
    }
  }
  public function delete_foto($id)
  {
    $proses = $this->db->where('idfoto_bencana', $id)->delete('foto_bencana');
    unlink("./upload/foto_bencana/" . $this->input->get("nama_gambar"));
    if ($proses) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    } else {
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));
    }
    redirect($this->data['module'] . 'detail/' . $this->input->get('bencana'));
  }

  public function export_laporan()
  {
    $month = array(
      1 => "Januari",
      2 => "Februari",
      3 => "Maret",
      4 => "April",
      5 => "Mei",
      6 => "Juni",
      7 => "Juli",
      8 => "Agustus",
      9 => "September",
      10 => "Oktober",
      11 => "November",
      12 => "Desember"
    );

    $this->load->model('operator/m_penanganan');
    $this->load->model('operator/m_bencana');

    $input_bln = $this->input->post('bulan');
    $input_thn = $this->input->post('tahun');
    $format = $this->input->post("format");
    if ($format == "excel") {
      $this->data['title'] = "Laporan Kejadian Bencana Bulan " . $month[$input_bln] . " " . $input_thn;
      $this->data['bencana'] = $this->m_bencana->get_by_month($input_bln, $input_thn);
      $this->load->view("operator/bencana/export_excel", $this->data);
    } else {
      if ($input_bln == "" && $input_thn = "") {
        $s = $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Bulan dan tahun diperlukan untuk memfilter data.'));
        redirect(base_url($this->data['module']));
      }


      $this->data['title'] = "Laporan Bulanan Kejadian Bencana";
      $this->data['bencana'] = $this->m_bencana->get_by_month($input_bln, $input_thn);


      $this->load->view('operator/bencana/v_laporan', $this->data);
      // print_r($this->data['bencana']);
      die();
    }
  }

  function updateKerugian($idbencana = null)
  {
    if (null != $idbencana) {
      $value = $this->input->post("value");
      $update = $this->db->update("bencana", array("bencanaTotalKerugian" => $value), array("idbencana" => $idbencana));
      if ($update) {
        echo "ok";
      } else {
        echo "Data Gagal Diupdate";
      }
    } else {
      echo "Invalid Parameter";
    }
  }

  function hitungKerugian($idbencana = null)
  {
    if (null != $idbencana) {
      $totalKerugian = 0;
      // Total Semua kerusakan
      $kerusakan = $this->db->select("IFNULL(SUM(kerusakanKerugian),0) as totalKerusakan")->where("kerusakanIdBencana", $idbencana)->get("kerusakan")->result();
      $totalKerusakan = $kerusakan[0]->totalKerusakan;
      // Total Kerusakan lainnya
      $kerusakan_lain = $this->db->select("IFNULL(SUM(kerugian),0) as totalKerusakanLain")->where("bencana", $idbencana)->get("kerusakan_lain")->result();
      $totalKerusakanLain = $kerusakan_lain[0]->totalKerusakanLain;
      $totalKerugian = $totalKerusakan + $totalKerusakanLain;

      $update = $this->db->update("bencana", array("bencanaTotalKerugian" => $totalKerugian), array("idbencana" => $idbencana));
      if ($update) {
        redirect(site_url("operator/bencana/detail/" . $idbencana));
      } else {
        echo "Data Gagal Diupdate";
      }
    } else {
      echo "Invalid Parameter";
    }
  }

  function add_lainnya($idbencana)
  {
    $post = $this->input->post();
    if (count($post) > 0) {
      $datainsert = array(
        "bencana" => $idbencana,
        "nama" => $post['nama'],
        "satuan" => $post['satuan'],
        "keterangan" => $post['keterangan'],
        "kerugian" => $post['kerugian'],
      );
      $this->db->insert("kerusakan_lain", $datainsert);
    }
    redirect(site_url("operator/bencana/detail/" . $idbencana));
  }

  function delete_kerusakan_lain($id)
  {
    $this->db->delete("kerusakan_lain", array("idkerusakan_lain" => $id));
    redirect(site_url("operator/bencana/detail/" . $id));
  }

  public function findcoordinatebencana()
  {
    $this->load->view('operator/bencana/v_findcoordinate_leaflet');
  }
  // end class
}
