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
    var role = $('#role option:selected').text();
    // Add record
    $.post("addRecord.php", {
        name: name,
        admn: admn,
        email: email,
        pass: pass,
        role: role
    }, function (data, status) {
        // close the popup
        $("#add_new_record_modal").modal("hide");

        // clear fields from the popup
        $("#name").val("");
        $("#admn").val("");
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

  $(".updatebt").on("click", function() {
    var suffix = $(this).attr('id').match(/\d+/);
    var rowId = parseInt(suffix[0]);
    $("#hidden_user_id").val(rowId);
    $.post("readRecord.php", {
            id: rowId
        },
        function (data, status) {
            // PARSE json data
            var user = JSON.parse(data);
            // Adding existing values to the modal popup fields
            $("#update-name").val(user.studentName);
            $("#update-admn").val(user.studentAdmn);
            $("#update-email").val(user.studentEmail);
        }
    );
    // Open modal popup
    $("#update_user_modal").modal("show");
  });

  $(".save-btn").on("click", function() {
    var name = $("#update-name").val();
    var admn = $("#update-admn").val();
    var email = $("#update-email").val();

    // get hidden field value
    var id = $("#hidden_user_id").val();

    // Update the details by requesting to the server using ajax
    $.post("updateRecord.php", {
            id: id,
            name: name,
            admn: admn,
            email: email
        },
        function (data, status) {
            // hide modal popup
            $("#update_user_modal").modal("hide");
            // reload Users by using readRecords();
            location.reload();
        }
    );
  });
});
