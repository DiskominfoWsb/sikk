<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Operator_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
        $this->load->helper('number');
        $this->load->model('operator/dashboard_model');
        $this->data['module'] = "operator/dashboard/"; 
    }


    public function index()
    {
            /* Title Page */
            $this->page_title->push(lang('menu_dashboard'));
            $this->data['pagetitle'] = $this->page_title->show();

            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Data */
            $this->data['count_users']       = $this->dashboard_model->get_count_record('users');
            $this->data['count_groups']      = $this->dashboard_model->get_count_record('groups');
            // $this->data['disk_totalspace']   = $this->dashboard_model->disk_totalspace(DIRECTORY_SEPARATOR);
            // $this->data['disk_freespace']    = $this->dashboard_model->disk_freespace(DIRECTORY_SEPARATOR);
            // $this->data['disk_usespace']     = $this->data['disk_totalspace'] - $this->data['disk_freespace'];
            // $this->data['disk_usepercent']   = $this->dashboard_model->disk_usepercent(DIRECTORY_SEPARATOR, FALSE);
            // $this->data['memory_usage']      = $this->dashboard_model->memory_usage();
            // $this->data['memory_peak_usage'] = $this->dashboard_model->memory_peak_usage(TRUE);
            // $this->data['memory_usepercent'] = $this->dashboard_model->memory_usepercent(TRUE, FALSE);


            $bulan_ini = date('m');
            $this->data['jml_bencana'] = 

            /* TEST */
            // $this->data['url_exist']    = is_url_exist('http://www.domprojects.com');


            /* Load Template */
            $this->template->operator_render('operator/dashboard/index', $this->data);
	}
}
