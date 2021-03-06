$(document).ready(function () {
    let i = 1;
    let src = ["upload/slideshow/img1.jpg","upload/slideshow/img2.jpg","upload/slideshow/img3.jpg"];
    let img = $("body > header > img:first");
    
    if (getCookie("consent") == "") {
        sendNotification("Cookie","Questo sito utilizza <a href='cookie.php'>cookie tecnici</a> per funzionare. Se si continua ad utilizzare il sito il consenso è implicito.");
        setCookie("consent", 'yes', 1);
    }

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

    //Bottone per menu a schermo intero
    $(".icon").click(() => {
        let nav = $("nav");
        if (!nav.hasClass("menu_open")) {            
            $(".icon").css("color","white");
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
                        $(".icon").removeAttr("style");  
                    });
                });
            });
        }            
    });

    $("#numeroCarta").keydown( function(e) {
        let nlen= $(this).val().length;
        if((nlen === 4 || nlen === 9 || nlen === 14) && ( e.key !== "Backspace")) {
            $(this).val($(this).val() + " ");
        }
    });
});

function sendNotification(title, description, millis = 0) {
    let index = $(".toast-container").length;
    $("body > header #notifications").append(`
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
            notification.fadeOut("fast", function() {
                sleep(300);
                $(this).remove();
            })
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
  