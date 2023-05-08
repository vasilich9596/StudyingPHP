<?php
/** @var \App\Entity\Blog $blog*/
/** @var array<\App\Entity\blogComment> $comments*/
include __DIR__.'/../Fragment/header.php';

?>

<h1><?= $blog->getTitle();?></h1>

<div><?= $blog->getContent(); ?></div>

<h3>comments</h3>

<form method="post" action="/Blogs/comments/new">
    <div>
        <textarea name="comment_title" placeholder="enter comment title"></textarea></div><br>
        <textarea name="massage" placeholder="enter comment"></textarea>
    </div>

    <div>
        <input type="hidden" name="blog_id" value="<?= $blog->getId(); ?>"/>
        <input type="submit" value="create comment">
    </div>
</form>

<?php foreach ($comments as $comment): ?>
    <div>
        <hr>
        <p><?= "**".$comment->getTitle()."**";?></p>
        <p><?= $comment->getMassage(); ?></p>

        <hr>
    </div>
<?php endforeach; ?>

<?php include __DIR__.'/../Fragment/footer.php'; ?>
