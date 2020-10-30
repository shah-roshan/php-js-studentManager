/**
 * This file is used to add students to the table when inserted or remove them if deleted.
 * By Roshan Shah,000793559
 * 
 */


/**
 * This is the jQuery event handler that waits for the page elements to load before the function executes
 */
$(document).ready(function () {



  let params = "";
  fetch("../php/getStudents.php", {
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
   * @param {json response  } data
   */
  function successs(data) {
    console.log(data);
    let target = document.getElementById("students");
    let string = "";
    open = true;
    close = false;

    string += "<table id='myTable'><tr><td>id</td><td>firstname</td><td>lastname</td><td>dob</td><td>email</td><td>password</td><td>programcode</td></tr>";
    for (let index = 0; index < data.length; index++) {

      string += data[index];
    }
    string += "</table>";

    //getting the element by id using jquery and changing its inner HTML.
    $("#students").html(string);
    let insert = $("#insert");
    let addform = "<form id='add'>";
    let tags = "";
    tags += "<h3 id='addUser'>Add New User</h3><p>User will only be entered if all data is entered correctly and email is unique..</p><input type = 'textbox' name='firstname' id='firstname' placeholder='First' required><br>";
    tags += "<input type = 'textbox' name='lastname' id='lastname'  placeholder='Last' required><br>";
    tags += "<input type = 'date' name='dob' id='dob' placeholder='DOB' required><br>";
    tags += "<input type = 'textbox' name='email' id='email' placeholder='email' required><br>";

    tags += "<input type = 'textbox' name='password' id='password'  placeholder='password' required><br>";
    tags += "<select id='course'><option>software559</option><option>networking555</option> </select>";
    tags += "<br><input type='button' id='submit' value='submit'><br>";
    tags += "</form>";
    $("#insert").html(tags);

    /**
     * This is the click event for the delete button that sends an ajax request to a php file and deletes the  user
     * from the table .
     */
    $(".delete").click(function (event) {

      let deleteElement = event.target;
      let deleteEmail = event.target.id;
      params = "email=" + deleteEmail;
      if (deleteEmail !== "admin") {
        fetch("../php/deleteStudent.php", {
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
          console.log(data);
          window.location.reload(true);


        }
      }

    })


    /* 
   ignore the following code , it has been removed
   $(".edit").click(function(){
      let editForm="";
      editForm+="<form id='editForm'>";
    
      editForm+= "<input type = 'date' name='dob' id='dobchange' placeholder='DOB' required><br>";
      editForm+= "<input type = 'textbox' name='firstname' id='firstnamechange' placeholder='firstname' ><br>";
      editForm+= "<input type = 'textbox' name='lastname' id='lastnamechange' placeholder='lastname' ><br>";   
      editForm+= "<input type = 'textbox' name='password' id='passwordchange'  placeholder='password' required><br>";
      editForm+= "<select id='coursechange'><option>software559</option><option>networking555</option> </select><br>";
      editForm+="<br><input type='button' id='updateValues' value='updateValues'><br>";
      editForm+="</form>";
      $("#edit").html(editForm);
    
      newdob=$("#dobchange").val();
      newfirstname=$("#firstnamechange").val();
      newlastname=$("#lastnamechange").val();
      newpassword=$("#passwordchange").val();
      newprogram=$("#coursechange").val();
      let change="firstname="+newfirstname+"&lastname="+newlastname+"&password="+newpassword+"&dob="+newdob+"&programcode="+newprogram;
   
    

     
      $("#updateValues").click(function(event){
        let elementClicked=event.target;
        let email=event.target.id;
        

        fetch("../php/getInformation.php",{
          method:"POST",
          Credentials:'include',
          headers:{"Content-Type":"application/x-www-form-urlencoded"},
          body: change
      
         })
         .then(response=>response.text())
         .then(successs);
     
         function successs(data){
         console.log(data);
        
       
         }
      
    
      
      });
    });
*/



    /**
     * This is the click event for the submit button that sends an ajax request to a php file and adds the new user
     * to the table .
     */
    $("#submit").click(function (event) {


      let params = "firstname=" + $("#firstname").val() + "&lastname=" + $("#lastname").val() + "&email=" + $("#email").val() + "&password=" + $("#password").val() + "&dob=" + $("#dob").val() + "&program=" + $("#course").val();

      fetch("../php/insertStudent.php", {
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
        console.log(data);


        $("#firstname").val("");
        $("#lastname").val("");
        $("#email").val("");
        $("#dob").val("");
        $("#password").val("");

        window.location.reload(true);
      }





    })

  }












})