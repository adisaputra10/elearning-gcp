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


	public function auth()
	{
		
		
		header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");

         $method = $_SERVER['REQUEST_METHOD'];
		 if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		 } else {

			$username=$this->input->post('username');
			$password=$this->input->post('password');


			$data = $this->db->query("SELECT * FROM user where username='$username'  and password='$password'");
			//$data->row();
			if($data->num_rows() > 0){
				echo json_encode("success");
			}else{
				echo json_encode("failed");
			}
			
		 }
		

	}

	public function detail($id)
	{
		 
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $data = $this->db->query("SELECT * FROM user where id_user='$id'");
			echo json_encode($data->result_array());
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
                $email=$this->input->post('email');
                $password=$this->input->post('password');
				$handphone=$this->input->post('mobile');
				$date=date("Y-m-d h:i");
				//echo json_encode("aaa $tenant_code $username");
				

				$data = $this->db->query("INSERT INTO `user` (`id_user`, `tenant_code`, `username`, `email_user`, `password`, `handphone_user`, `lastlogin`) VALUES (NULL, '$tenant_code', '$username', '$email', '$password', '$handphone', '$date') ");
				echo json_encode("success");
            
 
        }

	}
	


    public function delete($id)
	{

        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $this->db->query("DELETE  FROM  user where id_user='$id'");
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
                $username=$this->input->post('username');
                $email=$this->input->post('$email');
                $password=$this->input->post('$password');
                $handphone=$this->input->post('$handphone');
            
        }

    }



}
