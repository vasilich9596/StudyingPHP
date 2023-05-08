<?php
/** @var array<\App\Controller\Entity\Blog> $blogs*/
include __DIR__.'/../Fragment/header.php';

?>

<h1>list blogs</h1>

<?php foreach ($blogs as $blog): ?>

<div>
    <a href="/Blogs/<?= $blog->getId(); ?>">
    <h3><?php print $blog->getTitle();?></h3>
    </a>

    <div style="font-size: 0.8em"><?= $blog->getCreatedAt()->format('Y,m,d H:i:s');?></div>

    <h3><?php print $blog->getPreview();?></h3>
</div>

<?php endforeach; ?>

<?php include __DIR__.'/../Fragment/footer.php'; ?>