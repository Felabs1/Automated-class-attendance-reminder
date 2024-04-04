const express = require('express');
const bodyParser = require('body-parser');
const fs = require('fs');

const app = express();
app.use(bodyParser.json());

// Get all students
app.get('/students', (req, res) => {
  fs.readFile('students.json', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error reading file');
    } else {
      const students = JSON.parse(data);
      res.send(students);
    }
  });
});

// Get a student by roll number
app.get('/students/:roll', (req, res) => {
  fs.readFile('students.json', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error reading file');
    } else {
      const students = JSON.parse(data);
      const student = students.find(s => s.roll === parseInt(req.params.roll));
      if (student) {
        res.send(student);
      } else {
        res.status(404).send('Student not found');
      }
    }
  });
});

// Add a new student
app.post('/students', (req, res) => {
  fs.readFile('students.json', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error reading file');
    } else {
      const students = JSON.parse(data);
      const newStudent = req.body;
      students.push(newStudent);
      fs.writeFile('students.json', JSON.stringify(students), (err) => {
        if (err) {
          console.error(err);
          res.status(500).send('Error writing file');
        } else {
          res.send(newStudent);
        }
      });
    }
  });
});

// Update a student
app.put('/students/:roll', (req, res) => {
  fs.readFile('students.json', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error reading file');
    } else {
      const students = JSON.parse(data);
      const roll = parseInt(req.params.roll);
      const updatedStudent = req.body;
      const index = students.findIndex(s => s.roll === roll);
      if (index !== -1) {
        students[index] = updatedStudent;
        fs.writeFile('students.json', JSON.stringify(students), (err) => {
          if (err) {
            console.error(err);
            res.status(500).send('Error writing file');
          } else {
            res.send(updatedStudent);
          }
        });
      } else {
        res.status(404).send('Student not found');
      }
    }
  });
});

// Delete a student
app.delete('/students/:roll', (req, res) => {
  fs.readFile('students.json', 'utf8', (err, data) => {
    if (err) {
      console.error(err);
      res.status(500).send('Error reading file');
    } else {
      const students = JSON.parse(data);
      const roll = parseInt(req.params.roll);
      const filteredStudents = students.filter(s => s.roll !== roll);
      if (filteredStudents.length === students.length) {
        res.status(404).send('Student not found');
      } else {
        fs.writeFile('students.json', JSON.stringify(filteredStudents),(err) => {
          if (err) {
            console.error(err);
            res.status(500).send('Error writing file');
          } else {
            res.status(204).send();
          }
        });
      }
    }
  });
});

app.listen(3000, () => {
  console.log('Server starting on port 3000');
});