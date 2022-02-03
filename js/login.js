$(document).ready(function() {
    const emailRegEx = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    const passRegEx = /^[A-Za-z]\w{7,14}$/;

    $("#registrazione").click(function() {
        $(".signup").slideDown();
        $("input").each(function() {
            if (!($(this).hasClass("invalid")) && $(this).attr("type") !== "text" && $(this).val() !== "Invia" && $(this).attr("type") !== "radio" ) {
                $(this).addClass("invalid");
            }
        });
        $("i.fas").addClass("fa-times");        
        $("input:last").prop("disabled", true);
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
        $("i").removeAttr("class");
        $("i").addClass("fas");
        $("input:last").prop("disabled", false);
    });

    $("#mail").keyup(function() {
        if(emailRegEx.test($(this).val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("i").removeClass("fa-times");                
                $(this).siblings("i").addClass("fa-check");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("i").removeClass("fa-check");
                $(this).siblings("i").addClass("fa-times"); 
            }
        }
        
        if($(this).val() !== $("#mail_conf").val()) {
            if($("#mail_conf").hasClass("valid")) {
                $("#mail_conf").removeClass("valid");                
                $("#mail_conf").siblings("i").removeClass("fa-check");
                $("#mail_conf").siblings("i").addClass("fa-times"); 
            }
        } else {
            if(!($("#mail_conf").hasClass("valid")) &&  emailRegEx.test($("#mail").val())) {
                $("#mail_conf").addClass("valid");
                $("#mail_conf").siblings("i").removeClass("fa-times");                
                $("#mail_conf").siblings("i").addClass("fa-check");
            }
        }
        check_submit();
    });

    $("#mail_conf").keyup(function() {
        if($(this).val() === $("#mail").val() &&  emailRegEx.test($("#mail").val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("i").removeClass("fa-times");                
                $(this).siblings("i").addClass("fa-check");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("i").removeClass("fa-check");
                $(this).siblings("i").addClass("fa-times"); 
            }
        }
        check_submit();
    });

    $("#password").keyup(function() {
        if($("#registrazione").is(":checked")) {
            if(passRegEx.test($(this).val())) {
                if (!($(this).hasClass("valid"))) {
                    $(this).addClass("valid");
                    $(this).siblings("i").removeClass("fa-times");                
                    $(this).siblings("i").addClass("fa-check");
                }
            } else {
                if ($(this).hasClass("valid")) {
                    $(this).removeClass("valid");                
                    $(this).siblings("i").removeClass("fa-check");
                    $(this).siblings("i").addClass("fa-times"); 
                }
            }
            
            if($(this).val() !== $("#password_conf").val()) {
                if($("#password_conf").hasClass("valid")) {
                    $("#password_conf").removeClass("valid");                
                    $("#password_conf").siblings("i").removeClass("fa-check");
                    $("#password_conf").siblings("i").addClass("fa-times"); 
                }
            } else {
                if(!($("#password_conf").hasClass("valid")) && passRegEx.test($(this).val())) {
                    $("#password_conf").addClass("valid");
                    $("#password_conf").siblings("i").removeClass("fa-times");                
                    $("#password_conf").siblings("i").addClass("fa-check");
                }
            }
            check_submit();
        }
    });

    $("#password_conf").keyup(function() {
        if($(this).val() === $("#password").val() && passRegEx.test($("#password").val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("i").removeClass("fa-times");                
                $(this).siblings("i").addClass("fa-check");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("i").removeClass("fa-check");
                $(this).siblings("i").addClass("fa-times");                
            }
        }
        check_submit();
    });
});

function check_submit() {
    if($("i.fa-check").length === $("i.fas").length) {
        $("input:last").prop("disabled", false);
    } else {
        $("input:last").prop("disabled", true);
    }
}
