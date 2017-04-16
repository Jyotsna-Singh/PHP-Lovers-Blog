<?php include 'includes/header.php'; ?>
<?php
//Create DB Object
$db = new Database;
//Create Query
$query = "SELECT posts.*, categories.name FROM posts
			INNER JOIN categories
			ON posts.category = categories.id
			ORDER BY posts.date DESC";
//Run Query
$posts = $db->select($query);

	//Create Query
	$query = "SELECT * FROM categories
				ORDER BY categories.name DESC";
	//Run Query
	$categories = $db->select($query);
?>

<table class="table table-striped">
	<tr>
		<th>Post ID#</th>
		<th>Post Title</th>
		<th>Category</th>
		<th>Author</th>
		<th>Date</th>
	</tr>
		<?php while($row = $posts->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['author']; ?></td>
				<td><?php echo formatDate($row['date']); ?></td>
			</tr>
		<?php endwhile; ?>
</table>


<table class="table table-striped">
	<tr>
		<th>Category ID#</th>
		<th>Category Name</th>
	</tr>
	<?php while($row = $categories->fetch_assoc()) : ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>			
			</tr>
		<?php endwhile; ?>
</table>

<?php include 'includes/footer.php'; ?>	
	     