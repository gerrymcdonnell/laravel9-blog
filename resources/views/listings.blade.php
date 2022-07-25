<h1><?= $heading ?></h1>

<?php foreach ($listings as $listing): ?>
    <?= $listing['id'] ?>
    
    <h2><?= $listing['title'] ?></h2>
    
    <p>
        <?= $listing['description'] ?>
    </p>

<?php endforeach; ?>