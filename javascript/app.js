function register() {
  //   alert("hello world");
  var email = document.getElementById("email");
  var admission = document.getElementById("admission");
  var password = document.getElementById("password");
  var names = document.getElementById("names");
  var phoneNumber = document.getElementById("phoneNumber");
  var course = document.getElementById("course");
  var year = document.getElementById("year");

  if (email.value == "") {
    alert("please enter email");
    email.classList.add("w3-border-red");
    return;
  }

  if (names.value == "") {
    alert("please enter names");
    names.classList.add("w3-border-red");
    return;
  }

  if (password.value == "") {
    alert("please enter password");
    password.classList.add("w3-border-red");
    return;
  }

  if (admission.value == "") {
    alert("please enter admission");
    admission.classList.add("w3-border-red");
    return;
  }

  if (phoneNumber.value == "") {
    alert("please enter phoneNumber");
    phoneNumber.classList.add("w3-border-red");
    return;
  }

  // comunicating with the server

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?registerStudent=true");
  request.onreadystatechange = function () {
    // connection to the server is working
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "admission_exists") {
        alert("admission exist");
        admission.classList.add("w3-border-red");
      } else if (this.responseText == "successful") {
        alert("registration succesful");
        window.location.href = "./login.php";
      } else {
        alert("some error occured");
      }
    }

    let myform = document.getElementById("signupForm");
    let formData = new FormData(myform);
    request.send(formData);
  };

  function login() {
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    // ids to be captured for validation purposes
    // the validations to be made here
    // agax xmlHttpRequest
    let request = new XMLHttpRequest();
    request.open("POST", "./backend/connection.php?loginStudent=true");
    request.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
      }
    };

    // sending data from the login form
    let myForm = document.getElementById("frmLogin");
    let formData = new FormData(myForm);
    request.send(formData);
  }
}
