<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Messages</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/styles.css">
</head>
<body>
    <?php include 'layout/header.php'; ?>
    <div class="container">
        <h1>Messages</h1>
        <ul class="messages">
            <?php foreach ($messages as $message): ?>
                <li><?= htmlspecialchars($message['content']) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php include 'layout/footer.php'; ?>
</body>
</html>