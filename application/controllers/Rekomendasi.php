<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi extends CI_Controller {

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
        $this->load->model("rekomendasi_model");
        $this->load->library('form_validation');
    }

	public function index($id = 0)
    {
    	$tingkat=5;
        if (isset($_POST['submit'])) {
        	$saran=[1, 1, 1, 1, 1, 1];
			$id_it_process = $id;
			$jumlah_pertanyaan_level0 = 0;
			$jumlah_pertanyaan_level1 = 0;
			$jumlah_pertanyaan_level2 = 0;
			$jumlah_pertanyaan_level3 = 0;
			$jumlah_pertanyaan_level4 = 0;
			$jumlah_pertanyaan_level5 = 0;
			$jumlah_level0 = 0;
			$jumlah_level1 = 0;
			$jumlah_level2 = 0;
			$jumlah_level3 = 0;
			$jumlah_level4 = 0;
			$jumlah_level5 = 0;
			$hasil_bagi_level0 = 0;
			$hasil_bagi_level1 = 0;
			$hasil_bagi_level2 = 0;
			$hasil_bagi_level3 = 0;
			$hasil_bagi_level4 = 0;
			$hasil_bagi_level5 = 0;
			$jumlah_hasil_bagi = 0;
			$normalisasi_level0 = 0;
			$normalisasi_level1 = 0;
			$normalisasi_level2 = 0;
			$normalisasi_level3 = 0;
			$normalisasi_level4 = 0;
			$normalisasi_level5 = 0;
			$jumlah_normalisasi = 0;
			$kontribusi_level0 = 0;
			$kontribusi_level1 = 0;
			$kontribusi_level2 = 0;
			$kontribusi_level3 = 0;
			$kontribusi_level4 = 0;
			$kontribusi_level5 = 0;
			$jumlah_kontribusi = 0;
			$kekurangan[0] = [];
			$kekurangan[1] = [];
			$kekurangan[2] = [];
			$kekurangan[3] = [];
			$kekurangan[4] = [];
			$kekurangan[5] = [];

			$nomor_pertanyaan = $this->kuesioner_model->getIdPertanyaan($id_it_process);
			foreach ($nomor_pertanyaan as $value) 
			{
				if(isset($_POST['radio'.$value->id_pertanyaan])){
					$nilai = $_POST['radio'.$value->id_pertanyaan];
					if($nilai == 0)
					{	
						$tingkat = 0;
						array_push($kekurangan[$value->level], $value->id_pertanyaan);
					}

					$it_process = $value->it_process;

					if($value->level == 0)
					{	
						if($saran[0]>$nilai)$saran[0]=$nilai;
						$jumlah_pertanyaan_level0++;
						$jumlah_level0 += $nilai;

					}
					if($value->level == 1)
					{						
						if($tingkat>1)$tingkat=1;
						if($saran[1]>$nilai)$saran[1]=$nilai;
						$jumlah_pertanyaan_level1++;
						$jumlah_level1 += $nilai;

					}
					if($value->level == 2)
					{
						if($saran[2]>$nilai)$saran[2]=$nilai;
						$jumlah_pertanyaan_level2++;
						$jumlah_level2 += $nilai;

					}
					if($value->level == 3)
					{
						if($saran[3]>$nilai)$saran[3]=$nilai;
						$jumlah_pertanyaan_level3++;
						$jumlah_level3 += $nilai;

					}
					if($value->level == 4)
					{
						if($saran[4]>$nilai)$saran[4]=$nilai;
						$jumlah_pertanyaan_level4++;
						$jumlah_level4 += $nilai;

					}
					if($value->level == 5)
					{
						if($saran[5]>$nilai)$saran[5]=$nilai;
						$jumlah_pertanyaan_level5++;
						$jumlah_level5 += $nilai;

					}
				}
			}

			if($jumlah_pertanyaan_level0 != 0)
			{
				$hasil_bagi_level0 = $jumlah_level0 / $jumlah_pertanyaan_level0;
			}
			else
			{	
				$hasil_bagi_level0 = 0;
			}

			if($jumlah_pertanyaan_level1 != 0)
			{
				$hasil_bagi_level1 = $jumlah_level1 / $jumlah_pertanyaan_level1;
			}
			else
			{
				$hasil_bagi_level1 = 0;
			}

			if($jumlah_pertanyaan_level2 != 0)
			{
				$hasil_bagi_level2 = $jumlah_level2 / $jumlah_pertanyaan_level2;
			}
			else
			{
				$hasil_bagi_level2 = 0;
			}

			if($jumlah_pertanyaan_level3 != 0)
			{
				$hasil_bagi_level3 = $jumlah_level3 / $jumlah_pertanyaan_level3;
			}
			else
			{
				$hasil_bagi_level3 = 0;
			}

			if($jumlah_pertanyaan_level4 != 0)
			{
				$hasil_bagi_level4 = $jumlah_level4 / $jumlah_pertanyaan_level4;
			}
			else
			{
				$hasil_bagi_level4 = 0;
			}

			if($jumlah_pertanyaan_level5 != 0)
			{
				$hasil_bagi_level5 = $jumlah_level5 / $jumlah_pertanyaan_level5;
			}
			else
			{
				$hasil_bagi_level5 = 0;
			}		
			
			$jumlah_hasil_bagi = $hasil_bagi_level0 + $hasil_bagi_level1 + $hasil_bagi_level2 + $hasil_bagi_level3 + $hasil_bagi_level4 + $hasil_bagi_level5;
	

			if($jumlah_hasil_bagi != 0)
			{
				$normalisasi_level0 = $hasil_bagi_level0 / $jumlah_hasil_bagi;
				$normalisasi_level1 = $hasil_bagi_level1 / $jumlah_hasil_bagi;
				$normalisasi_level2 = $hasil_bagi_level2 / $jumlah_hasil_bagi;
				$normalisasi_level3 = $hasil_bagi_level3 / $jumlah_hasil_bagi;
				$normalisasi_level4 = $hasil_bagi_level4 / $jumlah_hasil_bagi;
				$normalisasi_level5 = $hasil_bagi_level5 / $jumlah_hasil_bagi;
			}
			else
			{
				$normalisasi_level0 = 0;
				$normalisasi_level1 = 0;
				$normalisasi_level2 = 0;
				$normalisasi_level3 = 0;
				$normalisasi_level4 = 0;
				$normalisasi_level5 = 0;
			}

			$jumlah_normalisasi = $normalisasi_level0 + $normalisasi_level1 + $normalisasi_level2 + $normalisasi_level3 + $normalisasi_level4 + $normalisasi_level5;

			$kontribusi_level1 = $normalisasi_level1 * 1;
			$kontribusi_level2 = $normalisasi_level2 * 2;
			$kontribusi_level3 = $normalisasi_level3 * 3;
			$kontribusi_level4 = $normalisasi_level4 * 4;
			$kontribusi_level5 = $normalisasi_level5 * 5;
			$jumlah_kontribusi = $kontribusi_level0 + $kontribusi_level1 + $kontribusi_level2 + $kontribusi_level3 + $kontribusi_level4 + $kontribusi_level5;

			$nilai_maturity_level = $jumlah_kontribusi;
			print_r($nilai_maturity_level);
			$level = ceil($nilai_maturity_level);
			
			$data["it_process"] = $it_process;
			$data["nilai_maturity"] = $nilai_maturity_level;
			$data["nilai_maturity_persen"] = $nilai_maturity_level / 5 * 100;
			$data["level"] = $level;

			if($saran[$level]==0){
				$data["list_kekurangan"]= $this->rekomendasi_model->getIdLevel($kekurangan[$level]);
				$data["tingkat"]="Mulailah:";
			}
			if($saran[$level]==0.33){
				$data["list_kekurangan"]= $this->rekomendasi_model->getRecomend($level, $id);
				$data["tingkat"]="Perbaiki:";

			}
			if($saran[$level]==0.66){
				$data["list_kekurangan"]= $this->rekomendasi_model->getRecomend($level, $id);
				$data["tingkat"]="Sempurnakan:";
			
			}
			if($saran[$level]==1){
				$data["list_kekurangan"]= $this->rekomendasi_model->getRecomend($level, $id);
				$data["tingkat"]="Mulailah:";
			}
	

			$this->load->view('rekomendasi', $data);
        }
    }
}
