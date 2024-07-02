<?php

    include("../config/db_connect.php");

    
    $post_categories= ["Politics and international affairs","Economics and Finance","Sports","Culture"];
    $posts=[];

    //Set up query to return the most recent article from each category if any article exists.
    foreach($post_categories as $category){
        $sql = "SELECT * FROM posts WHERE post_category = '$category' ORDER BY created_at DESC LIMIT 1";
        $result = mysqli_query($conn,$sql);

        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $posts[$category] = $row;
        } else {
            $posts[$category] = null;
        }
    }


?>


    <?php include('../templates/header.php');?>

    <!-- Display each category in its own container using a two column row, with the most recent article in that category-->
    <div class="container mt-3 flex-grow-1">
        <div class="row gx-5">
        <?php foreach ($posts as $category => $post): ?>
            <div class="container border col-sm-6">
                <?php if ($post): ?>
                    <h2><?php echo htmlspecialchars($post['post_category']);?></h2>
                    <h4><?php echo htmlspecialchars($post['post_title']); ?></h4>
                    <p><?php echo htmlspecialchars($post['post_content']); ?></p>
                    <p><em>by <?php echo htmlspecialchars($post['post_creator']); ?> on <?php echo $post['created_at']; ?></em></p>
                    <a href="categories.php?category=<?php echo htmlspecialchars($post['post_category']);?>"><button class="btn bg-primary text-light mb-1">View all</button></a>
                <?php else: ?>
                    <h2><?php echo htmlspecialchars($category);?></h2>
                    <p>No articles available for <?php echo htmlspecialchars($category); ?> category.</p>
                    <a href="categories.php?category=<?php echo htmlspecialchars($category);?>"><button class="btn bg-primary text-light mb-1">Be the first to post</button></a>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
        </div>
    </div>

    <?php include('../templates/footer.php');?>
