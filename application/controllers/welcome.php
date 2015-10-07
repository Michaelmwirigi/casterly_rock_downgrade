<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	var $cart;
	var $cart2;
	function __construct()
	{
		parent:: __construct();
	}
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
		
		$data['cart'] = $this->create_cart();
		$data['cart2'] = $this->create_full_cart();
		//echo "<pre>";print_r($user_id);die();
		$this->load->view('index', $data);
		$this->load->model('user_model');

	}

	function create_cart()
	{
		$user = $this->session->userdata('user_id');
		if ($user != NULL) {
			$data = $this->user_model->show_from_cart($user);
			foreach ($data as $key => $value) {
				$item_price = $value["price"] * $value["quantity"];
				$this->cart .= '<form class="item" action="'.base_url().'index.php/welcome/remove_from_cart" method="post" enctype="multipart/form-data">

				<div class="header"><p class="c_name">'.$value["ProdName"].'</p><p class="c_amt">'.$value["quantity"].'</p><p class="c_price">shs'.$item_price.'</p>
				<input type="hidden" name="cartid" value="'.$value["cartid"].'">'
				.'<div class="ui right floated mini buttons ">
				  <a class="ui orange button edit_cart">Change</a>
				  <div class="or"></div>
				  <button type="submit" class="ui red button">Remove</button>
				</div></div></form>';
			}
		} else {
			$this->cart = '<div class="item"><p class="left floated header">No item in the Cart</p></div>';
		}
		// echo "<pre>";print_r($this->cart);die();
		return $this->cart;
	}

	function cart_checkout(){
		$user = $this->session->userdata('user_id');
		$cart_content = $this->user_model->show_from_cart($user);
		//echo "<pre>";print_r($data);die();

		//$insert = $this->user_model->checkout($cart_content);

		foreach ($cart_content as $key => $value) {
	       //echo "<pre>";print_r($value['Customerid']);die();
	      $data3=array(

	        'userid'=>$value['Customerid'],
	        'price'=>$value['price'] * $value['quantity'],
	        'productname'=>$value['ProdName'],
	        'productid'=>$value['Productid'],
	        'quantity'=>$value['quantity'],

	      );
	      $this->user_model->checkout($data3);
	    }

		if ($data3) {
			redirect('welcome');
		} else {
			echo "<pre>";print_r("not working ...shucks");die();
		print "Failed to checkout";
		}
		
	}

	function create_full_cart()
	{
		$user = $this->session->userdata('user_id');
		if ($user != NULL) {
			$data = $this->user_model->show_from_cart($user);
			foreach ($data as $key => $value) {
				$cart_id=$value["cartid"];
				$this->cart2 .= '<form class="ui horizontal list cart_list" action="'.base_url().'index.php/welcome/edit_cart" method="post" enctype="multipart/form-data">

      <span class="item c_name">
        <select class="ui dropdown" name="product">
          <option value="">What would yu like to eat</option>
          <option value="1">Chicken Wings</option>
          <option value="2">Drum sticks</option>
          <option value="3">Pork Chops</option>
        </select>
      </span>
      <span class="item c_location">
        <select class="ui dropdown" name="location">
          <option value="">Choose Your Location</option>
          <option value="madaraka">Madaraka</option>
          <option value="cbd">CBD</option>
          <option value="westlands">Westlands</option>
        </select>
      </span>
      
      <span class="item c_quantitiy">
      <select class="ui admin dropdown" name="quantity">

        <option value="">No of servings</option>

        <option value="5">5</option>
        <option value="10">10</option>
        <option value="15">15</option>
      </select>
      </span>
      <input type="hidden" name="cartid" value="'.$value["cartid"].'">
      <a class="item c_save">
        <button class="ui labeled icon orange button">Save<i class="save icon"></i></button>
      </a>
    </form>';
			}
		} else {
			$this->cart2 = '<div class="item"><p class="left floated header">No item to change in the Cart</p></div>';
		}
		// echo "<pre>";print_r($this->cart);die();
		return $this->cart2;
	}
	
	public function login()
	{
	  $email=$this->input->post('email');
	  $password=md5($this->input->post('pass'));

	  $result=$this->user_model->login($email,$password);
	  if($result){
	  	redirect('welcome');
	  }
	  else{
	  	redirect('welcome');
	  }
	}

	// public function welcome()
	// {
	//   $data['title']= 'Welcome';
	//   $this->load->view('header_view',$data);
	//   $this->load->view('welcome_view.php', $data);
	//   $this->load->view('footer_view',$data);
	// }

	 public function registration()
	{
		//$random = $this->authentication_key();
	  //$this->load->library('form_validation');
	  // field name, error message, validation rules
		$insert = $this->user_model->add_user($random);

		if ($insert) {
			$id = mysql_insert_id();
			$email = $this->input->post('email');
			$confirm = base_url().$email.'/'.$random;
			//$this->login();
			redirect('welcome');
		} else {
		print "Sign Up Failed";
		}

	}

	public function authentication_key(){
		$rand = rand(0,99999);
		return $rand;
	}



	public function logout()
	{
	  $newdata = array(
	  'user_id'   => NULL,
	  'logged_in' => FALSE
	  );
	  $this->session->unset_userdata($newdata );
	  $this->session->sess_destroy();
	  redirect('welcome');
	}

	public function add_to_cart()
	{
		$insert = $this->user_model->add_product_to_cart();

		if ($insert) {
			redirect('welcome');
		} else {
		print "Failed to add product";
		}
	}

	public function edit_cart()
	{
		$cartid=$this->input->post('cartid');
		$update = $this->user_model->edit_product_in_cart($cartid);

		if ($update) {
			redirect('welcome');
		} else {
		print "Failed to edit product";
		}
	}


	function remove_from_cart() {
		$cartid=$this->input->post('cartid');
		$customerid=$this->session->userdata('user_id');
		$this->user_model->delete_cart_entry($cartid,$customerid);
		redirect('welcome');
	}

	// public function remove_from_cart()
	// {
	//   $=$this->input->post('email');

	//   $result=$this->user_model->login($email,$password);
	//   if($result){
	//   	$this->index();
	//   }
	//   else{
	//   	$this->index();
	//   }
	// }


}	



