<?php
$conn = new mysqli("localhost","root","","ticket");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$FN=$_POST['FN'];
$LN=$_POST['LN'];
$CN=$FN.' '.$LN;
$email=$_POST['email'];
$tel=$_POST['tel'];
$ticket=$_POST['ticket'];
$id=$_POST['id'];

$sql="UPDATE ticket SET FN='$FN',LN='$LN',email='$email',tel='$tel',ticket='$ticket' where id='$id'"; 
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Input Berhasil, $CN ')</script>";
    header('location: table.php');
} else {
    echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "')</script>";
    echo "<script>alert('MOHON LAKUKAN REGISTRASI ULANG')</script>";
}
?>