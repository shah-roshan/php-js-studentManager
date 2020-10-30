/**
 * This is the js file for the changeCredentials.php
 * It is used to verify the conditions for setting a new password and send an ajax request to update the
 * credentials in the database.
 * By Roshan Shah,000793559
 */


/**
 * This is the jQuery event handler that waits for the page elements to load before the function executes
 */
$(document).ready(function () {


    if ($("#newpassword").val() === "") {
        $("#newpassword").css("borderColor", "red");
    }
    if ($("#confirmnewpassword").val() === "") {
        $("#confirmnewpassword").css("borderColor", "red");
    }
    /**
     * this function checks if the password follows the rules mentioned on page
     * @param {is the password entered in the textbox by the user } a
     */
    function conditionscheck(a) {

        let lowerCase = 0;
        let upperCase = 0;
        let special = 0;
        let number = 0;

        for (let i = 0; i < a.length; i++) {
            if (a[i] >= 'a' && a[i] <= 'z') {
                lowerCase = lowerCase + 1;

            }
            if (a[i] >= 'A' && a <= 'Z') {
                upperCase = upperCase + 1;
            }
            if ((a.charCodeAt(i) >= 32 && a.charCodeAt(i) <= 47) || (a.charCodeAt(i) >= 58 && a.charCodeAt(i) <= 64) || a.charCodeAt(i) === 94) {
                special = special + 1;

            }
            if (a[i] >= 0 && a[i] <= 9) {
                number = number + 1;
            }




        }
        if (!(lowerCase > 0 && upperCase > 0 && number > 0 && special > 0 && a.length >= 5)) {
            console.log("lower" + lowerCase);
            console.log("upper" + upperCase);
            console.log("special" + special);
            console.log("number" + number);
            console.log(a.length);

            return false;
        } else {
            return true;
        }
    }
    /**
     * This is the click event for the ok button. It uses the conditionscheck function to check if the password 
     * is acceptable and then sends an ajax request to update the password if it is acceptable otherwise 
     * informs the user that password is unacceptable
     */
    $("#ok").click(function (event) {

        event.preventDefault();
        console.log("ok clicked");
        if (conditionscheck($("#newpassword").val()) === true) {
            if ($("#confirmnewpassword").val() === $("#newpassword").val()) {
                console.log("passed");
                let newpassword = $("#newpassword").val();
                let params = "newpassword=" + newpassword;
                fetch("../php/storeandupdateCredential.php", {
                        method: "POST",
                        Credentials: 'include',
                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },
                        body: params

                    })
                    .then(response => response.text())
                    .then(successs);
                /**
                 * this is the function to perform opeartions with the json string received in response to the request
                 * @param {json response } text 
                 */
                function successs(text) {
                    console.log(text);

                    $("#message").html("Changes have been saved");



                }
            } else {
                $("#message").html("Passwords do not match.");
            }
        } else {
            $("#message").html("Password does not meet all conditions.");
        }
    });

    /**
     * This is the click event for the cancel button.It prevents the form from submitting and redirects it back 
     * to the home page .
     *  */
    $("#cancel").click(function (event) {

        event.preventDefault();
        window.location.href = "../php/loggedinhome.php";
    })


});