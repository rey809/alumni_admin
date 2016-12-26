<?php

session_start();  

 if (isset($_SESSION['username'])){
  header("Location: admin-page.php");
 }

include 'includes/connect.php';
?>
 <!DOCTYPE html>
 <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">
    
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    
      <link rel="stylesheet" href="assets/css/prism.css">

      <link rel="stylesheet" href="assets/css/admin-style.css">

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
  <nav>
    <div class="nav-wrapper blue darken-3">
      <a href="#!" class="brand-logo">Logo</a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
      <li><a href="admin-page.php">Home</a></li>
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
      <li><a href="admin-page.php">Home</a></li>
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
      </ul>
    </div>
  </nav>
  <body>

  <div class="container">
    <form  role="form" method="post" action="#">
        <div class="group">
          <input type="text" name="username"><span class="highlight"></span><span class="bar"></span>
          <label >Name</label>
        </div>
        <div class="group">
          <input type="password" name="password"><span class="highlight"></span><span class="bar"></span>
          <label ">Password</label>
        </div>
        <div class="right-align">
          <input class="btn btn-lg btn-success " type="submit" value="login" name="login" >  
        </div> 
    </form>   
 </div> 
 </body>
<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    include 'includes/connect.php';
    if(isset($_POST['login']))  
    {  
        $username=$_POST['username'];  
        $password=$_POST['password'];  
      
        $check_user="select * from personnel WHERE username='$username' AND password='$password'";  
      
        $run=mysqli_query($con,$check_user);  
      
        if(mysqli_num_rows($run))  
        {  
            echo "<script>window.open('admin-page.php','_self')</script>";  
      
            $_SESSION['username']=$username;//here session is used and value of $user_email store in $_SESSION.  
      
        } 
        else  
        {  
          echo "<script>alert('Email or password is incorrect!')</script>";  
          echo "<script>window.open('director-login.php','_self')</script>"; 
        }  
    }  
?>  
<?php include 'includes/footer.php'; ?>
