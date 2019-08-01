<?php 

$sqlComments = "SELECT * FROM comments WHERE comments.post_id = {$_GET['post_id']}";

$statement = $connection->prepare($sqlComments);
$statement->execute();
$statement->setFetchMode(PDO::FETCH_ASSOC);

$comments = $statement->fetchAll();




?>
    
<div>
    <button id = "button" onclick="hideComments()">Hide comments</button>
    <ul id="hide">
    <?php foreach ($comments as $comment) { ?>
        <li>
            <div> Posted by: <?php echo $comment['author'] ?> </div>
            <div> Comment: <?php echo $comment['text'] ?> </div>
        </li>
        <form action="delete-comment.php" method="GET">
            <input class="btn btn-default" type="submit" value="Delete">
            <input type="hidden" value="<?php echo $comment['id'] ?>" name="id">
            <input type="hidden" value="<?php echo $comment['post_id'] ?>" name = "post_id">
            <hr>
        </form>
        <?php } ?>
    </ul>
</div>


<script>
    
    var comments = document.getElementById("hide");
    var button = document.getElementById("button");

    function hideComments() {
        if(button.innerHTML == "Show comments") {
        comments.classList.remove("hide");
        button.innerHTML = "Hide comments";
        } else {
        comments.className = "hide";
        button.innerHTML = "Show comments";

        }
    }


</script>







