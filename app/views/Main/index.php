<div class="container">

    <?php if (!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?= $post['title']?></div>
        <div class="panel-body">
            <?= $post['text'] ?>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>
    
    
    
