<?php
  require "./app/services/router.php";

  Router::register("home", function() {
    include "./app/view/home/index.php";
  });

  Router::execute("home");
?>