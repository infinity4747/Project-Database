<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Books - bookinti</title>
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
				$title;
				$display = "block";
				if (isset($_GET["search"]) || isset($_GET["genre"])) {
					$dbconn = pg_connect("host=localhost dbname=project user=postgres password=1234") or die('Could not connect: ' . pg_last_error());
					$query = 'SELECT b.genre, bd.title, b.price, b.book_id FROM book_detail bd join book b on b.book_id=bd.book_id WHERE ';
					if (isset($_GET["genre"])) {
						$query .= 'lower(genre) like (\'%'.$_GET["genre"].'%\')';
						$title = $_GET["genre"];
					}
					else {
						$query .= 'lower(title) like lower(\'%'.$_GET["search"].'%\')';
						$title = "Search";
					}
					
					$result = pg_query($query) or die('Query failed: ' . pg_last_error());
					
					if (pg_num_rows($result) == 0){
						$display = "none";
						echo 
					'<div class="not_found">
						<div class="home">
							<a href="index.html"><i class="fa fa-home"/></i></a>
								<p id="title">Search</p>
						</div>
						<p class="alert">No results were found for your search "'.$_GET["search"].'".</p>
					</div>';
					}
			?>
			<div id="list" style="display:<?=$display?>">
				<div class="home">
					<a href="index.html"><i class="fa fa-home"/></i></a>
						<p id="title"><?=$title?></p>
				</div>
				<div class="inner">
					<div class="category_description">
						<div class="description_texts">
							<span id="first_title">BOOKS</span>
							<p>Well, reading books as a hobby was always a noble, pleasant and very useful kind of activity. It gives knowledge, exerts on the process of development of your personality. For a long period of time books were very rare and because of such confines only some "esoteric" people could afford them. And you know what? Books always have some notes of mysticism. Just remember that special atmosphere of solitude in the library or in the old book-store, it seemed that imponderable scent of rational identity is in the air... The unique smell of old and new pages, soft cover and so on. Yeah, they are worth our admiring.</p>
						</div>
						<div class="description_image">
							<img id="category_image" src="Images/Category/Books/category_default.jpg"/>
						</div>
					</div>
					<div class="number_of_books">
						<span id="second_title">BOOKS</span>
						<p>There are 20 products.</p>
					</div>
					<div class="subcategories">
						<p>Subcategories</p>
						<ul>
							<li>
								<img id="subcategory1" src="Images/Category/Books/category1.jpg"/>
								<a id="subcategory_1">CHILDREN'S</br>BOOKS</a>
							</li>
							<li>
								<img id="subcategory2" src="Images/Category/Books/category2.jpg"/>
								<a id="subcategory_2">SCIENCE FICTION</a>
							</li>
							<li>
								<img id="subcategory3" src="Images/Category/Books/category3.jpg"/>
								<a id="subcategory_3">DETECTIVE</br>STORIES</a>
							</li>
							<li>
								<img id="subcategory4" src="Images/Category/Books/category4.jpg"/>
								<a id="subcategory_4">ROMANCE</a>
							</li>
							<li>
								<img id="subcategory5" src="Images/Category/Books/category5.jpg"/>
								<a id="subcategory_5">BELLES-LETTRES</a>
							</li>
							<li>
								<img id="subcategory6"></img>
								<a id="subcategory_6"></a>
							</li>
						</ul>
					</div>
					<div class="sorting">
						<div class="sort">
							<p>Sort by</p>
							<select id="sort" name="<?=$row["genre"]?>">
								<option value="price:asc">Price: Lowest first</option>
								<option value="price:desc">Price: Highest first</option>
								<option value="title:asc">Product Name: A to Z</option>
								<option value="title:desc">Product Name: Z to A</option>
							</select>
						</div>
					</div>
					<span id="query"></span>
					<div class="books">
						<?php
						while ($row = pg_fetch_assoc($result)) {
						?>
						<div class="book">
							<div class="top">
								<div class="image_container">
									<a href="http://localhost/dashboard/project2/element.php?id=<?=$row["book_id"]?>" class="image">
										<img src="Images/Gallery/Books/book1.jpg"/>
									</a>
								</div>
								<p class="sale_percentage">-20%</p>
							</div>
							<div class="bottom">
								<h6><?=$row["genre"]?></h6>
								<h5><?=$row["title"]?></h5>
								<div class="description">Well, reading books as a hobby was ...</div>
								<div class="prices">
									<span class="old_price">$10.00</span>
									<span class="new_price">$<?=$row["price"]?></span>
								</div>
							</div>
						</div>
						<?php
						}}
						?>
					</div>
				</div>
			</div>
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