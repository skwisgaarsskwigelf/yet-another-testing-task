<?php
require_once __DIR__ . "/postPosts.php";

class getPosts extends postPosts
{
    public function pdoPost()
    {
        try {
            $get_posts = $this->conn->prepare("SELECT dtime, name, body FROM guest_book ORDER BY id DESC LIMIT 5");
            $get_posts->execute();
            $posts = $get_posts->fetchAll(\PDO::FETCH_ASSOC);
            echo json_encode($posts);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

$obj = new getPosts();
$obj->pdoPost();