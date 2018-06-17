<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>bookinti</title>
		<link rel="stylesheet" href="style.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" type="image/x-icon" href="Images/favicon.ico">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Podkova:400,500,600,700,800&amp;subset=cyrillic,cyrillic-ext,latin-ext">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=latin,latin-ext" type="text/css" media="all">
	</head>
	<body>
		<header>
			<nav>
				<a href="#">HOME</a>
				<a href="#">CONTACT</a>
				<a href="#">BLOG</a>
			</nav>
			<div id="div_1">
				<span>
					<img src="Images/logo.jpg"/>
				</span>
			</div>
			<div id="div_2">
				<a href="http://localhost/project2/list.php?genre=leadership" id="leadership">LEADERSHIP</a>
				<a href="http://localhost/project2/list.php?genre=children" id="childrens">CHILDREN'S BOOKS</a>
				<a href="http://localhost/project2/list.php?genre=thriller" id="thriller">THRILLER</a>
				<a href="http://localhost/project2/list.php?genre=romance" id="romance">ROMANCE</a>
			</div>
		</header>
		<section>
			<?php
				$dbconn = pg_connect("host=localhost dbname=project user=postgres password=1234") or die('Could not connect: ' . pg_last_error());
				
				$query = 'SELECT b.genre, bd.title, bd.isbn, b.quantity, c.comment FROM book_detail bd join book b on b.book_id=bd.book_id join comment c on b.book_id=c.book_id WHERE '.
				'b.book_id='.$_GET["id"];
				$result = pg_query($query) or die('Query failed: ' . pg_last_error());
				
				while ($row = pg_fetch_assoc($result)) {
			?>
			<div id="element">
				<div class="home">
					<a href="index.html"><i class="fa fa-home"/></i></a>
					<p class="grey"><?=$row["genre"]?></p>
					<p class="grey" id="p_list"></p>
					<p id="p_element"><?=$row["title"]?></p>
				</div>
				<div class="book_info">
					<div class="book_images">
						<div class="current_image">
							<img id="current" src="Images/Gallery/Element1/element1.jpg"/>
						</div>
						<div class="gallery">
							<div onClick="leftClick()" id="left">&larr;</div>
							<div onClick="rightClick()" id="right">&rarr;</div>
							<img id="1" onClick="changeCurrent(1)" src="Images/Gallery/Element1/book1.jpg" value="visible"/>
							<img id="2" onClick="changeCurrent(2)" src="Images/Gallery/Element1/book2.jpg" value="visible"/>
							<img id="3" onClick="changeCurrent(3)" src="Images/Gallery/Element1/book3.jpg" value="visible"/>
							<img id="4" onClick="changeCurrent(4)" src="Images/Gallery/Element1/book4.jpg" value="visible"/>
							<img id="5" onClick="changeCurrent(5)" src="Images/Gallery/Element1/book5.jpg" value="visible"/>
							<img id="6" onClick="changeCurrent(6)" src="Images/Gallery/Element1/book6.jpg" value="hidden"/>
						</div>
					</div>
					<div class="book_description">
						<h1 id="heading"><?=$row["title"]?></h1>
						<div class="rating">
							<p>Rating</p>
							<div class="rating_stars" id="rating1">
								<div class="fa fa-star checked"></div>
								<div class="fa fa-star checked"></div>
								<div class="fa fa-star checked"></div>
								<div class="fa fa-star checked"></div>
								<div class="fa fa-star"></div>
							</div>
							<a href="#reviews"><p class="readers">Read reviews(1)</p></a>
						</div>
						<p class="p" id="reference">Reference: <span><?=$row["isbn"]?></span></p>
						<p class="p">Condition: <span>New product</span></p>
						<p class="p" id="number"><?=$row["quantity"]?> <span style="font-weight:400; margin:0">Items</span></p>
						<div class="color_lang">
							<div class="color">
								<p class="p">Color</p>
								<span onClick="changeColor(1)" id="first_color" selected="selected"><div id="color1"></div></span>
								<span onClick="changeColor(2)" id="second_color"><div id="color2"></div></span>
							</div>
							<div class="lang">
								<p class="p">Language</p>
								<select>
									<option>English</option>
									<option>Spanish</option>
									<option>French</option>
									<option>German</option>
								</select>
							</div>
						</div>
						<div class="format">
							<p>Format</p>
							<label><input type="radio" name="format" value="paper" checked="checked"/>Paperback</label>
							<label><input type="radio" name="format" value="hard"/>Hardcover</label>
						</div>
						<div class="prices">
							<div class="new_price" id="price1">8.00$</div>
							<div class="old_price" id="price2">10.00$</div>
							<p id="sale_percent">-20%</p>
						</div>
						<p id="reduced">Reduced price!</p>
						<div class="amount">
							<input type="number" value="1" min="1" max="<?=$row["quantity"]?>"/>
							<a >Add to cart</a>
						</div>
						<div class="heart_sms">
							<i class="fa fa fa-heart-o fa-2x" area-hidden="true"></i>
							<i class="fa fa fa-envelope-o fa-2x" aria-hidden="true"></i>
						</div>
						</br></br></br></br></br></br></br></br></br>
					</div>
				</div>
				<?php } ?>
				<div id="reviews">
					<h3>REVIEWS</h3>
					<div class="rating">
						<p id="grade" >Grade</p>
						<div class="rating_stars" id="rating2">
							<div class="fa fa-star checked"></div>
							<div class="fa fa-star checked"></div>
							<div class="fa fa-star checked"></div>
							<div class="fa fa-star checked"></div>
							<div class="fa fa-star"></div>
						</div>
					</div>
					<?php
					$query2='SELECT c.comment, u.full_name, c.comment_time from comment c join user_table u on u.user_id=c.user_id where c.book_id='.$_GET["id"];
					$res=pg_query($query2);
					while ($row=pg_fetch_assoc($res)) {
					?>
					<p><?=$row["full_name"]?></p>
					<p class="grey" id="date"><?=$row["comment_time"];?></p>
					<p>Guys, YOU ROCK!!!</p>
					<p class="grey"><?=$row["comment"]?></p>
					<?php } ?>
					<form action="element.php">
						<table>
							<tr>
						<td><label for="lname">User name</label></td>
					    <td><input type="text"  name="user_name" placeholder="Name"></td>
						</tr>
						 <td><label for="lname">Comment</label></td>
					    <td><textarea name="Comment" placeholder="Comment"></textarea></td>
					    </tr>
					    <input type="hidden" name="id" value="<?=$_GET["id"]?>">
					    <td><input type="submit" class="btn btn-primary btn-md" id="btn-chat"></td>
					    </table>
					</form>
				</div>
			</div>
			<?php
				if(isset($_GET['user_name'])&& isset($_GET['Comment'])){
					$user_name=$_GET['user_name'];
					$comment=$_GET['Comment'];
					$user_id=null;
					$query22="SELECT user_id FROM user_table WHERE full_name='$user_name'";
					$rest=pg_query($query22);
					while ($row=pg_fetch_row($rest)) {
						$user_id=$row[0];
					}
					$query3="INSERT INTO comment(user_id,comment,book_id) VALUES('$user_id','$comment',".$_GET['id'].") ";
					$reee=pg_query($query3);
					}
			?>
		</section>
		<footer>
			<div id="upper">
				<div class="info">
					<h1>Information</h1>
					<a href="#">Specials</a>
					<a href="#">New products</a>
					<a href="#">Top sellers</a>
					<a href="#">Our stores</a>
					<a href="#">Contact us</a>
					<a href="#">Delivery</a>
					<a href="#">About us</a>
					<a href="#">Warranty</a>
					<a href="#">FAQs</a>
					<a href="#">Support</a>
					<a href="#">Sitemap</a>
				</div>
				<div class="info">
					<h1>Categories</h1>
					<a href="#">Books</a>
					<a href="#">CD/DVD</a>
					<a href="#">Comics</a>
					<a href="#">Calendars</a>
					<a href="#">Cards</a>
					<a href="#">Magazines</a>
					<a href="#">Blanks</a>
					<a href="#">Rarity</a>
					<a href="#">Antiques</a>
					<a href="#">Writing materials</a>
				</div>
				<div class="info">
					<h1>My account</h1>
					<a href="#">My orders</a>
					<a href="#">My merchandise returns</a>
					<a href="#">My credit slips</a>
					<a href="#">My addresses</a>
					<a href="#">My personal info</a>
				</div>
				<div id="about_us">
					<h1>About the Store</h1>
					<p>Our business is very noble and it has many traditions. That is why we have such a great number of devoted clients all over the country. It is a great pleasure to give people the knowledge and the power of the intelligence. We all must remember that our forefathers didn&acute;t have such unlimited abilities as we have.</p>
				</div>
			</div>
			<div id="bottom">
				<a href="#">&copy; 2017 - Ecommerce software by PrestaShop&trade;</a>
			</div>
		</footer>
		<script src="script.js"></script>
	</body>
</html>