</main>
<nav id="bottom-navigation" class="fixed-bottom bg-body-tertiary p-3 d-none">
  <div class="container">
    <div class="row mb-4 d-none" id="mobile-search-container">
      <div class="col">
        <form action="search.php" method="get">
          <input type="search" id="mobile-search-input" name="search-content" class="form-control" minlength="3" required />
        </form>
      </div>
    </div>

    <div class="row text-center">
      <div class="col col-4">
        <a href="." class="h3">
          <i class="bi bi-house-door-fill"></i>
        </a>
      </div>

      <div class="col col-4">
        <span class="h3" style="cursor: pointer" id="mobile-search-button">
          <i class="bi bi-search"></i>
        </span>
      </div>

      <div class="col col-4">
        <a href="contact.php" class="h3">
          <i class="bi bi-telephone-fill"></i>
        </a>
      </div>
    </div>
  </div>
</nav>

<footer class="text-center bg-body-tertiary p-3">
  <small class="text-muted m-0" translate="no">Alperen <i class="bi bi-code-slash"></i> Nazımcan</small>
</footer>

<script>
  const moneys = document.querySelectorAll(".money");
  const formatter = new Intl.NumberFormat("tr-TR", {
    style: "currency",
    currency: "TRY",
  });
  moneys.forEach((money) => {
    const text = money.innerText;
    money.innerText = formatter.format(text);
  });

  const mobileSearchContainer = document.getElementById(
    "mobile-search-container"
  );
  const mobileSearchButton = document.getElementById(
    "mobile-search-button"
  );
  const mobileSearchInput = document.getElementById("mobile-search-input");
  mobileSearchButton.addEventListener("click", function () {
    mobileSearchContainer.classList.toggle("d-none");

    if (!mobileSearchContainer.classList.contains("d-none")) {
      mobileSearchInput.focus();
    }
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>