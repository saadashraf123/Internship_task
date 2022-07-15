<?php
class home extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->session;
    }

    function adminExist()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('role', 'admin');
        $query = $this->db->get();
        $result = $query->result();  
        return $result;
    }

    function adminLogin($username, $password) {

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('password', $password);
        $this->db->where('username', $username);
        $this->db->where('role', 'admin');
        $query = $this->db->get();
        $result = $query->result();  
        return $result;
    }


    function adminSignup($ASData){
        $condition = 'username= "'.$ASData['username'].'" OR email= "'.$ASData['email'].'" AND role= "'.$ASData['role'].'"';
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $query = $this->db->get();
        $result = $query->result();
        if(count($result)==0){
            if($ASData['id'] == 0){
                $this->db->insert('users', $ASData);
                return TRUE;
            }
            else{
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id', $ASData['id']);
                $this->db->update('users', $ASData);
                return TRUE;
            }  
        }
        else{
            return FALSE;
        }
    }

    function userSignup($USData){
        $condition = 'username= "'.$USData['username'].'" AND email= "'.$USData['email'].'" AND role= "'.$USData['role'].'"';
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $query = $this->db->get();
        $result = $query->result();
        if(count($result)==0){
            if($USData['id'] == 0){
                $this->db->insert('users', $USData);
                return TRUE;
            }
            else{
                $this->db->select('*');
                $this->db->from('users');
                $this->db->where('id', $USData['id']);
                $this->db->update('users', $USData);
                return TRUE;
            }  
        }
        else{
            return FALSE;
        }
    }

    function userLogin($username, $password) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('password', $password);
        $this->db->where('username', $username);
        $this->db->where('role', 'user');
        $query = $this->db->get();
        $result = $query->result();  
        return $result;
    }

    function costumerentries()
    {
        $add_by = $this->session->userdata('Ldata')[0]['username'];
        $this->db->select('id, first_name, last_name, email, appointment_date, status');
        $this->db->from('costumerdetails');
        $this->db->where('added_by', $add_by );
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function addCostumer($CData)
    {
        if($CData['id'] == 0){
            $this->db->insert('costumerdetails', $CData);
            return TRUE;
        }
        else{
            $this->db->select('*');
            $this->db->from('costumerdetails');
            $this->db->where('id', $CData['id']);
            $this->db->update('costumerdetails', $CData);
            return TRUE;
        }
    }

    function adminregistration()
    {
        $this->db->select('id, username, email');
        $this->db->from('users');
        $this->db->where('role', 'admin');
        $query = $this->db->get();
        $result = $query->result();  
        return $result;
    }
    function userregistration()
    {
        $this->db->select('id, username, email');
        $this->db->from('users');
        $this->db->where('role', 'user');
        $query = $this->db->get();
        $result = $query->result();  
        return $result;
    }
    function bookinginfo()
    {
        $this->db->select('id, first_name, email, appointment_date, added_by, status');
        $this->db->from('costumerdetails');
        $this->db->where_in('status','approved');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function pendingentries()
    {
        $this->db->select('id, first_name, email, appointment_date, added_by, status');
        $this->db->from('costumerdetails');
        $this->db->where_in('status','pending');
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function approve($data){
        $this->db->set('status', 'Approved');
        $this->db->where('id', $data);
        $this->db->update('costumerdetails');
    }
    function decline($data){
        $this->db->set('status', 'Decline');
        $this->db->where('id', $data);
        $this->db->update('costumerdetails');
    }
    function pending($data){
        $this->db->set('status', 'Pending');
        $this->db->where('id', $data);
        $this->db->update('costumerdetails');
    }
    function edit($data){

        $this->db->select('*');
        $this->db->from('costumerdetails');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    function editUser($data){

        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    function editStatus($data){

        $this->db->select('*');
        $this->db->from('costumerdetails');
        $this->db->where('id', $data);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
}
?>