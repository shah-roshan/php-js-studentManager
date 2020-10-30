/**
 * This is the javascript file that helps to change the DOM contents and changes content when the user 
 * is logged in
 * By Roshan Shah,000793559
 */

/**
 * This is the jQuery event handler that waits for the page elements to load before the function executes
 */
$(document).ready(function () {

  /**
   * this is the jquery event handler for the mouseover function
   * This function is used to change the pointer when it is over the button 
   */
  $("#changeCredentials").mouseover(function () {
    $("#changeCredentials").css("cursor", "pointer");
  });

  let email = $.trim($("#emailid").html());
  let program = $.trim($("#program").html());
  let params = "";
  fetch("../php/getCoursesForHome.php", {
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
   * @param {json response } data 
   */
  function successs(data) {
    let temp = "<h2 id='courseheading'>Courses</h2>";
    console.log(data);
    console.log(data.length);
    for (let i = 0; i < data.length; i++) {
      temp += "<li>" + data[i] + "</li>"
      console.log(data[i]);
    }
    $("#courseList").html(temp);
  }


  /**
   * This is the click event for the change credentials image that redirects to a different page
   */
  $("#changeCredentials").click(function () {

    window.location.href = "../php/changeCredentials.php";


  })



});