$(document).ready(function () {
  setCookie("cart", '{"cart_ids":""}', 1);
  /* $.getJSON("dummy_page.php", function(data) {
      let formattedData = formatData(data);
      $("main").append(formattedData);
  }); */
  $(":button").click(function(event) {
    event.preventDefault();
    addToCart($(this).val());
  });
  sendNotification("Prova", "Descrizione di prova");
  setInterval(update_time, 1000 * 60);
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
  cart = getCookie("cart");
  cartObj = JSON.parse(cart);
  if (cartObj.cart_ids === "") {
    cartObj.cart_ids = id;
  } else {
    cartObj.cart_ids += ',' + id;
  }
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
  $("body > header").append(`
  <div class="toast-container">
    <p>${Date.now()}</p>
    <div class="toast">
      <div class="toast-header">
        <strong>${title}</strong>
        <span class="minc">
          <small>0 min ago</small>
          <button type="button" class="close">
            <span>&times;</span>
          </button>
        </span>
      </div>
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