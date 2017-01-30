<?php
    /*
     * File Name: studentform.php
     * Used For: Student Form creation assignment for mindfire training session
     * Created By: r s devi prasad
     * Description: the student form class in which all the functionalities are being added to accomodate OOP structure.
     */

    class StudentForm
    {
        public $databaseName;
        public $hostName;
        public $userName;
        public $userPassword;
        public $studentName;
        public $studentAdmn;
        public $studentEmail;
        public $studentPassword;
        public $userRole;
        public $connection;
        public $errorMessage;

        public function registerUser()
        {
            if (!isset($_POST['submit'])) {
                return false;
            }

            $studentDetails = array();
            $this->collectDetails($studentDetails);
            $this->saveToDB($studentDetails);
        }

        public function saveToDB($value='')
        {
            # code...
        }

        public function collectDetails(&$detailsArray)
        {
            $detailsArray['name'] = $studentobj->Sanitize($_POST['name']);
            $detailsArray['admn'] = $studentobj->Sanitize($_POST['admn']);
            $detailsArray['email'] = $studentobj->Sanitize($_POST['email']);
            $detailsArray['pass'] = $studentobj->Sanitize($_POST['pass']);
        }

        //-------- Initialization Functions --------------
        function initDB($dbName, $hName, $uName, $uPass)
        {
            $this->$databaseName = $dbName;
            $this->$hostName = $hName;
            $this->$userName = $uName;
            $this->$userPassword = $uPass;
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
            $retprivate  = trim($data);
            $retprivate  = strip_tags($retprivate );
            $retprivate  = htmlspecialchars($retprivate );
            return $retprivate ;
        }
    }

 ?>