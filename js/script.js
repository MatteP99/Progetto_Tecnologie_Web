$(document).ready(function () {
    let i = 1;
    let src = ["upload/slideshow/img1.jpg","upload/slideshow/img2.jpg","upload/slideshow/img3.jpg"];
    let img = $("body > header > img:first");
    setCookie("cart", '{"cart_ids":{}}', 1);
    /* $.getJSON("dummy_page.php", function(data) {
        let formattedData = formatData(data);
        $("main").append(formattedData);
    }); */
    sendNotification("Prova", "Descrizione di prova");
    setInterval(update_time, 1000 * 60);
    setInterval(() => {
        img.fadeOut("slow", () => {    
            img.attr("src", src[i]);
            img.fadeIn("slow");
        });
        i = i < 2 ? i + 1 : 0;
    }, 8000);
    /*
        addItemToCart sarà la classe da dare ai bottoni che 
        aggiungeranno gli articoli al carrello.

        itemId suppongo sia un elemento HTML nascosto
        all'interno dell'articolo da inserire nel
        carrello che contiene l'id dell'articolo
    */
    $(".addItemToCart").click(function(event) {
        event.preventDefault();
        let id = $(this).siblings(".itemId:first").text();
        addToCart(parseInt(id));
    });
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
});

function formatData(data) {
  let formattedData = '';
  for(let i = 0; i < data.length; i++) {
    let dataItem = '';
    formattedData.append(dataItem);
  }
  return formattedData;
}

function addToCart(id) {
  let idStr = id.toString();
  let cartObj = JSON.parse(getCookie("cart"));
  if(!(idStr in cartObj.cart_ids)) {
    cartObj.cart_ids[idStr] = 0;
  }
  cartObj.cart_ids[idStr] += 1;
  setCookie("cart", JSON.stringify(cartObj), 1);
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

function sendNotification(title, description) {
  $("body > header .notifications").append(`
  <div class="toast-container">
    <p>${Date.now()}</p>
    <div class="toast">
      <header class="toast-header">
        <strong>${title}</strong>
        <span class="minc">
          <small>0 min ago</small>
          <button type="button" class="close">
            <span>&times;</span>
          </button>
        </span>
      </header>
      <div class="toast-body">
        <p>${description}</p>
      </div>
    </div>
  </div>
  `);
  $(".toast-container:last").fadeIn();
  $(".toast-header button").click(function(event) {
    event.preventDefault();
    $(this).parents(".toast-container").fadeOut("fast", function() {
      sleep(300);
      $(this).remove();
    });
  });
}

function update_time() {
  $(".toast-container").each( function() {
    let start = new Date(parseInt($(this).find("p:first").text()));
    let time = new Date(Date.now() - start);
    $(this).find("small").text(time.getMinutes() + " min ago");
  });
}

function sleep(milliseconds) {
  const date = Date.now();
  let currentDate = null;
  do {
    currentDate = Date.now();
  } while (currentDate - date < milliseconds);
}