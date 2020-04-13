<?php 
    include('connect_to_db.php');
    $sql = "SELECT * FROM  comments WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$_GET['id']]);
    $comments = $stmt->fetchAll();
  
    
    if(isset($_POST['delete'])){
        $delete = "DELETE FROM comments WHERE id=?";
        $dstmt = $pdo->prepare($delete);
        $dstmt->execute([$_POST['id_to_delete']]);
        header('Location: manageComments.php?id=' . $_POST['id_to_gotto']);
    }
    
?>

<?php include('header.php'); ?>
    <div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        more options
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="profile.php?id=<?php echo $id ?>">profile</a>
        <a class="dropdown-item" href="addComment.php?id=<?php echo $id ?>">add comment</a>
        <a class="dropdown-item" href="manageComments.php?id=<?php echo $id ?>">manage comment</a>
    </div>
    </div>
    <?php foreach($comments as $comment): ?>
        <div class="pb-5">
            <div class="container border border-primary rounded-lg text-center pb-4 pt-4">
                <h3 class="pb-3"><?php echo htmlspecialchars($comment['comment']); ?></h3>
                <h2 class="pb-3">created by <?php echo htmlspecialchars($comment['username']); ?></h2>
                <h2 class="pb-3">created at <?php echo htmlspecialchars($comment['date_time']); ?></h2>
                <div class="pb-3">
                    <a class="btn btn-info" href="editComment.php?id=<?php echo $comment['id'] ?>">edit comment</a>
                </div>
                <form action="commentInfo.php" method="POST">
                <?php   
                    $isql = "SELECT id FROM logininfo WHERE username=?";
                    $istmt = $pdo->prepare($isql);
                    $istmt->execute([$comment['username']]); 
                    $userid = $istmt->fetch();
                ?>
                <input class="btn btn-danger" type="submit" name="delete" value="delete">
                <input type="hidden" name="id_to_delete" value="<?php echo $comment['id'] ?>">
                <input type="hidden" name="id_to_gotto" value="<?php echo $userid['id']?>">
                </form>
            </div>
        </div>
       
    <?php endforeach; ?>
<?php include('footer.php'); ?>