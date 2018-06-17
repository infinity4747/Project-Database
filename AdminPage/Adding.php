<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<style>
		hr {
			height: 100%;
		}
	</style>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Lumino</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
					</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">3 mins ago</small>
										<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
									</a>
									<div class="message-body"><small class="pull-right">1 hour ago</small>
										<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
						<ul class="dropdown-menu dropdown-alerts">
							<li><a href="#">
								<div><em class="fa fa-envelope"></em> 1 New Message
									<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-user"></em> 5 New Followers
									<span class="pull-right text-muted small">4 mins ago</span></div>
							</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">Username</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<li ><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="active"><a href="Adding.php"><em class="fa fa-plus">&nbsp;</em> New Element</a></li>
			<li><a href="widgets.html"><em class="fa fa-calendar">&nbsp;</em> Widgets</a></li>
			<li><a href="charts.html"><em class="fa fa-bar-chart">&nbsp;</em> Charts</a></li>
			<li><a href="elements.html"><em class="fa fa-toggle-off">&nbsp;</em> UI Elements</a></li>
			<li><a href="update.php"><em class="fa fa-clone">&nbsp;</em> Update</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Multilevel <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 1
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 2
					</a></li>
					<li><a class="" href="#">
						<span class="fa fa-arrow-right">&nbsp;</span> Sub Item 3
					</a></li>
				</ul>
			</li>
			<li><a href="login.html"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div>
	<div 
	class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">	
	<form action="action.php"  method = 'post' enctype = 'multipart/form-data'>	
	<table>
	<tr>
	    <tr>
	    	<td><label for="lname">Isbn</label></td>
	    <td><input type="number" id="Isbn" name="isbn" placeholder="Book's isbn"></td>
	    </tr>
	    <td><label for="fname">Title</label></td>
	    <td><input type="text" id="title" name="title" placeholder="Name of book..."></td>
	   </tr>
	    <tr>
	    	<td><label for="lname">Author</label></td>
	    <td><select name='Author'>
	    	<?php
	    	$conn = pg_connect("host=localhost dbname=project user=postgres password=1234")or die("Error");
	    	$query='SELECT * from author';
	    	$res=pg_query($query);
	    	while ($row=pg_fetch_row($res)) {
	    		echo "<option  value=". $row[1]. ">".$row[0]."</option>";
	    	}
	    	?>
	    	<option value="New">New</option>
	    </select></td>
	    </tr>
	    <tr>
	    	<td><label for="lname">Language</label></td>
	    <td><input type="text" id="Language" name="Language" placeholder="In which language?"></td>
	    </tr>

	    <tr>
	    	<td><label for="lname">Year</label></td>
	    <td><input type="text" id="Year" name="Year" placeholder="Year of book..."></td>
	    </tr>
	    <tr>
	    <tr>
	    	<td><label for="lname">Genre</label></td>
	    <td><input type="text" id="Genre" name="Genre" placeholder="Genre"></td>
	    </tr>
	    <tr>
	    	<td><label for="lname">Price</label></td>
	    <td><input type="number" id="Price" name="Price" placeholder="Price"></td>
	    </tr>
	    <tr>
	    <td><label for="lname">Quantity</label></td>
	    <td><input type="number" id="quantity" name="quantity" placeholder="Number of book..."></td>
	    </tr>
	    <tr>
	     <td><label for="lname">Desctiption</label></td>
	    <td><textarea name="description" placeholder="Desctiption of your tea"></textarea></td>
	    </tr>
	    <tr>
			<td></td>
			<td style = "text-align: right;"> <input type="file" name="image"></td>
			</tr>
	    <tr>
	    <td></td>
	    <td><input type="submit" class="btn btn-primary btn-md" id="btn-chat"></td></tr>
	</div>
</body>
</html>