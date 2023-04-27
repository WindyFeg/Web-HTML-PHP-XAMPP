<!-- products.php -->
<div>
  <div class="centre">
    <img class="login_pageName" src="/assets/img/page_name.png"></img>
  </div>
  <h1 id="windyfeng--background">
    PRO
    DUCT
  </h1>
  <h1 id="windyfeng">
    PRO
    DUCT
  </h1>
  <div id="half_screen">.
  </div>
  <div class="search_container">
    <input type="text" id="search_box" placeholder="Search... " onkeyup="searchProducts(this.value)">
    <button class="btn btn-light-color btn-border-pop " id="searchBtn">Search</button>
    </input>
    <div id="search_hint"></div>
  </div>
  <div id="product_container">
    <button class="btn btn-light-color btn-border-pop" onclick={getProducts()}>Show all products</button>
  </div>

  <script>
    function getProducts() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("product_container").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "../../pages/products/products_processing.php", true);
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
            var xmlResponse = this.responseXML;
            var products = xmlResponse.getElementsByTagName("product");
            var listName = "";
            for (var i = 0; i < products.length; i++) {
              var pName = products[i].getElementsByTagName("name")[0].textContent;
              listName += "\n" + pName;
            }
            document.getElementById("search_hint").innerHTML = listName;
          }
        };
        xmlhttp.open("GET", "../../pages/products/search_products.php?q=" + str, true);
        xmlhttp.send();
      }
    }

  </script>

</div>