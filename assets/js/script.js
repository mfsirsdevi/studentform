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
      location.href = "#";
      location.href = "#name-info";
      return false;
    }
    $("#name-info").text("valid").show();
  };

  // Guardian Validator - checks if guradian field is empty or filled

  function guardianValidator (elem) {
    if(!elem) {
      $("#guard-info").text("This field is empty");
      location.href = "#";
      location.href = "#guard-info";
      return false;
    }
    $("#guard-info").text("valid").show();
  };

  // Nation Validator - checks if Nationality field is empty or filled

  function validateNation (elem) {
    if (!elem) {
      $("#nation-info").text("This field is important");
      location.href = "#";
      location.href = "#nation-info";
      return false;
    }
    $("#nation-info").text("valid").show();
  };

  // Mail Validator - checks if MailId field is properly filled or not

  function validateMailId (elem){
    if ((elem === '') || (elem.indexOf("@", 0) < 0) || (elem.indexOf(".", 0) < 0)) {
      $("#minfo").text("Enter valid email");
      location.href = "#";
      location.href = "#minfo";
      return false;
    }
    $("#minfo").text("valid").show();
  };

  // DOB Validator - checks if d.o.b field is properly filled or not

  function validateDate (elem) {
    if (!elem) {
      $("#dob-info").text("Enter a valid date").show();
      location.href = "#";
      location.href = "#dob-info";
      return false;
    }
    $("#dob-info").text("valid").show();
  };

  // Phone Number Validator - checks if phone number is properly entered or not

  function validatePhone (phn) {
    if (isNaN(phn) || phn.length != 10) {
      $("#cinfo").text("Enter valid phone number").show();
      location.href = "#";
      location.href = "#cinfo";
      return false;
    }
    $("#cinfo").text("valid").show();
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


  $("#sub-button").on("click", function(e) {

    e.preventDefault();

    var isValid = true;
    // Validating all the fields before submitting form for action
    while(isValid) {
      isValid = validateName($("#name").val());
      isValid = validatePhone($("#phone").val());
      isValid = validateDate($("#dob").val());
      isValid = validateMailId($("#mail").val());
      isValid = validateNation($("#nationality").val());
      isValid = guardianValidator($("#guardian").val());
    }
    // Adding the data to the table
    if (isValid) {
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