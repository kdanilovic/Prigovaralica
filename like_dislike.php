<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "spoj.php";
header('Content-Type: application/json');


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['postId'])) {
    $postId = $_POST['postId'];
    $userId = $_POST['userId'];
    $reaction = $_POST['reaction'];



      
      $sqlCheck = "SELECT 1 FROM `like_dislike` WHERE `post_id` = ? AND `user_id` = ?";
      $stmtCheck = mysqli_prepare($spoj, $sqlCheck);
  
      if ($stmtCheck) {
          mysqli_stmt_bind_param($stmtCheck, "ii", $postId, $userId);
          mysqli_stmt_execute($stmtCheck);
          mysqli_stmt_store_result($stmtCheck);
  
        

          if (mysqli_stmt_num_rows($stmtCheck) == 0) {
              $sqlInsert = "INSERT INTO `like_dislike`(`post_id`, `user_id`, `reaction`) VALUES (?, ?, ?)";
              $stmtInsert = mysqli_prepare($spoj, $sqlInsert);
  
              if ($stmtInsert) {
                  mysqli_stmt_bind_param($stmtInsert, "iss", $postId, $userId, $reaction);
                  mysqli_stmt_execute($stmtInsert);
                  mysqli_stmt_close($stmtInsert);
              }
          } else {
            
              $sqlUpdate = "UPDATE `like_dislike` SET `reaction` = ? WHERE `user_id` = ? AND `post_id` = ?";
              $stmtUpdate = mysqli_prepare($spoj, $sqlUpdate);
  
              if ($stmtUpdate) {
                  mysqli_stmt_bind_param($stmtUpdate, "sii", $reaction, $userId, $postId);
                  mysqli_stmt_execute($stmtUpdate);
                  mysqli_stmt_close($stmtUpdate);
              }
          }
  
          mysqli_stmt_close($stmtCheck);
      }
  
    


      $sqlLikes = "UPDATE `objave` SET `lajk` = (SELECT COUNT(*) FROM `like_dislike` WHERE `post_id` = ? AND `reaction` = 'like'), `dislajk` = (SELECT COUNT(*) FROM `like_dislike` WHERE `post_id` = ? AND `reaction` = 'dislike') WHERE `id` = ?";
      $stmtLikes = mysqli_prepare($spoj, $sqlLikes);
  
      if ($stmtLikes) {
          mysqli_stmt_bind_param($stmtLikes, "iii", $postId, $postId, $postId);
          mysqli_stmt_execute($stmtLikes);
          mysqli_stmt_close($stmtLikes);
      }
  
    



      $sqlCount = "SELECT `lajk`, `dislajk` FROM `objave` WHERE `id` = ?";
      $stmtCount = mysqli_prepare($spoj, $sqlCount);
  
      if ($stmtCount) {
          mysqli_stmt_bind_param($stmtCount, "i", $postId);
          mysqli_stmt_execute($stmtCount);
          mysqli_stmt_bind_result($stmtCount, $likes, $dislikes);
          mysqli_stmt_fetch($stmtCount);
          mysqli_stmt_close($stmtCount);
  
          echo json_encode(['likes' => $likes, 'dislikes' => $dislikes]);
      } else {
          echo json_encode(['error' => 'Failed to retrieve like and dislike counts']);
      }
  } else {
      echo json_encode(['error' => 'Invalid request']);
  }
?>