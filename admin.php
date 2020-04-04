<?php  
include('connect_to_db.php');
$sql = "SELECT * FROM logininfo";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll();
?>

<?php include('header.php') ?>

<?php include('footer.php') ?>