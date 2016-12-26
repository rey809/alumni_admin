<?php
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
 
<div class="container">
	<div class="container">
<!-- 	<select multiple>
	<option></option>
	<option></option>
</select>
	<select multiple>
	<option></option>
	<option></option>
</select> -->

<?php
		$sql_announcement = mysqli_query($con, "SELECT * FROM announcement");
		while ($row_announcement = mysqli_fetch_assoc($sql_announcement)) {
?>
	  <div class="row valign-wrapper">
	    <div class="col s12">
	      <div class="card blue-grey darken-1">
	        <div class="card-content white-text">
	          <span class="card-title">Alumni Director</span>
	          <p><?php echo $row_announcement['details'];?></p>
	        </div>
	        <div class="card-action right-align grey lighten-4">
	          <a href="#"><i class="material-icons ">thumb_up</i>&nbsp;Like</a>
	          <a href="#"><i class="material-icons">speaker_notes</i>&nbsp;Comment</a>
	        </div>
	      </div>
	    </div>
	  </div>
<?php

}
?>
	</div>
</div>
<?php include 'includes/footer.php'; ?>

