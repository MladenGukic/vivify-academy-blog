<html>
    <aside class="col-sm-3 ml-sm-auto blog-sidebar">
            <div class="sidebar-module sidebar-module-inset">

            <?php 
            
            $sqlAside = "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5";

            $statement = $connection->prepare($sqlAside);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $posts = $statement->fetchAll();
            
            ?>
                <h4>Latest posts</h4>
                <?php 
                $i = 0;
                foreach ($posts as $post) {
                    $i++;
                ?>

            <a class="side-bar-5-links" href="single-post.php?post_id=<?php echo $post['id']?>"> <?php echo $i . ". "?> <?php echo $post['title']?> </a><br>

                <?php } ?>
            </div>
    </aside>
</html>