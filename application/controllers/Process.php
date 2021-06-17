<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Process extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    // public $id_jenis_perusahaan;

    public function __construct()
    {
        parent::__construct();
        $this->load->model("process_model");
        $this->load->library('form_validation');
    }

    public function kebutuhan()
    {
        if (isset($_POST['submit'])) {
            if(isset($_POST['radio'])){
                if(isset($_POST['radio2'])){
                    if(isset($_POST['radio3'])){
                        $id_jenis_perusahaan = $_POST['radio'];
                        $id_it_resource = $_POST['radio2'];
                        $id_domain = $_POST['radio3'];
                        $data["process"] = $this->process_model->getAll($id_jenis_perusahaan, $id_it_resource, $id_domain);
                        $this->load->view('process', $data);
                    }
                }
            }
        }
    }
}
