<!--
  file-name: studentform.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: the student form class in which all the functionalities are being added to accomodate OOP structure.
-->

<?php


    class StudentForm {

        function registerUser() {


        }

        //-------- Functions for regular actions ---------
        function redirectToURL($url){
            header("Location: $url");
            exit;
        }

        function selfScriptCall () {
            return htmlentities($_SERVER['PHP_SELF']);
        }
    }

    $studentobj = new StudentForm();
 ?>