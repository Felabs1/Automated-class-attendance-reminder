const accountSid = "AC6020b62180c54d0323a02168a3ea5f9f";
const authToken = "21d5b4545ca3b3abf77e44c68d5af4a8";
const client = require("twilio")(accountSid, authToken);

client.messages
  .create({
    from: "+14158586498",
    body: "Dear felix, you are invited to attend classes at TB2",
    to: "+254111942081",
  })
  .then((message) => console.log(message.sid));
