<?php
    $id = $_GET['id'];
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
    <div class="container text-center">
      <h1 class="pb-3">user page</h1>
      <h2 class="pb-3">walcome to the user page</h2>
      <h3 class="pb-3">here you can create, edit, and delete comments</h3>
      <h3 class="pb-3">click the "more options" drop down menu to choose what you would like to do</h3>
      <h3>Enjoy!</h3>

    </div>
  


<?php include('footer.php'); ?>
