<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';

sec_session_start();

if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>


<!DOCTYPE html>
<html lang="en">
        <head>
        <title>Designated Drivers</title>
        
        

        </head>

        <!--BEGIN CSS AND JS --!>

        <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://ec2-54-85-89-185.compute-1.amazonaws.com/bootstrap/dist/js/boottstrap.min.js"></script>


        <!--END CSS AND JS--!>

        <body role="document">
<!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class "icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Whatever Our Name Is</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
		<?php if($logged=='in'){
			echo "<li class='dropdown'> <a href='' class='dropdown-toggle' data-toggle='dropdown'>Welcome ";
			echo htmlentities($_SESSION['username']);
			echo "<b class='caret'></b></a>";
			
			echo"<ul class='dropdown-menu'>
                        <li><a href=''>Settings</a></li><li><a href='includes/logout.php'>Logout</a></li> </ul> </li>";
			}

			else{
				echo"<li><a href='login.php'>Login</a></li>";
		
			    }?>
			



            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#">Something</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
 </div>

    <div class="container theme-showcase" role="main">


<!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Hello!</h1>

        <p>Our mission is to prove that learning outside of the classroom is much more valueable than learning inside the classroom. Three CpE majors who know nothing about web development can learn how to make this in a week. </p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>

<!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Hello!</h1>

        <p>Our mission is to make finding DD's less of a hassle and to automate the whole process!</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>

<!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Hello!</h1>

        <p>Our mission is to make finding DD's less of a hassle and to automate the whole process!</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>

<!-- Main jumbotron for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1>Hello!</h1>

        <p>Our mission is to make finding DD's less of a hassle and to automate the whole process!</p>
        <p><a href="#" class="btn btn-primary btn-lg" role="button">Learn more &raquo;</a></p>
      </div>


		</body>

</html>

