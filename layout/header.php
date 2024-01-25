<!DOCTYPE html>
<html lang="tr" data-bs-theme="dark">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Efsane Beach
    <?php if (isset($title)) {
      echo " - " . $title;
    } ?>
  </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

  <link rel="apple-touch-icon" sizes="180x180" href="./images/favicon_io/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon_io/apple-touch-icon.png" />
  <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon_io/favicon-16x16.png" />
  <link rel="manifest" href="./images/favicon_io/site.webmanifest" />

  <link rel="stylesheet" href="./css/style.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-body-tertiary sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center gap-2" href=".">
        <img src="images/favicon_io/android-chrome-512x512.png" width="32" height="32"
          class="d-inline-block align-text-center rounded" />
        <span>Efsane Beach Menü</span>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav-underline me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link <?php if ($page == "index") echo "active"; ?>" href="."><i class="bi bi-house-door-fill"></i> Anasayfa</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php if ($page == "contact") echo "active"; ?>" href="contact.php"><i class="bi bi-telephone-fill"></i> İletişim</a>
          </li>
        </ul>
      </div>
      <div id="desktop-search-container">
        <form action="search.php" method="get" class="ms-auto">
          <div class="input-group">
            <button class="btn btn-outline-secondary" type="submit" id="search-button">
              <i class="bi bi-search"></i>
            </button>
            <input type="search" name="search-content" class="form-control" placeholder="Ara..."
              aria-label="Ürünler burada aranır" aria-describedby="search-button" minlength="3" required />
          </div>
        </form>
      </div>
    </div>
  </nav>

  <main class="content">