<?php	
	$book_id=6;
	function set_data(){
		$connect =pg_connect("host=localhost dbname=project user=postgres password=1234")or die("Error");
		if(!$connect){
			echo "Failed to connect to the server";
		}
		$book_id=null;
		$author_id=null;
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$author=$_POST['Author'];
		$Language= $_POST['Language'];
		$Year= $_POST['Year'];
		$Genre= $_POST['Genre'];
		$Price= $_POST['Price'];
		$Description= $_POST['description'];
		$quantity=$_POST['quantity'];
		$image = $_FILES['image']['name'];
		if ($author=="New") {
			$sql="INSERT INTO author(author_name) VALUES ('$author')";
			pg_query($sql);
			$query="SELECT author_id from author where author_name=('$author')";
				$query_res=pg_query($query);
				while ($row1=pg_fetch_row($query_res)) {
					$author_id=$row1[0];
				}
		}
		else
			$author_id=$author;
		$sql1="INSERT INTO book(isbn,author_id,genre,image,price,quantity) VALUES ('$isbn','$author_id','$Genre','$image','$Price','$quantity')";
		$result1=pg_query($connect,$sql1);
		$query_book="Select book_id from book where author_id='$author_id'";
		$book_id=pg_query($query_book);
		while ($row=pg_fetch_row($book_id)) {
			$book_id=$row[0];
		}
		$sql3 = "INSERT INTO book_detail(isbn,title,description,language,year,book_id) VALUES ('$isbn', '$title', '$Description','$Language','$Year','$book_id')";

				
		$result=pg_query($connect,$sql3);
				
		if(!$result){
			echo 'Not inserted';
		}
		else {
			header("Location: index.php");
			die();
		}	
}
	set_data();
?>

