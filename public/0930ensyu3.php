<?php

$redis = new Redis();
$redis->connect('redis', 6379);

$data = $redis->get('bbs:posts');

if($data !== false){
   $posts = json_decode($data, true);
}else{
   $posts = [];
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

   $message = $_POST['message'];

   $posts[] = [
        'message' => $message];

   $redis->set('bbs:posts', json_encode($posts));

   header('Location: 0930ensyu3.php');
   exit;
}
?>

<!DOCTYPE html>
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

<h2>投稿一覧</h2>

<?php foreach ($posts as $post): ?>

    <div>
        <p>
           内容：
           <?= htmlspecialchars($post['message'], ENT_QUOTES, 'UTF-8') ?>
        </p>
        
        <hr>
    </div>

<?php endforeach; ?>

</body>
</html>
