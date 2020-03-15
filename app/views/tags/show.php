<?php require_once APPROOT.'/views/inc/header.php'; ?>
<h1>Tag: <a href="" class="btn btn-info"> <?php echo $data['tagName']; ?></a>
<?php foreach ($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
        <h3 class="card-title"><?php echo $post->title; ?></h3>
        <div class="bg-light p-2 mb-3">Created by <?php echo $post->userName; ?> at <?php echo $post->postCreated; ?></div>
        <p class="card-text"><?php echo $post->content; ?></p>
        <p class="card-text"><?php echo '<i>' .$post->postTags .'</i>'; ?></p>
        <a href="<?php echo URLROOT; ?>/posts/show/<?php echo $post->postId;?>" class="btn btn-info">More</a>
    </div>
<?php endforeach; ?>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>
