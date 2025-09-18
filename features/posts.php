<?php
include 'php/connection.php';

class Post {
    private int $id;
    private User $user;
    private DateTime $created_at;
    private string $content;
    private bool $hasImage;

    public function get_id(): int { return $this->id; }
    public function get_user(): User { return $this->user; }
    public function get_created_at(): DateTime { return $this->created_at; }
    public function get_content(): string { return $this->content; }
    public function get_hasImage(): bool { return $this->hasImage; }

    public function get_image_url(): string { return "./data/post_images/{$this->id}"; }

    private function __construct($id, $user, $created_at, $content, $hasImage) {
        $this->id = $id;
        $this->user = $user;
        $this->created_at = $created_at;
        $this->content = $content;
        $this->hasImage = $hasImage;
    }

    public function delete(Session $session, int $postId) {
        global $connection;
        $sql = "DELETE FROM posts WHERE id = ? AND user_id = ?";
        $stmt = $connection->prepare($sql);
        $userId = $session->get_id();
        $stmt->bind_param("ii", $postId, $userId);
        $stmt->execute();

        unlink("data/post_images/{$stmt->insert_id}");
    }

    /**
     * Summary of feed
     * @param int $page
     * @return Post[]
     */
    public static function feed(Session $session, int $page): array {
        global $connection;
        $userId = $session->get_id();
        $sql = "SELECT * FROM posts WHERE user_id IN (
            SELECT user1_id WHERE user2_id = ? UNION SELECT user2_id WHERE user1_id = ? UNION SELECT ?
        ) ORDER BY created_at DESC LIMIT 50 OFFSET ?";
        $stmt = $connection->prepare($sql);
        $pageOffset = $page * 50;
        $stmt->bind_param("iiii", $userId, $userId, $userId, $pageOffset);
        $stmt->execute();

        $result = $stmt->get_result();

        return $result->fetch_all();
    }

    public static function post(Session $session, string $content, ?array $image) {
        global $connection;
        $sql = "INSERT INTO posts (user_id, content, image) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $hasImage = $image != null ? 1 : 0;
        $userId = $session->get_id();
        $stmt->bind_param("isi", $userId, $content, $hasImage);
        $stmt->execute();

        if ($image) {
            if (isImage($image)) {
                move_uploaded_file($image['tmp_name'], "data/post_images/{$stmt->insert_id}");
            }
        }
    }
}