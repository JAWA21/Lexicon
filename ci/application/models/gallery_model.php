<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery_model extends CI_Model {

	public function create_photos($data)
	{
		$this->load->helper(array('form', 'url'));

		$user = $data['user_id'];

		$data = array(
			'make' => $data["make"],
			'model' => $data["model"],
			//$data["date_time"] = $raw_exif["EXIF"]["DateTimeOriginal"];
			'exposure_time' =>$data["exposure_time"],	
			'f_number' => $data["f_number"],
			'iso_speed' => $data["iso_speed"],
			'orig_name' => $data["orig_name"],
			'pTitle' => $data["title"],
			'pDesc' => $data["desc"]
		);
		$this->db->where("userID", $user);
		return $this->db->insert('photos', $data);
	}

	public function read_photos()
	{
		$query = $this->db->get('photos');
		return $query->result_array();
	}

	public function read_onePhoto($ID)
	{
		$this->db->where("userID", $ID);
		$query = $this->db->get('photos');

		return $query->result_array();
	}

	public function update_photo()
	{
		$data=array(
			'pTitle'=>$this->input->post('title'),
			'pDesc'=>$this->input->post('desc'),
			'price'=>md5($this->input->post('price'))
		);

		$this->db->where('id', $this->input->post('ID'));
        $this->db->update('photos', $data);
	}
}
?>	