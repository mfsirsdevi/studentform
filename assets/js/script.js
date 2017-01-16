/*
  file-name: script.js
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: the following form is the jquery conversion of the js file written on master
*/

$("document").ready(function(){
  // Name Validator - checks if name field is empty or filled

  function validateName(elem){
    if(!elem) {
      $("#name-info").text("Enter a valid name").show();
      $("#name").focus();
      return false;
    }
    $("#name-info").text("valid").show();
    return true;
  };

  // Guardian Validator - checks if guradian field is empty or filled

  function guardianValidator (elem) {
    if(!elem) {
      $("#guard-info").text("This field is empty");
      return false;
    }
    $("#guard-info").text("valid").show();
    return true;
  };

  // Nation Validator - checks if Nationality field is empty or filled

  function validateNation (elem) {
    if (!elem) {
      $("#nation-info").text("This field is important");
      return false;
    }
    $("#nation-info").text("valid").show();
    return true;
  };

  // Mail Validator - checks if MailId field is properly filled or not

  function validateMailId (elem){
    if ((elem === '') || (elem.indexOf("@", 0) < 0) || (elem.indexOf(".", 0) < 0)) {
      $("#minfo").text("Enter valid email");

      return false;
    }
    $("#minfo").text("valid").show();
    return true;
  };

  // DOB Validator - checks if d.o.b field is properly filled or not

  function validateDate (elem) {
    if (!elem) {
      $("#dob-info").text("Enter a valid date").show();

      return false;
    }
    $("#dob-info").text("valid").show();
    return true;
  };

  // Phone Number Validator - checks if phone number is properly entered or not

  function validatePhone (phn) {
    if (isNaN(phn) || phn.length != 10) {
      $("#cinfo").text("Enter valid phone number").show();
      return false;
    }
    $("#cinfo").text("valid").show();
    return true;
  };

  // Validating all the fields one by one
  $("#name").on("input", function(){
    var stuName = $(this).val();
    validateName(stuName);
  });
  $("#guardian").on("input",function(){
    var guardianValue = $(this).val();
    guardianValidator(guardianValue);
  });
  $("#nationality").on("input", function(){
    var nationValue = $(this).val();
    validateNation(nationValue);
  });
  $("#mail").on("input",function(){
    var mailValue = $(this).val();
    validateMailId(mailValue);
  });
  $("#dob").on("input", function () {
    var dobValue = $(this).val();
    validateDate(dobValue);
  });
  $("#phone").on("input", function () {
    var phoneNumber = $(this).val();
    validatePhone(phoneNumber);
  });

  $("#reset-btn").on("click", function(){
    $("span").text("");
  });

  function validateAll () {
    var iter = 0;
    //console.log(iter);
    if(validateName($("#name").val())) iter++;
    console.log(iter);
    if(validatePhone($("#phone").val())) iter++;
    console.log(iter);
    if(validateDate($("#dob").val())) iter++;
    console.log(iter);
    if(validateMailId($("#mail").val())) iter++;
    console.log(iter);
    if(validateNation($("#nationality").val())) iter++;
    console.log(iter);
    if(guardianValidator($("#guardian").val())) iter++;
    console.log(iter);
    if (iter === 6)
      return true;
    //console.log(iter);
    return false;
  }
  $("#sub-button").on("click", function(e) {

    e.preventDefault();

    var isValid = true;
    // Validating all the fields before submitting form for action
    isValid = validateAll();
    console.log(isValid);
    // Adding the data to the table
    if (isValid) {
      console.log("inside if");
      var inputs = $("form").serializeArray();
      var txt = $("<tr>");
      $.each(inputs, function(i, field){
        $("<td>").html(field.value).appendTo(txt);
      });
      $("<td>").html("<button type='button' class='update-bt btn btn-default'>update</button>").appendTo(txt);
      $("<td>").html("<button type='button' class='delete-bt btn btn-default'>delete</button>").appendTo(txt);
      $("#data").append(txt);
      $("#data").removeClass("hide");
      location.href = "#";
      location.href = "#data";
    }
  });


  $(document).on('click', 'button.delete-bt', function () {
     $(this).parent().parent().remove();
     return false;
  });

  $(document).on("click", "button.update-bt", function() {
    var fieldN;
    $(this).parent().prevAll().each(function() {
      var inputs = $("form").serializeArray();
      if($(this).is("td")){
        var tdHtml = $(this).text();
        $.each(inputs, function(i, field){
          if(tdHtml === field.value)
            fieldN = field;
        });
        var editText = $("<input/>");
        editText.val(tdHtml);
        $(this).html(editText);
      }
    });
  });
});