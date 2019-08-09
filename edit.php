<?php
$conn = new mysqli("localhost","root","","ticket");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="SELECT * FROM ticket where id='".$_GET['id']."'";
if($result = mysqli_query($conn, $sql)){
          if(mysqli_num_rows($result) > 0){
              while($row = mysqli_fetch_array($result)){
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit - <?php echo $row['FN'].' '.$row['LN']; ?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="style.css">
	<style type="text/css">
		div.card{
			text-align: center;
			position: relative;
			margin-left: 20%;
			margin-right: 20%;
			margin-top: 10%;
		}
		form{
			margin: 10px;
			padding: 10px;
		}
	</style>
</head>
<body>
	<div class="card">
		<h2>Your Contact Information</h2>
		<form action="update.php" method="POST">
			<input type="text" name="id" value="<?php echo $row['id']; ?>" hidden>

			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text">First Name</span>
			  </div>
			  <input type="text" name="FN" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['FN']; ?>" required>
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text">Last Name</span>
			  </div>
			  <input type="text" name="LN" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['LN']; ?>" required>
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <span class="input-group-text">E-mail</span>
			  </div>
			  <input type="email" name="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $row['email']; ?>" required>
			</div>
			<div class="input-group mb-3">
			  <div class="input-group-prepend">
			    <label class="input-group-text">Ticket</label>
			  </div>
			  <?php if ($row['FN']!='500000') { }else{ echo "selected"; } ?>
			  <select class="custom-select" name="ticket">
			    <option disabled selected>Choose...</option>
			    <option value="500000" <?php if ($row['ticket']!='500000') { }else{ echo "selected"; } ?>>Rp. 500000 (MySelf)</option>
			    <option value="750000" <?php if ($row['ticket']!='750000') { }else{ echo "selected"; } ?>>Rp. 750000 (MySelf + Commerade)</option>
			  </select>
			</div>
			<button type="submit" class="btn btn--stripe col-lg-12">Simpan</button>
		</form>
	</div>
</body>
</html>
<?php }}}?>