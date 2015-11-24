<?php  
  session_start();

  if(isset($_POST["action"]) && $_POST["action"] == "guessing"){
    $user_guess = $_POST["user_guess"];
    
    if($user_guess < $_SESSION["number"]) {
      $_SESSION["result"] = "Too Low!";
      $_SESSION["visible"] = "visible";

    } elseif ($user_guess > $_SESSION["number"]) {
      $_SESSION["result"] = "Too High!";
      $_SESSION["visible"] = "visible";

    } else {
      $_SESSION["result"] = "Correct " . $_SESSION["number"] . " is the right number!";
      $_SESSION["visible"] = "hidden";
    }
  }

  if(isset($_POST["action"]) && $_POST["action"] == "restarting") {
    session_destroy();
  }

  header("Location: index.php");
?>