<?php
  include('functions.php');

  $query = "SELECT * FROM users WHERE login = 'yes'";
  $result = mysqli_query($db, $query);

  if(isset($_GET['profile_visit'])) {
    $user_id = $_GET['profile_visit'];

    $query = "SELECT * FROM users WHERE user_id = '$user_id'";
    $result = mysqli_query($db, $query);
  }

  $profile = mysqli_fetch_assoc($result);

  $profile_username = $profile['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styles/style.css">
  <title><?php echo $profile['first_name']." ".$profile['last_name'];?> | HungryTime</title>
  <link rel="icon" href="Images/Others/HungryTime Icon.png">

  <script>
    if (window.history.replaceState) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script> 
</head>
<body>
  <!-- LEFT SECTION -->

  <nav>
    <div class="nav-wrapper">
      <div class="nav-divider">
        <div class="logo-wrapper">
          <a href="index.php">
            <img src="Images/Others/HungryTime Logo.png">
          </a>
        </div>
  
        <div class="nav-main-wrapper">
          <a href="index.php">
            <div class="nav-icon-wrapper">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 103 100"><defs></defs><path d="M103.31,89.49c0,8-2.6,10.42-10.94,10.47-13.5.08-27,0-40.53,0s-27,.06-40.54,0c-8.6,0-10.94-2.45-11-11.2C.27,72.4-.08,56,.59,39.7A16.71,16.71,0,0,1,6.67,28.45C19.23,19.27,32.5,11.06,45.35,2.29c4.49-3,8.48-3,12.9-.06C71.39,11.09,84.8,19.54,97.64,28.78a14.71,14.71,0,0,1,5.44,10.09C103.64,55.73,103.4,72.62,103.31,89.49Z"/></svg>
            </div>
            <h5>Home</h5>
          </a>
          <a href="categories.php">
            <div class="nav-icon-wrapper">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 111 100"><defs></defs><path d="M105.08,33H6.15C4.5,16.87,19,.92,36.47.17,49.16-.38,61.92-.42,74.6.19,91.77,1,105.12,15.64,105.08,33Z"/><path d="M5.37,72.43h101.2c-1.43,7.09-1.77,14-4.34,20S93.43,100,87,100c-20.35-.08-40.7,0-61,0C11.44,100,5.37,93.8,5.37,79.26Z"/><path d="M88.32,50c11-7.13,13.76-7.07,22.37.3L105,58.35l-.73-1.66c-2.89.67-6.21.66-8.6,2.14-6.91,4.28-12.31,1.14-18-3.12-7,6.26-14.29,7.44-21.89-.32C48.54,62,41,63.18,32.92,56.6l1.65,4.87c-8-1.69-14.93-3.29-21.9-4.5-2-.35-4.17.45-7,.83l-5.2-7c6.62-7.92,10.25-8.15,22-1.19,6.72-6.28,14-7.18,21.59.46,7.18-6.66,14.67-7.8,22.34,0C73.68,43.26,81.18,42.25,88.32,50Z"/></svg>
            </div>
            <h5>Categories</h5>
          </a>
          <a href="recipes.php">
            <div class="nav-icon-wrapper">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 100"><defs></defs><path d="M80,50.63c0,12.28,0,24.56,0,36.85,0,8.94-3.56,12.46-12.5,12.48q-27.48.08-55,0C3.56,99.94.05,96.42,0,87.46Q0,50,0,12.51C.05,3.56,3.56.06,12.52,0Q40,0,67.48,0c9,0,12.45,3.53,12.49,12.49C80,25.23,80,37.93,80,50.63ZM40.22,34.51H59.65V25.39H40.22Zm.07,20.15h19.3V45.45H40.29Zm0,19.93H59.52v-9.3H40.29ZM20.12,34.5h9.47v-9H20.12ZM29.5,54.88V45.42h-9v9.46Zm.13,20V65.43H20.5v9.45Z"/></svg>
            </div>
            <h5>Recipes</h5>
          </a>
          <a href="profile.php" class="nav-active 
            <?php
              if($username=="Guest") {
                echo "guest-disabled";
              }
            ?>
          ">
            <div class="nav-icon-wrapper">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 84 98"><defs></defs><g id="Layer_14" data-name="Layer 14"><path d="M0,84.31c0-1.19,0-2.38,0-3.57a25.49,25.49,0,0,1,.16-2.9c.11-.74.24-1.47.39-2.2.08-.36.26-.94.38-1.29s.28-.88.46-1.31c.29-.72.58-1.45.92-2.15s.78-1.49,1.23-2.2S4.68,67,5.27,66.2c.37-.5.78-1,1.19-1.43s.8-.89,1.21-1.33L9,62.1c.13-.12.27-.21.41-.32l.16-.13a18.11,18.11,0,0,1,2.56-2c1.34-.93,2.67-1.86,4.08-2.67.51-.3,1.05-.54,1.57-.8.8-.4,1.57-.84,2.39-1.18,1.08-.45,2.18-.86,3.28-1.25s2.21-.8,3.35-1.1c1.53-.42,3.08-.78,4.64-1.1,1-.2,2-.29,3.05-.43,1.47-.21,3-.23,4.41-.38a37.08,37.08,0,0,1,4.21-.13c1,0,2,0,3,.14s2.21.18,3.3.32c.92.11,1.83.26,2.74.41.53.08,1.06.17,1.59.29.73.15,1.46.34,2.18.51l.91.23a42.13,42.13,0,0,1,6.93,2.42c1.07.47,2.12,1,3.18,1.47.42.2,1.1.55,1.5.79s1,.6,1.44.92c.87.58,1.74,1.17,2.59,1.79a25.91,25.91,0,0,1,2.09,1.67c1,.95,2,2,3,2.94a2.11,2.11,0,0,0,.49.5c.23.12.33.44.51.67s.5.56.72.87.42.62.61.94c.66,1.1,1.38,2.18,2,3.32a33.54,33.54,0,0,1,1.36,3.35,16.79,16.79,0,0,1,.6,2.1c.14.62.19,1.26.29,1.89a40.87,40.87,0,0,1,.17,6.06v.14A13.66,13.66,0,0,1,70.59,98H13.67A13.67,13.67,0,0,1,0,84.31Z"/><path d="M42.12,45a21.4,21.4,0,0,1-13.74-4.67A21.88,21.88,0,0,1,19.74,24.8,21.78,21.78,0,0,1,25.23,7.61,21.58,21.58,0,0,1,41.94,0a22.19,22.19,0,0,1,8.69,1.64A23.17,23.17,0,0,1,58,6.55a22.38,22.38,0,0,1,4.89,7.33,21.62,21.62,0,0,1,1.68,8.7A21.88,21.88,0,0,1,58,38.4,22.18,22.18,0,0,1,42.12,45Z"/></g></svg>
            </div>
            <h5>Profile</h5>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- MIDDLE SECTION -->

  <div class="main-body profile-body">
    <div class="main-body-wrapper">
      <section class="profile-header">
        <div class="profile-header-img-wrapper">
          <img src="Images/Avatars/<?php echo $profile['avatar'];?>.svg">
        </div>

        <div class="profile-header-user-info">
          <div class="profile-header-user-name">
            <h4><?php echo $profile['first_name']." ".$profile['last_name'];?></h4>
            
            <?php if($profile['loyalty_badge']=="yes") { ?>

              <span>
                <img src="Images/Icons/loyalty-badge.png">
              </span>

            <?php } ?>
          </div>
          <p><?php echo $profile['username'];?></p>
          <div class="profile-header-user-description">
            <p><?php echo $profile['desc_1'];?></p>
            <p><?php echo $profile['desc_2'];?></p>
            <p><?php echo $profile['desc_3'];?></p>
          </div>
        </div>
      </section>

      <section class="profile-favorites">
        <div class="recipe-country-name">
          <h3>Favorites</h3>
          <?php if($username==$profile['username']) {?>
            <a href="favorites.php?origin=profile.php">
              <p>View All</p>
              <svg xmlns="http://www.w3.org/2000/svg" width="21.305" height="11.866" viewBox="0 0 21.305 11.866">
                <g id="HCI_Recipe_UX-03" data-name="HCI Recipe UX-03" transform="translate(21.305) rotate(90)">
                  <path id="Path_5" data-name="Path 5" d="M.947,20.744c-.523,0-.947-.663-.947-1.482V1.482C0,.663.424,0,.947,0s.947.663.947,1.482V19.262C1.893,20.081,1.469,20.744.947,20.744Z" transform="translate(4.962 0.561)"/>
                  <path id="Path_6" data-name="Path 6" d="M10.926,6.9a.947.947,0,0,1-.669-.278L5.909,2.277,1.561,6.626A.947.947,0,0,1,.229,5.288L5.24.277a.947.947,0,0,1,1.338,0l5.011,5.011A.947.947,0,0,1,10.926,6.9Z" transform="translate(0 0)"/>
                </g>
              </svg>
            </a>
          <?php } ?>
        </div>

        <?php
          $query = "SELECT * FROM favorites WHERE username = '$profile_username' ORDER BY id DESC LIMIT 8";
          $result = mysqli_query($db, $query);
          if (mysqli_num_rows($result)==0) { ?>

            <p><i><br> No recipes are added to your favorites.</i></p>

        <?php } else {
          

          $favorites_total = mysqli_num_rows($result);

          if($favorites_total <= 2) {
            $k = 2;
          } elseif($favorites_total <= 4) {
            $k = 3;
          } elseif($favorites_total <= 6) {
            $k = 4;
          } elseif($favorites_total <= 8) {
            $k = 5;
          } 

          $favorites_index = 0;
        ?>
        
        <input type="radio" name="profile-favorites-options" id="profile-favorites-radio-1" hidden checked>
        <input type="radio" name="profile-favorites-options" id="profile-favorites-radio-2" hidden>
        <input type="radio" name="profile-favorites-options" id="profile-favorites-radio-3" hidden>
        <input type="radio" name="profile-favorites-options" id="profile-favorites-radio-4" hidden>

        <div class="home-recommended-wrapper-all profile-favorites-wrapper-all">

          <?php if($k > 2) { ?>
          <label for="profile-favorites-radio-2" class="carousel-label carousel-label-right carousel-label-1">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>
          <label for="profile-favorites-radio-1" class="carousel-label carousel-label-left carousel-label-2">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>

          <?php } if($k > 3) { ?>
          <label for="profile-favorites-radio-3" class="carousel-label carousel-label-right carousel-label-2">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>
          <label for="profile-favorites-radio-2" class="carousel-label carousel-label-left carousel-label-3">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>

          <?php } if($k > 4) { ?>
          <label for="profile-favorites-radio-4" class="carousel-label carousel-label-right carousel-label-3">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>
          <label for="profile-favorites-radio-3" class="carousel-label carousel-label-left carousel-label-4">  
            <img src="Images/Icons/arrow-right-small.svg">
          </label>
          

          <?php } if($k > 5) {?>

          <?php } ?>

          <?php for($j = 1; $j < $k; $j++) {?>

          <div class="home-recommended-wrapper profile-favorites-wrapper-1" id="profile-favorites-<?php echo $j;?>">

            <?php for($i = 0; $i < 2; $i++) { 
              $query = "SELECT * FROM favorites WHERE username = '$profile_username' ORDER BY id DESC LIMIT $favorites_index, 1";
              $result = mysqli_query($db, $query);

              $favorites_index++;

              $profile_favorites_recipe_id_get = mysqli_fetch_assoc($result);

              $profile_favorites_recipe_id = $profile_favorites_recipe_id_get['recipe_id'];

              $query = "SELECT * FROM recipes WHERE recipe_id = '$profile_favorites_recipe_id'";
              $profile_favorites_recipe_select = mysqli_query($db, $query);

              $profile_favorites_recipe = mysqli_fetch_assoc($profile_favorites_recipe_select);
            ?>
              
              <a href="recipe-main.php?recipe_id=<?php echo $profile_favorites_recipe['recipe_id']?>&origin=profile.php" class="home-recommended-recipe profile-favorites-recipe">
                <div class="home-recommended-recipe-img-wrapper profile-favorites-recipe-img-wrapper">
                  <img src="Images/Food/<?php echo $profile_favorites_recipe['recipe_id']?>.png">
                </div>
    
                <div class="home-recommended-recipe-details profile-favorites-recipe-details">
                  <h6><?php echo $profile_favorites_recipe['recipe_name']?></h6>
                  <div class="recipe-rating">
                    <img src="Images/Icons/star.svg">
                    <p><?php echo $profile_favorites_recipe['ratings'];?></p>
                  </div>
        
                  <div class="recipe-tags">
                    <p><?php echo $profile_favorites_recipe['category_country']?></p>
                    <p><?php echo $profile_favorites_recipe['category_time']?></p>
                    <p><?php echo $profile_favorites_recipe['category_specific']?></p>
                  </div>
                </div>
                
                <form action="" method="POST" class="recipe-add-to-faves
                  <?php
                    if($username=="Guest") {
                      echo "guest-disabled";
                    }
                  ?>
                ">
                  <input type="text" value="<?php echo $profile_favorites_recipe['recipe_id'];?>" name="recipe_id" hidden>

                  <?php
                    $recipe_id = $profile_favorites_recipe['recipe_id'];
                    $query = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND username = '$username'";
                    $faves_result = mysqli_query($db, $query);

                    if(mysqli_num_rows($faves_result) > 0) { ?>
                      <button name="remove-from-favorites" class="faves-added">
                        <img src="Images/Icons/heart-fill.svg">
                        <span>&nbsp;</span>
                      </button>

                  <?php } else { ?>

                      <button name="add-to-favorites">
                        <img src="Images/Icons/heart.svg">
                        <span>&nbsp;</span>
                      </button>

                  <?php } ?> 
                  
                </form>
              </a>

            <?php 
              if($favorites_total%2==1 && ($k - $j) == 1) { ?>
                <a href="" class="home-recommended-recipe profile-favorites-recipe profile-favorites-recipe-spaceholder">
                <div class="home-recommended-recipe-img-wrapper profile-favorites-recipe-img-wrapper">
                  <img src="Images/Food/KoreanRolledEggOmelette_SouthKorea_Lunch.jpg">
                </div>
    
                <div class="home-recommended-recipe-details profile-favorites-recipe-details">
                  <h6>Garlic Rosemary Chicken Thighs</h6>
                  <div class="recipe-rating">
                    <img src="Images/Icons/star.svg">
                    <p>4.7</p>
                  </div>
        
                  <div class="recipe-tags">
                    <p>Breakfast</p>
                    <p>Chicken</p>
                  </div>
                </div>
                
              </a>

            <?php 
              break;
              }
              } 
            ?>
          </div>

          <?php } ?>

          <div class="profile-favorites-wrapper-1 profile-favorites-wrapper-spaceholder">
            <a class="home-recommended-recipe profile-favorites-recipe">
              <div class="home-recommended-recipe-img-wrapper profile-favorites-recipe-img-wrapper">
                <img src="Images/Food/KoreanRolledEggOmelette_SouthKorea_Lunch.jpg">
              </div>

              <div class="home-recommended-recipe-details profile-favorites-recipe-details">
                <h6>Recipe</h6>
                <div class="recipe-rating">
                  <img src="Images/Icons/star.svg">
                  <p>4.7</p>
                </div>

                <div class="recipe-tags">
                  <p>Lunch</p>
                  <p>Chicken</p>
                </div>
              </div>
            </a>
          </div>
        </div>
        <?php } ?>
      </section>

      <section class="home-recommended recipes-country-section">
        <div class="recipe-country-name">
          <h3>Recently Viewed</h3>
        </div>

      
      <?php
        $query = "SELECT * FROM recently_viewed WHERE username = '$profile_username' ORDER BY id DESC LIMIT 8";
        $result = mysqli_query($db, $query);

        if(mysqli_num_rows($result)==0) { ?>

          <p><i><br><br> You haven't viewed any recipes yet.</i></p>

      <?php } else { 
          $recently_viewed_total = mysqli_num_rows($result);
          $recently_viewed_counter = 0;

          if($recently_viewed_total <= 4) {
            $k = 2;
          } elseif($recently_viewed_total <= 8) {
            $k = 3;
          } 

          if($recently_viewed_total == 4 || $recently_viewed_total == 8) {
            $h = 0;
          } else {
            $h = 4 - ($recently_viewed_total % 4);
          }

          $recently_viewed_index = 0;
        ?>
        

        <input type="radio" name="home-recommended-options" id="home-recommended-radio-1" hidden checked>
        <input type="radio" name="home-recommended-options" id="home-recommended-radio-2" hidden>

        <div class="home-recommended-wrapper-all">
          <?php if($k==3) { ?>
          <label for="home-recommended-radio-2" class="carousel-label carousel-label-right carousel-label-1">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>
          <label for="home-recommended-radio-1" class="carousel-label carousel-label-left carousel-label-2">
            <img src="Images/Icons/arrow-right-small.svg">
          </label>
          <?php } ?>

          <?php for($j = 1; $j < $k; $j++) {?>

          <div class="home-recommended-wrapper" id="home-recommended-<?php echo $j;?>">

            <?php for($i = 0; $i < 4; $i++) { 
              $recently_viewed_counter += 1;

              $query = "SELECT * FROM recently_viewed WHERE username = '$profile_username' ORDER BY id DESC LIMIT $recently_viewed_index, 1";
              $result = mysqli_query($db, $query);

              $recently_viewed_recipe_id_get = mysqli_fetch_assoc($result);

              $recently_viewed_recipe_id = $recently_viewed_recipe_id_get['recipe_id'];

              $query = "SELECT * FROM recipes WHERE recipe_id = '$recently_viewed_recipe_id'";
              $result = mysqli_query($db, $query);

              $recently_viewed_recipe = mysqli_fetch_assoc($result);

              $recently_viewed_index++;

            ?>
              <a href="recipe-main.php?recipe_id=<?php echo $recently_viewed_recipe['recipe_id']?>&origin=profile.php" class="home-recommended-recipe">
                <div class="home-recommended-recipe-img-wrapper">
                  <img src="Images/Food/<?php echo $recently_viewed_recipe['recipe_id']?>.png">
                </div>
    
                <div class="home-recommended-recipe-details">
                  <h6><?php echo $recently_viewed_recipe['recipe_name']?></h6>
                  <div class="recipe-rating">
                    <img src="Images/Icons/star.svg">
                    <p><?php echo $recently_viewed_recipe['ratings'];?></p>
                  </div>
        
                  <div class="recipe-tags">
                    <p><?php echo $recently_viewed_recipe['category_country']?></p>
                    <p><?php echo $recently_viewed_recipe['category_time']?></p>
                    <p><?php echo $recently_viewed_recipe['category_specific']?></p>
                  </div>
                </div>
                
                <form action="" method="POST" class="recipe-add-to-faves
                  <?php
                    if($username=="Guest") {
                      echo "guest-disabled";
                    }
                  ?>
                ">
                  <input type="text" value="<?php echo $recently_viewed_recipe['recipe_id'];?>" name="recipe_id" hidden>

                  <?php
                    $recipe_id = $recently_viewed_recipe['recipe_id'];
                    $query = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND username = '$username'";
                    $faves_result = mysqli_query($db, $query);

                    if(mysqli_num_rows($faves_result) > 0) { ?>
                      <button name="remove-from-favorites" class="faves-added">
                        <img src="Images/Icons/heart-fill.svg">
                        <span>&nbsp;</span>
                      </button>

                  <?php } else { ?>

                      <button name="add-to-favorites">
                        <img src="Images/Icons/heart.svg">
                        <span>&nbsp;</span>
                      </button>

                  <?php } ?> 
                  
                </form>
              </a>

            <?php 
              if($recently_viewed_counter == $recently_viewed_total) { 
                for($f = 0; $f < $h; $f++) { ?>

                <a href="" class="home-recommended-recipe recipes-recipe-placeholder">
                  <div class="home-recommended-recipe-img-wrapper">
                    <img src="Images/Food/KoreanRolledEggOmelette_SouthKorea_Lunch.jpg">
                  </div>
      
                  <div class="home-recommended-recipe-details">
                    <h6>Garlic Rosemary Chicken Thighs</h6>
                    <div class="recipe-rating">
                      <img src="Images/Icons/star.svg">
                      <p>4.7</p>
                    </div>
          
                    <div class="recipe-tags">
                      <p>Breakfast</p>
                      <p>Chicken</p>
                    </div>
                  </div>
                  
                </a>
                

            <?php } break; } } ?>
          </div>

          <?php } ?>

          <div class="home-recommended-wrapper home-recommended-wrapper-spaceholder">
            <a href="" class="home-recommended-recipe">
              <div class="home-recommended-recipe-img-wrapper">
                <img src="Images/Food/KoreanRolledEggOmelette_SouthKorea_Lunch.jpg">
              </div>
  
              <div class="home-recommended-recipe-details">
                <h6>Garlic Rosemary Chicken Thighs</h6>
                <div class="recipe-rating">
                  <img src="Images/Icons/star.svg">
                  <p>4.7</p>
                </div>
      
                <div class="recipe-tags">
                  <p>Breakfast</p>
                  <p>Chicken</p>
                </div>
              </div>
            </a>
          </div>
        </div>
      <?php } ?>
      </section>

      <section class="profile-achievements-section">
        <h5>Achievements</h5>

        <div class="profile-achievements-wrapper">

        <?php 
          $query = "SELECT * FROM achievements WHERE username = '$profile_username'";
          $achievement_result = mysqli_query($db, $query);

          if(mysqli_num_rows($achievement_result)==0) {
        ?>
          
          <p style="white-space: nowrap;"><i>You have no HungryTime achievements yet.</i></p>
        
        <?php } else {
          while($achievement_id_select = mysqli_fetch_assoc($achievement_result)) {
            $achievement_id_result = $achievement_id_select['achievement_id'];

            $query = "SELECT * FROM achievements_list WHERE achievement_id = '$achievement_id_result'";
            $result = mysqli_query($db, $query);

            $achievement_profile = mysqli_fetch_assoc($result);
        ?>

          <div class="profile-achievement">
            <h6><?php echo $achievement_profile['achievement_title'];?></h6>
            <span class="profile-achievement-block block-yellow">&nbsp;</span>
            <span class="profile-achievement-block block-light">&nbsp;</span>
            <span class="profile-achievement-block block-lighter">&nbsp;</span>
            <img src="Images/Icons/medal-<?php echo $achievement_profile['achievement_tier'];?>.svg">
            <p><?php echo $achievement_profile['achievement_desc'];?></p>
          </div>

        <?php } } ?>
        </div>
      </section>
    </div>
  </div>

  <!-- NOTIFICATION POP UP -->
  
  <?php
    if($notification_pop_up == TRUE) {
      if($notification_type != "logout" && $notification_type != "login" && $notification_type != "award") {
        $query = "SELECT * FROM recipes WHERE recipe_id = '$notification_recipe_id'";
        $notification_recipe_result = mysqli_query($db, $query);

        $notification_recipe = mysqli_fetch_assoc($notification_recipe_result);
      }

      $query = "SELECT * FROM notifications WHERE notification_type = '$notification_type'";
      $notification_type_result = mysqli_query($db, $query);

      $notification_notice = mysqli_fetch_assoc($notification_type_result);
  ?>

    <div class="notification-card-wrapper notification-favorites">
      <div class="notification-img-wrapper">
        <?php if($notification_type == "logout" || $notification_type == "login") { ?>

        <img src="Images/Avatars/<?php echo $user['avatar'];?>.svg">

        <?php } elseif($notification_type == "award") { 
          $query = "SELECT * FROM achievements_list WHERE achievement_id = '$achievemnent_id'";
          $achievemnent_result = mysqli_query($db, $query);

          $award = mysqli_fetch_assoc($achievemnent_result);
        ?>

        <img src="Images/Icons/medal-<?php echo $award['achievement_tier'];?>.svg">

        <?php } else { ?>

        <img src="Images/Food/<?php echo $notification_recipe_id;?>.png">

        <?php } ?>

      </div>

      <div class="notification-content-wrapper">
        <div class="notification-content-header">
          <h6><?php echo $notification_notice['notification_subject'];
            if($notification_type=="login") {
              echo "<span> ".$user['first_name']." ".$user['last_name']."!</span>";
            }
          ?></h6>
        </div>

        <?php if($notification_type == "logout") { ?>

        <p><?php echo $notification_notice['notification_description'];?></p>

        <?php } elseif($notification_type == "login") { ?>

        <p>Your marvelous HungryTime journey awaits.</p>

        <?php } elseif($notification_type == "award") { ?>

        <p><?php echo $notification_notice['notification_description_pre']?> <i><?php echo "'".$award['achievement_title']."'";?></i>&nbsp;award.&nbsp;<?php echo $notification_notice['notification_description_post']?></p>

        <?php } elseif(isset($notification_rating)) { ?>

          <p><i><?php echo "'".$notification_recipe['recipe_name']."'";?></i>&nbsp; <?php echo $notification_notice['notification_description']." ".$notification_rating." ".$notification_notice['notification_description_post']?></p>

        <?php } else { ?>

          <p><?php echo $notification_notice['notification_description_pre'];?><i>'<?php echo $notification_recipe['recipe_name'];?>'</i>&nbsp; <?php echo $notification_notice['notification_description'].$notification_notice['notification_description_post']?></p>
          
        <?php } ?>
      </div>
    </div>

  <?php } ?>
  
  <!-- RIGHT SECTION -->

  <div class="sidebar">
    <div class="sidebar-wrapper">
      <div class="sidebar-top-wrapper">
        <div class="sidebar-user">
          <a 
            <?php
              if($username!="Guest") {
                echo "href=\"profile.php\"";
              }
            ?>
          class="sidebar-user-img-wrapper">
            <img src="Images/Avatars/<?php echo $user['avatar'];?>.svg">
          </a>

          <?php if($username=="Guest") { ?>

            <div class="sidebar-user-name">
              <p><a href="login.php?origin=profile.php
                <?php
                  if(isset($_GET['profile_visit'])) {
                    echo "&profile_visit=".$_GET['profile_visit'];
                  }
                ?>
              ">Login</a>/<a href="login.php?signup=yes&origin=profile.php
                <?php
                  if(isset($_GET['profile_visit'])) {
                    echo "&profile_visit=".$_GET['profile_visit'];
                  }
                ?>
              ">Signup</a></p>
            </div>

          <?php } else { ?>

            <div class="sidebar-user-name sidebar-user-name-active">
              <a href="profile.php"><?php echo $user['first_name']." ".$user['last_name'];?></a>
              <a href="login.php?origin=profile.php
                <?php
                  if(isset($_GET['profile_visit'])) {
                    echo "&profile_visit=".$_GET['profile_visit'];
                  }
                ?>
              ">Change Account</a>
            </div>
          
          <?php } ?>
        </div>
        
        <div class="profile-document-options">
          <a href="Documents/HungryTime Terms of Use.pdf" download="">Terms of Use</a>
          <a href="Documents/HungryTime Privacy Policy.pdf" download="">Privacy Policy</a>
          <a href="Documents/User's Manual.pdf" download="">User's Manual</a>
        </div>
      </div>

      <?php if($username!="Guest") { ?>
        <form action="index.php" method="POST">
          <button class="sidebar-logout-button" name="sidebar-logout-button">
            <img src="Images/Icons/logout.svg">
            <p>Logout</p>
          </button>
      </form>
      <?php } ?>
    </div>
  </div>
</body>
</html>