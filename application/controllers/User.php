<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        
        

         $method = $_SERVER['REQUEST_METHOD'];
		 if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		 } else {
			$data = $this->db->query("SELECT * FROM user , tenant where user.tenant_code=tenant.tenant_code");
			echo json_encode($data->result_array());
		 }
		
  	



	}

	public function userm()
	{
        
        

         $method = $_SERVER['REQUEST_METHOD'];
		 if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		 } else {
			$data = $this->db->query("SELECT * FROM user ");
			echo json_encode($data->result_array());
		 }
		
  	



	}

	public function detail($id)
	{
		 
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $data = $this->db->query("SELECT * FROM user where id_user='$id'");
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
                $username=$this->input->post('username');
                $email=$this->input->post('$email');
                $password=$this->input->post('$password');
                $handphone=$this->input->post('$handphone');
            
 
        }

	}
	


    public function delete($id)
	{

        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
          
            $data = $this->db->query("DELETE * FROM  user where id_user='$id'");
            json_output(400,array('status' => 200,'message' => 'success'));


            var_dump($tenant_code);
        }

    }
 



	public function update($id)
	{

		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
          
      
                $tenant_code=$this->input->post('tenant_code');
                $username=$this->input->post('username');
                $email=$this->input->post('$email');
                $password=$this->input->post('$password');
                $handphone=$this->input->post('$handphone');
            
        }

    }



}
