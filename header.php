<?php require_once __DIR__ . '/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Blog | Dynamic Website</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<header class="site-header">
  <nav class="nav">
    <a class="brand" href="index.php">Student<span>Blog</span></a>
    <div>
      <a href="index.php">Home</a>
      <a class="button small" href="create.php">New Post</a>
    </div>
  </nav>
  <section class="hero">
    <p class="eyebrow">Internet Computing Project</p>
    <h1>Dynamic PHP & MySQL Blog</h1>
    <p>This website stores posts in a database and supports create, read, update, and delete operations.</p>
  </section>
</header>
<main class="container">
