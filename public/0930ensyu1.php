<?php

$redis = new Redis();
$redis->connect('redis', 6379);

$count = $redis->incr('access_count');

?>

<!DOCUTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Redisアクセスカウンタ</title>
</head>
<body>

    <h1>Redisアクセスカウンタ</h1>

    <p>このページへのアクセス回数</p>
    
    <h2><?= $count ?> 回</h2>

</body>
</html>
