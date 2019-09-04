<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tenant extends CI_Controller {

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
        
        
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $data = $this->db->query("SELECT * FROM tenant");
           // json_output(200,array('status' => 200,$data->result_array()  ) );

            echo json_encode($data->result_array());
        }



    }
    
    

    public function detail($id)
	{
        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $data = $this->db->query("SELECT * FROM tenant where id_tenant='$id'");
            echo json_encode($data->result_array());
        }

    }

   


    public function create()
	{

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'POST'){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
          
      
                $tenant_code=$this->input->post('tenant_code');
                $tenant_name=$this->input->post('tenant_name');
                $address=$this->input->post('address');
                $city=$this->input->post('city');
                $province=$this->input->post('province');
                $postal_code=$this->input->post('postal_code');
                $contact_person=$this->input->post('contact_person');
                $phone=$this->input->post('phone');
                $handphone=$this->input->post('mobile');
                $email=$this->input->post('email');
            	//echo json_encode("success $email ");

                $sql = "INSERT INTO `tenant` (`id_tenant`, `tenant_code`, `tenant_name`, `address`, `city`, `province`, `postal_code`, `contact_person`, `phone`, `email`, `aktif_date`) VALUES (NULL, '$tenant_code', '$tenant_name', '$address', '$city', '$province', '$postal_code', '$contact_person', ' $handphone', '$email', 'inactive')";
                $this->db->query($sql);
        	echo json_encode("success");

        }

    }


    public function delete($id)
	{

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'DELETE' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
            $this->db->query("DELETE  FROM  tenant where id_tenant='$id'");
		    echo json_encode("success");
            
        }

    }




    public function update($id)
	{

        header('Content-type: application/json');
        header("Access-Control-Allow-Origin: *");
        $method = $_SERVER['REQUEST_METHOD'];
		if($method != 'PUT' || $this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) == FALSE){
			json_output(400,array('status' => 400,'message' => 'Bad request.'));
		} else {
          
      
                $tenant_code=$this->input->post('tenant_code');
                $tenant_name=$this->input->post('tenant_name');
                $address=$this->input->post('address');
                $province=$this->input->post('province');
                $postal_code=$this->input->post('postal_code');
                $contact_person=$this->input->post('contact_person');
                $phone=$this->input->post('phone');
                $handphone=$this->input->post('handphone');
                $email=$this->input->post('email');


             
        }

    }
 




}
