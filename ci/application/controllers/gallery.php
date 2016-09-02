<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Gallery extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
		$this->load->helper(array('form', 'url'));
	}

	public function gallery_view()
	{
		$photoArr['photoArr']=$this->gallery_model->read_photos();
		$data['title']= 'Gallery';
		$data = array_merge($data, $photoArr);
		//print_r($photoArr);

		$this->load->view('includes/header',$data);
		$this->load->view('pages/gallery_view.php',$data);
		$this->load->view('includes/footer',$data);
	}

	public function do_upload()
	{
		$config =  array(
          'upload_path'     => dirname($_SERVER["SCRIPT_FILENAME"])."/assets/img/gallery/",
          'upload_url'      => base_url()."/assets/img/gallery/",
          'allowed_types'   => "gif|jpg|png|jpeg",
          'overwrite'       => TRUE,
          'remove_spaces'	=> TRUE,

        );

		$this->load->library('upload', $config);
		if($this->upload->do_upload())
		{
		    //echo "file upload success";
		    $returned = $this->upload->data();
		    //print_r($returned);

		  $config['image_library'] = 'gd2';
			$config['source_image']	= $returned['full_path'];
			$config['create_thumb'] = TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']	 = 150;
			$config['height']	= 150;

		    $this->load->library('image_lib', $config);
		    $this->image_lib->resize();

		    $raw_exif = exif_read_data($returned['full_path'], 0, true);

			$data["make"] = $raw_exif["IFD0"]["Make"];
			$data["model"] = $raw_exif["IFD0"]["Model"];
			$data["date_time"] = $raw_exif["EXIF"]["DateTimeOriginal"];
			$data["exposure_time"] = $raw_exif["EXIF"]["ExposureTime"];
			$data["f_number"] = $raw_exif["EXIF"]["FNumber"];
			$data["iso_speed"] = $raw_exif["EXIF"]["ISOSpeedRatings"];
			$data["shutter_speed"] = $raw_exif["EXIF"]["ShutterSpeedValue"];
			$data["orig_name"] = $returned['orig_name'];
			$data['user_id'] = $this->input->post('id');
			$data['title'] = $this->input->post('title');
			$data['desc'] = $this->input->post('desc');

			$time = $data['date_time'];
			//convert_time($time);
			//print_r($data);
			$result['photoArr']=$this->gallery_model->create_photos($data);

			redirect('/user/photosUp');

		}
		else
		{
		   echo "file upload failed";
		}

            //return $this->load->view('index.php/user/login',$data);
	}

	public function update()
	{
		$photoArr['photoArr']=$this->gallery_model->update_photo($this->session->userdata('user_id'));

		$data['title']= 'Your Photos';
		$result['userPhotos']=$this->gallery_model->read_onePhoto($this->session->userdata('user_id'));

		$data = array_merge($data, $result);
		$this->load->view('includes/header',$data);
		$this->load->view('pages/yPhotos.php', $data);
		$this->load->view('includes/footer');
	}
}
?>
