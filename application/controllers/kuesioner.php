<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

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

	public function __construct()
    {
        parent::__construct();
        $this->load->model("kuesioner_model");
        $this->load->library('form_validation');
    }

	public function index()
    {
        if (isset($_POST['submit'])) {
            if(isset($_POST['radio4'])){
				$id_it_process = $_POST['radio4'];
				$data["pertanyaan"] = $id_it_process;
				$data["kuesioner_level0"] = $this->kuesioner_model->getAll($id_it_process);
				$data["kuesioner_level1"] = $this->kuesioner_model->getAll($id_it_process);
				$data["kuesioner_level2"] = $this->kuesioner_model->getAll($id_it_process);
				$data["kuesioner_level3"] = $this->kuesioner_model->getAll($id_it_process);
				$data["kuesioner_level4"] = $this->kuesioner_model->getAll($id_it_process);
				$data["kuesioner_level5"] = $this->kuesioner_model->getAll($id_it_process);
				$this->load->view('kuesioner', $data);
			}
        }
    }
}
