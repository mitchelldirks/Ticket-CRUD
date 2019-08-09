<?php
$conn = mysqli_connect("localhost","root","","ticket");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap CRUD Mysql Data Table with Modal Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
    body {
        color: #566787;
		background: #f5f5f5;
		font-family: 'Varela Round', sans-serif;
		font-size: 13px;
	}
	.table-wrapper {
        background: #fff;
        padding: 20px 25px;
        margin: 30px 0;
		border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {        
		padding-bottom: 15px;
		background: #435d7d;
		color: #fff;
		padding: 16px 30px;
		margin: -20px -25px 10px;
		border-radius: 3px 3px 0 0;
    }
    .table-title h2 {
		margin: 5px 0 0;
		font-size: 24px;
	}
	.table-title .btn-group {
		float: right;
	}
	.table-title .btn {
		color: #fff;
		float: right;
		font-size: 13px;
		border: none;
		min-width: 50px;
		border-radius: 2px;
		border: none;
		outline: none !important;
		margin-left: 10px;
	}
	.table-title .btn i {
		float: left;
		font-size: 21px;
		margin-right: 5px;
	}
	.table-title .btn span {
		float: left;
		margin-top: 2px;
	}
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
		padding: 12px 15px;
		vertical-align: middle;
    }
	table.table tr th:first-child {
		width: 60px;
	}
	table.table tr th:last-child {
		width: 100px;
	}
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }	
    table.table td:last-child i {
		opacity: 0.9;
		font-size: 22px;
        margin: 0 5px;
    }
	table.table td a {
		font-weight: bold;
		color: #566787;
		display: inline-block;
		text-decoration: none;
		outline: none !important;
	}
	table.table td a:hover {
		color: #2196F3;
	}
	table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #F44336;
    }
    table.table td i {
        font-size: 19px;
    }
	table.table .avatar {
		border-radius: 50%;
		vertical-align: middle;
		margin-right: 10px;
	}
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a, .pagination li.active a.page-link {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }    
	/* Custom checkbox */
	.custom-checkbox {
		position: relative;
	}
	.custom-checkbox input[type="checkbox"] {    
		opacity: 0;
		position: absolute;
		margin: 5px 0 0 3px;
		z-index: 9;
	}
	.custom-checkbox label:before{
		width: 18px;
		height: 18px;
	}
	.custom-checkbox label:before {
		content: '';
		margin-right: 10px;
		display: inline-block;
		vertical-align: text-top;
		background: white;
		border: 1px solid #bbb;
		border-radius: 2px;
		box-sizing: border-box;
		z-index: 2;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		content: '';
		position: absolute;
		left: 6px;
		top: 3px;
		width: 6px;
		height: 11px;
		border: solid #000;
		border-width: 0 3px 3px 0;
		transform: inherit;
		z-index: 3;
		transform: rotateZ(45deg);
	}
	.custom-checkbox input[type="checkbox"]:checked + label:before {
		border-color: #03A9F4;
		background: #03A9F4;
	}
	.custom-checkbox input[type="checkbox"]:checked + label:after {
		border-color: #fff;
	}
	.custom-checkbox input[type="checkbox"]:disabled + label:before {
		color: #b8b8b8;
		cursor: auto;
		box-shadow: none;
		background: #ddd;
	}
	/* Modal styles */
	.modal .modal-dialog {
		max-width: 400px;
	}
	.modal .modal-header, .modal .modal-body, .modal .modal-footer {
		padding: 20px 30px;
	}
	.modal .modal-content {
		border-radius: 3px;
	}
	.modal .modal-footer {
		background: #ecf0f1;
		border-radius: 0 0 3px 3px;
	}
    .modal .modal-title {
        display: inline-block;
    }
	.modal .form-control {
		border-radius: 2px;
		box-shadow: none;
		border-color: #dddddd;
	}
	.modal textarea.form-control {
		resize: vertical;
	}
	.modal .btn {
		border-radius: 2px;
		min-width: 100px;
	}	
	.modal form label {
		font-weight: normal;
	}	
</style>
<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Tickets</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addTicketModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Ticket</span></a>
						<!-- <a href="#deleteTicketModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a> -->						
					</div>
                </div>
            </div>
            <?php 
            $sql="SELECT * FROM ticket";
        if($result = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($result) > 0){
          	?>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<!-- <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th> -->
                        <th width="20%">Name</th>
                        <th>Email</th>
                        <th>Phone</th>
						<th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                	<?php while($row = mysqli_fetch_array($result)){?>
                    <tr>
						<!-- <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td> -->
                        <td width="20%"><?php echo $row['FN']." ".$row['LN']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['tel']; ?></td>

                        <td><?php echo $row['ticket']; ?></td>
                        <td>
                            <a href="#editTicketModal<?php echo $row['id'];?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                            <a href="#deleteTicketModal<?php echo $row['id'];?>" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                        </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <?php
        }}
            ?>
			<div class="clearfix">
				<?php $count="SELECT count(*) as semua FROM ticket"; 
						if($jumlah = mysqli_query($conn, $count)){
		          			if(mysqli_num_rows($jumlah) > 0){
          	while($jml = mysqli_fetch_array($jumlah)){
				?>
                <div class="hint-text">Showing <b><?php echo $jml['semua']; ?></b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
                <?php
            }}}
                ?>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addTicketModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="simpan.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Add Ticket</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group row">
							<div class="col-lg-6">
								<label>First Name</label>
								<input type="text" class="form-control" name="FN" required>
							</div>
							<div class="col-lg-6">
								<label>Last Name</label>
								<input type="text" class="form-control" name="LN" required>
							</div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" class="form-control" name="tel" required>
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
						    	<label>Ticket</label>
						  	</div>
						  	<select class="form-control" name="ticket">
							    <option disabled selected>Choose...</option>
							    <option value="500000">Rp. 500000 (MySelf)</option>
							    <option value="750000">Rp. 750000 (MySelf + Comrade)</option>
							</select>
						</div>			
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-success" value="Add">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<?php
	if($editmodal = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($editmodal) > 0){
          	while($em = mysqli_fetch_array($editmodal)){
	?>
	<div id="editTicketModal<?php echo $em['id']; ?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="update.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Ticket</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group row">
							<div class="col-lg-6">
								<label>First Name</label>
								<input type="text" class="form-control" name="FN" value="<?php echo $em['FN']; ?>" required>
							</div>
							<div class="col-lg-6">
								<label>Last Name</label>
								<input type="text" class="form-control" name="LN" value="<?php echo $em['LN']; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" name="email" value="<?php echo $em['email']; ?>" required>
						</div>
						<div class="form-group">
							<label>Phone</label>
							<input type="tel" class="form-control" name="tel" value="<?php echo $em['tel']; ?>" required>
						</div>
						<div class="input-group">
							<div class="input-group-prepend">
						    	<label>Ticket</label>
						  	</div>
						  	<select class="form-control" name="ticket">
							    <option disabled selected>Choose...</option>
							    <option value="500000" <?php if($em['ticket']!='500000'){ echo ''; }else{ echo 'selected'; }  ?>>Rp. 500000 (MySelf)</option>
							    <option value="750000" <?php if($em['ticket']!='750000'){ echo ''; }else{ echo 'selected'; }  ?>>Rp. 750000 (MySelf + Comrade)</option>
							</select>
						</div>			
					</div>
					<input type="text" name="id" value="<?php echo $em['id']; ?>" hidden>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-info" value="Save">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Modal HTML -->
	<div id="deleteTicketModal<?php echo $em['id'];?>" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Delete Ticket</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p class="alert alert-danger"><?php echo $em['FN']." ".$em['LN']; ?>'s ticket will be removed.</p>	
						<p class="text-danger"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<div class="col-lg-12">
						<p class="text">Are you sure you want to delete Records?</p>
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<a href="delete.php?id=<?php echo $em['id'];?>" class="btn btn-danger" value="Delete">Delete</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php }}} ?>
</body>
</html>                                		                            