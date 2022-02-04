$(document).ready(function() {
    $(".modifyItem").click(function() {
        $(".overlay").fadeIn();
        $(".overlay").css("display", "flex");
    });

    $(".overlay > div > button:first").click(function() {
        $(".overlay").fadeOut();
        $("#vcart").fadeIn();
        $(".overlay form").trigger("reset");
    });

    $(".modifyItem").click(function() {
        $("#name").val($(this).parent().siblings("h4").text());
        $("#description").val($(this).parent().siblings("p:last").text());
        $("#price").val($(this).parent().siblings("h5").text());
        $(".overlay img").attr("src", $(this).parent().siblings("img").attr("src"));
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