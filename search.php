<?php

if (!isset($_GET["search-content"])) {
  header("Location: .");
}

$title = "Arama: " . $_GET["search-content"];
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

$categories_result = $conn->query("SELECT * FROM categories");
$result = $conn->query("SELECT * FROM products");

while ($row = $categories_result->fetch_assoc()) {
  $categories[] = $row;
}

while ($row = $result->fetch_assoc()) {
  $products[] = $row;
}

$conn->close();

$search_content = mb_strtolower($_GET["search-content"], "utf8");

$searched_products = [];
if (!empty($search_content)) {
  foreach ($products as $product) {
    $product_title_lower = mb_strtolower($product["title"], "utf8");

    if (str_contains($product_title_lower, $search_content)) {
      $searched_products[] = $product;
    }
  }
}

require_once("./layout/header.php");

?>

<div class="container py-3">
  <div class="row">
    <div class="col">
      <h1 class="display-1 text-center">
        <?php echo "Arama sonuçları (" . count($searched_products) . ")"; ?>
      </h1>
      <hr class="hr" />
    </div>
  </div>
  <div class="row">
    <?php if (count($searched_products) == 0): ?>
      <p class="lead">Ürün bulunamadı.</p>
    <?php else: ?>
      <?php foreach ($searched_products as $product): ?>
        <?php

        foreach ($categories as $category) {
          if ($category["id"] == $product["category"]) {
            $current_category = $category;
            break;
          }
        }

        ?>

        <div class="col col-lg-4 col-12 p-2">
          <div class="rounded img-thumbnail"
            style="width: 100%; height: 300px; background-image: url('data:image;base64,<?php echo base64_encode($product["image"]); ?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;">
          </div>
          <h2 class="h2 mt-2">
            <?php echo $product["title"]; ?>
          </h2>

          <?php if (isset($current_category)): ?>
            <h6 class="h6 mb-3">
              <a class="badge text-bg-secondary text-decoration-none"
                href="category.php?category=<?php echo $current_category["slag"]; ?>">
                <i class="bi bi-tags-fill"></i>
                <?php echo $current_category["name"]; ?>
              </a>
            </h6>
          <?php endif; ?>

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
    <?php endif; ?>
  </div>
</div>

<?php require_once("./layout/footer.php"); ?>