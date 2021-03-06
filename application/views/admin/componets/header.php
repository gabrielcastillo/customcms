<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $site_name; ?></title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <?php if( $this->uri->segment(2) == 'page'): ?>
    <link href="<?php echo base_url('public/css/jquery-ui.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/jquery-ui.structure.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('public/css/jquery-ui.theme.min.css'); ?>" rel="stylesheet">
    <?php endif; ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>