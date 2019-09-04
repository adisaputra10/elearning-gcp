<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	 

		$users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com', 'fact' => 'Loves coding'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com', 'fact' => 'Developed on CodeIgniter'],
            ['id' => 3, 'name' => 'Jane', 'email' => 'jane@example.com', 'fact' => 'Lives in the USA', ['hobbies' => ['guitar', 'cycling']]],
        ];
		$method = $_SERVER['REQUEST_METHOD'];
		//json_output(400,array('status' => 400,'message' => "hai ini Rest api dengan codeigniter") );

		//$resp = $this->ElearningModel->elearning_all_data();
		//var_dump($resp);

		//json_output(400,array('status' => 400,$users) );
		//$this->load->view('welcome_message');

		$data = $this->db->query("SELECT * FROM tenant");
		foreach ($data->result_array() as $mahasiswa) {
			 echo "Nama : ".$mahasiswa['tenant_code']."<br/>";
			 echo "Alamat : ".$mahasiswa['tenant_name']."<hr/>";
		}





	}


 




}
