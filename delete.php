<?php
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/functions.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    redirect('index.php');
}

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

include __DIR__ . '/header.php';
?>

<section class="form-card">
  <p class="eyebrow">Delete</p>
  <?php if ($post): ?>
    <h2>Delete "<?php echo e($post['title']); ?>"?</h2>
    <p>This action cannot be undone.</p>
    <form method="POST">
      <button class="button danger-button" type="submit">Yes, Delete</button>
      <a class="button ghost" href="index.php">Cancel</a>
    </form>
  <?php else: ?>
    <h2>Post not found.</h2>
    <a href="index.php">Back</a>
  <?php endif; ?>
</section>

<?php include __DIR__ . '/footer.php'; ?>
