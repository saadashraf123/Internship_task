<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('url','html','form'));
        $this->load->library(array('form_validation','session'));
        $this->load->model('home');
        $this->session;
    }

	public function index()
	{
        $result=$this->home->adminExist();
        if(count($result)==0){
            $this->load->view('AdminSignup');
        }
        else{
            $this->load->view('AdminLogin');
        }
	}
    public function user()
	{
		$this->load->view('UserLogin');
	}

    function adminLogin(){
        $username = $this->input->post('UserName');
        $password = $this->input->post('Password');
        if($username !=="" && $password !== ""){
            $result=$this->home->adminLogin($username, $password);
            if(count($result)==1){
                $ALdata = array([
                    'id' => $result[0]->id,
                    'username' => $result[0]->username,
                    'role' => $result[0]->role
                ]);
                $this->session->set_userdata('Ldata', $ALdata);
            }
            echo count($result);
        }
    }

    function adminSignup(){
        $ASdata['id'] = $this->input->post('ID');
        $ASdata['username'] = $this->input->post('ASUserName');
        $ASdata['email'] = $this->input->post('ASEmail');
        $ASdata['password'] = $this->input->post('ASPassword');
        $ASdata['role']= 'admin';
        $result=$this->home->adminSignup($ASdata);
        if($result == TRUE){
            echo 0;
        }
        else if($result == FALSE){
            echo 1;
        }
    }
    
    function userSignup(){
        $USdata['id'] = $this->input->post('ID');
        $USdata['username'] = $this->input->post('USUserName');
        $USdata['email'] = $this->input->post('USEmail');
        $USdata['password'] = $this->input->post('USPassword');
        $USdata['role']= 'user';
        $result=$this->home->userSignup($USdata);
        if($result == TRUE){
            echo 0;
        }
        else if($result == FALSE){
            echo 1;
        }
    }

    function userLogin(){
        $username = $this->input->post('UUserName');
        $password = $this->input->post('UPassword');
        if($username !=="" && $password !== ""){
            $result=$this->home->userLogin($username, $password);
            if(count($result)==1){
                $ULdata = array([
                    'id' => $result[0]->id,
                    'username' => $result[0]->username,
                    'role' => $result[0]->role
                ]);
                $this->session->set_userdata('Ldata', $ULdata);
            }
            echo count($result);
        }
    }

    public function dashboard()
	{
        if (isset($this->session->userdata('Ldata')[0]['role']) == 'admin') {
            $this->load->view('DashboardHeader');
            $this->load->view('DashboardSidebar');
            $this->load->view('Dashboard');
            $this->load->view('DashboardFooter');
        }
        else{
            $this->load->view('AdminLogin');
        }
	}
    public function userDashboard()
    {
        if (isset($this->session->userdata('Ldata')[0]['role']) == 'user') {   
            $this->load->view('CostumersEntries');
        }
        else{
            $this->load->view('UserLogin');
        }
    }

    public function addCostumer()
    {
        $added_by = $this->session->userdata('Ldata')[0]['username'];
        $status = "pending";
        $Cdata['id'] = $this->input->post('ID');
        $Cdata['first_name'] = $this->input->post('FName');
        $Cdata['last_name'] = $this->input->post('LName');
        $Cdata['email'] = $this->input->post('Email');
        $Cdata['appointment_date'] = $this->input->post('ADate');
        $Cdata['added_by']= $added_by;
        $Cdata['status']= $status;
        $result=$this->home->addCostumer($Cdata);
        echo 0;
    }
    
    public function adminRegistration()
	{
        if (isset($this->session->userdata('Ldata')[0]['role']) == 'admin') {
            $this->load->view('DashboardHeader');
            $this->load->view('DashboardSidebar');
            $this->load->view('AdminRegistration');
            $this->load->view('DashboardFooter');
        }
        else{
            $this->load->view('AdminLogin');
        }
	}
    public function bookingInfo()
	{
        if (isset($this->session->userdata('Ldata')[0]['role']) =='admin') {
            $this->load->view('DashboardHeader');
            $this->load->view('DashboardSidebar');
            $this->load->view('BookingInfo');
            $this->load->view('DashboardFooter');
        }
        else{
            $this->load->view('AdminLogin');
        }
	}
    public function pendingEntries()
	{
        if (isset($this->session->userdata('Ldata')[0]['role']) =='admin') {
            $this->load->view('DashboardHeader');
            $this->load->view('DashboardSidebar');
            $this->load->view('PendingEntries');
            $this->load->view('DashboardFooter');
        }
        else{
            $this->load->view('AdminLogin');
        }
	}

    public function userRegistration()
	{
        if (isset($this->session->userdata('Ldata')[0]['role']) == 'admin') {
            $this->load->view('DashboardHeader');
            $this->load->view('DashboardSidebar');
            $this->load->view('UserRegistration');
            $this->load->view('DashboardFooter');
        }
        else{
            $this->load->view('AdminLogin');
        }
	}
    public function costumerentriesFunction(){
        $data = $this->home->costumerentries();
        $array = array("draw"=> 1,
        "recordsTotal"=> 11,
        "recordsFiltered"=> 11,
        'data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($array));
    }

    public function adminregistrationFunction(){
        $data = $this->home->adminregistration();
        $array = array("draw"=> 1,
        "recordsTotal"=> 11,
        "recordsFiltered"=> 11,
        'data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($array));
    }

    public function userregistrationFunction(){

        $data = $this->home->userregistration();
        $array = array("draw"=> 1,
        "recordsTotal"=> 11,
        "recordsFiltered"=> 11,
        'data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($array));
    }

    public function bookinginfoFunction(){
        $data = $this->home->bookinginfo();
        $array = array("draw"=> 1,
        "recordsTotal"=> 11,
        "recordsFiltered"=> 11,
        'data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($array));
    }

    public function pendingentriesFunction(){
        $data = $this->home->pendingentries();
        $array = array("draw"=> 1,
        "recordsTotal"=> 11,
        "recordsFiltered"=> 11,
        'data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($array));
    }

    public function approve()
    {   
        $data = $this->input->post('id');
        $this->home->approve($data);
        echo $data;
    }
    public function decline()
    {   
        $data = $this->input->post('id');
        $this->home->decline($data);
        echo $data;
    }

    public function edit()
    {   
        $id = $this->input->post('id');
        $data = $this->home->edit($id);
        // $array = array('data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function editUser()
    {   
        $id = $this->input->post('id');
        $data = $this->home->editUser($id);
        // $array = array('data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function editStatus()
    {   
        $id = $this->input->post('id');
        $data = $this->home->editStatus($id);
        // $array = array('data'=>$data);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    function updateStatus(){
        $status = $this->input->post('Status');
        $SData = $this->input->post('ID');
        if($status == 'Approved'){
            $result=$this->home->approve($SData);
        }
        else if($status == 'Decline'){
            $result=$this->home->decline($SData);
        }
        else{
            $result=$this->home->pending($SData);
        }
        echo 0;
    }

    public function Alogout()
    {
        $this->session->unset_userdata('Ldata');
		$this->load->view('AdminLogin');
    }
    public function Ulogout()
    {
        $this->session->unset_userdata('Ldata');
		$this->load->view('UserLogin');
    }
}
