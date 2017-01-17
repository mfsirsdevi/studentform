/*
  file-name: script.js
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: the following form is the jquery conversion of the js file written on master
*/

$("document").ready(function(){

  // Name Validator - checks if name field is empty or filled
  function validateName(nameValue, fieldId){
    if(!nameValue) {
      $(fieldId).text("Enter a valid name").show();
      return false;
    }
    $(fieldId).text("valid").show();
    return true;
  }

  // Guardian Validator - checks if guradian field is empty or filled

  function guardianValidator (guardianValue, fieldId) {
    if(!guardianValue) {
      $(fieldId).text("This field is empty");
      return false;
    }
    $(fieldId).text("valid").show();
    return true;
  }

  // Nation Validator - checks if Nationality field is empty or filled

  function validateNation (nationValue, fieldId) {
    if (!nationValue) {
      $(fieldId).text("This field is important");
      return false;
    }
    $(fieldId).text("valid").show();
    return true;
  }

  // Mail Validator - checks if MailId field is properly filled or not

  function validateMailId (emailValue, fieldId){
    if ((emailValue === '') || (emailValue.indexOf("@", 0) < 0) || (emailValue.indexOf(".", 0) < 0)) {
      $(fieldId).text("Enter valid email");
      return false;
    }
    $(fieldId).text("valid").show();
    return true;
  }

  // DOB Validator - checks if d.o.b field is properly filled or not

  function validateDate (dateValue, fieldId) {
    if (!dateValue) {
      $(fieldId).text("Enter a valid date").show();
      return false;
    }
    $(fieldId).text("valid").show();
    return true;
  }

  // Phone Number Validator - checks if phone number is properly entered or not

  function validatePhone (phn, fieldId) {
    if (isNaN(phn) || phn.length != 10) {
      $(fieldId).text("Enter valid phone number").show();
      return false;
    }
    $(fieldId).text("valid").show();
    return true;
  }

  // Validating all the fields one by one
  $("#name").on("input", function(){
    var stuName = $(this).val();
    validateName(stuName, $("#name-info"));
  });
  $("#guardian").on("input",function(){
    var guardianValue = $(this).val();
    guardianValidator(guardianValue, $("#guard-info"));
  });
  $("#nationality").on("input", function(){
    var nationValue = $(this).val();
    validateNation(nationValue, $("#nation-info"));
  });
  $("#mail").on("input",function(){
    var mailValue = $(this).val();
    validateMailId(mailValue, $("#minfo"));
  });
  $("#dob").on("input", function () {
    var dobValue = $(this).val();
    validateDate(dobValue, $("#dob-info"));
  });
  $("#phone").on("input", function () {
    var phoneNumber = $(this).val();
    validatePhone(phoneNumber, $("#cinfo"));
  });
  $("#reset-btn").on("click", function(){
    $("span").text("");
  });

  function validateAll (nameValue, nameInfo, phoneValue, contactInfo, dobValue, dobInfo, mailValue, mailInfo, nationValue, nationInfo, guardianValue, guardianInfo) {
    var iter = 0;
    if(validateName(nameValue, nameInfo)) iter++;
    if(validatePhone(phoneValue, contactInfo)) iter++;
    if(validateDate(dobValue, dobInfo)) iter++;
    if(validateMailId(mailValue, mailInfo)) iter++;
    if(validateNation(nationValue, nationInfo)) iter++;
    if(guardianValidator(guardianValue, guardianInfo)) iter++;
    if (iter === 6)
      return true;
    return false;
  }
  $("#sub-button").on("click", function(e) {
    e.preventDefault();
    var isValid = true;
    var nameValue = $("#name").val();
    var nameInfo = $("#name-info");
    var phoneValue = $("#phone").val();
    var contactInfo = $("#cinfo");
    var dobValue = $("#dob").val();
    var dobInfo = $("#dob-info");
    var mailValue = $("#mail").val();
    var mailInfo = $("#minfo");
    var nationValue = $("#nationality").val();
    var nationInfo = $("#nation-info");
    var guardianValue = $("#guardian").val();
    var guardianInfo = $("#guard-info");
    isValid = validateAll(nameValue, nameInfo, phoneValue, contactInfo, dobValue, dobInfo, mailValue, mailInfo, nationValue, nationInfo, guardianValue, guardianInfo);
    // Adding the data to the table
    if (isValid) {
      $("#student-form").submit();
    }
    else {
      location.href = "#";
      location.href = "#student-form";
    }
  });


  $(document).on('click', 'button.delete-bt', function () {
     $(this).parent().parent().remove();
     return false;
  });

  $(document).on("click", "button.update-bt", function() {
    $(this).parent().prevAll().each(function() {
      var inputs = $("form").serializeArray();
      if($(this).is("td")){
        if ($(this).attr("contenteditable")) {
          $(this).removeAttr("contenteditable");
        }
        else{
          $(this).attr("contenteditable", true);
        }
      }
    });
  });
});