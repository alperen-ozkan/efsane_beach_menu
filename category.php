<?php

$title = "Kategori";

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

  $category_slug = $conn->real_escape_string($_GET["category"]);

  $category_result = $conn->query("SELECT * FROM categories WHERE slag='$category_slug'");

  if ($category_result->num_rows > 0) {
    $category_row = $category_result->fetch_assoc();
    $category_id = $category_row["id"];
    $category_name = $category_row["name"];
    $title = "Kategori: " . $category_name;

    $products_result = $conn->query("SELECT * FROM products WHERE category=$category_id");

    while ($product_row = $products_result->fetch_assoc()) {
      $products[] = $product_row;
    }
  }
}

$check_table_query = "SHOW TABLES LIKE 'products'";
$result = $conn->query($check_table_query);

if ($result->num_rows == 0) {
  $conn->query(file_get_contents("./sql/create_products.sql"));
}

$conn->close();

require_once("./layout/header.php");

?>

<div class="container py-3">
  <div class="row">
    <div class="col">
      <h1 class="display-1 text-center">
        <?php echo $category_name; ?>
      </h1>
      <hr class="hr">
    </div>
  </div>
  <div class="row gy-5">
    <?php foreach ($products as $product): ?>
      <div class="col col-lg-4 col-12 p-2">
        <div class="rounded img-thumbnail"
          style="width: 100%; height: 300px; background-image: url('data:image;base64,<?php echo base64_encode($product["image"]); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
        </div>
        <h2 class="h2 mt-2">
          <?php echo $product["title"]; ?>
        </h2>

        <?php if ($product["description"]): ?>
          <p class="lead">
            <?php echo $product["description"]; ?>
          </p>
        <?php endif; ?>

        <span class="badge text-bg-warning money">
          <?php echo $product["price"]; ?>
        </span>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<?php

require_once("./layout/footer.php"); ?>