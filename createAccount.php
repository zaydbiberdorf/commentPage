<?php  
include('connect_to_db.php');
if(isset($_POST['submitNewAccount'])){
    $sql = "INSERT INTO logininfo (username, password, status) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_POST['newUsername'], $_POST['newPassword'], $_POST['newStatus']]);
    header("Location: index.php");
}


?>

<?php include('header.php') ?>
<div class="pt-5">
<div class="container text-center border border-primary w-50 pb-4 rounded-lg">
    <h2 class="pt-3" >Create An Account</h2>
    <form action="createAccount.php" method="POST">
        <h3 class="pb-3 pt-4">username: <input type="text" name="newUsername"></h3>
        <h3 class="pb-3">password: <input type="text" name="newPassword"></h3>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Status Options</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="newStatus">
            <option selected>Choose...</option>
            <option value="user">user</option>
            <option value="admin">admin</option>
            
        </select>
        </div>
        <input class=" btn btn-success" type="submit" name="submitNewAccount" value="submit">
    </form>
</div>
</div>
<?php include('footer.php') ?>