/*
  file-name: script.js
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: the following form is the jquery conversion of the js file written on master
*/

$("document").ready(function(){
  $("#name").focus();

  /*
   * The following functions are used for validation.
   * They are also called after the submit button is clicked.
  */
   
  // Name Validator
   
  var validateName = function(){
    if($(this).val() === "") {
      $("#name-info").text("Enter a valid name").show();
      return false;
    }
    $("#name-info").text("valid").show();
  };
   
  // Guardian Validator
   
  var guardianValidator = function() {
    if($(this).val() === "") {
      $("#guard-info").text("This field is empty");
      return false;
    }
    $("#guard-info").text("valid").show();
  };
  
  // Nation Validator
  
  var validateNation = function() {
    if ($(this).val() === "") {
      $("#nation-info").text("This field is important");
      $(this).focus();
      return false;
    }
    $("#nation-info").text("valid").show();
  };
  
  // Mail Validator
  
  var validateMailId = function(){
    var email = $(this).val();
    if ((email === '') || (email.indexOf("@", 0) < 0) || (email.indexOf(".", 0) < 0)) {
      $("#minfo").text("Enter valid email");
      $(this).focus();
      return false;
    }
    $("#minfo").text("valid").show();
  };
  
  // DOB Validator
  
  var validateDate = function () {
    if ($(this).val() === "") {
      $("#dob-info").text("Enter a valid date");
      $(this).focus();
      return false;
    }
    $("#dob-info").text("valid").show();
  };
  
  // Phone Number Validator
  
  var validatePhone = function () {
    var phn = $(this).val();
    if (isNaN(phn) || phn.length != 10) {
      $("#cinfo").text("Enter valid phone number").show();
      return false;
    }
    $("#cinfo").text("valid").show();
  };
  
  // Validating all the fields one by one
  
  $("#name").on("input", validateName);
  $("#guardian").on("input",guardianValidator);
  $("#nationality").on("input", validateNation);
  $("#mail").on("input",validateMailId);
  $("#dob").on("input", validateDate);
  $("#phone").on("input", validatePhone);

  $("#sub-button").on("click", function(e) {
    e.preventDefault();
    
    // Validating all the fields before submitting form for action
    
    $("#name").focusout(validateName);
    $("#guardian").on("input",guardianValidator);
    $("#nationality").on("input", validateNation);
    $("#mail").on("input",validateMailId);
    $("#dob").on("input", validateDate);
    $("#phone").on("input", validatePhone);
    
    // Adding the data to the table
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
    $(this).parent().prevAll().each(function() {
      
    });
  });

});