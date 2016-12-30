<!doctype html>
<html>
<head>
    <title><?=(isset($this->title)) ? $this->title : 'MVC'; ?></title>
    <link rel="stylesheet" href="<?php echo _ROOTPATH;?>public/css/default.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.17/themes/sunny/jquery-ui.css" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo _ROOTPATH;?>public/js/custom.js"></script>
    <?php 
    if (isset($this->js)) 
    {
        foreach ($this->js as $js)
        {
            echo '<script type="text/javascript" src="'._ROOTPATH.'views/'.$js.'"></script>';
        }
    }
    ?>
</head>
<body>

<?php Session::init(); ?>

<div id="header">

    <?php if (Session::get('loggedIn') == false):?>
        <a href="index">Index</a>
    <?php endif; ?>
    <?php if (Session::get('loggedIn') == true):?>
        <a href="dashboard">Dashboard</a>

        <!-- <?php if (Session::get('role') == 'owner'):?>
            <a href="user">Users</a>
        <?php endif; ?> -->

        <a href="dashboard/logout">Logout</a>
    <?php else: ?>
        <a href="login">Login</a>
    <?php endif; ?>
</div>
    
<div id="content">
    
    