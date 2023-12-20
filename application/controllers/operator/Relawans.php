<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relawans extends Operator_Controller {

  private $params = array();

  public function __construct()
  {
    parent::__construct();

    /* Load :: Common */
    $this->load->helper('number');
    $this->load->model('operator/m_relawans');
    $this->data['module'] = "operator/relawans/";
    $this->getparams();
  }

  function getparams(){
    $this->params['sql'] = "
      SELECT
      r.*,
      d.`dusunNama`,
      de.`desaNama`,
      k.`kecamatanNama`,
      pend.`refPendNama`,
      ro.`orgNama`
    FROM
      relawan AS r
      LEFT JOIN ref_pendidikan AS pend
        ON r.`relIdPend` = pend.`idRefPend`
      LEFT JOIN dusun AS d
        ON d.`iddusun` = r.`relIdDusun`
      LEFT JOIN desa AS de
        ON de.`iddesa` = r.`relIdDesa`
      LEFT JOIN kecamatan AS k
        ON k.`idkecamatan` = r.`relIdKec`
      LEFT JOIN rel_organisasi AS ro 
        ON ro.`idOrg` = r.`relIdOrg`";
  }


  public function index(){
    $this->page_title->push('Relawan');
    $this->data['pagetitle'] = $this->page_title->show();
    // $this->data['modal_title'] = 'Tambah relawan';

    /* Breadcrumbs */
    $this->data['selected_keahlian'] = $this->uri->segment(4);
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['keahlian'] = $this->db->order_by("idKeahlian")->get("ref_keahlian")->result();
    // $this->data['relawan'] = $this->m_relawans->get_data();
    /* Load Template */
    $this->template->operator_render('operator/referensi/v_relawan_index', $this->data);
  }

  function getData( $keahlian = null ){
    $sql = $this->params['sql'];
    if(isset($keahlian)){
      $sql .= " WHERE idrel IN (SELECT idRel FROM rel_keahlian WHERE idKeahlian = '".$keahlian."')";
    }
    $sql = "SELECT * FROM ( ".$sql." ) as A";
    $count_all = $this->db->query( $sql )->num_rows();
    $post = $this->input->post();

    // Add Filter data
    $value = @$post['search']['value'];
    
    if($value != ""){
      $sql .= " WHERE ";
      $sql .= "relNama LIKE '%".$this->db->escape_like_str($value)."%' ESCAPE '!' OR ";
      $sql .= "relNik LIKE '%".$this->db->escape_like_str($value)."%' ESCAPE '!' OR ";
      $sql .= "relAlamat LIKE '%".$this->db->escape_like_str($value)."%' ESCAPE '!' OR ";
      $sql .= "refPendNama LIKE '%".$this->db->escape_like_str($value)."%' ESCAPE '!' OR ";
      $sql .= "orgNama LIKE '%".$this->db->escape_like_str($value)."%' ESCAPE '!' OR ";
      $sql .= "relTelp LIKE '%".$this->db->escape_like_str($value)."%' ESCAPE '!' OR ";
      $sql = substr($sql,0, (strlen($sql) - 3) );
      $count_all = $this->db->query( $sql )->num_rows();
    }

    // Order Data
    if( @$post['order'][0]['column'] ){
      // Get Column Name
      $fieldselect = array();
      $fieldselect["relNama"] = "relNama";
      $fieldselect["relNik"] = "relNik";
      $fieldselect["relAlamat"] = "relAlamat";
      $fieldselect["refPendNama"] = "refPendNama";
      $fieldselect["orgNama"] = "orgNama";
      $fieldselect["keahlian"] = "keahlian";
      $fieldselect["relTelp"] = "relTelp";
      // $fieldselect["action"] = "action";
      
      $orderColumn = array_keys(array_slice($fieldselect, $post['order'][0]['column'], 1));
      $ordercol = $orderColumn[0];
      $sql .= " ORDER BY ".$ordercol. " " . $post['order'][0]['dir'] . " ";
    } else {
      if( isset($this->params['order']) ){
        $sql .= " ORDER BY " . $this->params['order'];
      }
    }
    
    if( !isset($post['start']) || !isset($post['length']) ){
      $post['start'] = 1;
      $post['length'] = 20;
      $post['draw'] = TRUE;
    }
    
    $sql .= " LIMIT " . $post['start'] . "," . $post['length'];
    $query = $this->db->query( $sql )->result_array();
    $count_filtered = $count_all;

    $seq = $post['start'];
    $datalist = array();
    

    // Start the Loop
    foreach($query as $data){
      $seq++;
      $keahlian = $this->m_relawans->getKeahlianRelawan($data['idrel']);
      $mylist = array(
        'seq' => $seq,
        'relNama' => $data['relNama'],
        'relNik' => $data['relNik'],
        'relAlamat' => $data['relAlamat'],
        'refPendNama' => $data['refPendNama'],
        'orgNama' => $data['orgNama'],
        'keahlian' => $keahlian,
        'relTelp' => $data['relTelp']
      );
      $_cmddetail = "<a href='".base_url($this->data['module'].'edit/'.$data['idrel'])."' class='btn btn-sm btn-warning'>Edit</a>";
      $_cmddetail .= '<button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-hapus'.$data['idrel'].'">Hapus</button>   
                      <!-- modal  -->
                      <div class="modal fade" id="modal-hapus'.$data['idrel'].'">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Hapus data?</h4>
                              </div>
                              <div class="modal-body">
                                <p>Apa anda yakin ingin menghapus data ini?</p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                <a href="'.base_url($this->data['module'].'delete/'.$data['idrel']).'" type="button" class="btn btn-danger">Hapus</a>
                              </div>
                            </div>
                            <!-- /.modal-content -->
                          </div>
                          <!-- /.modal-dialog -->
                        </div>';
      $mylist['action'] = '<div class="btn-group" role="group">'.$_cmddetail.'</div>';
      $datalist[] = (object) $mylist;
    }
    // echo "<pre>";print_r($datalist);echo "</pre>";exit;
    // $post['draw'] = 1;
    $output = (object) array(
      "draw" => $post['draw'],
      "recordsTotal" => $count_all,
      "recordsFiltered" => $count_filtered,
      "data" => $datalist,
      // "error" => $sql
    );
    echo json_encode($output);
  }

  public function add(){
    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');
    if (true == $this->form_validation->run()){                  
      $data = array(
        'relNama'               => $this->input->post('nama'),
        'relNik'                => $this->input->post('nik'),
        'relIdDusun'                => $this->input->post('iddusun'),
        'relIdDesa'                => $this->input->post('iddesa'),
        'relIdKec'                => $this->input->post('idkecamatan'),
        'relAlamat'                => $this->input->post('alamat'),
        'relRtRw'                => $this->input->post('rtrw'),
        'relTelp'                => $this->input->post('telp'),
        'relIdPend'                => $this->input->post('pend'),    
        'relIdOrg'                => $this->input->post('org')
      );        
      $this->db->insert('relawan',$data);
      $new_id = $this->db->insert_id();
      $keahlian = $this->input->post('keahlian');
      for ($i=0; $i < count($keahlian) ; $i++) { 
        $params = array('idRel' => $new_id , 'idKeahlian' => $keahlian[$i] );
        $this->db->insert('rel_keahlian', $params);
      }

      if (!empty($new_id)) {
        $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil ditambahkan'));
      }else{
        $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal ditambahkan'));            
      }
      redirect($this->data['module']);
    }else{
      $this->load->model('operator/m_chain_wilayah');
      $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();                    
      

      $this->page_title->push('Data Relawan');
      $this->data['pagetitle'] = $this->page_title->show();
      $this->data['modal_title'] = 'Tambah relawan';
      $this->breadcrumbs->unshift(1, lang('menu_files'), 'operator/files');            
      $this->data['breadcrumb'] = $this->breadcrumbs->show();
      $this->data['relawan'] = $this->m_relawans->get_data();
      $this->data['organisasi'] = $this->m_relawans->get_org();
      $this->data['pendidikan'] = $this->m_relawans->get_pend();   
      $this->data['keahlian'] = $this->m_relawans->get_keahlian();                                    
      $this->data['subtitle'] = "Tambah relawan";
      $this->template->operator_render('operator/referensi/v_relawan_add', $this->data);
    }

  }

  public function pilih_desa(){
   $this->load->model('operator/m_chain_wilayah');
   $data['desa']=$this->m_chain_wilayah->get_desa($this->uri->segment(4));
   $this->load->view('operator/bencana/v_dropdown_desa',$data);
 }

      // dijalankan saat kecamatan di klik
 public function pilih_dusun(){
   $this->load->model('operator/m_chain_wilayah');
   $data['dusun']=$this->m_chain_wilayah->get_dusun($this->uri->segment(4));
   $this->load->view('operator/bencana/v_dropdown_dusun',$data);
 }    

 public function edit($id){
  $this->form_validation->set_rules('nama', 'Nama', 'required');
  $this->form_validation->set_error_delimiters('<div style="color:#FF0000;" class="help-block inline">', '</div>');

  if (true == $this->form_validation->run()){                  
    $data = array(
      'relNama'               => $this->input->post('nama'),
      'relNik'                => $this->input->post('nik'),
      'relIdDusun'            => $this->input->post('iddusun'),
      'relIdDesa'                => $this->input->post('iddesa'),
      'relIdKec'                => $this->input->post('idkecamatan'),
      'relAlamat'                => $this->input->post('alamat'),
      'relRtRw'                => $this->input->post('rtrw'),
      'relTelp'                => $this->input->post('telp'),
      'relIdPend'                => $this->input->post('pend'),    
      'relIdOrg'                => $this->input->post('org')
    );        
    $this->db->update('relawan',$data, array("idrel" => $id));
    $this->db->where('idRel',$id)->delete('rel_keahlian');
    $keahlian = $this->input->post('keahlian');
    for ($i=0; $i < count($keahlian) ; $i++) { 
      $params = array('idRel' => $id , 'idKeahlian' => $keahlian[$i] );
      $this->db->insert('rel_keahlian', $params);
    }
    if (!empty($data)) {
      $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil diperbarui'));
    }else{
      $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal diperbarui'));            
    }
    redirect($this->data['module']);
  }else{

    $this->page_title->push('Data Relawan');
    $this->data['pagetitle'] = $this->page_title->show();
    $this->data['breadcrumb'] = $this->breadcrumbs->show();
    $this->data['relawan'] = $this->m_relawans->get_detail($id);
    $this->data['subtitle'] = "Edit relawan";
    $this->load->model('operator/m_chain_wilayah');
    $this->data['kecamatan'] = $this->m_chain_wilayah->get_kecamatan();   
    $this->data['organisasi'] = $this->m_relawans->get_org();
    $this->data['pendidikan'] = $this->m_relawans->get_pend();   
    $this->data['keahlian'] = $this->m_relawans->get_keahlian();    
    $this->data['relKeahlian'] = $this->m_relawans->get_keahlianRelawan($id);    
            // echo "<pre>";print_r($this->data['keahlian']);echo "</pre>";exit;                     

    $this->template->operator_render('operator/referensi/v_relawan_edit', $this->data);
  }

}

public function delete($id){
  $proses = $this->m_relawans->delete($id);
  if ($proses) {
    $this->session->set_flashdata('message_form', array('status' => 'success', 'title' => 'Selamat', 'message' => 'Data berhasil dihapus.'));
  } else {
    $this->session->set_flashdata('message_form', array('status' => 'danger', 'title' => 'Yaah', 'message' => 'Data gagal dihapus.'));            
  }
  redirect('operator/relawans');
}

}
