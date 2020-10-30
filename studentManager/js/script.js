/**
 * This is the Script.js file that contains javascript code to change the content of the app and perform event handling
 * and execute DOM manipulation ..
 * By Roshan Shah,000793559
 */


/**
 * This is the jQuery event handler that waits for the page elements to load before the function executes
 */
$(document).ready(function () {

  /**
   * this is the jquery event handler for the click function
   * This function is used to verify the credentials and redirect the page in case of correct credentials.
   */
  $("#loginButton").click(function (event) {
    event.preventDefault();
    if ($("#password").val() !== "" && $("#id").val() !== "") {

      let params = "id=" + $("#id").val() + "&password=" + $("#password").val();


      fetch("php/verify.php", {
          method: "POST",
          Credentials: 'include',
          headers: {
            "Content-Type": "application/x-www-form-urlencoded"
          },
          body: params

        })
        .then(response => response.json())
        .then(successs);
      /**
       * this is the function to perform opeartions with the json data received in response to the request
       * @param {json response} data 
       */

      function successs(data) {
        console.log(data);
        console.log(data["valid"]);
        if (data["valid"] === false) {
          console.log("false");
          event.preventDefault();
          $("#fail").html("Incorrect Credentials").css("color", "red");
        } else {
          $("#credentials").submit();
        }
      }


    } else {
      $("#fail").html("Incorrect Credentials").css("color", "red");

    }
  });

});