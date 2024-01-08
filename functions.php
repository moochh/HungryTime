<?php
  $db = mysqli_connect('192.168.1.9', 'root', '', 'hungryTime');

  // $db = mysqli_connect('sql203.epizy.com', 'epiz_31943364', '7nEIu7ReHo2NwqI', 'epiz_31943364_hungrytime');

  header('Content-Type: text/html; charset=utf-8');
  mysqli_set_charset($db,'utf8');

  $notification_pop_up = FALSE;

  // for($i = 0; $i < 500; $i++) {
  //   $comment_id = rand(28, 78);

  //   $query = "INSERT INTO likes (comment_id) VALUES ('$comment_id')";
  //   mysqli_query($db, $query);
  // }

  $query = "SELECT * FROM recipes";
  $result = mysqli_query($db, $query);

  // while($row = mysqli_fetch_assoc($result)) {
  //   $id = $row['recipe_id'];

  //   $replace = $row['procedures'];

  //   $replace = str_replace("STEP", "Step", $replace);

  //   $query = "UPDATE recipes SET procedures = '$replace' WHERE recipe_id = '$id'";
  //   mysqli_query($db, $query);
  // }

  if(isset($_GET['login_notif'])) {
    if ($_GET['login_notif']=="yes") {
      $notification_pop_up = TRUE;
      $notification_type = "login";
    }
  }

  if(isset($_POST['sidebar-logout-button'])) {
    $query = "UPDATE users SET login = NULL";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "logout";
  }

  $login_success = FALSE;
  $login_fail = FALSE;
  $login_error_email = FALSE;
  $login_error_password = FALSE;

  if(isset($_POST['login-button'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE email = '$email' OR username = '$email'";
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result)==0) {
      $login_error_email = TRUE;
      $login_fail = TRUE;
    }
    elseif($password!=$user['password']) {
      $login_fail = TRUE;
      $login_error_password = TRUE;
    } elseif($password==$user['password']) {
      $login_success = TRUE;

      $query = "UPDATE users SET login = NULL";
      mysqli_query($db, $query);

      $query = "UPDATE users SET login = 'yes' WHERE email = '$email' OR username = '$email'";
      mysqli_query($db, $query);
    }
  }

  $signup_success = FALSE;
  $signup_error = FALSE;
  $signup_error_first_name = FALSE;
  $signup_error_last_name = FALSE;
  $signup_error_username = FALSE;
  $signup_error_username_length = FALSE;
  $signup_error_email = FALSE;
  $signup_error_password = FALSE;
  $signup_error_desc_1 = FALSE;
  $signup_error_desc_2 = FALSE;
  $signup_error_desc_3 = FALSE;
  $signup_error_password_requirements = FALSE;

  if(isset($_POST['signup-button'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $desc_1 = $_POST['desc_1'];
    $desc_2 = $_POST['desc_2'];
    $desc_3 = $_POST['desc_3'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    $query = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0) {
      $signup_error = TRUE;
      $signup_error_username = TRUE;
    }

    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($db, $query);

    $user = mysqli_fetch_assoc($result);

    if(mysqli_num_rows($result) > 0) {
      $signup_error = TRUE;
      $signup_error_email = TRUE;
    }

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $first_name)==TRUE) {
      $signup_error = TRUE;
      $signup_error_first_name = TRUE;
    }

    if(preg_match('~[0-9]~', $first_name)==TRUE) {
      $signup_error = TRUE;
      $signup_error_first_name = TRUE;
    }

    if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $last_name)==TRUE) {
      $signup_error = TRUE;
      $signup_error_last_name = TRUE;
    }

    if(preg_match('~[0-9]~', $last_name)==TRUE) {
      $signup_error = TRUE;
      $signup_error_last_name = TRUE;
    }

    if(strlen($username) > 14 || strlen($username) < 6) {
      $signup_error = TRUE;
      $signup_error_username_length = TRUE;
    }

    if(str_word_count($desc_1) > 1) {
      $signup_error = TRUE;
      $signup_error_desc_1 = TRUE;
    } 

    if(str_word_count($desc_1) > 1) {
      $signup_error = TRUE;
      $signup_error_desc_1 = TRUE;
    } 

    if(str_word_count($desc_2) > 1) {
      $signup_error = TRUE;
      $signup_error_desc_2 = TRUE;
    } 

    if(str_word_count($desc_3) > 1) {
      $signup_error = TRUE;
      $signup_error_desc_3 = TRUE;
    } 

    if(strlen($password) > 20 || strlen($password) < 6 || preg_match('~[0-9]~', $password)==FALSE || preg_match('/[A-Z]/', $password)==FALSE) {
      $signup_error = TRUE;
      $signup_error_password_requirements = TRUE;
    } 
    elseif($password!=$password_confirm) {
      $signup_error = TRUE;
      $signup_error_password = TRUE;
    }
    
    if($signup_error == FALSE) {
      $signup_success = TRUE;

      $query = "UPDATE users SET login = NULL";
      mysqli_query($db, $query);

      $time = time();

      $avatar = rand(1, 12);

      $query = "INSERT INTO users (first_name, last_name, username, email, password, desc_1, desc_2, desc_3, login, time, avatar) VALUES ('$first_name', '$last_name', '$username', '$email', '$password', '$desc_1', '$desc_2', '$desc_3', 'yes','$time', '$avatar')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "login";
    }
  }

  $query = "SELECT * FROM users WHERE login = 'yes'";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) == 0) {
    $query = "SELECT * FROM users WHERE username = 'Guest'";
    $result = mysqli_query($db, $query);
  }

  $user = mysqli_fetch_assoc($result);

  $username = $user['username'];



  // $k = 1;

  // while($k < 76) {
  //   for($i = 0; $i < 20; $i++) {
  //     $ratings = rand(4, 5);

  //     $query = "INSERT INTO ratings (recipe_id, ratings) VALUES ('$k', '$ratings')";
  //     mysqli_query($db, $query);
  //   }

  //   $k++;
  // }

  $query = "SELECT * FROM comments";
  $comment_select = mysqli_query($db, $query);

  while($comment = mysqli_fetch_assoc($comment_select)) {
    $comment_id = $comment['comment_id'];

    $query = "SELECT * FROM likes WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);

    $likes = mysqli_num_rows($result);

    $query = "UPDATE comments SET likes = '$likes' WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);

    $query = "SELECT * FROM dislikes WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);

    $dislikes = mysqli_num_rows($result);

    $query = "UPDATE comments SET dislikes = '$dislikes' WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);
  }

  if(isset($_POST['add-to-favorites'])) {
    $recipe_id = $_POST['recipe_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "INSERT INTO favorites (recipe_id, username) VALUES ('$recipe_id', '$username')";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "add_faves";
  }

  if(isset($_POST['remove-from-favorites'])) {
    $recipe_id = $_POST['recipe_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "DELETE FROM favorites WHERE recipe_id = '$recipe_id' AND username = '$username'";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "remove_faves";
  }

  if(isset($_POST['recipe-rate-button'])) {
    $recipe_id = $_POST['recipe_id'];
    $ratings = $_POST['recipe-rating'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "INSERT INTO ratings (recipe_id, ratings, username) VALUES ('$recipe_id', '$ratings', '$username')";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "rate";
    $notification_rating = $ratings;
  }

  if(isset($_POST['recipe-update-button'])) {
    $recipe_id = $_POST['recipe_id'];
    $ratings = $_POST['recipe-rating'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "UPDATE ratings SET ratings = '$ratings' WHERE recipe_id = '$recipe_id' AND username = '$username'";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "rate_update";
    $notification_rating = $ratings;
  }

  $k = 1;

  while($k < 76) {
    $query = "SELECT * FROM ratings WHERE recipe_id =  '$k'";
    $result = mysqli_query($db, $query);

    $ratings_sum = 0;

    while($recipe_ratings = mysqli_fetch_assoc($result)) {
      $ratings_sum += $recipe_ratings['ratings'];
    } 

    $ratings = $ratings_sum / mysqli_num_rows($result);
    $ratings = number_format($ratings, 1);

    $query = "UPDATE recipes SET ratings = '$ratings' WHERE recipe_id = '$k'";
    mysqli_query($db, $query);

    $k++;
  }

  if(isset($_POST['recipe-comment-button'])) {
    $recipe_id = $_POST['recipe_id'];
    $subject = $_POST['subject'];
    $comment = $_POST['comment'];
    $time = time();
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "INSERT INTO comments (recipe_id, subject, comment, time, username) VALUES ('$recipe_id', '$subject', '$comment', '$time', '$username')";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "comment_add";
  }

  if(isset($_POST['comment-delete'])) {
    $comment_id = $_POST['comment_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "DELETE FROM comments WHERE comment_id = '$comment_id'";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "comment_delete";
  }

  if(isset($_POST['like'])) {
    $comment_id = $_POST['comment_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "DELETE FROM dislikes WHERE comment_id = '$comment_id' AND username = '$username'";
    mysqli_query($db, $query);

    $query = "INSERT INTO likes (comment_id, username) VALUES ('$comment_id', '$username')";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "comment_like";
  }

  if(isset($_POST['dislike'])) {
    $comment_id = $_POST['comment_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "DELETE FROM likes WHERE comment_id = '$comment_id' AND username = '$username'";
    mysqli_query($db, $query);

    $query = "INSERT INTO dislikes (comment_id, username) VALUES ('$comment_id', '$username')";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "comment_dislike";
  }

  if(isset($_POST['unlike'])) {
    $comment_id = $_POST['comment_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "DELETE FROM likes WHERE comment_id = '$comment_id' AND username = '$username'";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "comment_unlike";
  }

  if(isset($_POST['undislike'])) {
    $comment_id = $_POST['comment_id'];
    $notification_recipe_id = $_POST['recipe_id'];

    $query = "DELETE FROM dislikes WHERE comment_id = '$comment_id' AND username = '$username'";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "comment_undislike";
  }

  $query = "SELECT * FROM comments";
  $comment_select = mysqli_query($db, $query);

  while($comment = mysqli_fetch_assoc($comment_select)) {
    $comment_id = $comment['comment_id'];

    $query = "SELECT * FROM likes WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);

    $likes = mysqli_num_rows($result);

    $query = "UPDATE comments SET likes = '$likes' WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);

    $query = "SELECT * FROM dislikes WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);

    $dislikes = mysqli_num_rows($result);

    $query = "UPDATE comments SET dislikes = '$dislikes' WHERE comment_id = '$comment_id'";
    $result = mysqli_query($db, $query);
  }

  // COMMENT AWARD

  $query = "SELECT DISTINCT recipe_id FROM comments WHERE username = '$username'";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 19) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '3' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '2' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('3', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "3";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '2' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '1' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('2', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "2";
    }    
  }

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '1' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('1', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "1";
    }
  }

  // RATINGS AWARD

  $query = "SELECT * FROM ratings WHERE username = '$username'";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 14) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '6' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '5' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('6', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "6";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '5' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '4' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('5', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "5";
    }    
  }

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '4' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('4', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "4";
    }    
  }

  // FRENCH AWARD

  $query = "SELECT * FROM recently_viewed WHERE username = '$username' AND recipe_id > 0 AND recipe_id < 16";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 14) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '11' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '10' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('11', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "11";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '10' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '9' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('10', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "10";
    }    
  }

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '9' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('9', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "9";
    } 
  }

  // ITALY AWARD

  $query = "SELECT * FROM recently_viewed WHERE username = '$username' AND recipe_id > 15 AND recipe_id < 31";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 14) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '23' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '22' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('23', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "23";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '22' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '21' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('22', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "22";
    }    
  } 

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '21' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('21', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "21";
    } 
  }

  // JAPAN AWARD

  $query = "SELECT * FROM recently_viewed WHERE username = '$username' AND recipe_id > 30 AND recipe_id < 46";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 14) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '14' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '13' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('14', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "14";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '13' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '12' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('13', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "13";
    }    
  }

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '12' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('12', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "12";
    } 
  }

  // KOREA AWARD

  $query = "SELECT * FROM recently_viewed WHERE username = '$username' AND recipe_id > 45 AND recipe_id < 61";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 14) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '20' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '19' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('20', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "20";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '19' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '18' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('19', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "19";
    }    
  }

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '18' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('18', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "18";
    }    
  }

  // SPAIN AWARD

  $query = "SELECT * FROM recently_viewed WHERE username = '$username' AND recipe_id > 60 AND recipe_id < 76";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) > 14) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '17' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '16' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('17', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "17";
    }    
  }

  elseif(mysqli_num_rows($result) > 9) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '16' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    $query = "DELETE FROM achievements WHERE achievement_id = '15' AND username = '$username'";
    mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('16', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "16";
    }    
  }

  elseif(mysqli_num_rows($result) > 4) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '15' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('15', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "15";
    }    
  }

  // ALL RECIPES AWARD

  $query = "SELECT * FROM recently_viewed WHERE username = '$username'";
  $result = mysqli_query($db, $query);

  if(mysqli_num_rows($result) == 75) {
    $query = "SELECT * FROM achievements WHERE achievement_id = '8' AND username = '$username'";
    $achievement_result = mysqli_query($db, $query);

    if(mysqli_num_rows($achievement_result) == 0) {
      $query = "INSERT INTO achievements (achievement_id, username) VALUES ('8', '$username')";
      mysqli_query($db, $query);

      $notification_pop_up = TRUE;
      $notification_type = "award";

      $achievemnent_id = "8";
    }    
  }

  $account_age = time() - $user['time'];

  if($user['loyalty_badge']==NULL && $account_age > 7.884e+6) {
    $query = "INSERT INTO achievements (achievement_id, username) VALUES ('7', '$username')";
    mysqli_query($db, $query);

    $query = "UPDATE users SET loyalty_badge = 'yes' WHERE username = '$username'";
    mysqli_query($db, $query);

    $notification_pop_up = TRUE;
    $notification_type = "award";

    $achievemnent_id = "7";

  }

  $search = NULL;

  if(isset($_POST['search'])) {
    $search = $_POST['search'];
  }

  if(isset($_GET['search'])) {
    $search = $_GET['search'];
  }

  if($search=="") {
    $search = NULL;
  }
?>