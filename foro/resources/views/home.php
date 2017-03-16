<html>
<head>
<title>Mi Web</title>
</head>
<body>
<div class="container">
    <?php foreach ($usuarios as $user): ?>
        <?php echo $user->name; ?>
        <?php echo $user->nick; ?>
        <?php echo $user->email; ?>
        <br>
    <?php endforeach; ?>
</div>

<?php echo $usuarios->links(); ?>
</body>
</html>