function register() {
  //   alert("hello world");
  var email = document.getElementById("email");
  var admission = document.getElementById("admission");
  var password = document.getElementById("password");
  var names = document.getElementById("names");
  var phoneNumber = document.getElementById("phoneNumber");
  var course = document.getElementById("course");
  var year = document.getElementById("year");

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?registerStudent=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
    }
  };

  let myform = document.getElementById("signupForm");
  let formData = new FormData(myform);
  request.send(formData);
}

function login() {
  console.log("hello");
  // ids to be captured for validation purposes
  // the validations to be made here
  // agax xmlHttpRequest
  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?loginStudent=true");
  request.onreadyStateChange = function () {
    if ((this.readyState = 4 && this.status == 200)) {
      console.log(this.responseText);
    }
  };

  // sending data from the login form
  let myForm = document.getElementById("frmLogin");
  let formData = new FormData(myForm);
  request.send(formData);
}
