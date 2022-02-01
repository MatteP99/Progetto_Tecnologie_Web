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

    //Bottoni per aggiungere elementi al carellello
    $(".addItemToCart").click(function(event) {
        event.preventDefault();
        let id = $(this).siblings("p:first").text();
        addToCart(parseInt(id));
        let name = $(this).siblings("h4").text();
        addToCartTable(name, $(this).siblings("h5").text());
        sendNotification(name,"Aggiunto al carrello!", 1000);
    });

    //Bottone per menu a schermo intero
    $(".icon").click(() => {
        let nav = $("nav");
        if (!nav.hasClass("menu_open")) {            
            $(".nav_logo").fadeOut(() => {                
                nav.animate({height: "100%", opacity: "0.975"}, () => {
                    $(".nav_logo").fadeIn();
                    $(".nav_links").fadeIn();
                    nav.addClass("menu_open");
                });                

            });
        } else {
            $(".nav_links").fadeOut();
            $(".nav_logo").fadeOut(() => {                      
                nav.animate({height: "6rem"}, () => {
                    nav.removeAttr("style");
                    nav.removeAttr("class");              
                    $(".nav_links").removeAttr("style");
                    $(".nav_logo").fadeIn(() => {                        
                        $(".nav_logo").removeAttr("style");  
                    });
                });
            });
        }            
    });

    //Apro la pagina del carrello
    $("#vcart").click(function() {        
        $("#cart").fadeIn();
        $("#cart").css("display", "flex");
        $(this).fadeOut()
    });
    
    //Chiudo la pagina del carrello
    $("#cart > div > button:first").click(function() {
        $("#cart").fadeOut();
        $("#vcart").fadeIn();
    });
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
                quantity = parseInt($("#cart tbody tr").eq(i).children(":last").text());
                quantity++;
            }
        }
    });

    if (quantity === 0 && !flag) {
        $("#cart tbody").append(`
            <tr>
                <td headers="nome">${name}</td>
                <td headers="prezzo">${price}</td>
                <td headers="quantita"><button class="fas fa-minus" aria-label="minus"></button> <span class="quantity">1</span> <button class="fas fa-plus" aria-label="plus"></button></td>
            </tr>
        `);
    } else if (quantity > 0 && !flag) {
        $("#cart tbody tr").eq(rowNum).children(":last").html(`<button class="fas fa-minus" aria-label="minus"></button> <span class="quantity">${quantity}</span> <button class="fas fa-plus" aria-label="plus"></button>`);
    } else {
        $("#cart tbody").append(`
            <tr>
                <td headers="nome">${name}</td>
                <td headers="prezzo">${price}</td>
                <td headers="quantita"><button class="fas fa-minus" aria-label="minus"></button> <span class="quantity">${quantity}</span> <button class="fas fa-plus" aria-label="plus"></button></td>
            </tr>
        `);
    }

    rowQuantity = $("#cart tbody tr").length;

    if (rowQuantity == 1) {
        $("#cart table").css("height","20%");
    } else if (rowQuantity == 2) {
        $("#cart table").css("height","30%");
    } else if (rowQuantity == 3) {
        $("#cart table").css("height","40%");
    } else {
        $("#cart table").removeAttr("style");
    }

    $("[aria-label='minus']:last").click(function(e) {
        e.preventDefault()
        let name = $(this).parent().siblings(":first").html();
        let id = $(`h4:contains(${name})`).siblings("p:first").text();
        removeFromCart(id);
        cartObj = JSON.parse(getCookie("cart"));
        if (cartObj.cart_ids[id] > 0) {
            $(this).siblings(".quantity").html(`${cartObj.cart_ids[id]}`);
        } else {
            $(this).parent().parent().remove();
        }
    });

    $("[aria-label='plus']:last").click(function(e) {
        e.preventDefault()
        let name = $(this).parent().siblings(":first").html();
        let id = $(`h4:contains(${name})`).siblings("p:first").text();
        addToCart(id);
        cartObj = JSON.parse(getCookie("cart"));
        $(this).siblings(".quantity").html(`${cartObj.cart_ids[id]}`);
    });
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