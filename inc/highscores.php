<?php
if(isset($_GET["name"])){
  $name = $_GET["name"];
  $score = $_GET["score"];
  if($name === ""){
    $name = "Noname";
  }
}

$highscores = json_decode(file_get_contents('highscores.txt'),true);
if(isset($_GET["name"])){
$highscores[$name] = $score;

$file = "highscores.txt";
file_put_contents($file, json_encode($highscores), LOCK_EX);
}
arsort($highscores); 
echo json_encode($highscores);
?>
