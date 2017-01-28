<?php
    /*
     * File Name: studentform.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: r s devi prasad
     * Description: the student form class in which all the functionalities are being added to accomodate OOP structure.
     */

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

        function Sanitize($data) {
            $retvar = trim($data);
            $retvar = strip_tags($retvar);
            $retvar = htmlspecialchars($retvar);
            return $retvar;
        }
    }

 ?>