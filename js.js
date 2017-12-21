function getSeries(item){
        var series = item.getAttribute("data-series");
        var request=$.ajax({
            url:'getDish.php?series='+series,
            async:false
        })
        var jsonStr = request.responseText;
        var test = eval("("+jsonStr+")");
        var test2 = eval("("+test+")");

        var dishes = document.getElementById("dishes");
        dishes.innerHTML = "";
        for(var i in test2){
          var newDishLi = document.createElement("li");

          var divElement = document.createElement("div");
          divElement.setAttribute("class","item");

          var imgElement = document.createElement("img");
          imgElement.src = "menu/"+test2[i].Picture;
          imgElement.style = "width: 120px; height: 120px";

          divElement.appendChild(imgElement);

          var spanElement = document.createElement("span");
          spanElement.setAttribute("class","name");
          spanElement.innerHTML = test2[i].DishName;

          var spanElement2 = document.createElement("span");
          spanElement2.setAttribute("class","price");
          spanElement2.innerHTML = "$"+test2[i].Price;

          var buttonElement = document.createElement("button");
          buttonElement.setAttribute("class","add");
          buttonElement.innerHTML = "Add";
          buttonElement.setAttribute("onclick","addToCart(this)");
          buttonElement.setAttribute("data-dishName",test2[i].DishName);

          var br = document.createElement("br");

          newDishLi.appendChild(divElement);
          newDishLi.appendChild(spanElement);
          newDishLi.appendChild(br);
          newDishLi.appendChild(spanElement2);
          newDishLi.appendChild(buttonElement);

          dishes.appendChild(newDishLi);
        }

        var childs = document.getElementById("all_series").childNodes;
        for (var i =0;i<childs.length;i++){
          childs[i].style = "color:#999999";
        }
        item.style = "color: #333";
    }
    function getCart() {
      var request=$.ajax({
        url:'getCart.php',
        async:false
      })
      var jsonStr = request.responseText;
      var test = eval("("+jsonStr+")");
      var cartString = "";

      var li = document.createElement("li");
      li.setAttribute("id","cartTittle");

      var spanElement = document.createElement("span");
      spanElement.innerHTML = "ORDER DETAILS";
      li.appendChild(spanElement);

      var total_price = "";

      var ul = document.getElementById("current_order");
      ul.innerHTML = "";
      ul.appendChild(li);
      for(var i in test){
        var num = test[i] + "";
        num = num.replace(/[^0-9]/ig,"");
        if (num != 0){
          var dish = document.createElement("li");
          dish.setAttribute("class","cartList");

          var name = document.createElement("span");
          name.setAttribute("class","cartName");
          name.innerHTML = i;

          var number = document.createElement("span");
          number.setAttribute("class","cartNumber");
          number.innerHTML = "<button class='cartNumberAdjust' data-dishName= "+i+" onclick='removeFromCart(this)'>-</button> "+num+" <button class='cartNumberAdjust' data-dishName= "+i+" onclick='addToCart(this)'>+</button>";

          var price = document.createElement("span");
          price.setAttribute("class","cartPrice");
          var request=$.ajax({
            url:'getPrice.php?dishName='+i,
            async:false
          })
          var jsonStr = request.responseText;
          price.innerHTML = "$"+test[i]*jsonStr;

          dish.appendChild(name);
          dish.appendChild(number);
          dish.appendChild(price);
          ul.appendChild(dish);
        }
      }
      
    }

    function addToCart(item){
      var dishName = item.getAttribute("data-dishName");
      var request = $.ajax({
        url:'addDish.php?dishName='+dishName,
        async:false
      });
      var total_price = request.responseText;
      var t_price = document.getElementById("total_price");
      t_price.innerHTML = "total_price: "+total_price;
      getCart();
    }

    function removeFromCart(item){
      var dishName = item.getAttribute("data-dishName");
      var request = $.ajax({
        url:'deleteDish.php?dishName='+dishName,
        async:false
      });
      var total_price = request.responseText;
      var t_price = document.getElementById("total_price");
      t_price.innerHTML = "total_price: "+total_price;
      getCart();
    }

    function clearCart(){
      var request = $.ajax({
        url:'clearCart.php',
        async:false
      });
      var total_price = request.responseText;
      var t_price = document.getElementById("total_price");
      t_price.innerHTML = "total_price: "+total_price;
      getCart();
    }
    
    function checkCart(){
      var cartList = document.getElementById("cartList");
      var t_price = document.getElementById("total_price");
      var message = "THIS IS YOUR CART:";

      var request=$.ajax({
        url:'getCart.php',
        async:false
      })
      var jsonStr = request.responseText;
      var test = eval("("+jsonStr+")");

      var total_price = document.getElementById("total_price").innerHTML;
      for(var i in test){
        var num = test[i] + "";
        num = num.replace(/[^0-9]/ig,"");
        if (num != 0){
          message += i+":"+ num + "份<br>";
        }
      }
      message += "TOTAL PRICE:"+total_price;
      alert(message);

    }