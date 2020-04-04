<?php  
include('connect_to_db.php');
if(isset($_POST['submit'])){
    $sql = "SELECT * FROM logininfo";
    $stmt = $pdo->query($sql);
    $allLogins = $stmt->fetchAll();

    foreach($allLogins as $sL){
        if($sL['username'] == $_POST['iUsername'] && $sL['password'] == $_POST['iPassword']){
            if($sL['status'] == 'admin'){
                header('Location: admin.php?id=' . $sL['id']);
            }elseif($sL['status'] == 'user'){
                header('Location: user.php?id=' . $sL['id']);
            }
        }else{
            echo "error";
        }
    }
}

?>

<?php include('header.php') ?>
<div class="pt-5">
<div class="container text-center border border-primary w-50 pb-4 rounded-lg">
    <h2 class="pt-3" >Login</h2>
    <form action="index.php" method="POST">
        <h3 class="pb-3 pt-4">username: <input type="text" name="iUsername"></h3>
        <h3 class="pb-3">password: <input type="text" name="iPassword"></h3>
        <input class=" btn btn-success" type="submit" name="submit" value="submit">
    </form>
    <h4><a class="btn btn-info btn-sm" href="createAccount.php">Create Account</a></h4>
</div>
</div>
<?php include('footer.php') ?>

