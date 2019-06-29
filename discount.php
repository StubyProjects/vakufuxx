<?php
include "views/layout/header.php";

?>


<style>
    #discountCode {
        width: 30%;
    }
</style>

<nav class="navbar navbar-expand-lg nav-scroll">
    <div class="container">
        <a class="navlogorecht" href="index">
    VAKUFUXX
        </a>
    </div>
</nav>

    <div class="container-fluid section-padding mt-5">
        <div class="container cardborder">
            <h1 style="padding-top: 30px">
                Aktivieren Sie ihren Rabattcode!
            </h1>
            <div class="container emailform">
                <form id="createDiscount" novalidate>
                    <div class="form-group">
                        <label for="Email" class="sr-only">Ihre E-Mail-Adresse</label>
                        <input type="email" class="form-control" id="email" placeholder="Ihre E-Mail-Adresse">
                        <div id="emailfeedback" class="invalid-feedback">
                            Bitte geben Sie eine vorhandene E-Mail Adresse ein.
                        </div>
                    </div>
                    <button type="submit" class="btn actionbtn">Rabattcode aktivieren</button>

                </form>

                <p class="mt-3">
                    Der Rabattcode wird für Sie generiert wenn Sie auf "Rabattcode aktivieren" clicken.
                    Dabei können Sie ihn sich immer wieder anzeigen lassen, falls Sie ihn vergessen.
                    Allerdings ist er nur für eine Transaktion gültig.
                </p>
                <h1 id="dia" class="propertyheading">
                    Ihr Code lautet
                </h1>
                <input id="discountCode" class="form-control" type="text" name="discount" disabled="disabled" value="">

                <a href="https://vakufuxx.de/#shop" style="color: #333333" class="mt-3 actionbtn btn">
                    Zum Shop
                </a>
            </div>

        </div>
    </div>
    <script src="js/jquery-3.1.1.min.js"></script>
<script>
    $("#createDiscount").submit(function(e) {
        e.preventDefault();
        let email = $("#email");
        let emailvalue = email.val();
        let emailfeedback = $("#emailfeedback");
        let discountCode = $("#discountCode");

        if(emailvalue.length > 5 && emailvalue.includes("@") && emailvalue.includes(".")) {
            email.addClass("is-valid");
            email.removeClass("is-invalid");
            emailfeedback.css("display", "none");

            $.ajax({
                url: 'discountCreator.php',
                type: 'post',
                data: {
                    'emailvalue': emailvalue
                },
                success: function(res) {
                    discountCode.val(res);
                }
            });

        } else {
            email.removeClass("is-valid");
            email.addClass("is-invalid");
            emailfeedback.css("display", "block");
        }
    });
</script>






<?php include "views/layout/footer.php"; ?>