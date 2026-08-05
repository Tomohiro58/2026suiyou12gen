# 手順書

## 1. EC2インスタンスへ接続
```bash
ssh ec2-user@<EC2のIPアドレス> -i 秘密鍵ファイルのパス
```

---

## 2. パッケージのインストールと設定

### Gitをインストール

```bash
sudo yum install -y git
```

### Dockerをインストールして起動

```bash
sudo yum install -y docker
sudo systemctl start docker
```

### ec2-userにDockerの実行権限を付与

```bash
sudo usermod -aG docker ec2-user
```

権限を反映させるため、一度ログアウトします。

```bash
exit
```

再度EC2へログインしてください。

---

### Docker Composeをインストール

```bash
DOCKER_CONFIG=${DOCKER_CONFIG:-$HOME/.docker}

mkdir -p $DOCKER_CONFIG/cli-plugins

curl -SL https://github.com/docker/compose/releases/download/v2.5.1/docker-compose-linux-x86_64 \
-o $DOCKER_CONFIG/cli-plugins/docker-compose

chmod +x $DOCKER_CONFIG/cli-plugins/docker-compose
```

### Docker Composeのインストール確認

```bash
docker compose version
```

---

### Docker Buildxをインストール

```bash
mkdir -p ~/.docker/cli-plugins/

curl -SL https://github.com/docker/buildx/releases/download/v0.17.1/buildx-v0.17.1.linux-amd64 \
-o ~/.docker/cli-plugins/docker-buildx

chmod +x ~/.docker/cli-plugins/docker-buildx
```

---

### screenをインストール

```bash
sudo yum install -y screen
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

### screenを起動します
```bash
screen
```

### コンテナを起動します
```bash
docker compose up -d --build
```


---

## 4. MySQLコンテナへ入る

```bash
docker compose exec mysql mysql example_db
```


---

## 5・データベースを作成します
```sql
CREATE TABLE `bbs_entries` (
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `body` TEXT NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `image_filename` TEXT DEFAULT NULL
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
http://<EC2のIPアドレス>/kadai.php
```

投稿画面が表示されればセットアップ完了です。
