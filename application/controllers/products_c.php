<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_c extends CI_Controller {
	var $cart;
	var $cart2;
	var $product_list;
	//var $product_list2;
	//var $product_info2;
	// var $product_info2 = 'empty for who!';
	// var $product_data2 = 'all';
	function __construct()
	{
		parent:: __construct();
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome_view
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
		$data['product_list'] = $this->display_products();
		//$data['product_list2'] = $this->display_products();
		//echo "<pre>";print_r($product_list2);die();
		$this->load->view('products', $data);
		$this->load->model('user_model');

	}

	function create_cart()
	{
		$user = $this->session->userdata('user_id');
		if ($user != NULL) {
			$data = $this->user_model->show_from_cart($user);
			foreach ($data as $key => $value) {
				$item_price = $value["price"] * $value["quantity"];
				//echo "<pre>";print_r($item_price);die();
				$this->cart .= '<form class="item" action="welcome/remove_from_cart" method="post" enctype="multipart/form-data">

				<div class="header"><p class="c_name">'.$value["ProdName"].'</p><p class="c_amt">'.$value["quantity"].'</p><p class="c_price">shs'.$item_price.'</p>
				<input type="hidden" name="cartid" value="'.$value["cartid"].'">'
				.'<div class="ui right floated mini buttons ">
				  <a class="ui orange button edit_cart">Change</a>
				  <div class="or"></div>
				  <button type="submit" class="ui red button">Remove</button>
				</div></div></form>

				
				';
			}
		} else {
			$this->cart = '<div class="item"><p class="left floated header">No item in the Cart</p></div>';
		}
		// echo "<pre>";print_r($this->cart);die();
		return $this->cart;
	}

	// public function filter_products(){
	// 	$product_filter = $this->uri->segment(3);
		
	// 	if ($product_filter == "burger"){
	// 		$product_data2 = $this->user_model->show_products_burger();
	// 	}
	// 	else{
	// 		$product_data2 = $this->user_model->show_products();

	// 	}
		

	// 	foreach ($product_data2 as $key => $value2) {

	// 		$this->product_list2.=

	// 		'<form class="column" action="products_c/add_to_cart_products" method="post" enctype="multipart/form-data">

	// 		        <div class="ui card">
	// 		            <div class="image">
	// 		              <img src="'.ASSETS_URL.''.$value2["ImageAddr"].'">
	// 		            </div>
	// 		            <div class="content">
	// 		              <div class="header">'.$value2["ProdName"].'</div>
	// 		              <div class="meta">
	// 		                <a>'.$value2["category"].'</a>
	// 		              </div>
	// 		              <div class="description">
	// 		                '.$value2["description"].'
	// 		              </div>
	// 		            </div>
	// 		            <input type="hidden" name="product" value="'.$value2["Productid"].'">
	// 		            <button class="ui bottom attached button">
	// 			            <i class="add icon"></i>
	// 			            Add to cart
	// 		            </button>
	// 		        </div>

	// 	    </form>
	// 	        ';
	// 	}
	// 	//echo "<pre>";print_r( $this->product_list2);die(); 

	// 	return $this->product_list2;

	// 	 $this->load->view('products', $data);
	// 	 $this->load->model('user_model');
	// 	 redirect('products_c');
	// 	//$this->index();
	// }


	public function display_products(){

		// $product_filter = $this->uri->segment(3);
		//$product_data2 = $this->user_model->show_products();

		$product_filter = $this->uri->segment(3);
		//$product_data2 = $this->user_model->show_products();
		//echo "<pre>";print_r($product_filter);die();

		if ($product_filter == "burger"){
			$product_data = $this->user_model->show_products_burger();
			//echo "<pre>";print_r($product_data);die();

			foreach ($product_data as $key => $value2) {

				$this->product_list.=

				'<form class="column" action="'.base_url().'index.php/products_c/add_to_cart_products" method="post" enctype="multipart/form-data">

			        <div class="ui card">
			            <div class="image">
			              <img src="'.ASSETS_URL.''.$value2["ImageAddr"].'">
			            </div>
			            <div class="content">
			              <div class="header">'.$value2["ProdName"].'</div>
			              <div class="meta">
			                <a>'.$value2["category"].'</a>
			              </div>
			              <div class="description">
			                '.$value2["description"].'
			              </div>
			            </div>
						<input type="hidden" name="quantity" value="1">
			            <input type="hidden" name="product" value="'.$value2["Productid"].'">
			            <button class="ui bottom attached button">
				            <i class="add icon"></i>
				            Add to cart
			            </button>
			        </div>

			    </form>';
			    //echo "<pre>";print_r($this->product_list);die();
			   
			   //echo "<pre>";print_r($savefilter);die();
			    //$this->load->view('products', );
			    //redirect('/products_c');
			}
			//return $this->product_list;
			$savefilter = $this->product_list;
			   $this->redirect_filter($savefilter);
			
		}

		else if ($product_filter == "chicken"){
			$product_data = $this->user_model->show_products_chicken();
			//echo "<pre>";print_r($product_data);die();

			foreach ($product_data as $key => $value2) {

				$this->product_list.=

				'<form class="column" action="'.base_url().'index.php/products_c/add_to_cart_products" method="post" enctype="multipart/form-data">

			        <div class="ui card">
			            <div class="image">
			              <img src="'.ASSETS_URL.''.$value2["ImageAddr"].'">
			            </div>
			            <div class="content">
			              <div class="header">'.$value2["ProdName"].'</div>
			              <div class="meta">
			                <a>'.$value2["category"].'</a>
			              </div>
			              <div class="description">
			                '.$value2["description"].'
			              </div>
			            </div>
			            <input type="hidden" name="quantity" value="1">
			            <input type="hidden" name="product" value="'.$value2["Productid"].'">
			            <button class="ui bottom attached button">
				            <i class="add icon"></i>
				            Add to cart
			            </button>
			        </div>

			    </form>';
			    //echo "<pre>";print_r($this->product_list);die();
			   
			   //echo "<pre>";print_r($savefilter);die();
			    //$this->load->view('products', );
			    //redirect('/products_c');
			}
			//return $this->product_list;
			$savefilter = $this->product_list;
			$this->redirect_filter($savefilter);
			
		}

		else if ($product_filter == "pizza"){
			$product_data = $this->user_model->show_products_pizza();
			//echo "<pre>";print_r($product_data);die();

			foreach ($product_data as $key => $value2) {

				$this->product_list.=

				'<form class="column" action="'.base_url().'index.php/products_c/add_to_cart_products" method="post" enctype="multipart/form-data">

			        <div class="ui card">
			            <div class="image">
			              <img src="'.ASSETS_URL.''.$value2["ImageAddr"].'">
			            </div>
			            <div class="content">
			              <div class="header">'.$value2["ProdName"].'</div>
			              <div class="meta">
			                <a>'.$value2["category"].'</a>
			              </div>
			              <div class="description">
			                '.$value2["description"].'
			              </div>
			            </div>
			            <input type="hidden" name="quantity" value="1">
			            <input type="hidden" name="product" value="'.$value2["Productid"].'">
			            <button class="ui bottom attached button">
				            <i class="add icon"></i>
				            Add to cart
			            </button>
			        </div>

			    </form>';
			    //echo "<pre>";print_r($this->product_list);die();
			   
			   //echo "<pre>";print_r($savefilter);die();
			    //$this->load->view('products', );
			    //redirect('/products_c');
			}
			//return $this->product_list;
			$savefilter = $this->product_list;
			$this->redirect_filter($savefilter);
			
		}

		else if ($product_filter == "pork"){
			$product_data = $this->user_model->show_products_pork();
			//echo "<pre>";print_r($product_data);die();

			foreach ($product_data as $key => $value2) {

				$this->product_list.=

				'<form class="column" action="'.base_url().'index.php/products_c/add_to_cart_products" method="post" enctype="multipart/form-data">

			        <div class="ui card">
			            <div class="image">
			              <img src="'.ASSETS_URL.''.$value2["ImageAddr"].'">
			            </div>
			            <div class="content">
			              <div class="header">'.$value2["ProdName"].'</div>
			              <div class="meta">
			                <a>'.$value2["category"].'</a>
			              </div>
			              <div class="description">
			                '.$value2["description"].'
			              </div>
			            </div>
			            <input type="hidden" name="quantity" value="1">
			            <input type="hidden" name="product" value="'.$value2["Productid"].'">
			            <button class="ui bottom attached button">
				            <i class="add icon"></i>
				            Add to cart
			            </button>
			        </div>

			    </form>';
			    //echo "<pre>";print_r($this->product_list);die();
			   
			   //echo "<pre>";print_r($savefilter);die();
			    //$this->load->view('products', );
			    //redirect('/products_c');
			}
			//return $this->product_list;
			$savefilter = $this->product_list;
			$this->redirect_filter($savefilter);
			
		}
		
		else if($product_filter == NULL){
			$product_data2 = $this->user_model->show_products();
			foreach ($product_data2 as $key => $value2) {

				$this->product_list.=

				'<form class="column" action="'.base_url().'index.php/products_c/add_to_cart_products" method="post" enctype="multipart/form-data">

			        <div class="ui card">
			            <div class="image">
			              <img src="'.ASSETS_URL.''.$value2["ImageAddr"].'">
			            </div>
			            <div class="content">
			              <div class="header">'.$value2["ProdName"].'</div>
			              <div class="meta">
			                <a>'.$value2["category"].'</a>
			              </div>
			              <div class="description">
			                '.$value2["description"].'
			              </div>
			            </div>
			            <input type="hidden" name="quantity" value="1">
			            <input type="hidden" name="product" value="'.$value2["Productid"].'">
			            <button class="ui bottom attached button">
				            <i class="add to cart icon"></i>
				            Add to cart
			            </button>
			        </div>

			    </form>';

			   
			}
			//echo "<pre>";print_r($this->product_list);die();
			return $this->product_list;

		}

		else{
				//echo "<pre>";print_r("function null");die();
			$this->product_list = 'The category selected is unavailable. Contact our support team and we will get back to you as soon as possible.';
			$savefilter = $this->product_list;
			$this->redirect_filter($savefilter);
			//redirect('/welcome');
		}

		//return $this->product_list;
		
		

		//echo "<pre>";print_r( $this->product_list);die(); 
		//return $this->product_list;
		//$this->load->view('products.php', $data);

	}

	public function redirect_filter($redirect_filter){
		
		//echo "<pre>";print_r($redirect_filter);die();
		//redirect ('/products_c');
		$data['product_list'] = $redirect_filter;
		//$this->display_filter = $redirect_filter;
		$this->load->view('products', $data);
		//return $redirect_filter;
	}


	public function add_to_cart_products()
	{
		$insert = $this->user_model->add_product_to_cart();

		if ($insert) {
			redirect('products_c');
		} else {
		print "Failed to add product";
		}
	}







	public function create_full_cart()
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
		$random = $this->authentication_key();
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
			redirect('products_c');
		} else {
		print "Failed to add product";
		}
	}

	public function edit_cart()
	{
		$cartid=$this->input->post('cartid');
		$update = $this->user_model->edit_product_in_cart($cartid);

		if ($update) {
			redirect('products_c');
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
