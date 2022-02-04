$(document).ready(function() {
    $(".overlay > div > button:first").click(function() {
        $(".overlay").fadeOut(function() {            
            $(".overlay h2").text("Aggiungi elemento");
        });
        $("#vcart").fadeIn();
        $(".overlay form").trigger("reset");
        $(".overlay img").attr("src","dummy.png");
        $(".overlay img").attr("alt","Immagine da caricare");
    });

    $(".modifyItem").click(function() {        
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
        $("#name").val($(this).parent().siblings("h4").text());
        $("#description").val($(this).parent().siblings("p:last").text());
        $("#price").val($(this).parent().siblings("h5").text());
        $(".overlay img").attr("alt", $(this).parent().siblings("h4").text());
        $(".overlay img").attr("src", $(this).parent().siblings("img").attr("src"));
        $(".overlay h2").text("Modifica elemento");
    });

    $("[type='file'").change(function(event) {
        $(".overlay img").attr('src',URL.createObjectURL(event.target.files[0]));
    });

    $("#vcart").click(function() {        
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
        $(this).fadeOut()
    });
});