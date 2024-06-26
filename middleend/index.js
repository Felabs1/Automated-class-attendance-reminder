// const accountSid = "AC9ae55301d6aa9508a733bc1ee6958fa1";
// const authToken = "7c5373f27b0858b238fe504f280bffde";
const express = require("express");
const app = express();

app.post("/twilio/callback", (req, res) => {
  const twiml = new twilio.twiml.VoiceResponse();
  console.log(req.body.callStatus);

  const callStatus = req.body.CallStatus;
  if (callStatus === "completed") {
    // handle successful call here
  } else if (callStatus === "no-answer" || callStatus === "busy") {
    // handle call not answered here
  }

  res.type("text/xml");
  res.send(twiml.toString());
});

const accountSid = "AC7280896be37931fe6414c17da43e194a";
const authToken = "38f85cec95ae3116795abe6845eb1680";
const client = require("twilio")(accountSid, authToken);

client.calls
  .create({
    url: "http://127.0.0.1:1337/twilio/callback",
    to: "+254706263979",
    from: "+12513698804",
    statusCallback: "/twilio/callback",
    statusCallbackMethod: "POST",
  })
  .then((call) => console.log(call));

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
                    url: "http://127.0.0.1:1337/twilio/callback",
                    to: "+254706263979",
                    from: "+12513698804",
                  })
                  .then((call) => {
                    fetch(
                      "http://localhost:8000/backend/connection.php?callId=" +
                        call.sid
                    )
                      .then((res) => {
                        return res.text();
                      })
                      .then((data) => {
                        console.log(data);
                      });
                  });
              });
            }

            if (
              convertDateStringTo24HourFormat(getTimeTwoHoursLater()) == time
            ) {
              client.messages
                .create({
                  from: "+12513698804",
                  body: `Dear Felix, you are required to attend a lecture named ${unit} on venue ${venue} at time ${time}`,
                  to: "+254706263979",
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

// KHXUPBA25DXZFDYRKHJMGJR1 RECOVERY ABDUL +254706263979

// 2P69PYKJ1NEMGDEX9M89JHR3   recovery

// console.log(
//   convertDateStringTo24HourFormat(getTimeThirtyMinutesLater()) == "17:19"
// );
// Output: "14:12"
// makeCall();

// // console.log();

function callClient() {
  client.calls
    .create({
      url: "http://127.0.0.1:1337/",
      to: "+254706263979",
      from: "+12513698804",
      statusCallback: "/twilio/callback",
      statusCallbackMethod: "POST",
    })
    .then((call) => {
      fetch("http://localhost:8000/backend/connection.php?callId=" + call.sid)
        .then((res) => {
          return res.text();
        })
        .then((data) => {
          console.log(data);
        });
    });
}

function recallClient() {
  fetch("http://localhost:8000/backend/connection.php?calls=true")
    .then((res) => {
      return res.json();
    })
    .then((data) => {
      console.log(data);
      data.forEach((element) => {
        client
          .calls(element.callhash)
          .fetch()
          .then((message) => {
            const status = message.status;
            if (
              status == "busy" ||
              status == "no-answer" ||
              status == "failed"
            ) {
              callClient();
            }
          });
      });
    });
}

setInterval(recallClient, 120000);
setInterval(makeCall, 10000);
