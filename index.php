<?php  
  session_start();

  if(!isset($_SESSION["number"])) {
    $_SESSION["number"] = rand(1,100);
  }

  if(!isset($_SESSION["visible"])) {
    $_SESSION["visible"] = "visible";
  }
?>

<html>
<head>
  <title>Great Number Game</title>
  <style type="text/css">
    #container {
      width: 980px;
      margin: 50px auto;
      text-align: center;
    }

    .box {
      margin: 0 auto 15px auto;
      width: 250px;
      height: 250px;
      color: white;
    }

    .red {
      background-color: red;
    }

    .green {
      background-color: green;      
    }

    .box h2 {
      padding-top: 100px;
    }

    #form-id {
      visibility: <?= $_SESSION["visible"] ?>;
    }
  </style>
</head>
<body>
  <div id="container">
    <h1>Welcome to the Great Number Game</h1>
    <p>I am thinking of a number from 1 to 100</p>
    <p>Take a guess</p>
<?php  
    if(isset($_SESSION["result"]))
    {
      if($_SESSION["result"] == "Too Low!" || $_SESSION["result"] == "Too High!") 
      {
?>
        <div class="box red">
          <h2><?= $_SESSION["result"] ?></h2>
        </div>
<?php 
      } 
      else 
      {
?>
        <div class="box green">
          <h2><?= $_SESSION["result"] ?></h2>
          <form action="process.php" method="post">
            <input type="hidden" name="action" value="restarting">
            <input type="submit" value="Play Again">
          </form>
        </div>
<?php
      }
    }
?>
    <form id="form-id" action="process.php" method="post">
      <input type="hidden" name="action" value="guessing">
      <input type="number" name="user_guess">
      <input type="submit" value="Guess!">
    </form>

  </div>
</body>
</html>