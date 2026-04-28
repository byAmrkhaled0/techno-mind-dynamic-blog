<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $content = trim($_POST['content'] ?? '');

    if ($title === '' || $author === '' || $content === '') {
        $error = 'Please fill in all fields.';
    } else {
        $stmt = $conn->prepare("INSERT INTO posts (title, author, content) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $author, $content);
        $stmt->execute();
        redirect('index.php');
    }
}

include __DIR__ . '/header.php';
?>

<section class="form-card">
  <p class="eyebrow">Create</p>
  <h2>Create New Post</h2>

  <?php if ($error): ?>
    <p class="error"><?php echo e($error); ?></p>
  <?php endif; ?>

  <form method="POST">
    <label>Title</label>
    <input type="text" name="title" required>

    <label>Author</label>
    <input type="text" name="author" required>

    <label>Content</label>
    <textarea name="content" rows="8" required></textarea>

    <button class="button" type="submit">Save Post</button>
  </form>
</section>

<?php include __DIR__ . '/footer.php'; ?>
