<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title) ?></title>
</head>
<body>
<header>
    <nav>
        <ul>
            <?php foreach ($menuItems as $key => $label): ?>
                <li><a href="<?= base_url($key) ?>"><?= esc($label) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>
<main>
    <h1><?= esc($title) ?></h1>
    <p>Welcome to our website. Explore the best travel options with us!</p>
</main>
</body>
</html>
