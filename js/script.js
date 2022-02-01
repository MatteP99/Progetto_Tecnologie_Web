$(document).ready(function () {
    let i = 1;
    let src = ["upload/slideshow/img1.jpg","upload/slideshow/img2.jpg","upload/slideshow/img3.jpg"];
    let img = $("body > header > img:first");

    /* $.getJSON("dummy_page.php", function(data) {
        let formattedData = formatData(data);
        $("main").append(formattedData);
    }); */

    //Utilizzato per aggiornare il tempo delle notifiche
    setInterval(update_time, 1000 * 60);

    //Animazione dello slideshow
    setInterval(() => {
        img.fadeOut("slow", () => {    
            img.attr("src", src[i]);
            img.fadeIn("slow");
        });
        i = i < 2 ? i + 1 : 0;
    }, 8000);
});

function formatData(data) {
  let formattedData = '';
  for(let i = 0; i < data.length; i++) {
    let dataItem = '';
    formattedData.append(dataItem);
  }
    return formattedData;
}

function sendNotification(title, description, millis = 0) {
    let index = $(".toast-container").length;
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
    let notification = $(`.toast-container:eq(${index})`);
    notification.fadeIn();
    $(".toast-header button").click(function(event) {
        event.preventDefault();
        $(this).parents(".toast-container").fadeOut("fast", function() {
            sleep(300);
            $(this).remove();
        });
    });
    if (millis > 0) {
        setTimeout(() => {
            notification.fadeOut("fast");
        }, millis);
    }
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