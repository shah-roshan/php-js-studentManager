/**
 * This js file is used to check, uncheck different courses by sending ajax request to update the database
 * By Roshan Shah,000793559
 */

/**
 * This is the jQuery event handler that waits for the page elements to load before the function executes
 */
$(document).ready(function () {

    /**
     * This is the click event for the myCourses button that uses an ajax request to get 
     */
    $("#mycourses").click(function () {

        //console.log(event.target);
        let element = event.target;
        console.log(element);
        let id = element.id;
        console.log(id);
        let currentStatus = element.checked;
        console.log(currentStatus);

        //json request

        let params = "course=" + id + "&currentStatus=" + currentStatus;
        fetch("../php/updateCourse.php", {
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
         * this is the function to perform opeartions with the json data received in response to the request
         * @param {json response} data 
         */

        function successs(data) {
            document.getElementById("message").innerHTML = data;
        }




    });
});