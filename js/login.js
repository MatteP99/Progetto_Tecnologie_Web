$(document).ready(function() {
    const emailRegEx = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    const passRegEx = /^[A-Za-z]\w{7,14}$/;

    $("#registrazione").click(function() {
        $(".signup").slideDown();
        $("input").each(function() {
            if (!($(this).hasClass("invalid")) && $(this).attr("type") !== "text" && $(this).val() !== "Invia") {
                $(this).addClass("invalid");
            }
        });
    });

    $("#login").click(function() {
        $(".signup").slideUp();
        $("input").each(function() {
            if ($(this).hasClass("invalid")) {
                $(this).removeClass("invalid");
                $(this).val("");
            }
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");
                $(this).val("");
            }
        });
    });

    $("#mail").keyup(function() {
        if(emailRegEx.test($(this).val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");
            }
        }

        if($(this).val() !== $("#mail_conf").val()) {
            if($("#mail_conf").hasClass("valid")) {
                $("#mail_conf").removeClass("valid");
            }
        } else {
            if(!($("#mail_conf").hasClass("valid"))) {
                $("#mail_conf").addClass("valid");
            }
        }
    });

    $("#mail_conf").keyup(function() {
        if($(this).val() === $("#mail").val() &&  $("#mail").val() !== "") {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");
            }
        }
    });

    $("#password").keyup(function() {
        if(passRegEx.test($(this).val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");
            }
        }

        if($(this).val() !== $("#password_conf").val()) {
            if($("#password_conf").hasClass("valid")) {
                $("#password_conf").removeClass("valid");
            }
        } else {
            if(!($("#password_conf").hasClass("valid"))) {
                $("#password_conf").addClass("valid");
            }
        }
    });

    $("#password_conf").keyup(function() {
        if($(this).val() === $("#password").val() && $("#password").val() !== "") {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");
            }
        }
    });
});