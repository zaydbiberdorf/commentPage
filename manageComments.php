<?php 
    include('connect_to_db.php');
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $isql = "SELECT * FROM logininfo WHERE id=?";
        $istmt = $pdo->prepare($isql);
        $istmt->execute([$id]);
        $username = $istmt->fetch();
        $sql = "SELECT * FROM  comments WHERE username=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username['username']]);
        $comments = $stmt->fetchAll();
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
                <a class="btn btn-info" href="commentInfo.php?id=<?php echo $comment['id'] ?>">more options</a>
            </div>
        </div>
       
    <?php endforeach; ?>
<?php include('footer.php'); ?>