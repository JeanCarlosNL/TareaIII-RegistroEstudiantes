<?php

$directory = (isset($_GET['page']))?"../":"";

$footer = <<<EOF
<footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="$directory/styles/vendor/jquery/jquery.min.js"></script>
<script src="$directory/styles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="$directory/styles/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="$directory/styles/js/scrolling-nav.js"></script>
EOF;

function mostrarFooter(){
	echo $GLOBALS['footer'];
}
