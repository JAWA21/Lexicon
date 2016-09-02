<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
    }
	function login($email,$password)
    {
		$this->db->where("username",$email);
        $this->db->where("password",$password);
            
        $query=$this->db->get("users");
        if($query->num_rows()>0)
        {
         	foreach($query->result() as $rows)
            {
            	//add all data to session
                $newdata = array(
                	   	'user_id' 		=> $rows->ID,
                    	'user_name' 	=> $rows->username,
		                'user_email'    => $rows->email,
	                    'logged_in' 	=> TRUE,
                   );
			}
            	$this->session->set_userdata($newdata);
                return $newdata;            
		}
		return false;
    }
	public function add_user()
	{
		$data=array(
			'username'=>$this->input->post('user_name'),
			'email'=>$this->input->post('email_address'),
			'password'=>md5($this->input->post('password'))
			);
		$this->db->insert('users',$data);
	}

    public function get_user($ID)
    {
        $this->db->where("ID",$ID);
            
        $query=$this->db->get("users");
        if($query->num_rows()>0)
        {
            foreach($query->result() as $rows)
            {
                //add all data to session
                $newdata = array(
                    'user_id'       => $rows->ID,
                    'user_name'     => $rows->username,
                    'password'      => $rows->password,
                    'addressSt'     => $rows->addressSt,
                    'addressCity'   => $rows->addressCity,
                    'addressState'  => $rows->addressState,
                    'addressZip'    => $rows->addressZip,
                    'fname'         => $rows->fname,
                    'lname'         => $rows->lname,
                    'email'         => $rows->email,
                    'logged_in'     => TRUE,
                );
            }
                $this->session->set_userdata($newdata);
                return $newdata;            
        }
    }

    public function update_user($user,$email,$newpass,$ID)
    {
        $this->db->select('password');
        $this->db->where("ID",$ID);
        $query = $this->db->get('users');

        if($query->num_rows()>0)
        {
            $data = array(
               'user_name' => $user,
               'password' => $newpass,
               'email' => $$newpass
            );

            $this->db->where('id', $id);
            $this->db->update('users', $data);
        }
    }
}
?>