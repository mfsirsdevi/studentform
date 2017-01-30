$(document).ready(function() {

  function validateName(nameValue, fieldId){
    if(!nameValue) {
      $(fieldId).text("Enter a valid name").show();
      return false;
    }
    $(fieldId).text("");
    return true;
  }

  function validateMailId (emailValue, fieldId){
    if ((emailValue === '') || (emailValue.indexOf("@", 0) < 0) || (emailValue.indexOf(".", 0) < 0)) {
      $(fieldId).text("Enter valid email").show();
      return false;
    }
    $(fieldId).text("");
    return true;
  }

  function validateAdmn(admnValue, fieldId) {
    if (admnValue.length <= 0) {
      $(fieldId).text("Enter a valid Admission number").show();
      return false;
    }
    $(fieldId).text("");
    return true;
  }

  function validatePassword(password, fieldId) {
    if (password.length <= 6) {
      $(fieldId).text("password must be minimum 6 characters long").show();
    }
    $(fieldId).text("");
    return true;
  }

  $("#record-btn").on("click", function() {
    // get values
    var name = $("#name").val();
    var admn = $("#admn").val();
    var email = $("#email").val();
    var pass = $("#pass").val();
    // Add record
    $.post("addRecord.php", {
        name: name,
        admn: admn,
        email: email,
        pass: pass
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // clear fields from the popup
        $("#first_name").val("");
        $("#last_name").val("");
        $("#email").val("");

        // read records again
        location.reload(true);

    });
  });

  $(".deletebt").on("click", function() {
    var conf = confirm("Are you sure, do you really want to delete User?");
    var btid = $(this).attr('id');
    if (conf == true) {
        $.post("deleteRecord.php", {
                id: btid
            },
            function (data, status) {
                // reload Users by using readRecords();
                location.reload(true);
            }
        );
    }
  });

});
