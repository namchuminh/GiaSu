<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KhuVuc extends MY_Controller {

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
        $data['title'] = "Gia sư theo khu vực";
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();

        if(isset($_GET['s']) && !empty($_GET['s'])){
            $data['totalPages'] = 0;
            $data['list'] = $this->Model_KhuVuc->search($_GET['s']);
            return $this->load->view('Web/View_GiaSuKhuVuc', $data);
        }

        $totalRecords = $this->Model_KhuVuc->checkNumber();
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 
        $data['totalPages'] = $totalPages;
        $data['list'] = $this->Model_KhuVuc->getTutor();

        return $this->load->view('Web/View_GiaSuKhuVuc', $data);
    }

    public function page($trang){
        $data['title'] = "Gia sư theo khu vực";
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
        
        $totalRecords = $this->Model_KhuVuc->checkNumber();
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 

        if($trang < 1){
            return redirect(base_url('khu-vuc/'));
        }

        if($trang > $totalPages){
            return redirect(base_url('khu-vuc/'));
        }

        $start = ($trang - 1) * $recordsPerPage;


        if($start == 0){
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_KhuVuc->getTutor();
            return $this->load->view('Web/View_GiaSuKhuVuc', $data);
        }else{
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_KhuVuc->getTutor($start);
            return $this->load->view('Web/View_GiaSuKhuVuc', $data);
        }
    }

    public function detail($duongdan){
        if(count($this->Model_KhuVuc->getBySlug($duongdan)) <= 0){
            $data['title'] = "Không tìm thấy tỉnh thành";
            return $this->load->view('Web/404', $data);
        }

        $data['title'] = "Khu vực ".$this->Model_KhuVuc->getBySlug($duongdan)[0]['TenTinhThanh'];
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
        $data['slug'] = $duongdan;

        $totalRecords = $this->Model_KhuVuc->checkNumberDetail($duongdan);
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 
        $data['totalPages'] = $totalPages;
        $data['list'] = $this->Model_KhuVuc->getBySlug($duongdan);

        return $this->load->view('Web/View_GiaSuKhuVuc', $data);
    }

    public function detailPage($duongdan,$trang){
        if(count($this->Model_KhuVuc->getBySlug($duongdan)) <= 0){
            $data['title'] = "Không tìm thấy tỉnh thành";
            return $this->load->view('Web/404', $data);
        }

        $data['title'] = "Khu vực ".$this->Model_KhuVuc->getBySlug($duongdan)[0]['TenTinhThanh'];;
        $data['banner1'] = $this->Model_GiaoDien->getByType(2);
        $data['class'] = $this->Model_LopHoc->getAll();
        $data['subject'] = $this->Model_BoMon->getAll();
        $data['province'] = $this->Model_KhuVuc->getAll();
        $data['slug'] = $duongdan;

        $totalRecords = $this->Model_KhuVuc->checkNumberDetail($duongdan);
        $recordsPerPage = 12;
        $totalPages = ceil($totalRecords / $recordsPerPage); 

        if($trang < 1){
            return redirect(base_url('khu-vuc/'));
        }

        if($trang > $totalPages){
            return redirect(base_url('khu-vuc/'));
        }

        $start = ($trang - 1) * $recordsPerPage;


        if($start == 0){
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_KhuVuc->getBySlug($duongdan);
            return $this->load->view('Web/View_GiaSuKhuVuc', $data);
        }else{
            $data['totalPages'] = $totalPages;
            $data['list'] = $this->Model_KhuVuc->getBySlug($duongdan,$start);
            return $this->load->view('Web/View_GiaSuKhuVuc', $data);
        }
    }

}

/* End of file SanPham.php */
/* Location: ./application/controllers/SanPham.php */