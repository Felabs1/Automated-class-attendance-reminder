const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const admissionPattern = /^[A-Z]{3}\/\\d{5}\/\\d{3}$/;
const fullNamePattern = /^[A-Z][a-z]* [A-Z][a-z]*$/;

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
  } else if (emailPattern.test(email.value) == false) {
    alert("please enter a valid email");
    email.classList.add("w3-border-red");
    return;
  }

  if (names.value == "") {
    alert("please enter names");
    names.classList.add("w3-border-red");
    return;
  } else if (fullNamePattern.test(names.value)) {
    alert("please enter a valid name");
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
  request.open("POST", "./backend/connection.php?registerStudent=true", true);
  // console.log(request);
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
        console.log(this.responseText);
      }
    }
  };

  let myform = document.getElementById("signupForm");
  let formData = new FormData(myform);
  request.send(formData);
}

function login() {
  let username = document.getElementById("username");
  let password = document.getElementById("password");

  // ids to be captured for validation purposes
  // the validations to be made here
  if (username.value == "") {
    alert("please enter a username");
    username.classList.add("w3-border-red");
    return;
  }

  if (password.value == "") {
    alert("please enter a password");
    password.classList.add("w3-border-red");
    return;
  }
  // agax xmlHttpRequest
  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?loginStudent=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "login_success") {
        alert("login successful");
        window.location.href = "./index.php";
      } else if (this.responseText == "incorrect_password") {
        alert("please enter the correct password");
      } else if (this.responseText == "no_user_found") {
        alert("the admission number you entered does not exist");
      } else {
        alert("internal server error");
        console.error(this.responseText);
      }
    }
  };

  // sending data from the login form
  let myForm = document.getElementById("frmLogin");
  let formData = new FormData(myForm);
  request.send(formData);
}

function addCourse() {
  let courseCode = document.getElementById("course_code");
  let courseName = document.getElementById("course_name");

  if (courseCode.value == "") {
    alert("please enter the course code");
    courseCode.classList.add("w3-border-red");
    return;
  }

  if (courseName.value == "") {
    alert("please enter course name");
    courseName.classList.add("w3-border-red");
    return;
  }

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?addCourse=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "course_exist") {
        alert("the course code allready exist");
      } else if (this.responseText == "success") {
        alert("course registered successfully");
      } else {
        alert("internal server error");
        console.error(this.responseText);
      }
    }
  };

  // sending data from the login form
  let myForm = document.getElementById("frmaddcourse");
  let formData = new FormData(myForm);
  request.send(formData);
}

function addUnit() {
  let unitCode = document.getElementById("unit_code");
  let unitName = document.getElementById("unit_name");

  if (unitCode.value == "") {
    alert("please enter the unit code");
    return;
  }

  if (unitName.value == "") {
    alert("please enter the unit name");
    return;
  }

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?addunit=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "unit_code_exist") {
        alert("the unit code allready exist");
      } else if (this.responseText == "successful") {
        alert("course registered successfully");
      } else {
        alert("internal server error");
        console.log(this.responseText);
      }
    }
  };

  // sending data from the login form
  let myForm = document.getElementById("frmaddunit");
  let formData = new FormData(myForm);
  request.send(formData);
}

function addReminder() {
  var unit = document.getElementById("unit");
  var time = document.getElementById("time");
  var venue = document.getElementById("venue");
  var group = document.getElementById("group");
  var day_of_the_week = document.getElementById("day_of_the_week");

  // validations
  if (unit.value == "") {
    alert("please enter the unit name");
    unit.classList.add("w3-border-red");
    return;
  }

  if (time.value == "") {
    alert("please enter time");
    time.classList.add("w3-border-red");
    return;
  }

  if (venue.value == "") {
    alert("please enter venue");
    venue.classList.add("w3-border-red");
    return;
  }

  if (group.value == "") {
    alert("please enter group");
    group.classList.add("w3-border-red");
    return;
  }

  if (day_of_the_week.value == "") {
    alert("please enter the day of the week");
    day_of_the_week.classList.add("w3-border-red");
    return;
  }

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?addReminder=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      // console.log(this.responseText);
      if (this.responseText == "successful") {
        alert("reminder set successfully");
      } else if (this.responseText == "lecturers_clashing") {
        alert("lecturers clashing");
      } else {
        alert("some error occured");
        console.log(this.responseText);
      }
    }
  };

  let form = document.getElementById("reminder");
  let formData = new FormData(form);
  request.send(formData);
}

function registerLecturer() {
  var email = document.getElementById("email");
  var admission = document.getElementById("admission");
  var password = document.getElementById("password");
  var names = document.getElementById("names");
  var phoneNumber = document.getElementById("phoneNumber");

  if (email.value == "") {
    alert("please enter email");
    return;
  }

  if (password.value == "") {
    alert("please enter the password");
    return;
  }

  if (names.value == "") {
    alert("please enter the lecturers names");
    return;
  }

  if (phoneNumber.value == "") {
    alert("please enter the phone number");
    return;
  }

  var request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?registerLecturer=true", true);
  // console.log(request);
  request.onreadystatechange = function () {
    // connection to the server is working
    if (this.readyState == 4 && this.status == 200) {
      if (this.responseText == "user_exist") {
        alert("user exist");
        admission.classList.add("w3-border-red");
      } else if (this.responseText == "successful") {
        alert("registration succesful");
        window.location.href = window.location.href;
      } else {
        alert("some error occured");
        console.log(this.responseText);
      }
    }
  };

  let myform = document.getElementById("signupForm");
  let formData = new FormData(myform);
  request.send(formData);
}

function lecturerLogin() {
  let username = document.getElementById("username");
  let password = document.getElementById("password");

  // ids to be captured for validation purposes
  // the validations to be made here
  if (username.value == "") {
    alert("please enter a username");
    username.classList.add("w3-border-red");
    return;
  }

  if (password.value == "") {
    alert("please enter a password");
    password.classList.add("w3-border-red");
    return;
  }
  // agax xmlHttpRequest
  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?loginLecturer=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "login_success") {
        alert("login successful");
        window.location.href = "./index.php";
      } else if (this.responseText == "incorrect_password") {
        alert("please enter the correct password");
      } else if (this.responseText == "no_user_found") {
        alert("the admission number you entered does not exist");
      } else {
        alert("internal server error");
        console.log(this.responseText);
      }
    }
  };

  // sending data from the login form
  let myForm = document.getElementById("frmLogin");
  let formData = new FormData(myForm);
  request.send(formData);
}

function editCourse() {
  let courseCode = document.getElementById("courseCode");
  let courseName = document.getElementById("courseName");

  if (courseCode.value == "") {
    alert("please enter the course code");
    return;
  }

  if (courseName.value == "") {
    alert("please enter the course name to delete");
    return;
  }

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?edit_course=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "success") {
        alert("course edited successfully");
        window.location.href = window.location.href;
      } else {
        alert("some error occured when editing");
      }
    }
  };

  let form = document.getElementById("frmEditCourse");
  let formData = new FormData(form);
  request.send(formData);
}

function updateUnit() {
  const unitName = document.getElementById("unitName");
  const unitCode = document.getElementById("unitCode");
  const courseCode = document.getElementById("courseCode");

  if (unitName.value == "") {
    alert("please enter the unit name");
    return;
  }

  if (courseCode.value == "") {
    alert("please enter the coursee code");
    return;
  }

  if (unitCode.value == "") {
    alert("please enter the unit code");
    return;
  }

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?edit_unit=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "successful") {
        alert("unit updated successfully");
        window.location.href = window.location.href;
      } else {
        alert("some error occured");
      }
    }
  };

  let form = document.getElementById("frmUpdateUnit");
  let formdata = new FormData(form);
  request.send(formdata);
}

function editReminder() {
  var unit = document.getElementById("unit");
  var time = document.getElementById("time");
  var venue = document.getElementById("venue");
  var group = document.getElementById("group");
  var day_of_the_week = document.getElementById("day_of_the_week");

  // validations
  if (unit.value == "") {
    alert("please enter the unit name");
    unit.classList.add("w3-border-red");
    return;
  }

  if (time.value == "") {
    alert("please enter time");
    time.classList.add("w3-border-red");
    return;
  }

  if (venue.value == "") {
    alert("please enter venue");
    venue.classList.add("w3-border-red");
    return;
  }

  if (group.value == "") {
    alert("please enter group");
    group.classList.add("w3-border-red");
    return;
  }

  if (day_of_the_week.value == "") {
    alert("please enter the day of the week");
    day_of_the_week.classList.add("w3-border-red");
    return;
  }

  let request = new XMLHttpRequest();
  request.open("POST", "./backend/connection.php?editReminder=true");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      if (this.responseText == "successful") {
        alert("reminder updated successfully");
        window.location.href = window.location.href;
      } else {
        alert("some error occured");
      }
    }
  };
  let form = document.getElementById("reminder");
  let formdata = new FormData(form);
  request.send(formdata);
}
