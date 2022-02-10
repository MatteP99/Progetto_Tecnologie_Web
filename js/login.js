$(document).ready(function() {
    const emailRegEx = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9]))\.){3}(?:(2(5[0-5]|[0-4][0-9])|1[0-9][0-9]|[1-9]?[0-9])|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
    const passRegEx = /^[A-Za-z]\w{8,14}$/;
    const telRegEx = /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/;

    $("#registrazione").click(function() {
        $(".signup").slideDown();
        $("input").each(function() {
            if (!($(this).hasClass("invalid")) && $(this).hasClass("toBeChecked") ) {
                $(this).addClass("invalid");
            }
        });
        $("em.fas").addClass("fa-times");        
        $("input:last").prop("disabled", true);
        $("#name").attr("required", true);
        $("#address").attr("required", true);
    });

    $("#login").click(function() {
        $(".signup").slideUp("fast");
        $("input").each(function() {
            if ($(this).hasClass("invalid")) {
                $(this).removeClass("invalid");
            }
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");
            }
        });
        $("form").trigger("reset");
        $("em").removeAttr("class");
        $("em").addClass("fas");
        $("input:last").prop("disabled", false);        
        $("#name").attr("required", false);
        $("#address").attr("required", false);
        $("form.login > fieldset li:not(:first-child)").attr("required", false);
        $("form.login > fieldset li:not(:first-child)").slideUp();
    });

    $("#mail").keyup(function() {
        if(emailRegEx.test($(this).val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("em").removeClass("fa-times");                
                $(this).siblings("em").addClass("fa-check");
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("em").removeClass("fa-check");
                $(this).siblings("em").addClass("fa-times"); 
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        }
        
        if($(this).val() !== $("#mail_conf").val()) {
            if($("#mail_conf").hasClass("valid")) {
                $("#mail_conf").removeClass("valid");                
                $("#mail_conf").siblings("em").removeClass("fa-check");
                $("#mail_conf").siblings("em").addClass("fa-times"); 
                $("#mail_conf").siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        } else {
            if(!($("#mail_conf").hasClass("valid")) &&  emailRegEx.test($("#mail").val())) {
                $("#mail_conf").addClass("valid");
                $("#mail_conf").siblings("em").removeClass("fa-times");                
                $("#mail_conf").siblings("em").addClass("fa-check");
                $("#mail_conf").siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        }
        check_submit();
    });

    $("#mail_conf").keyup(function() {
        if($(this).val() === $("#mail").val() &&  emailRegEx.test($("#mail").val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("em").removeClass("fa-times");                
                $(this).siblings("em").addClass("fa-check");
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("em").removeClass("fa-check");
                $(this).siblings("em").addClass("fa-times"); 
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        }
        check_submit();
    });

    $("#password").keyup(function() {
        if($("#registrazione").is(":checked")) {
            if(passRegEx.test($(this).val())) {
                if (!($(this).hasClass("valid"))) {
                    $(this).addClass("valid");
                    $(this).siblings("em").removeClass("fa-times");                
                    $(this).siblings("em").addClass("fa-check");
                    $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
            } else {
                if ($(this).hasClass("valid")) {
                    $(this).removeClass("valid");                
                    $(this).siblings("em").removeClass("fa-check");
                    $(this).siblings("em").addClass("fa-times"); 
                    $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
                }
            }
            
            if($(this).val() !== $("#password_conf").val()) {
                if($("#password_conf").hasClass("valid")) {
                    $("#password_conf").removeClass("valid");                
                    $("#password_conf").siblings("em").removeClass("fa-check");
                    $("#password_conf").siblings("em").addClass("fa-times"); 
                    $("#password_conf").siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
                }
            } else {
                if(!($("#password_conf").hasClass("valid")) && passRegEx.test($(this).val())) {
                    $("#password_conf").addClass("valid");
                    $("#password_conf").siblings("em").removeClass("fa-times");                
                    $("#password_conf").siblings("em").addClass("fa-check");
                    $("#password_conf").siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
                }
            }
            check_submit();
        }
    });

    $("#a_password").keyup(function() {
        if(passRegEx.test($(this).val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("em").removeClass("fa-times");                
                $(this).siblings("em").addClass("fa-check");
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("em").removeClass("fa-check");
                $(this).siblings("em").addClass("fa-times"); 
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        }
        
        if($(this).val() !== $("#a_password_conf").val()) {
            if($("#a_password_conf").hasClass("valid")) {
                $("#a_password_conf").removeClass("valid");                
                $("#a_password_conf").siblings("em").removeClass("fa-check");
                $("#a_password_conf").siblings("em").addClass("fa-times"); 
                $("#a_password_conf").siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        } else {
            if(!($("#a_password_conf").hasClass("valid")) && passRegEx.test($(this).val())) {
                $("#a_password_conf").addClass("valid");
                $("#a_password_conf").siblings("em").removeClass("fa-times");                
                $("#a_password_conf").siblings("em").addClass("fa-check");
                $("#a_password_conf").siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        }
    });

    $("#password_conf").keyup(function() {
        if($(this).val() === $("#password").val() && passRegEx.test($("#password").val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("em").removeClass("fa-times");                
                $(this).siblings("em").addClass("fa-check");
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("em").removeClass("fa-check");
                $(this).siblings("em").addClass("fa-times");                
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        }
        check_submit();
    });

    $("#a_password_conf").keyup(function() {
        if($(this).val() === $("#a_password").val() && passRegEx.test($("#a_password").val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("em").removeClass("fa-times");                
                $(this).siblings("em").addClass("fa-check");
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("em").removeClass("fa-check");
                $(this).siblings("em").addClass("fa-times");                
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        }
        check_submit();
    });

    $(".tel").keyup(function() {
        if(telRegEx.test($(this).val())) {
            if (!($(this).hasClass("valid"))) {
                $(this).addClass("valid");
                $(this).siblings("em").removeClass("fa-times");                
                $(this).siblings("em").addClass("fa-check");
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti soddisfatti");
            }
        } else {
            if ($(this).hasClass("valid")) {
                $(this).removeClass("valid");                
                $(this).siblings("em").removeClass("fa-check");
                $(this).siblings("em").addClass("fa-times"); 
                $(this).siblings("em").attr("aria-label","Icona di controllo: requisiti non soddisfatti");
            }
        }
        check_submit();
    });

    $("#student").click(function() {
        let stdFields = $("form.login > fieldset li:not(:first-child)");
        if($(this).is(":checked")) {
            stdFields.slideDown();
            stdFields.attr("required", true);
        } else {
            stdFields.slideUp();            
            stdFields.attr("required", false);
        }
    });

    $("#a_data").click(function() {
        if($(this).is(":checked")) {
            $(".signup").slideDown();
            $("input").each(function() {
                if (!($(this).hasClass("invalid")) && $(this).hasClass("toBeChecked")) {
                    $(this).addClass("invalid");
                }
            });
            $("em.fas:not(:last)").addClass("fa-times");
        } else {            
            $(".signup").slideUp(function() {
                $("form").trigger("reset");
            });
        }
    });
});

function check_submit() {
    if($("em.fa-check").length === $("em.fas").length) {
        $("input:last").prop("disabled", false);
    } else {
        $("input:last").prop("disabled", true);
    }
}
