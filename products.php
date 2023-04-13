<!-- products.php -->
<div>
  <div class="centre">
    <img class="login_pageName" src="/assets/img/page_name.png"></img>
  </div>
  <!-- <h1 id="windyfeng--background">
    PRODUCTS
  </h1>
  <h1 id="windyfeng">
    PRODUCTS
  </h1> -->
  <div id="half_screen">.
  </div>
  <div>
    <input type="text" id="searchBox" placeholder="Search... " onkeyup="searchProducts(this.value)">
    <button class="btn btn-light-color btn-border-pop " id="searchBtn">Search</button>
    <div id="search_hint"></div>
  </div>
  <div id="product_container">
    <button class="btn btn-light-color btn-border-pop" onclick={getProducts()}>Get products</button>
  </div>

  <script>
    function getProducts() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("product_container").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "products_processing.php", true);
      xhttp.send();
    }

    function searchProducts(str) {
      if (str.length == 0) {
        document.getElementById("search_hint").innerHTML = "";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("search_hint").innerHTML = this.responseText;
          }
        };
        xmlhttp.open("GET", "search_products.php?q=" + str, true);
        xmlhttp.send();
      }
    }

  </script>

</div>