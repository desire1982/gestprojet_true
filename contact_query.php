<?php
session_start();
include ('/config/db.php');

if(isset($_POST['send_message'])) {

$full_name = $_POST['full_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$code_confirmation = $_POST['code_confirmation'];

$query_trapper = $conn->prepare('SELECT * FROM tbl_contact WHERE email = ?');
$query_trapper->execute(array($email));
$trapper = $query_trapper->rowCount();

if ($trapper > 0) {
	echo "<script>alert('Email already used!'); window.location='index.php'</script>";
	echo "<script>javascript:self-history.back() </script>;";
}elseif(strcmp($_SESSION['code_confirmation'], $_POST['code_confirmation']) != 0) {
	echo "<script>alert('Le code captcha ne correspond pas!!'); window.location='suggestion.php'</script>";
	echo "<script>javascript:self-history.back() </script>;";
} else {

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$insert_query = "INSERT INTO tbl_contact (full_name, email, message, code_confirmation)
VALUES (?, ?, ?, ?)";

$insert = $conn->prepare($insert_query);
$insert->execute(array($full_name, $email, $message, $code_confirmation));

echo "<script>alert('Votre message a été envoyé avec succès!'); window.location='index.php'</script>";
}
}
?>