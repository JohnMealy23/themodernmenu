<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>The Modern Menu</title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../../assets/js/html5shiv.js"></script>
      <script src="../../assets/js/respond.min.js"></script>
    <![endif]-->
	<?php 
		if(substr( $_SERVER['HTTP_HOST'], 0, 4 ) == 'dev.') { ?>
			<script type="text/javascript" src="<?php echo base_url()?>js/jquery-1.7.min.js" charset="utf-8"></script>
		<?php } else { ?>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" charset="utf-8"></script>
		<? }
	?>
	<script type="text/javascript" src="<?php echo base_url()?>includes/jqueryte/jquery-te-1.0.5.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/javascript.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>js/jquery.sortable.js"></script>
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/boilerplate.css" charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>includes/jqueryte/jquery-te-Style.css" charset="utf-8" />
	<link type="text/css" rel="stylesheet" href="<?php echo base_url()?>css/styles.css" charset="utf-8" />
	
</head>
<body>
  	<header>
  		<div class="container">
					<div class="login col-xs-6 col-md-6">		
						<?php 
							if($this->session->userdata('logged_in')){
								 ?>
									<a href="home/logout">Logout</a>
								<?php
							} else { ?>
									<a href='<?php echo base_url()?>login'>Login</a>
							<?php };
						?> | View Cart
					</div>
					<div class="login col-xs-6 col-md-6">Search: <div style="width:200px;height:55px;border:1px solid #000000; margin-left:15px;display:inline;"></div>
				</div>

  			<div class=""></div>
  		</div>
  	</header>
