<?php

$title = "Menü";
$page = "index";

$servername = "localhost";
$username = "root";
$password = "";
$database = "efsane_beach_menu_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$check_table_query = "SHOW TABLES LIKE 'categories'";
$result = $conn->query($check_table_query);

if ($result->num_rows == 0) {
  $conn->query(file_get_contents("./sql/create_categories.sql"));
} else {
  $result = $conn->query("SELECT * FROM categories");
}

while ($row = $result->fetch_assoc()) {
  $categories[] = $row;
}

$conn->close();

require_once("./layout/header.php");

?>

<div class="container py-3">
  <div class="row">
    <?php if ($result->num_rows > 0): ?>
      <?php foreach ($categories as $category): ?>
        <div class="col col-lg-3 col-6 position-relative p-2">
          <div class="category rounded img-thumbnail"
            style="background-image: url('data:image;base64,<?php echo base64_encode($category["image"]); ?>');"></div>
          <a class="category-link" href="category.php?category=<?php echo $category["slag"]; ?>">
            <span class="h2">
              <?php echo $category["name"] ?>
            </span>
          </a>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <div class="col">
        <p class="lead">Hiç kategori yok.</p>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php require_once("./layout/footer.php"); ?>