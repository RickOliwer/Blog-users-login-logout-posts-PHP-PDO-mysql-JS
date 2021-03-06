<?php
require_once '../header/newheader.php';
require_once '../functions/functions.php';
$posts = getTableFromDB($pdo, 'posts');
$postsResults = fetchFromDataBase($posts);
?>

<div class="hero">
    <div class="text">
        <h2>Welcome back <?php echo $_SESSION['user']['username'] ?>!</h2>

    </div>
</div>
<main class="main-container">

<div class="contant">

<?php foreach(array_reverse($postsResults) as $allPosts) : ?>
    <div class="post-card">

    <!-- add name of who posted the post -->
        <div class="post">
            <div class="post-img">
                <img src="../images/<?= $allPosts['image']?>"/>
            </div>
            <div class="post-content">
                <h2><?= $allPosts['title']?></h2>
                <p><?= $allPosts['textarea'] ?></p>
                <p><?= $allPosts['updated_at'] ?></p>
                <h3>Posted by <?= $allPosts['posted_by'] ?></h3>    
            </div>
        </div>   
    </div>
<?php endforeach; ?>
</div>
</main>

<script src="../js/post-ani.js"></script>
</body>

</html>

