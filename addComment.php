<?php
    include('connect_to_db.php');
    $id = $_GET['id'];
    if(isset($_POST['submit'])){
        $isql = "SELECT * FROM logininfo WHERE id=?";
        $istmt = $pdo->prepare($isql);
        $istmt->execute([$id]);
        $username = $istmt->fetch();
        $sql = "INSERT INTO comments (username, comment) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username['username'], $_POST['comment']]);
        header('Location: user.php?id=' . $id);
    }
?>
<?php include('header.php'); ?>
    <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        more options
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="profile.php">profile</a>
        <a class="dropdown-item" href="add comment">add comment</a>
    </div>
    </div>
    <div class="container border border-primary rounded-lg text-center w-50 pb-3">
        <h1 class="pb-3">Add Comment</h1>
        <form action="addComment.php?id=<?php echo $id ?>" method="POST">
        <textarea id="w3mission" rows="4" cols="50" name="comment"> add text here...</textarea>
        <input type="submit" name="submit">
        </form>
    </div>


<?php include('footer.php'); ?>