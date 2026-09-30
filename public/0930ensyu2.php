<?php

// Redisに接続
$redis = new Redis();
$redis->connect('redis', 6379);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $message = $_POST['message'];

    $redis->set('bbs:message', $message);
}

$message = $redis->get('bbs:message');

?>

<!DOCUTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>簡易掲示板</title>
</head>

<body>

<h1>簡易掲示板</h1>

<form method="post">

    <p>
       内容：
       <textarea name="message"></textarea>
    </p>

    <button type="submit">投稿する</button>

</form>

<hr>

<h2>投稿内容</h2>

<?php if ($message !== false): ?>

     <p>内容：<?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8')?></p>

<?php else: ?>

     <p>まだ投稿はありません</p>

<?php endif; ?>

</body>
</html>



