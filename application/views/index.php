<!DOCTYPE html>
<?php 
  if ($this->session->userdata('logged_in') == TRUE) {
    $links = '<a class="ui inverted button" href="welcome/logout">Log Out</a>';
    $links2 = '<div class="item">
          <a class="ui button" href="welcome/logout">Log Out</a>
        </div>';
  } else {
    $links = '<a class="ui inverted button login_btn">Log in</a>
    <a class="ui  inverted button signup_btn">Sign Up</a>';
    $links2 = '<div class="item">
          <a class="ui red button login_btn">Log in</a>
        </div>
        <div class="item">
          <a class="ui orange button signup_btn">Sign Up</a>
        </div>';
  }
  
?>
<html>
<head>
  <!-- Standard Meta -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properities -->
  <title>Homepage</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/semantic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
  <script src="<?php echo base_url();?>assets/js/jquery.js"></script>
  <script src="<?php echo base_url();?>assets/dist/semantic.js"></script>
  <script src="<?php echo base_url();?>assets/js/main.js"></script>
 
</head>
<body>
<!-- Following Menu -->
  <header class="ui large top fixed hidden menu">
    <div class="ui container">
      <a class="active item">Home</a>
      <a href="products_c" class="item">Menu</a>
      <a class="item">Company</a>
      <a class="item">Careers</a>
      <div class="right menu">
        <?php echo $links2;?>
         <div class="item">
          <a class="ui orange icon button cart_button"><i class="cart icon"></i></a>
        </div>
      </div>
    </div>
  </header>
<!-- Sidebar Menu -->
<div class="ui right vertical large very wide sidebar menu cart_sidebar">
  <a class="item labels">SHOPPING CART<p class="ui right floated header"><?php //echo $cart_user; ?>
  </p></a>
  <div class="active item">
    <p class="c_name">
      Item
    </p>
    <p class="c_amt">
      Servings
    </p>
    <p class="c_edit">Edit Order</p>
  </div>
  <?php
    echo $cart;
  ?>
  
</div>


<!-- Page Contents -->
<div class="pusher">
  <div class="ui inverted vertical masthead homepage_image center aligned segment">

    <div class="ui container">
      <div class="ui large secondary pointing menu">
        <!-- <a class="active item">Home</a>
        <a class="item">Work</a>
        <a class="item">Company</a>
        <a class="item">Careers</a> -->
        <a class="active item logo"><img class="ui small image" src="<?php echo ASSETS_URL;?>images/CastarlyRock.png"></a>
        <div class="right item">
          <?php echo $links;?>
          <a class="ui orange icon inverted button cart_button"><i class="cart icon"></i></a>
        </div>
      </div>
    </div>

    <div class="ui text container">
      <h1 class="ui inverted header">
        Order Your Food from Your Favorite Restaurant
      </h1>
      <!-- <h2>Do whatever you want when you want to.</p> -->
      <!-- <div class="ui huge primary button">Get Started <i class="right arrow icon"></i></div> -->
      <div class="ui segments add_to_cart">
        <form id="cart" action="welcome/add_to_cart" method="post" enctype="multipart/form-data" >
          <h3 class="ui inverted header">
            <select class="ui dropdown" name="location">
              <option value="">Choose Your Location</option>
              <option value="madaraka">Madaraka</option>
              <option value="cbd">CBD</option>
              <option value="westlands">Westlands</option>
            </select>
          </h3>
          <div class="ui centered grid">
            <div class="six wide column">
              <select class="ui dropdown" name="product">
                <option value="">What would yu like to eat</option>
                <option value="1">Chicken Wings</option>
                <option value="2">Drum sticks</option>
                <option value="3">Pork Chops</option>
              </select>
            </div>
            <div class="six wide column">
              <select class="ui dropdown" name="quantity">
                <option value="">No of pieces</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
              </select>
            </div>
              <!-- <input type="hidden" name="customer_id" value="1" > -->
              <div class="six wide center aligned column">
                <button class="ui orange button">ADD</button>
              </div>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe segment">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header">We Help Companies and Companions</h3>
          <p>We can give your company superpowers to do things that they never thought possible. Let us delight your customers and empower your needs...through pure data analytics.</p>
          <h3 class="ui header">We Make Bananas That Can Dance</h3>
          <p>Yes that's right, you thought it was the stuff of dreams, but even bananas can be bioengineered.</p>
        </div>
        <div class="six wide right floated column">
          <img src="<?php echo ASSETS_URL;?>images/food2.jpg" class="ui large bordered rounded image">
        </div>
      </div>
      <div class="row">
        <div class="center aligned column">
          <a class="ui huge button">Check Them Out</a>
        </div>
      </div>
    </div>
  </div>


  <div class="ui vertical stripe quote segment">
    <div class="ui equal width stackable internally celled grid">
      <div class="center aligned row">
        <div class="column">
          <h3>"What a Company"</h3>
          <p>That is what they all say about us</p>
        </div>
        <div class="column">
          <h3>"I shouldn't have gone with their competitor."</h3>
          <p>
            <img src="<?php echo ASSETS_URL;?>images/chicken1.jpg" class="ui avatar image"> <b>Nan</b> Chief Fun Officer Acme Toys
          </p>
        </div>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe segment">
    <div class="ui text container">
      <h3 class="ui header">Breaking The Grid, Grabs Your Attention</h3>
      <p>Instead of focusing on content creation and hard work, we have learned how to master the art of doing nothing by providing massive amounts of whitespace and generic content that can seem massive, monolithic and worth your attention.</p>
      <a class="ui large button">Read More</a>
      <h4 class="ui horizontal header divider">
        <a href="#">Case Studies</a>
      </h4>
      <h3 class="ui header">Did We Tell You About Our Bananas?</h3>
      <p>Yes I know you probably disregarded the earlier boasts as non-sequitor filler content, but its really true. It took years of gene splicing and combinatory DNA research, but our bananas can really dance.</p>
      <a class="ui large button">I'm Still Quite Interested</a>
    </div>
  </div>


  <div class="ui inverted vertical footer segment">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui inverted header">About</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Sitemap</a>
            <a href="#" class="item">Contact Us</a>
            <a href="#" class="item">Religious Ceremonies</a>
            <a href="#" class="item">Gazebo Plans</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Services</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Banana Pre-Order</a>
            <a href="#" class="item">DNA FAQ</a>
            <a href="#" class="item">How To Access</a>
            <a href="#" class="item">Favorite X-Men</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Footer Header</h4>
          <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Login form -->
<div class="ui modal login_form">
  <i class="close icon"></i>
  <div class="header">
    Login here
  </div>
  
 
    
    <form class="ui form" id="home_login" action="welcome/login" method="post" enctype="multipart/form-data" >
       <div class="field">
        <label>Email Address</label>
        <input type="email" name="email" id="pass" placeholder="Email Address">
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="pass" id="pass" placeholder="Password">
      </div>
      <button class="ui positive labeled icon button" type="submit"><i class="checkmark icon"></i>Submit</button>
    </form>
 
</div>
<!-- signup form -->
<div class="ui modal signup_form">
  <i class="close icon"></i>
  <div class="header">
    Sign up here
  </div>
  <form class="ui form actual_signup_form" id="home_signup" action="welcome/registration" method="post" enctype="multipart/form-data" >
      <div class="field">
        <label>Name</label>
        <input type="text" name="name" id="name" placeholder="Name">
      </div>
      <div class="field">
        <label>Email Address</label>
        <input type="email" name="email" id="email" placeholder="Email Address">
      </div>
      <div class="field">
        <label>Telephone Number</label>
        <input type="text" name="tel" id="tel" placeholder="Telephone Number">
        
      </div>
      <div class="field">
        <label>Password</label>
        <input type="password" name="password" id="password" placeholder="Password">
      </div>
      <div class="field">
        <label>Confirm Password</label>
        <input type="password" name="con_password" id="con_password" placeholder="Password">
      </div>
      <button class="ui positive labeled icon button" type="submit"><i class="checkmark icon"></i>Submit</button>
    </form>
</div>

<!-- full cart form -->
<div class="ui modal full_cart">
  <i class="close icon"></i>
  <div class="header">
    Cart
  </div>
  
<div class="ui middle aligned divided list all_contacts">
  <ul class="item">
    <?php
    echo $cart2;
  ?>
  </ul>
</div>

</div>


</body>
</html>
