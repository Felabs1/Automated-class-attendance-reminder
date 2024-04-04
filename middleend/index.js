const accountSid = "AC9ae55301d6aa9508a733bc1ee6958fa1";
const authToken = "f5cecd8a48db9f95675960c153a7e837";
const client = require("twilio")(accountSid, authToken);

const { response } = require("express");

// client.calls
//   .create({
//     url: "http://127.0.0.1:1337/",
//     to: "+254703464043",
//     from: "+14158586498",
//   })
//   .then((call) => console.log(call.sid));

function getTimeThirtyMinutesLater() {
  const now = new Date();
  now.setMinutes(now.getMinutes() + 30);
  return now;
}

function getTimeTwoHoursLater() {
  const now = new Date();
  now.setHours(now.getHours() + 2);
  return now;
}

// Usage Output: a Date object representing the time 12 hours from now

// Usage
// Output: a Date object representing the time 30 minutes from now
function getDayOfWeek(date) {
  const days = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
  ];

  if (!(date instanceof Date)) {
    throw new Error("Invalid date.");
  }

  return days[date.getDay()];
}
// console.log(getDayOfWeek(new Date()));

function makeCall() {
  fetch(
    `http://localhost:8000/backend/connection.php?day=${getDayOfWeek(
      new Date()
    )}`
  )
    .then((response) => response.json())
    .then((data) => {
      console.log(data);
      data.forEach(({ group, time, venue, unit }) => {
        fetch(`http://localhost:8000/backend/connection.php?group=${group}`)
          .then((response) => response.json())
          .then((data) => {
            if (
              convertDateStringTo24HourFormat(getTimeThirtyMinutesLater()) ==
              time
            ) {
              data.forEach(({ phoneNo, names, admission }) => {
                client.calls
                  .create({
                    url: "http://127.0.0.1:1337/",
                    to: `+254731862583`,
                    from: "+18506162328",
                  })
                  .then((call) => console.log(call.sid));
              });
            }

            if (
              convertDateStringTo24HourFormat(getTimeTwoHoursLater()) == time
            ) {
              client.messages
                .create({
                  from: "+18506162328",
                  body: `Dear Felix, you are required to attend a lecture named ${unit} on venue ${venue} at time ${time}`,
                  to: "+254731862583",
                })
                .then((message) => console.log(message.sid));
            }
          });
      });
    });
}

function convertDateStringTo24HourFormat(dateString) {
  const date = new Date(dateString);
  return date.toLocaleTimeString("en-US", {
    hour: "2-digit",
    minute: "2-digit",
    hour12: false,
  });
}

// 2P69PYKJ1NEMGDEX9M89JHR3   recovery

// console.log(
//   convertDateStringTo24HourFormat(getTimeThirtyMinutesLater()) == "17:19"
// );
// Output: "14:12"
// makeCall();
setInterval(makeCall, 10000);

// console.log();
