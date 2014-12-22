<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class DataKppnController extends BaseController {
    /*
     * Konstruktor
     */

    public function __construct($registry) {
        parent::__construct($registry);
    }

    /*
     * Index
     */

    public function index() {
        
    }

    /*
     * view Data KPPN PER KANWIL
     */

    public function formIsian($id = null) {
        $d_kppn = new DataKppn($this->registry);
        if (isset($_POST['add_d_kppn'])) {
            $kd_user = $_POST['kd_user'];
            $kd_d_tgl = $_POST['kd_d_tgl'];
            $kd_d_pc = $_POST['kd_d_pc'];
            $kd_d_pc_mas = $_POST['kd_d_pc_mas'];
            $kd_d_laser = $_POST['kd_d_laser'];
            $kd_d_laser_mas = $_POST['kd_d_laser_mas'];
            $kd_d_dot = $_POST['kd_d_dot'];
            $kd_d_dot_mas = $_POST['kd_d_dot_mas'];
            $kd_d_supplier = $_POST['kd_d_supplier'];
            $kd_d_supplier_mas = $_POST['kd_d_supplier_mas'];
            $kd_d_kontrak = $_POST['kd_d_kontrak'];
            $kd_d_kontrak_mas = $_POST['kd_d_kontrak_mas'];
            $kd_d_saldo = $_POST['kd_d_saldo'];
            $kd_d_saldo_mas = $_POST['kd_d_saldo_mas'];
            $kd_d_retur = $_POST['kd_d_retur'];
            $kd_d_retur_mas = $_POST['kd_d_retur_mas'];
            $kd_d_konversi = $_POST['kd_d_konversi'];
            $kd_d_konversi_mas = $_POST['kd_d_konversi_mas'];
            $kd_d_supplier_tim = $_POST['kd_d_supplier_tim'];
            $kd_d_supplier_tim_mas = $_POST['kd_d_supplier_tim_mas'];
            $kd_d_kontrak_tim = $_POST['kd_d_kontrak_tim'];
            $kd_d_kontrak_tim_mas = $_POST['kd_d_kontrak_tim_mas'];
            $kd_user_id = $_POST['kd_user_id'];
            $kd_user_id_mas = $_POST['kd_user_id_mas'];
            $kd_d_input_by = $_POST['kd_d_input_by'];

            $d_kppn->set_kd_user($kd_user);
            $d_kppn->set_kd_d_tgl($kd_d_tgl);
            $d_kppn->set_kd_d_pc($kd_d_pc);
            $d_kppn->set_kd_d_pc_mas($kd_d_pc_mas);
            $d_kppn->set_kd_d_laser($kd_d_laser);
            $d_kppn->set_kd_d_laser_mas($kd_d_laser_mas);
            $d_kppn->set_kd_d_dot($kd_d_dot);
            $d_kppn->set_kd_d_dot_mas($kd_d_dot_mas);
            $d_kppn->set_kd_d_supplier($kd_d_supplier);
            $d_kppn->set_kd_d_supplier_mas($kd_d_supplier_mas);
            $d_kppn->set_kd_d_kontrak($kd_d_kontrak);
            $d_kppn->set_kd_d_kontrak_mas($kd_d_kontrak_mas);
            $d_kppn->set_kd_d_saldo($kd_d_saldo);
            $d_kppn->set_kd_d_saldo_mas($kd_d_saldo_mas);
            $d_kppn->set_kd_d_retur($kd_d_retur);
            $d_kppn->set_kd_d_retur_mas($kd_d_retur_mas);
            $d_kppn->set_kd_d_konversi($kd_d_konversi);
            $d_kppn->set_kd_d_konversi_mas($kd_d_konversi_mas);
            $d_kppn->set_kd_d_supplier_tim($kd_d_supplier_tim);
            $d_kppn->set_kd_d_supplier_tim_mas($kd_d_supplier_tim_mas);
            $d_kppn->set_kd_d_kontrak_tim($kd_d_kontrak_tim);
            $d_kppn->set_kd_d_kontrak_tim_mas($kd_d_kontrak_tim_mas);
            $d_kppn->set_kd_user_id($kd_user_id);
            $d_kppn->set_kd_user_id_mas($kd_user_id_mas);
            $d_kppn->set_kd_d_input_by($kd_d_input_by);

            if (!$d_kppn->add_d_kppn()) {

                $this->view->error = $d_kppn->get_error();
            }
        }

        $this->view->data = $d_kppn->get_d_kppn($id);
        if (Session::get('role') == 'kppn') {
            $this->view->render('kppn/isianKppn');
        } elseif (Session::get('role') == 'kanwil') {
            $this->view->render('kppn/isianKanwil');
        } elseif (Session::get('role') == 'admin') {
            $this->view->render('kppn/isianSpan');
        }
    }

    public function level2() {
        $this->view->render('kppn/Lvl2');
    }

    public function level1() {
        $this->view->render('kppn/Lvl1');
    }

    public function rekapKppn() {
        $d_kppn = new DataKppn($this->registry);
        $this->view->data = $d_kppn->get_d_kppn_all();
        $this->view->render('kppn/hasilKppn');
    }

    public function rekapKanwil($id = null) {
        $d_kppn = new DataKppn($this->registry);
        $this->view->data_kanwil = $d_kppn->get_nama_kanwil($id);
        $this->view->data = $d_kppn->get_d_kppn_per_kanwil($id);
        $this->view->render('kppn/Lvl2');
    }

    public function rekapAll($id = null) {
        $d_kppn = new DataKppn($this->registry);
        $this->view->data_kanwil = $d_kppn->get_nama_kanwil_all($id);
        $this->view->data = $d_kppn->get_d_kppn_per_kanwil($id);
        $this->view->render('kppn/Lvl1');
    }

    public function lihatReferensiInfrastuktur() {
        $this->view->render('kppn/referensiInfrastruktur');
    }

    public function lihatReferensiDataAwal() {
        $this->view->render('kppn/referensiDataAwal');
    }

    public function lihatReferensiDataAwalTimSpan() {
        $this->view->render('kppn/referensiDataAwalTimSpan');
    }
	
	public function lihatReferensiBukuPanduan() {
        $this->view->render('kppn/referensiBukuPanduan');
    }
	
	public function rekapMasalah() {
        $d_kppn = new DataKppn($this->registry);
        $this->view->data = $d_kppn->get_d_kppn_all();
		$this->view->render('kppn/rekapMasalah');
    }

    public function __destruct() {
        
    }

}
