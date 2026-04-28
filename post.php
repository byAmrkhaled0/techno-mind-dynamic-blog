<?php
require_once __DIR__ . '/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

include __DIR__ . '/header.php';
?>

<?php if ($post): ?>
  <article class="single-post">
    <p class="date"><?php echo e(date('F j, Y', strtotime($post['created_at']))); ?></p>
    <h2><?php echo e($post['title']); ?></h2>
    <p class="author">By <?php echo e($post['author']); ?></p>
    <p><?php echo nl2br(e($post['content'])); ?></p>
    <div class="actions">
      <a href="index.php">Back</a>
      <a href="edit.php?id=<?php echo (int)$post['id']; ?>">Edit</a>
    </div>
  </article>
<?php else: ?>
  <div class="empty">
    <h3>Post not found.</h3>
    <a href="index.php">Back to homepage</a>
  </div>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
