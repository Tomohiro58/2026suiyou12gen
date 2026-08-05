# 手順書

## 1. EC2インスタンスへ接続
```bash
ssh ec2-user@<EC2のIPアドレス>
```

---

## 2・リポジトリをクローン
```bash
git clone https://github.com/Tomohiro58/2026suiyou12gen.git
```

### クローンしたディレクトリに移動します。
```bash
cd 2026suiyou12gen
```

---

## 3・dockerコンテナを起動・起動
```bash
docker compose up -d --build
```

起動していることを確認します。

```bash
docker compose ps
```
---

## 4. MySQLコンテナへ入る

```bash
docker compose exec mysql mysql -u root
```


---

## 5・データベースを作成します
```sql
CREATE TABLE `bbs_entries` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `body` TEXT NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
    );
```

作成できたことを確認します。

```sql
SHOW DATABASES;
```

MySQLを終了します。

```sql
exit
```

---

## 6. アプリケーションへアクセス

ブラウザで以下にアクセスします。

```
http://<EC2のIPアドレス>/
```

投稿画面が表示されればセットアップ完了です。
