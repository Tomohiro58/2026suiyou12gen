<?php
try {
    $dbh = new PDO('mysql:host=mysql;dbname=example_db', 'root', '');

    $sql = "UPDATE counter SET count_num = count_num + 1 WHERE id = 1";
    $dbh->exec($sql);

    $sql = "SELECT count_num FROM counter WHERE id = 1";
    $stmt = $dbh->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    $count = $result['count_num'];

} catch(PDOException $e){
    echo "データベース接続エラー: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>演習１</title>
</head>
<body>
    <h1>アクセスカウンタ</h1>
    <p>このページのアクセス数：<?php echo $count; ?></p>
</body>
</html>
