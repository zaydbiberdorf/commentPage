<?php
    include('connect_to_db.php');
    if(isset($_GET['id'])){
        $isql = "SELECT * FROM comments WHERE id=?";
        $istmt = $pdo->prepare($isql);
        $istmt->execute([$_GET['id']]);
        $commentInfo = $istmt->fetch();
    }
    
   if(isset($_POST['submit'])){
        $usql = "SELECT * FROM logininfo WHERE username=?";
        $ustmt = $pdo->prepare($usql);
        $ustmt->execute([$_POST['username']]);
        $userinfo = $ustmt->fetch();
       $sql = "UPDATE comments SET comment=? WHERE id=?";
       $stmt = $pdo->prepare($sql);
       $stmt->execute([$_POST['comment'], $_POST['id_to_change']]);
       header('Location: manageComments.php?id=' . $userinfo['id']);
   }
?>
<?php include('header.php'); ?>
    <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        more options
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="profile.php">profile</a>
        <a class="dropdown-item" href="addComment.php">add comment</a>
    </div>
    </div>
    <div class="container border border-primary rounded-lg text-center w-50 pb-3">
        <h1 class="pb-3">edit your Comment</h1>
        <form action="editComment.php" method="POST">
            <textarea id="w3mission" rows="4" cols="50" name="comment"> <?php echo htmlspecialchars($commentInfo['comment']) ?> </textarea>
            <br>
            <input type="submit" name="submit">
            <input type="hidden" name="id_to_change" value="<?php echo $commentInfo['id'] ?>">
            <input type="hidden" name="username" value="<?php echo $commentInfo['username'] ?>">
        </form>
    </div>


<?php include('footer.php'); ?>


