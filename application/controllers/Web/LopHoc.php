<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LopHoc extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Web/Model_GiaSu');
        $this->load->model('Web/Model_GiaoDien');
        $this->load->model('Web/Model_LopHoc');
        $this->load->model('Web/Model_BoMon');
        $this->load->model('Web/Model_KhuVuc');
    }

    public function index()
    {
        $data['title'] = "Gia sư theo lớp học";
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();

        if(isset($_GET['s']) && !empty($_GET['s'])){
            $data['totalPages'] = 0;
            $data['list'] = $this->Model_LopHoc->search($_GET['s']);
            return $this->load->view('Web/View_GiaSuLopHoc', $data);
        }

        $totalRecords = $this->Model_LopHoc->checkNumber();
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 
        $data['totalPages'] = $totalPages;
        $data['list'] = $this->Model_LopHoc->getTutor();

        return $this->load->view('Web/View_GiaSuLopHoc', $data);
    }

    public function page($trang){
        $data['title'] = "Gia sư theo lớp học";
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
        
        $totalRecords = $this->Model_LopHoc->checkNumber();
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 

        if($trang < 1){
            return redirect(base_url('lop-hoc/'));
        }

        if($trang > $totalPages){
            return redirect(base_url('lop-hoc/'));
        }

        $start = ($trang - 1) * $recordsPerPage;


        if($start == 0){
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_LopHoc->getTutor();
            return $this->load->view('Web/View_GiaSuLopHoc', $data);
        }else{
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_LopHoc->getTutor($start);
            return $this->load->view('Web/View_GiaSuLopHoc', $data);
        }
    }

    public function detail($duongdan){
        if(count($this->Model_LopHoc->getBySlug($duongdan)) <= 0){
            $data['title'] = "Không tìm thấy lớp học";
            return $this->load->view('Web/404', $data);
        }

        $data['title'] = $this->Model_LopHoc->getBySlug($duongdan)[0]['TenLopHoc'];
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
        $data['slug'] = $duongdan;

        $totalRecords = $this->Model_LopHoc->checkNumberDetail($duongdan);
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 
        $data['totalPages'] = $totalPages;
        $data['list'] = $this->Model_LopHoc->getBySlug($duongdan);

        return $this->load->view('Web/View_GiaSuLopHoc', $data);
    }

    public function detailPage($duongdan,$trang){
        if(count($this->Model_LopHoc->getBySlug($duongdan)) <= 0){
            $data['title'] = "Không tìm thấy lớp học";
            return $this->load->view('Web/404', $data);
        }

        $data['title'] = $this->Model_LopHoc->getBySlug($duongdan)[0]['TenLopHoc'];
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
        $data['slug'] = $duongdan;

        $totalRecords = $this->Model_LopHoc->checkNumberDetail($duongdan);
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 

        if($trang < 1){
            return redirect(base_url('lop-hoc/'.$duongdan.'/'));
        }

        if($trang > $totalPages){
            return redirect(base_url('lop-hoc/'.$duongdan.'/'));
        }

        $start = ($trang - 1) * $recordsPerPage;


        if($start == 0){
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_LopHoc->getBySlug($duongdan);
            return $this->load->view('Web/View_GiaSuLopHoc', $data);
        }else{
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_LopHoc->getBySlug($duongdan,$start);
            return $this->load->view('Web/View_GiaSuLopHoc', $data);
        }
    }

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */