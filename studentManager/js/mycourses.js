/**
 * This js file is used to check, uncheck different courses by sending ajax request to update the database
 * BY Roshan Shah,000793559
 */
$(document).ready(function () {

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
   * @param {json response} data 
   */

  function successs(data) {
    let temp = "";
    console.log(data);
    console.log(data.length);

    for (let i = 0; i < data.length; i++) {
      temp += data[i] + "<br>"

    }

    $("#coursetable").html(temp);
  }

  /**
   * Ajax request to get the information of which course is selected 
   */

  fetch("../php/manageCourses.php", {
      method: "POST",
      Credentials: 'include',
      headers: {
        "Content-Type": "application/x-www-form-urlencoded"
      },
      body: params

    })
    .then(response => response.json())
    .then(enrolled);
  /**
   * this is the function to perform opeartions with the json data received in response to the request
   * @param {json response} data 
   */

  function enrolled(data) {
    let temp = "";
    console.log(data);
    console.log(data.length);

    for (let i = 0; i < data.length; i++) {
      temp += data[i] + "<br>"

    }

    $("#enrolled").html(temp);
  }

});