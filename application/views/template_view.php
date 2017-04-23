<!DOCTYPE html>
<html lang="en">
<head>
  <title>News</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">NEWS</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url();?>home/">Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if($this->session->userdata('login') == FALSE) {
                    echo "<li>
                    <a href='".base_url()."login'   class='btn navbar-btn btn-ghost'><i class='fa fa-sign-in'></i>Login</a></li>";
                } else{
                  echo "<li><a href='".base_url()."account/'>Hi, ".$this->session->userdata('username')."</a></li>";
                    echo "<li><a href='".base_url()."login/logout'>Log out</a></li>"
                  ;
                }
                ?>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
  <?php
        if(!empty($main_view)){
            $this->load->view($main_view);
        }
    ?>

</div>

</body>
</html>
