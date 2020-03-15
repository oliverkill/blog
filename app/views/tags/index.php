<?php require_once APPROOT.'/views/inc/header.php'; ?>
<div class="container">
    <h1>Tags</h1>
    <?php foreach ($data['tags'] as $tag) : ?>
    <a href="<?php echo URLROOT; ?>/tags/show/<?php echo $tag->name;?>" class="btn btn-info"> <?php echo $tag->name; ?></a>
<?php endforeach; ?>
</div>
<?php require_once APPROOT.'/views/inc/footer.php'; ?>
