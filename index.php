<?php  
include('code.php'); 
?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM crud WHERE id=$id");

		if ($record->num_rows == 1) {
			$s = mysqli_fetch_array($record);
			$Title = $s['Title'];
			$Author = $s['Author'];
			$Subject = $s['Subject'];
			
		}
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
         <title>Home | PHP MySQL CRUD System </title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>     
        <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
        <script src="bootstrap.bundle.min.js"></script>
     
    </head>
<body>

    

    <nav class="navbar navbar-default" style="background-color: #28a4c9">
    <div class="container mt-5">    
<?php if (isset($_SESSION['message'])): ?>
	<div class="alert alert-warning alert-dismissible" role="alert">
		<strong><?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?> </strong>
		
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">&times;</button>
	</div><?php endif ?></div>
        
    </nav>
    <div class="container mt-5">
    <h2 class="text-center alert alert-danger">CRUD APP, Create, Update, Delete, PHP, MySQL </h2>
        
    </div>
<div class="row"><div class="col-md-1"></div>
    <div class="col-md-5">
         <h4 class="text-center alert alert-info">Add New Book</h4>
<form method="post" action="code.php">
    
    <div class="form-group">
        <label for="Title">Title</label>
        <input type="text" name="Title" class="form-control" style="width:80%;" value="<?php echo $Title; ?>" required="required"/>
        </div>
         <div class="form-group">
        <label for="Author">Author</label>
        <input type="text" name="Author" class="form-control" style="width:80%;" value="<?php echo $Author; ?>" required="required"/>
        </div>
        <div class="form-group">
        <label for="Author">Subject</label>
        <input type="text" name="Subject" class="form-control" style="width:80%;" value="<?php echo $Subject; ?>"  required="required"/>
        </div>
		<div class="form-group">
       
        <input type="hidden" name="id" class="form-control" style="width:80%;" value="<?php echo $id; ?>"/>
        </div>
         <div class="form-group">
        <button type="submit" name="save" a class="btn btn-sm btn-success "><span class="glyphicon glyphicon-plus"></span>ADD</button>
		<button type="submit" name="update" a class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-arrow-up"></span> Update</a>
    </div>
</form>
    </div>
    <div class="col-md-5">
 <h4 class="text-center alert alert-info">Book Information</h4>
 <?php $results = mysqli_query($db, "SELECT * FROM crud"); ?>
<table class="table table-bordered">
    <thead class="alert-info">
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Subject</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = mysqli_fetch_array($results)) { 
	?>    
        <tr>
            <td><?php echo $row['Title']; ?> </td>
            <td><?php echo $row['Author']; ?>  </td>
            <td> <?php echo $row['Subject']; ?> </td>

            <td><center><a class="btn btn-sm btn-warning" href="index.php?edit=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> 
			<a class="btn btn-sm btn-danger" href="code.php?delete=<?php echo $row['id']; ?>"><span class="glyphicon glyphicon-trash"></span> Delete</a></center></td>
        </tr>
        
    </tbody><?php } ?>
</table></div><div class="col-md-1"></div></div>





</body>
</html>