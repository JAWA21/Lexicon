<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('cart_model');
		$this->load->model('gallery_model');
		$this->load->library('cart');
	}

	public function cart_view()
	{
		$data['title']= 'Cart';
		$this->load->view('includes/header',$data);
		$this->load->view('pages/cart_view.php', $data);
		$this->load->view('includes/footer');
	}
	public function add_toCart()
	{
		$ID=$this->input->post('photo');
		$data['title']= 'Cart';
		if($this->session->userdata('session_id' != null))

		{
			$photoInfo=$this->gallery_model->read_onePhoto($ID);

			$this->cart_model->addToCart($photoInfo);

			$this->cart_view();
		}else{

			$data['title']= 'Login';
			$this->load->view('includes/header',$data);
			echo "<p>Please Login or Register</p>";
			$this->load->view('registration_view.php', $data);
			$this->load->view('includes/footer');
		}

	}

	public function update_cart()
	{
		$post = array();
		foreach ( $_POST as $key => $value )
		{
		    $post[$key] = $this->input->post($key);
		}

		echo $post['rowid'];

		$data = array(
           'rowid' => $this->input->post('rowid'),
           'qty'   => $this->input->post('qty')
        );

		$this->cart->update($data);
		$this->cart_view();
	}

	public function destroyCart()
	{
		$this->cart->destroy();
		$this->cart_view();
	}
}
?>
