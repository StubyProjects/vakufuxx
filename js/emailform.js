jQuery(document).ready(function($) {

    $("#emailformular").submit(function(e) {
        e.preventDefault();

        let name = $("#Name");
        let namevalue = name.val();
        let namefeedback = $("#namefeedback");
        let validation = false;
        
        if(namevalue.length < 2) {
            name.addClass("is-invalid");
            namefeedback.css("display", "block");
            namefeedback.html("Ein Name sollte mindestens 2 Zeichen enthalten.");
            validation = false;
        } else if(!isNaN(namevalue)) {
            name.addClass("is-invalid");
            namefeedback.css("display", "block");
            namefeedback.html("Ein Name sollte keine Zahl enthalten.");
            validation = false;
        } else {
            name.removeClass("is-invalid");
            namefeedback.css("display", "none");
            name.addClass("is-valid");
            validation = true;
        }

        if (validation === true) { //Sobald ein Eintrag nicht mehr den Anforderungen enspricht wird das Formular nicht abgesendet siehe Unten

            let email = $("#email");
            let emailvalue = email.val();
            let emailfeedback = $("#emailfeedback");

            if(emailvalue.length > 5 && emailvalue.includes("@") && emailvalue.includes(".")) {
                email.addClass("is-valid");
                email.removeClass("is-invalid");
                emailfeedback.css("display", "none");
                validation = true;
            } else {
                email.removeClass("is-valid");
                email.addClass("is-invalid");
                emailfeedback.css("display", "block");
                validation = false;
            }
        }

        if (validation === true) {
            
            let text = $("#text");
            let textvalue = text.val();
            let textfeedback = $("textfeedback");

            if (textvalue.length >= 10) {

                text.addClass("is-valid");
                text.removeClass("is-invalid");
                textfeedback.css("display", "none");
                validation = true;
            } else {
                text.addClass("is-invalid");
                text.removeClass("is-valid");
                textfeedback.css("display", "block");
                validation = false;
            }
        }
        if(validation === true) {

            let form = $(this);
            let url = form.attr("action");
            let method = form.attr("method");
            let data = {};
            let msgdiv = $("#msgdiv");

            form.find("[name]").each(function() {
                let input = $(this);
                let name = input.attr("name");
                let inputval = input.val();
                data[name] = inputval;
            });

            function sendMail() {
                $.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: function(res) {
                        msgdiv.html(res);
                    }
                });
            }

            grecaptcha.ready(function() {
                grecaptcha.execute('6LdowKQUAAAAANQnIGN8lSjCh6ugsCrVH1OiF061', {action: 'homepage'}).then(function(token) {
                    $.ajax({
                        url: "forms/captchaHandler.php",
                        type: "POST",
                        data: {
                            'token': token
                        },
                        success: function (captchaStatus) {
                            if(captchaStatus) {
                                sendMail();
                            } else {
                                msgdiv.html("Du bist ein Roboter")
                            }
                        }
                    })
                });
            });

        }
    });

    $("#payment").submit(function(e) {
        e.preventDefault();
        let modellfeedback = $("#modellfeedback");
        let modellvalue = $("#modell");
        if(modellvalue.val().length < 3) {
            modellvalue.addClass('is-invalid');
            modellfeedback.css('display', 'block');
        } else {
            modellvalue.removeClass('is-invalid');
            modellvalue.addClass('is-valid');
            $(this).unbind('submit').submit();
        }
    });


});