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

  <nav class="nav-extended blue darken-3">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo"><img src="assets/img/alumnilogo.png" alt="" width="200" height="50" style="background-color: white; border-bottom-right-radius: 20px;"></a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="sass.html">Gallery</a></li>
        <li><a href="announcement.php">Announcement</a></li>
        <li><a href="admin-logout.php">Logout</a></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Gallery</a></li>
        <li><a href="announcement.php">Announcement</a></li>
        <li><a href="admin-logout.php">Logout</a></li>
      </ul>
        <?php
          include ('nav-pill.php');
        ?>
      </ul>
    </div>
  </nav>

    <body>
