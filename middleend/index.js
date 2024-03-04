const accountSid = "AC6020b62180c54d0323a02168a3ea5f9f";
const authToken = "21d5b4545ca3b3abf77e44c68d5af4a8";
const client = require("twilio")(accountSid, authToken);

client.calls
  .create({
    url: "http://127.0.0.1:1337/",
    to: "+254703464043",
    from: "+14158586498",
  })
  .then((call) => console.log(call.sid));
