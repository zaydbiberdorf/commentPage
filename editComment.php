<?php
    include('connect_to_db.php');
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM comments WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_GET['id']]);
        $commentInfo = $stmt->fetch();
    }
   
 
    if(isset($_POST['submit'])){
        $sql = "UPDATE comments SET comment=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$_POST['comment'], $_POST['id_to_change']]);
        
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
        <h1 class="pb-3">edit your Comment</h1>
        <form action="addComment.php?id=<?php echo $id ?>" method="POST">
        <textarea id="w3mission" rows="4" cols="50" name="comment"> <?php echo htmlspecialchars($commentInfo['comment']) ?> </textarea>
        <input type="submit" name="submit">
        <input type="hidden" name="id_to_change" value="<?php echo $commentInfo['id'] ?>">
        </form>
    </div>


<?php include('footer.php'); ?>