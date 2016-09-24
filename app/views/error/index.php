<?php
if(!defined('ROOT')) {
	die('Direct access not permitted');
}
switch ($status) {
	case '404':
	header("HTTP/1.0 404 Not Found");
	$status_title = "HTTP/1.0 404 Not Found";
	$status_detail = "Not found : ".$file;
	break;
	default:

	break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title><?php echo $status_title; ?></title>
	<link href="<?php echo $this->app->config['base_url']; ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body id="page-top">
    	<section id="intro" class="intro-section">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-12" align="center">
    					<h1><?php echo $status_title; ?></h1>
    					<p class="alert alert-warning"><strong>Error:</strong> <?php echo $status_detail; ?></p>
    					<a class="btn btn-default" href="<?php echo $this->app->config['base_url']; ?>">Click here back to home</a>
    				</div>
    			</div>
    		</div>
    	</section>
    </body>
    </html>
    <?php
    die();
    ?>