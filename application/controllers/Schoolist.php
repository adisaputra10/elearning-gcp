<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schoolist extends CI_Controller {
 
	public function index()
	{
        
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $data = $this->db->query("SELECT distinct FROM schoolist s, tenant t where s.tenant_code=t.tenant_code");
			echo json_encode($data->result_array());
        }

	}


	public function detail($id)
	{
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $data = $this->db->query("SELECT * FROM schoolist where id_schoolist='$id'");
            json_output(400,array('status' => 200,$data->result_array()) );
        }

	}
	

	public function create()
	{

        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
          
                $tenant_code=$this->input->post('tenant_code');
                $school_name=$this->input->post('school_name');
				$headmaster=$this->input->post('headmaster');
				
				$type=$this->input->post('typesch');


				$address=$this->input->post('address');
                

                $city=$this->input->post('city');
                $province=$this->input->post('province');
                $postal_code=$this->input->post('postal_code');
                $contact_person=$this->input->post('contact_person');
                $phone=$this->input->post('phone');
				$handphone=$this->input->post('handphone');
				$email=$this->input->post('email');

				$sql="INSERT INTO `schoolist` (`id_schoolist`, `tenant_code`, `school_name`, `headmaster`, `address_sch`, `city_sch`, `province_sch`, `postal_code_sch`, `contact_person`, `phone_sch`, `handphone_sch`, `email_sch`, `type`, `aktif_date_sch`) VALUES (NULL, '$tenant_code', '$school_name', '$headmaster', '$address', '$city', '$province', '$postal_code', '$contact_person', '$phone', '$handphone', '$email', '$type', 'inactive');";
				$this->db->query($sql);
        		echo json_encode("success");
        }

	}
	

	public function delete($id)
	{

		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $this->db->query("DELETE  FROM  schoolist where id_schoolist='$id'");
		    echo json_encode("success");
            
        }

    }

 


	public function update($id)
	{

		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
          
      
                $tenant_code=$this->input->post('tenant_code');
                $school_name=$this->input->post('school_name');
                $headmaster=$this->input->post('headmaster');
                $city=$this->input->post('city');
                $province=$this->input->post('province');
                $postal_code=$this->input->post('postal_code');
                $contact_person=$this->input->post('contact_person');
                $phone=$this->input->post('phone');
				$handphone=$this->input->post('handphone');
				$email=$this->input->post('email');
           
        }

    }



}
