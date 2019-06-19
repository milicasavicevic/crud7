<?php
	
	//database connection
	include_once('Dbconnection.php');
	$db = new Dbconnection();

	//fetch data
	$sql = "SELECT * FROM projects";
	$result = $db->read($sql);

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/views/include/header.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Projects</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<body>
<div class="container">
	<h1 class="page-header text-center">Projects</h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">

			<?php
				if(isset($_SESSION['message']))
				{
					?>

						<div class="alert alert-info text-center">
							<?php echo $_SESSION['message']; ?>
						</div>
					<?php
 
					unset($_SESSION['message']);
				}
 
			?>
			<a href="#add" data-toggle="modal" class="btn btn-primary">Add New Project</a><br><br>
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Status</th>
						<th>Duration</th>
						Client Name</th> 
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
						foreach ($result as $key => $row) {
							?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['status']; ?></td>
								<td><?php echo $row['duration']; ?></td>
								<td><?php echo $project->client_name ?></td> 

								<td><a href="#edit<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-success">Edit</a> | 
									<a href="#delete<?php echo $row['id']; ?>" data-toggle="modal" class="btn btn-danger">Delete</a>
								</td>
								<?php include('project_action_modal.php'); ?>
							</tr>
							<?php     
					    }
					?>
				</tbody>
			</table>
		</div>
		<a href="http://milica.test/" class="btn btn-warning" role="button">Back</a>
	</div>
</div>
<?php include('project_add_modal.php'); ?>


</body>
</html>