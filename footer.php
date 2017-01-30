<!--
  file-name: footer.php
  used-for: Student Form creation assignment for mindfire training session
  created-by: r s devi prasad
  description: footer of the web page containing all the js files' data.
-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="assets/js/script.js"></script>
      <script src="assets/vendors/bootstrap/js/bootstrap.min.js"></script>
      <?php
          if (function_exists('customPageFooter')) {
              customPageFooter();
          }
       ?>
  </body>
</html>

<!-- End of Footer -->