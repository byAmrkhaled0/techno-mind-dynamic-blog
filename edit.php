<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$error = '';

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if (!$post) {
    include __DIR__ . '/header.php';
    echo '<div class="empty"><h3>Post not found.</h3><a href="index.php">Back</a></div>';
    include __DIR__ . '/footer.php';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if ($title === '' || $author === '' || $content === '') {
        $error = 'Please fill in all fields.';
    } else {
        $stmt = $conn->prepare("UPDATE posts SET title = ?, author = ?, content = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $author, $content, $id);
        $stmt->execute();
        redirect('index.php');
    }
}

include __DIR__ . '/header.php';
?>

<section class="form-card">
  <p class="eyebrow">Edit</p>
  <h2>Edit Post</h2>

  <?php if ($error): ?>
    <p class="error"><?php echo e($error); ?></p>
  <?php endif; ?>

  <form method="POST">
    <label>Title</label>
    <input type="text" name="title" value="<?php echo e($post['title']); ?>" required>

    <label>Author</label>
    <input type="text" name="author" value="<?php echo e($post['author']); ?>" required>

    <label>Content</label>
    <textarea name="content" rows="8" required><?php echo e($post['content']); ?></textarea>

    <button class="button" type="submit">Update Post</button>
  </form>
</section>

<?php include __DIR__ . '/footer.php'; ?>
