<!--
  file-name: studentform.php
  used-for: Student Form creation assignment for mindifire training session
  created-by: r s devi prasad
  description: php class for creating OOP application of the website.
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