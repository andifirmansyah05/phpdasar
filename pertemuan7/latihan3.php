<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>

<body>
    <?php if (isset($_POST["nama"])): ?>
        <p>Selamat datang, <?= htmlspecialchars($_POST["nama"]); ?>!</p>
    <?php endif; ?>
    <form action="" method="post">
        Masukkan nama:
        <input type="text" name="nama">
        <br>
        <button type="submit" name="submit">Kirim!</button>
    </form>
</body>

</html>