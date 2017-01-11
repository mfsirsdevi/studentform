/*
  file-name: script.js
  used-for: week 1 assignment of mindifire training
  created-by: r s devi prasad
  description: it is a js file for validating form, creating table from
  the form data and editing the data from the table.
*/

// D.
var mailid = document.getElementById("mail");
var nam = document.getElementById("name");
var dob = document.getElementById("dob");
var nation = document.getElementById("nationality");
var guardian = document.getElementById("guardian");
var phn = document.getElementById("phone");
var submitButton = document.getElementById("sub-button");

/*
 * The following lines of code call the corresponding validation functions
 * for validating the respective data fields.
 */

nam.addEventListener("input", validateName);
phn.addEventListener("input", validatePhone);
mailid.addEventListener("input", validateMailId);
nation.addEventListener("input", validateNation);
dob.addEventListener("input", validateDOB);
guardian.addEventListener("input", validateGuardian);
submitButton.addEventListener("click", function(event){
  submitForm(event);
});

/*
 *The following lines of code define the functions for validating the fields
 */

function validateName() {
  if(nam.value === '') {
    document.getElementById("name-info").innerHTML = "Enter a valid name";
    //nam.focus();
    return false;
  }
  document.getElementById("name-info").innerHTML = "";
}

function validateGuardian() {
  if(guardian.value === '') {
    document.getElementById("guard-info").innerHTML = "This field is empty";
    return false;
  }
  document.getElementById("guard-info").innerHTML = "";
}

function validateNation() {
  if (nation.value === '') {
    document.getElementById("nation-info").innerHTML = "This field is important";
    nation.focus();
    return false;
  }
  document.getElementById("nation-info").innerHTML = "";
}

function validateMailId(){
  var email = mailid.value;
  if ((email === '') || (email.indexOf("@", 0) < 0) || (email.indexOf(".", 0) < 0)) {
    document.getElementById("minfo").innerHTML = "Enter valid email";
    mailid.focus();
    return false;
  }
  document.getElementById("minfo").innerHTML = "";
  
}

function validateDOB() {
  if (dob.value === '') {
    document.getElementById("dob-info").innerHTML = "Enter a valid date";
    dob.focus();
    return false;
  }
  document.getElementById("dob-info").innerHTML = "";
  
}

function validatePhone() {
  var phn = phone.value;
  if (isNaN(phn) || phn.length != 10) {
    document.getElementById("cinfo").innerHTML = "Enter valid phone number";
    return false;
  }
  document.getElementById("cinfo").innerHTML = "";
}

function submitForm(e) {
  e.preventDefault();  
  // Checking the fields once again
  validateName();
  validateDOB();
  validateGuardian();
  validateMailId();
  validatePhone();
  validateNation();
  
  
  // Adding the data to the table
  var inputs = document.getElementById("student-form").elements;
  var table = document.getElementById("data");
  var inputIndex = 0;
  for (var rwIndex = 0; inputIndex < inputs.length - 2; rwIndex++) {
    var temp = inputs[inputIndex];
    if ((temp.type === "radio" || temp.type === "checkbox") && temp.checked === false)
      rwIndex -= 1;
    else {
    var row = table.insertRow(rwIndex);
    var cell1 = row.insertCell(0);
    var cell2  = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4  = row.insertCell(3);
    cell1.innerHTML = temp.name;
    cell2.innerHTML = temp.value;
    cell3.innerHTML = '<input type="button" value="Update" onclick="updateRow(this)">';
    cell4.innerHTML = '<input type="button" value="Delete" onclick="deleteRow(this)">';
    }
    inputIndex += 1;
  }
}

/*
 * The function updates the rows of the table by converting td to input
 */
function updateRow(r) {
  var d = r.parentNode.parentNode.childNodes;
  var tmp = d[1].innerHTML;
  d[1].innerHTML = '<input type="text"  id="disable" value=' + tmp + ' />';
  document.getElementById('disable').focus();
  document.getElementById('disable').onblur = function() {
    tmp = document.getElementById('disable').value;
    d[1].innerHTML = tmp;
  };
}

function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("data").deleteRow(i);
}