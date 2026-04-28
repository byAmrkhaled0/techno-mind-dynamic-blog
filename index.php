<?php
require_once __DIR__ . '/db.php';
$result = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
include __DIR__ . '/header.php';
?>

<section class="section-title">
  <div>
    <p class="eyebrow">All Posts</p>
    <h2>Latest Blog Posts</h2>
  </div>
  <a class="button" href="create.php">Create New Post</a>
</section>

<?php if ($result && $result->num_rows > 0): ?>
  <div class="post-grid">
    <?php while ($post = $result->fetch_assoc()): ?>
      <article class="card">
        <p class="date"><?php echo e(date('F j, Y', strtotime($post['created_at']))); ?></p>
        <h3><?php echo e($post['title']); ?></h3>
        <p><?php echo e(substr($post['content'], 0, 150)); ?>...</p>
        <p class="author">By <?php echo e($post['author']); ?></p>
        <div class="actions">
          <a href="post.php?id=<?php echo (int)$post['id']; ?>">Read</a>
          <a href="edit.php?id=<?php echo (int)$post['id']; ?>">Edit</a>
          <a class="danger" href="delete.php?id=<?php echo (int)$post['id']; ?>">Delete</a>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <div class="empty">
    <h3>No posts yet.</h3>
    <p>Create your first blog post using the button above.</p>
  </div>
<?php endif; ?>

<?php include __DIR__ . '/footer.php'; ?>
