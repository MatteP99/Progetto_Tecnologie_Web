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
        let typeName = $(this).parents("ul:first").siblings("h3").text();
        $("option").each(function(index, _) {
            if($(this).text() == typeName) {
                $("#m_type").val(index + 1).change();
            }
        });
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
        $("#m_name").val($(this).parent().siblings("h4").text());
        $("#m_description").val($(this).parent().siblings("p:last").text());
        $("#m_price").val($(this).parent().siblings("h5").text().replace("€","").trim());
		$("#m_quantity").val($(this).parent().siblings("h6").text().replace("Quantita': ","").trim());
        $("#m_id").val($(this).parent().siblings("p:first").text());
        
        $(".overlay img").attr("alt", $(this).parent().siblings("h4").text());
        $(".overlay img").attr("src", $(this).parent().siblings("img").attr("src"));
        $(".overlay h2").text("Modifica elemento");
    });

    $("[type='file'").change(function(event) {
        $(".overlay img").attr('src', URL.createObjectURL(event.target.files[0]));
    });

    $("#vcart").click(function() {        
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
        $(this).fadeOut()
    });
});