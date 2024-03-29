<?php

$title = "İletişim";
$page = "contact";

require_once("./layout/header.php");

?>

<div class="container py-3">
  <div class="row">
    <div class="col">
      <h1 class="display-1 text-center">İletişim</h1>
      <hr class="hr" />
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="mb-3">
        <a
          href="tel:05544593818"
          class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
          ><i class="bi bi-telephone-fill"></i> 0 (554) 459 38 18</a
        >
      </div>
      <div class="mb-3">
        <a
          href="tel:05313363190"
          class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
          ><i class="bi bi-telephone-fill"></i> 0 (531) 336 31 90</a
        >
      </div>

      <iframe
        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12901.441029313579!2d32.8561518!3d36.0603161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14dc3d0033b9f947%3A0x16b4e51f3160fe70!2sEfsane%20Beach%20Club!5e0!3m2!1str!2str!4v1705872311237!5m2!1str!2str"
        class="rounded"
        width="100%"
        height="450"
        style="border: 0"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
      ></iframe>
    </div>
  </div>
</div>

<?php require_once("./layout/footer.php"); ?>