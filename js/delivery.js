$(document).ready(function() {
    let cartObj;

    //Inserisco nella tabella del carrello i dati dei cookie
    checkCart();
    cartObj = JSON.parse(getCookie("cart"));
    for (let elem in cartObj.cart_ids) {
        let elemHTML = $(`.itemId:contains('${elem}'):first`);
        let name = elemHTML.siblings("h4").text();
        let price = elemHTML.siblings("h5").text();
        addToCartTable(name, price, cartObj.cart_ids[elem]);
    }

    if($(".overlay tbody tr").length > 0 ) {
        computePrice();
        $(".voverlay").fadeIn();
    }

    //Bottoni per aggiungere elementi al carellello
    $(".addItemToCart").click(function(event) {
        if($(".overlay tbody tr").length == 0 ) {
            $(".voverlay").fadeIn();
            $(".overlay a").fadeIn();
        }
        event.preventDefault();
        let id = $(this).siblings("p:first").text();
        addToCart(parseInt(id));
        let name = $(this).siblings("h4").text();
        addToCartTable(name, $(this).siblings("h5").text());
        sendNotification(name,"Aggiunto al carrello!", 2000);        
        computePrice();
    });

    //Apro la pagina del carrello
    $(".voverlay").click(function() {        
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
        $(this).fadeOut();
    });
    
    //Chiudo la pagina del carrello
    $(".overlay > div > button:first").click(function() {
        $(".overlay").fadeOut();
        $(".voverlay").fadeIn();
    });

    $("h3").click(function() {
        if($(this).siblings("ul").css("display") === "none") {
            $(this).siblings("ul").css("display","flex");            
            $(this).siblings("ul").children().children(":not(p:first-child)").slideDown();
            $(this).animate({margin: "30px 0"});
        } else {
            let h3 = $(this);
            h3.animate({margin: "30px 17vw"});
            h3.siblings("ul").children().children(":not(p:first-child)").slideUp(function() {
                h3.siblings("ul").css("display","none");
            });
        }
    })
});

function addToCart(id) {
    let cartObj;
    let idStr = id.toString();
    checkCart();
    cartObj = JSON.parse(getCookie("cart"));
    if(!(idStr in cartObj.cart_ids)) {
        cartObj.cart_ids[idStr] = 0;
    }
    cartObj.cart_ids[idStr] += 1;
    setCookie("cart", JSON.stringify(cartObj), 1);
}

function removeFromCart(id) {
    let cartObj;
    let idStr = id.toString();
    checkCart();
    cartObj = JSON.parse(getCookie("cart"));
    if(idStr in cartObj.cart_ids) {
        if(cartObj.cart_ids[idStr] === 1) {
            delete cartObj.cart_ids[idStr];
        } else {
            cartObj.cart_ids[idStr] -= 1;
        }
    }
    setCookie("cart", JSON.stringify(cartObj), 1);
}

function checkCart() {
    if (getCookie("cart") == "") {
        setCookie("cart", '{"cart_ids":{}}', 1);
    }
}

function addToCartTable(name, price, quantity = 0) {
    let rowNum = 0;
    let flag = quantity > 0 ? true : false;
    let rowQuantity;
    let cartObj;
    $("[headers='nome']").each((i, elem) => {
        let elemName = elem.innerText;
        if(elemName == name) {
            rowNum = i;
            if (quantity === 0) {           
                quantity = parseInt($(".overlay tbody tr").eq(i).children(":last").text());
                quantity++;
            }
        }
    });

    if (quantity === 0 && !flag) {
        $(".overlay tbody").append(`
            <tr>
                <td headers="nome">${name}</td>
                <td headers="prezzo">${price}</td>
                <td headers="quantita"><button class="fas fa-minus" aria-label="rimuovi un elemento"></button> <span class="quantity">1</span> <button class="fas fa-plus" aria-label="aggiungi un elemento"></button></td>
            </tr>
        `);
    } else if (quantity > 0 && !flag) {
        $(".overlay tbody tr").eq(rowNum).children(":last").html(`<button class="fas fa-minus" aria-label="rimuovi un elemento"></button> <span class="quantity">${quantity}</span> <button class="fas fa-plus" aria-label="aggiungi un elemento"></button>`);
    } else {
        $(".overlay tbody").append(`
            <tr>
                <td headers="nome">${name}</td>
                <td headers="prezzo">${price}</td>
                <td headers="quantita"><button class="fas fa-minus" aria-label="rimuovi un elemento"></button> <span class="quantity">${quantity}</span> <button class="fas fa-plus" aria-label="aggiungi un elemento"></button></td>
            </tr>
        `);
    }

    rowQuantity = $(".overlay tbody tr").length;

    if (rowQuantity == 1) {
        $(".overlay table").css("height","20%");
    } else if (rowQuantity == 2) {
        $(".overlay table").css("height","30%");
    } else if (rowQuantity == 3) {
        $(".overlay table").css("height","40%");
    } else {
        $(".overlay table").removeAttr("style");
    }

    $("[aria-label='rimuovi un elemento']:last").click(function(e) {
        e.preventDefault()
        let name = $(this).parent().siblings(":first").html();
        let id = $(`h4:contains(${name})`).siblings("p:first").text();
        removeFromCart(id);
        cartObj = JSON.parse(getCookie("cart"));

        
        if (cartObj.cart_ids[id] > 0) {
            $(this).siblings(".quantity").html(`${cartObj.cart_ids[id]}`);
        } else {
            if ($(".overlay tbody tr").length === 1) {
                $(".overlay").fadeOut();
            }
            $(this).parent().parent().remove();
        }
        
        computePrice();
    });

    $("[aria-label='aggiungi un elemento']:last").click(function(e) {
        e.preventDefault()
        let name = $(this).parent().siblings(":first").html();
        let id = $(`h4:contains(${name})`).siblings("p:first").text();
        addToCart(id);
        cartObj = JSON.parse(getCookie("cart"));
        $(this).siblings(".quantity").html(`${cartObj.cart_ids[id]}`);
        computePrice();
    });
}

function computePrice() {
    let sum = 0;
    $(".overlay td:nth-child(2)").each(function() {
        let mul = parseInt($(this).siblings("td:last").find("span").text());
        sum += parseFloat($(this).text().replace("€","").trim()) * mul;
    });
    $(".overlay p").text("Prezzo totale: € " + sum);
}

function getCookie(cname) {
  let name = cname + "=";
  let ca = document.cookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires="+d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}