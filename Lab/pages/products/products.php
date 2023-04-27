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
  <button class="btn btn-light-color btn-border-pop" onclick={getProducts(0)}>Show all products</button>
  <div id="products_container">
  </div>
  <div class="pagination">
    <a href="#">&laquo;</a>
    <a href="#" onclick={GetProductsPage(1)} class="pagination_active">1</a>
    <a href="#" onclick={GetProductsPage(2)}>2</a>
    <a href="#" onclick={GetProductsPage(3)}>3</a>
    <a href="#" onclick={GetProductsPage(4)}>4</a>
    <a href="#">&raquo;</a>
  </div>

  <script>

    function GetProductsPage(page) {
      listPages = document.getElementsByClassName("pagination")[0].innerHTML;
      for (let i = 0; i < document.getElementsByClassName("pagination")[0].childElementCount; i++) {
        document.getElementsByClassName("pagination")[0].children[i].className = "";
      }
      document.getElementsByClassName("pagination")[0].children[page].className = "pagination_active";
      getProducts(page);
    }

    function ShowHindSearch(listItem) {
      items = listItem.split(";")
      result = ""
      for (let i = 0; i < items.length; i++) {
        result += '<div class="search_hint_item">' + items[i] + '</div>'
      }
      document.getElementById("search_hint").innerHTML = result;
    }

    function getProducts(page) {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("products_container").innerHTML = this.responseText;
        }
      };
      xhttp.open("GET", "../../pages/products/products_processing.php?page=" + page, true);
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
              listName += ";" + pName;
            }
            ShowHindSearch(listName)
          }
        };
        xmlhttp.open("GET", "../../pages/products/search_products.php?q=" + str, true);
        xmlhttp.send();
      }
    }

  </script>

</div>