<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ElearningModel extends CI_Model {

    

   
    public function elearning_all_data()
    {
      //  return $this->db->select('id_tenant,tenant_code,tenant_name')->from('tenant')->order_by('id_tenant','desc')->get()->result();
      return $this->db->select('id,title,author')->from('books')->order_by('id','desc')->get()->result();
   
    }

   

}
