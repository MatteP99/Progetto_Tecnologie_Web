$(document).ready(function() {
    let cartObj;

    //Inserisco nella tabella del carrello i dati dei cookie
    checkCart();
    cartObj = JSON.parse(getCookie("cart"));
    for (let elem in cartObj.cart_ids) {
        let elemHTML = $(`.itemId:contains('${elem}'):first`);
        let name = elemHTML.siblings("h4").text();
        let price = elemHTML.siblings("h5").text();
        let qt = elemHTML.siblings(".itemQuantity").text();
        elemHTML.siblings(".itemQuantity").text(qt - parseInt(cartObj.cart_ids[elem]));
        addToCartTable(name, price, cartObj.cart_ids[elem]);
        checkQuantity(name, 0);
    }

    if($(".overlay tbody tr").length > 0 ) {
        computePrice();
        $(".voverlay").fadeIn();
    }

    //Bottoni per aggiungere elementi al carellello
    $(".addItemToCart").click(function(event) {
        $(this).attr("disabled", true);
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
        $(this).attr("disabled", false);
        checkQuantity(name);
    });

    //Apro la pagina del carrello
    $(".voverlay").click(function() { 
        let marg = $("main").css("margin-left");    
        $("#notifications").css({"width":"100%", "margin-left":`-${marg}`});  
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
        $(this).fadeOut();
    });
    
    //Chiudo la pagina del carrello
    $(".overlay > div > button:first").click(function() {
        $(".overlay").fadeOut();
        $(".voverlay").fadeIn();
        $("#notifications").removeAttr("style");  
    });

    $("h3").click(function() {
        if($(this).siblings("ul").css("display") === "none") {
            $(this).siblings("ul").css("display","flex");            
            $(this).siblings("ul").children().children(":not(.itemId, .itemQuantity)").slideDown();
            $(this).animate({margin: "30px 0"});
        } else {
            let h3 = $(this);
            h3.animate({margin: "30px 17vw"});
            h3.siblings("ul").children().children(":not(.itemId, .itemQuantity)").slideUp(function() {
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
                <td headers="quantita"><button type="button" class="fas fa-minus" aria-label="rimuovi un elemento"></button> <span class="quantity">1</span> <button type="button" class="fas fa-plus" aria-label="aggiungi un elemento"></button></td>
            </tr>
        `);
    } else if (quantity > 0 && !flag) {
        $(".overlay tbody tr").eq(rowNum).children(":last").html(`<button type="button" class="fas fa-minus" aria-label="rimuovi un elemento"></button> <span class="quantity">${quantity}</span> <button type="button" class="fas fa-plus" aria-label="aggiungi un elemento"></button>`);
    } else {
        $(".overlay tbody").append(`
            <tr>
                <td headers="nome">${name}</td>
                <td headers="prezzo">${price}</td>
                <td headers="quantita"><button type="button" class="fas fa-minus" aria-label="rimuovi un elemento"></button> <span class="quantity">${quantity}</span> <button type="button" class="fas fa-plus" aria-label="aggiungi un elemento"></button></td>
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
                $("#notifications").removeAttr("style");  
            }
            $(this).parent().parent().remove();
        }
        
        computePrice();
        checkQuantity(name, -1);
    });

    $("[aria-label='aggiungi un elemento']:last").click(function(e) {
        e.preventDefault()
        let name = $(this).parent().siblings(":first").html();
        let id = $(`h4:contains(${name})`).siblings("p:first").text();
        addToCart(id);
        cartObj = JSON.parse(getCookie("cart"));
        $(this).siblings(".quantity").html(`${cartObj.cart_ids[id]}`);
        computePrice();
        checkQuantity(name);
    });
}

function computePrice() {
    let sum = 0;
    $(".overlay td:nth-child(2)").each(function() {
        let mul = parseInt($(this).siblings("td:last").find("span").text());
        sum += parseFloat($(this).text().replace("€","").trim()) * mul;
    });
    $(".overlay tfoot td").text("Prezzo totale: € " + sum.toFixed(2));
}

function checkQuantity(itemName, val = 1) {
    let item = $(`h4:contains(${itemName})`);
    let itemQuantity = parseInt(item.siblings(".itemQuantity").text());
    if((itemQuantity === 1 && val === 1) || (val === 0 && itemQuantity === 0)) {
        $(`[headers='nome']:contains('${itemName}')`).siblings(":last").children(".fa-plus").attr("disabled", true);
        item.siblings(".addItemToCart").attr("disabled", true);
        if(val === 1) {
            sendNotification(itemName,"Massima quantità ordinabile raggiunta!", 2000);
        }
    } else if (itemQuantity === 0 && val === -1)  {        
        $(`[headers='nome']:contains('${itemName}')`).siblings(":last").children(".fa-plus").attr("disabled", false);
        item.siblings(".addItemToCart").attr("disabled", false);
    }
    itemQuantity -= val;
    item.siblings(".itemQuantity").text(itemQuantity);
}
