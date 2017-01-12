/*
  file-name: script.js
  used-for: week 1 assignment of mindifire training
  created-by: r s devi prasad
  description: it is a js file for validating form, creating table from
  the form data and editing the data from the table.
*/

$("document").ready(function(){ 
  $("#name").on("input",function () {
    if($("#name").val() === '') {
      $("#name-info").html("Enter a valid name");
      return false;
    }
    $("#name-info").html("");
  });

  /*
   * Guardian Validator
   */

  $("#guardian").on("input",function () {
    if($("#guardian").val() === "") {
      $("#guard-info").html("This field is empty");
      return false;
    }
    $("#guard-info").html("");
  });

  // Nation Validator
  
  $("#nationality").on("input",function () {
    if ($("#nationality").val() === "") {
      $("#nation-info").html("This field is important");
      $("#nationality").focus();
      return false;
    }
    $("#nation-info").html("");
  });
  
  
  // Mail Validator

  $("#mail").on("input",function (){
    var email = $("#mail").val();
    if ((email === '') || (email.indexOf("@", 0) < 0) || (email.indexOf(".", 0) < 0)) {
      $("#minfo").html("Enter valid email");
      $("#mail").focus();
      return false;
    }
    $("#minfo").html("");
  });
  
  // DOB Validator

  $("#dob").on("input", function () {
    if ($("#dob").val() === "") {
      $("#dob-info").html("Enter a valid date");
      $("#dob").focus();
      return false;
    }
    $("#dob-info").html("");
  });

  // Phone Number Validator
  
  $("#phone").on("input", function () {
    var phn = $("#phone").val();
    if (isNaN(phn) || phn.length != 10) {
      $("#cinfo").html("Enter valid phone number");
      return false;
    }
    $("#cinfo").html("");
  });

  $("#sub-button").on("click", function(e) {
    e.preventDefault();
    // Adding the data to the table
    var inputs = $("form").serializeArray();    
    //$("#data").append("<tr>");
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
});

$(document).on('click', 'button.delete-bt', function () {
     $(this).parent().parent().remove();
     return false;
 });
 
$(document).on("click", "button.update-bt", function() {
    console.log($(this).parent().prevAll());
    
});