<!DOCTYPE html>
<?$config = include($_SERVER['DOCUMENT_ROOT'].'/core/config.php');?>
<head>
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
    
    <title><?php echo $config['site_title']?> - ManageMyServer</title>
    <meta charset="utf-8">
    
    <link rel="stylesheet" type="text/css" href="/core/assets/css/bootstrap.min.css">
    
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
    
    <link rel="stylesheet" type="text/css" href="/core/assets/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" type="text/css" href="/core/assets/css/ripples.min.css">
    
    <script src="/core/assets/js/jquery-3.1.1.min.js"></script>
    <script src="/core/assets/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="/core/assets/js/material.min.js">
    <link rel="stylesheet" type="text/css" href="/core/assets/js/ripples.min.js">
    
    <style>
        p {
            font-size: 12;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/"><?php echo $config['site_title']?></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <?php if($_SESSION['username'] != null){
                        echo '
                        <li><a href="/servers">Servers</a></li>
                        <li><a href="/status">Status</a></li>';
                        };?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(strtolower($_SESSION['rank']) == "admin" | strtolower($_SESSION['rank']) == "superuser" ){
                              echo '<li><a href="/nodes">Nodes</a></li>
                              <li><a href="/admin">Admin</a></li>';
                          };?>
                    <?php if($_SESSION['username'] == null){
                              echo '<li><a href="/login">Log In</a></li>';
                          };?>
                    <?php if($_SESSION['username'] != null){
                              echo '<li><a href="/logout">Log Out</a></li>';
                          };?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container">
