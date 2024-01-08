<?php
  include('functions.php');

  $recipe_id = $_GET['recipe_id'];

  $query = "SELECT * FROM recipes WHERE recipe_id = '$recipe_id'";
  $result = mysqli_query($db, $query);

  $recipe = mysqli_fetch_assoc($result);

  $query = "DELETE FROM recently_viewed WHERE recipe_id = '$recipe_id' AND username = '$username'";
  mysqli_query($db, $query);

  $query =  "INSERT INTO recently_viewed (recipe_id, username) VALUES ('$recipe_id', '$username')";
  mysqli_query($db, $query);

  $query = "SELECT * FROM recently_viewed WHERE username = '$username'";
  $result = mysqli_query($db, $query);

  $origin = $_GET['origin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styles/style.css">
  <link rel="icon" href="Images/Others/HungryTime Icon.png">
  <title><?php echo $recipe['recipe_name'];?> | HungryTime</title>

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
          <a href="profile.php" class="
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

  <div class="main-body">
    <div class="main-body-wrapper recipe-main-body-wrapper">
      <div class="recipe-nav-wrapper">
        <div class="recipe-nav-main">
          <a href="#ingredients">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><rect x="1" y="40" width="104" height="14.67" rx="2.46"/><path d="M5,53.33l6.79,39.6A8.51,8.51,0,0,0,20.17,100h68a7.14,7.14,0,0,0,7.08-6.15L101,53.33ZM41,84a4,4,0,0,1-8,0V60a4,4,0,1,1,8,0Zm16,0a4,4,0,0,1-8,0V60a4,4,0,1,1,8,0Zm16,0a4,4,0,0,1-8,0V60a4,4,0,1,1,8,0Z"/><path d="M13,32l5.33-9.33S21,16,27.67,21.33A146.94,146.94,0,0,0,43.67,32Z"/><path d="M34.33,16s4-2.67,8-2.67A16.14,16.14,0,0,1,49,14.67l-4,8Z"/><path d="M53,32S54.33,17.33,63.67,8H78.33S87.67,20,89,32H53"/><rect x="61" width="20" height="8" rx="3"/></svg>
            <p>Ingredients</p>
          </a>
          <a href="#procedures">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 131 100"><defs></defs><path d="M19.64,30.36h91.07a0,0,0,0,1,0,0V91.93a8.07,8.07,0,0,1-8.07,8.07H27.72a8.07,8.07,0,0,1-8.07-8.07V30.36A0,0,0,0,1,19.64,30.36Z"/><path d="M119.64,15.07v1H10.71v-1a4.36,4.36,0,0,1,4.36-4.36H115.29A4.35,4.35,0,0,1,119.64,15.07Z"/><path d="M125,33.93H5.36a5.36,5.36,0,0,1,0-10.72H125a5.36,5.36,0,1,1,0,10.72Z"/><path d="M76.79,10.71H53.57C53.57,4.8,58.77,0,65.18,0S76.79,4.8,76.79,10.71Z"/></svg>
            <p>Procedures</p>
          </a>
          <a href="#about">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs></defs><path d="M50,100a50,50,0,1,1,50-50A50.06,50.06,0,0,1,50,100ZM50,8.57A41.43,41.43,0,1,0,91.43,50,41.48,41.48,0,0,0,50,8.57Z"/><path d="M57.14,75H49.29A4.29,4.29,0,0,1,45,70.71V46.43H43.57a4.29,4.29,0,0,1,0-8.57h5.72a4.28,4.28,0,0,1,4.28,4.28V66.43h3.57a4.29,4.29,0,1,1,0,8.57Z"/><circle cx="48.57" cy="27.14" r="5.71"/></svg>
            <p>About</p>
          </a>
        </div>
      </div>


      <div class="recipe-main-img-wrapper">
        <img src="Images/Food/<?php echo $recipe['recipe_id'];?>.png">
      </div>

      <input type="radio" name="recipe-rating-form-trigger" id="recipe-rating-form-open">
      <input type="radio" name="recipe-rating-form-trigger" id="recipe-rating-form-close" checked>

      <label for="recipe-rating-form-close">
        <span class="recipe-rating-form-open-span">&nbsp;</span>
      </label>

      <?php
        $recipe_rated = FALSE;

        $query = "SELECT * FROM ratings WHERE recipe_id = '$recipe_id' AND username = '$username'";
        $rating_select = mysqli_query($db, $query);

        $rating_result = mysqli_fetch_assoc($rating_select);

        if(mysqli_num_rows($rating_select) > 0) {
          $recipe_rated = TRUE;
        }
      ?>

      <form class="recipe-main-rate-form" method="POST">
        <label for="recipe-rating-form-close">
          <svg class="recipe-rating-form-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
        </label>
          
        <div class="recipe-main-rate-form-header">
          <img src="Images/Food/<?php echo $recipe['recipe_id'];?>.png">
          <div class="recipe-main-rate-form-header-name">
            <h5><?php echo $recipe['recipe_name'];?></h5>
            <div class="recipe-tags">
              <p><?php echo $recipe['category_country'];?></p>
              <p><?php echo $recipe['category_time'];?></p>
              <p><?php echo $recipe['category_specific'];?></p>
            </div>
          </div>
        </div>

        <hr>

        <h6>How many stars will you give this recipe?</h6>

        <input type="radio" name="recipe-rating" id="recipe-rating-0" hidden checked>
        <input type="radio" name="recipe-rating" id="recipe-rating-1" value="1" hidden
          <?php
            if($recipe_rated == TRUE && $rating_result['ratings']==1) {
              echo "checked";
            }
          ?>
        >
        <input type="radio" name="recipe-rating" id="recipe-rating-2" value="2" hidden
          <?php
            if($recipe_rated == TRUE && $rating_result['ratings']==2) {
              echo "checked";
            }
          ?>
        >
        <input type="radio" name="recipe-rating" id="recipe-rating-3" value="3" hidden
          <?php
            if($recipe_rated == TRUE && $rating_result['ratings']==3) {
              echo "checked";
            }
          ?>
        >
        <input type="radio" name="recipe-rating" id="recipe-rating-4" value="4" hidden
          <?php
            if($recipe_rated == TRUE && $rating_result['ratings']==4) {
              echo "checked";
            }
          ?>
        >
        <input type="radio" name="recipe-rating" id="recipe-rating-5" value="5" hidden
          <?php
            if($recipe_rated == TRUE && $rating_result['ratings']==5) {
              echo "checked";
            }
          ?>
        >
        <input type="text" value="<?php echo $recipe_id?>" name="recipe_id" hidden>
        
        <div class="recipe-main-rate-form-stars">
          <label for="recipe-rating-1">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.38,9.15,64.79,34.86a4,4,0,0,0,3,2.22L96.07,41,75.52,60.83a4,4,0,0,0-1.16,3.58l5,28.16L54.28,79.09a4,4,0,0,0-1.9-.48,4,4,0,0,0-1.89.48L25.39,92.57l5-28.16a4,4,0,0,0-1.16-3.58L8.7,41l28.22-3.92a4,4,0,0,0,3-2.22L52.38,9.15m0-9.2-16,33.17L0,38.17,26.47,63.71,20,100,52.38,82.61,84.76,100,78.29,63.71l26.48-25.54L68.39,33.12,52.38,0Z"/></svg>

            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.17,0,68.25,33.12l36.52,5.05L78.19,63.71,84.67,100,52.17,82.61,19.66,100l6.49-36.29L-.43,38.17l36.52-5.05Z"/></svg>
          </label>

          <label for="recipe-rating-2">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.38,9.15,64.79,34.86a4,4,0,0,0,3,2.22L96.07,41,75.52,60.83a4,4,0,0,0-1.16,3.58l5,28.16L54.28,79.09a4,4,0,0,0-1.9-.48,4,4,0,0,0-1.89.48L25.39,92.57l5-28.16a4,4,0,0,0-1.16-3.58L8.7,41l28.22-3.92a4,4,0,0,0,3-2.22L52.38,9.15m0-9.2-16,33.17L0,38.17,26.47,63.71,20,100,52.38,82.61,84.76,100,78.29,63.71l26.48-25.54L68.39,33.12,52.38,0Z"/></svg>

            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.17,0,68.25,33.12l36.52,5.05L78.19,63.71,84.67,100,52.17,82.61,19.66,100l6.49-36.29L-.43,38.17l36.52-5.05Z"/></svg>
          </label>

          <label for="recipe-rating-3">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.38,9.15,64.79,34.86a4,4,0,0,0,3,2.22L96.07,41,75.52,60.83a4,4,0,0,0-1.16,3.58l5,28.16L54.28,79.09a4,4,0,0,0-1.9-.48,4,4,0,0,0-1.89.48L25.39,92.57l5-28.16a4,4,0,0,0-1.16-3.58L8.7,41l28.22-3.92a4,4,0,0,0,3-2.22L52.38,9.15m0-9.2-16,33.17L0,38.17,26.47,63.71,20,100,52.38,82.61,84.76,100,78.29,63.71l26.48-25.54L68.39,33.12,52.38,0Z"/></svg>

            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.17,0,68.25,33.12l36.52,5.05L78.19,63.71,84.67,100,52.17,82.61,19.66,100l6.49-36.29L-.43,38.17l36.52-5.05Z"/></svg>
          </label>
          
          <label for="recipe-rating-4">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.38,9.15,64.79,34.86a4,4,0,0,0,3,2.22L96.07,41,75.52,60.83a4,4,0,0,0-1.16,3.58l5,28.16L54.28,79.09a4,4,0,0,0-1.9-.48,4,4,0,0,0-1.89.48L25.39,92.57l5-28.16a4,4,0,0,0-1.16-3.58L8.7,41l28.22-3.92a4,4,0,0,0,3-2.22L52.38,9.15m0-9.2-16,33.17L0,38.17,26.47,63.71,20,100,52.38,82.61,84.76,100,78.29,63.71l26.48-25.54L68.39,33.12,52.38,0Z"/></svg>
          
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.17,0,68.25,33.12l36.52,5.05L78.19,63.71,84.67,100,52.17,82.61,19.66,100l6.49-36.29L-.43,38.17l36.52-5.05Z"/></svg>
          </label>

          <label for="recipe-rating-5">
            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.38,9.15,64.79,34.86a4,4,0,0,0,3,2.22L96.07,41,75.52,60.83a4,4,0,0,0-1.16,3.58l5,28.16L54.28,79.09a4,4,0,0,0-1.9-.48,4,4,0,0,0-1.89.48L25.39,92.57l5-28.16a4,4,0,0,0-1.16-3.58L8.7,41l28.22-3.92a4,4,0,0,0,3-2.22L52.38,9.15m0-9.2-16,33.17L0,38.17,26.47,63.71,20,100,52.38,82.61,84.76,100,78.29,63.71l26.48-25.54L68.39,33.12,52.38,0Z"/></svg>

            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path class="cls-1" d="M52.17,0,68.25,33.12l36.52,5.05L78.19,63.71,84.67,100,52.17,82.61,19.66,100l6.49-36.29L-.43,38.17l36.52-5.05Z"/></svg>
          </label>
        </div>

        <?php if($recipe_rated == TRUE) { ?>

          <div class="recipe-rating-rate-button">
            <button name="recipe-update-button">Update!</button>
            <span>&nbsp;</span>
          </div>
        
        <?php } else { ?>

          <div class="recipe-rating-rate-button">
            <button name="recipe-rate-button">Rate!</button>
            <span>&nbsp;</span>
          </div>

        <?php } ?>
        
      </form>

      <div class="recipe-main-content-wrapper">
        <a href="<?php echo $origin."?";
            if(isset($_GET['country'])) {
              echo "country=".$_GET['country'];
            }
            if(isset($_GET['time'])) {
              echo "&time=".$_GET['time'];
            }
          
            if(isset($_GET['category'])) {
              echo "&category=".$_GET['category'];
            }
          
            if(isset($_GET['search'])) {
              echo "&search=".$_GET['search'];
            }

            if(isset($_GET['origin_2'])) {
              echo "&origin=".$_GET['origin_2'];
            }

            if(isset($_GET['origin_3'])) {
              echo "&origin_2=".$_GET['origin_3'];
            }

          ?>
        " class="recipe-main-back-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
            <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)" fill="#1e1a34"/>
          </svg>

          <p>Back</p>
        </a>

        <div class="recipe-main-header">
          <h1><?php echo $recipe['recipe_name'];?></h1>
          <div class="recipe-main-header-actions">
            <label for="recipe-rating-form-open" class="recipe-main-rating
              <?php
                if($username=="Guest") {
                  echo "guest-button-disabled";
                }
              ?>
            ">
              <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><defs></defs><path d="M52.17,0,68.25,33.12l36.52,5.05L78.19,63.71,84.67,100,52.17,82.61,19.66,100l6.49-36.29L-.43,38.17l36.52-5.05Z"/></svg>
              <p><?php echo $recipe['ratings'];?>/5.0</p>
            </label>

            <?php if($username!="Guest") { ?>
            
            <form action="" class="recipe-main-favorites-form" method="POST">
              <input type="text" value="<?php echo $recipe['recipe_id'];?>" name="recipe_id" hidden>

              <?php 
                $query = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND username = '$username'";
                $favorites_select = mysqli_query($db, $query);

                if(mysqli_num_rows($favorites_select) > 0) { ?>

                  <button class="recipe-main-favorites" name="remove-from-favorites">
                    <svg style="fill: #ff5151" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 117 100"><defs></defs><path class="cls-1" d="M117,29.62a28.8,28.8,0,0,1-8.55,20.59l-50.13,50L8.2,50.07A29.08,29.08,0,0,1,49.32,9l6.35,6.42a3.76,3.76,0,0,0,5.32,0l0,0,6.3-6.3A29.09,29.09,0,0,1,117,29.62Z"/></svg>
                  </button>

              <?php } else { ?>

                <button class="recipe-main-favorites" name="add-to-favorites">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 117 100"><defs></defs><path class="cls-1" d="M28.76,12.44a17,17,0,0,1,12.05,5l6.32,6.37a15.74,15.74,0,0,0,22.3.14l.09-.08,6.3-6.3A17.08,17.08,0,1,1,100,41.71L58.34,83.21,16.69,41.58A17.07,17.07,0,0,1,28.76,12.44m0-12A29.07,29.07,0,0,0,8.2,50.07l50.12,50.1,50.13-50A28.8,28.8,0,0,0,117,29.62,29.09,29.09,0,0,0,67.33,9.07L61,15.37l0,0a3.71,3.71,0,0,1-2.64,1.09,3.79,3.79,0,0,1-2.68-1.12L49.32,9A29,29,0,0,0,28.76.44Z"/></svg>
                </button>

              <?php } ?>
          </form>
          <?php } ?>
          </div>
        </div>

        <div class="recipe-tags">
          <p><?php echo $recipe['category_country'];?></p>
          <p><?php echo $recipe['category_time'];?></p>
          <p><?php echo $recipe['category_specific'];?></p>
        </div>

        <?php
          if(floor($recipe['prep']/60) > 0) {
            $recipe_prep = floor($recipe['prep']/60);

            if($recipe_prep > 1) {
              $recipe_prep_unit = "hrs";
            } else {
              $recipe_prep_unit = "hr";
            }

            if($recipe['prep']%60 > 0) {
              $recipe_prep_remainder = $recipe['prep']%60;

              if($recipe_prep_remainder > 1) {
                $recipe_prep_remainder_unit = "mins";

                $recipe_prep = $recipe_prep." ".$recipe_prep_unit." ".$recipe_prep_remainder." ".$recipe_prep_remainder_unit;
              } 
            } else {
              $recipe_prep = $recipe_prep." ".$recipe_prep_unit;
            }
          } else {
            $recipe_prep = $recipe['prep']." mins";
          }

          if(floor($recipe['cook']/60) > 0) {
            $recipe_cook = floor($recipe['cook']/60);

            if($recipe_cook > 1) {
              $recipe_cook_unit = "hrs";
            } else {
              $recipe_cook_unit = "hr";
            }

            if($recipe['cook']%60 > 0) {
              $recipe_cook_remainder = $recipe['cook']%60;

              if($recipe_cook_remainder > 1) {
                $recipe_cook_remainder_unit = "mins";

                $recipe_cook = $recipe_cook." ".$recipe_cook_unit." ".$recipe_cook_remainder." ".$recipe_cook_remainder_unit;
              } 
            } else {
              $recipe_cook = $recipe_cook." ".$recipe_cook_unit;
            }

          } else {
            $recipe_cook = $recipe['cook']." mins";
          }

          if(floor($recipe['total']/60) > 0) {
            $recipe_total = floor($recipe['total']/60);

            if($recipe_total > 1) {
              $recipe_total_unit = "hrs";
            } else {
              $recipe_total_unit = "hr";
            }

            if($recipe['total']%60 > 0) {
              $recipe_total_remainder = $recipe['total']%60;

              if($recipe_total_remainder > 1) {
                $recipe_total_remainder_unit = "mins";

                $recipe_total = $recipe_total." ".$recipe_total_unit." ".$recipe_total_remainder." ".$recipe_total_remainder_unit;
              } 
            } else {
              $recipe_total = $recipe_total." ".$recipe_total_unit;
            }
          } else {
            $recipe_total = $recipe['total']." mins";
          }
        ?>

        <div class="recipe-main-cook-time">
          <div class="recipe-main-cook-time-column with-right-border">
            <p>Prep:</p>
            <h5><?php echo $recipe_prep?></h5>
          </div>
          <div class="recipe-main-cook-time-column with-right-border">
            <p>Cook:</p>
            <h5><?php echo $recipe_cook?></h5>
          </div>
          <div class="recipe-main-cook-time-column with-right-border">
            <p>Total:</p>
            <h5><?php echo $recipe_total?></h5>
          </div>
          <div class="recipe-main-cook-time-column">
            <p>Servings:</p>
            <h5><?php echo $recipe['servings']?></h5>
          </div>
        </div>

        <div class="recipe-main-ingredients recipe-main-details" id="ingredients">
          <h2>Ingredients</h2>
          <p><?php echo $recipe['ingredients']?></p>
        </div>

        <div class="recipe-main-procedures recipe-main-details" id="procedures">
          <h2>Procedures</h2>
          <p><?php echo $recipe['procedures']?></p>
        </div>

        <div class="recipe-main-about recipe-main-details" id="about">
          <h2>About</h2>
          <p><?php echo $recipe['about']?></p>
        </div>

        <div class="recipe-main-about-img-wrapper">
          <img src="Images/Food/<?php echo $recipe['recipe_id'];?>.png">
        </div>
      </div>
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

  <div class="sidebar recipe-main-sidebar">
    <div class="sidebar-wrapper recipe-main-sidebar-wrapper">
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
            <p><a href="login.php?origin=recipe-main.php&recipe_id=<?php echo $recipe_id;?>&origin_2=<?php echo $origin;
            if(isset($_GET['origin_2'])) {
              echo "&origin_3=".$_GET['origin_2'];
            }
            if(isset($_GET['origin_3'])) {
              echo "&origin_4=".$_GET['origin_3'];
            }
            if(isset($_GET['country'])){
              echo "&country=".$_GET['country'];
            }
            if(isset($_GET['time'])){
              echo "&time=".$_GET['time'];
            }
            if(isset($_GET['category'])){
              echo "&category=".$_GET['category'];
            }
            if(isset($_GET['search'])){
              echo "&search=".$_GET['search'];
            }?>">Login</a>/<a href="login.php?signup=yes&origin=recipe-main.php&recipe_id=<?php echo $recipe_id;?>&origin_2=<?php echo $origin;
            if(isset($_GET['origin_2'])) {
              echo "&origin_3=".$_GET['origin_2'];
            }
            if(isset($_GET['origin_3'])) {
              echo "&origin_4=".$_GET['origin_3'];
            }
            if(isset($_GET['country'])){
              echo "&country=".$_GET['country'];
            }
            if(isset($_GET['time'])){
              echo "&time=".$_GET['time'];
            }
            if(isset($_GET['category'])){
              echo "&category=".$_GET['category'];
            }
            if(isset($_GET['search'])){
              echo "&search=".$_GET['search'];
            }?>">Signup</a></p>
          </div>

        <?php } else { ?>

          <div class="sidebar-user-name sidebar-user-name-active">
            <a href="profile.php"><?php echo $user['first_name']." ".$user['last_name'];?></a>
            <a href="login.php?origin=recipe-main.php&recipe_id=<?php echo $recipe_id;?>&origin_2=<?php echo $origin;
            if(isset($_GET['origin_2'])) {
              echo "&origin_3=".$_GET['origin_2'];
            }
            if(isset($_GET['origin_3'])) {
              echo "&origin_4=".$_GET['origin_3'];
            }
            if(isset($_GET['country'])){
              echo "&country=".$_GET['country'];
            }
            if(isset($_GET['time'])){
              echo "&time=".$_GET['time'];
            }
            if(isset($_GET['category'])){
              echo "&category=".$_GET['category'];
            }
            if(isset($_GET['search'])){
              echo "&search=".$_GET['search'];
            }?>">Change Account</a>
          </div>
        
        <?php } ?>
      </div>
  
      <div class="recipe-main-comments">
        <h3>Comments</h3>
        <div class="recipe-main-comments-wrapper">

          <?php
            $query = "SELECT * FROM comments WHERE recipe_id = '$recipe_id'";
            $result = mysqli_query($db, $query);

            if(mysqli_num_rows($result)==0) { ?>
              <p><i>Be the first to comment.</i></p>

          <?php }
            while($comment = mysqli_fetch_assoc($result)) {
              $comment_username = $comment['username'];

              $query = "SELECT * FROM users WHERE username = '$comment_username'";
              $user_result = mysqli_query($db, $query);

              $comment_user = mysqli_fetch_assoc($user_result);
          ?>
          <div class="recipe-main-comment
            <?php
              if($comment_user['username']==$username) {
                echo "recipe-main-comment-from-current-user";
              }
            ?>

          ">
            <div class="recipe-main-comment-header">
              <div class="recipe-main-commnent-img-wrapper">
                <img src="Images/Avatars/<?php echo $comment_user['avatar'];?>.svg">
              </div>

              <?php
                $comment_time = time()-$comment['time'];

                if($comment_time < 60) {
                  $comment_time = $comment_time."s";
                } elseif ($comment_time >= 60 && $comment_time < 3600) {
                  $comment_time = floor($comment_time/60)."m";
                }
                elseif ($comment_time >= 3600 && $comment_time < 86400) {
                  $comment_time = floor($comment_time/3600)."h";
                }
                elseif ($comment_time >= 86400 && $comment_time < 604800) {
                  $comment_time = floor($comment_time/86400)."d";
                }
                elseif ($comment_time >= 604800 && $comment_time < 2.628e+6) {
                  $comment_time = floor($comment_time/604800)."w";
                }
                elseif ($comment_time >= 2.628e+6 && $comment_time < 31535965.4396976) {
                  $comment_time = floor($comment_time/2.628e+6)."mo";
                }
                elseif ($comment_time >= 31535965.4396976) {
                  $comment_time = floor($comment_time/31535965.4396976)."y";
                }
              ?>

              <div class="recipe-main-comment-user-info">
                <div class="recipe-main-comment-user-name">
                  <a href="profile.php?profile_visit=<?php echo $comment_user['user_id']?>">
                    <h6><?php 
                      if($username==$comment_user['username']) {
                        echo "You";
                      } else {
                        echo $comment_user['first_name']." ".$comment_user['last_name'];
                      } ?></h6>
                  </a>
                  <p><?php echo $comment_time;?></p>
                </div>
                <h5><?php echo $comment['subject'];?></h5>
              </div>
            </div>

            <div class="recipe-main-comment-content">
              <p><?php echo $comment['comment'];?></p>
            </div>

            <?php
              if($comment['likes'] < 1000) {
                $comment_likes = $comment['likes'];
              } elseif($comment['likes'] > 1000 && $comment['likes'] < 1000000) {
                $comment_likes = $comment['likes'] / 1000;
                $comment_likes = number_format($comment_likes, 1)."k";
              } elseif($comment['likes'] > 1000000) {
                $comment_likes = $comment['likes'] / 1000000;
                $comment_likes = number_format($comment_likes, 1)."m";
              }

              if($comment['dislikes'] < 1000) {
                $comment_dislikes = $comment['dislikes'];
              } elseif($comment['dislikes'] > 1000 && $comment['dislikes'] < 1000000) {
                $comment_dislikes = $comment['dislikes'] / 1000;
                $comment_dislikes = number_format($comment_dislikes, 1)."k";
              } elseif($comment['dislikes'] > 1000000) {
                $comment_dislikes = $comment['dislikes'] / 1000000;
                $comment_dislikes = number_format($comment_dislikes, 1)."m";
              }

              $comment_id = $comment['comment_id'];

              $query = "SELECT * FROM likes WHERE comment_id = '$comment_id' AND username = '$username'";
              $like_select = mysqli_query($db, $query);

              if(mysqli_num_rows($like_select) > 0) {
                $liked = TRUE;
              } else {
                $liked = FALSE;
              }

              $query = "SELECT * FROM dislikes WHERE comment_id = '$comment_id' AND username = '$username'";
              $dislike_select = mysqli_query($db, $query);

              if(mysqli_num_rows($dislike_select) > 0) {
                $disliked = TRUE;
              } else {
                $disliked = FALSE;
              }
            ?>

            <form class="recipe-main-comment-like-wrapper
              <?php
                if($username == "Guest" || $username==$comment_user['username']) {
                  echo "like-form-disabled";
                }
              ?>
            " action="" method="POST">
              <input type="text" name="comment_id" value="<?php echo $comment['comment_id'];?>" hidden>
              <input type="text" name="recipe_id" value="<?php echo $recipe['recipe_id'];?>" hidden>

              <div class="comment-like-button comment-like-wrapper
                <?php 
                  if($liked) {
                    echo "comment-like-wrapper-active";
                  }
                ?>
              ">
                <button name="like">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><path d="M38.71,85c-1,6.57-5.16,8.26-10.95,8-4.64-.24-9.32.08-14-.1-5.64-.21-8-2.63-8-8.4-.09-13.19,0-26.38,0-39.57,0-5.22,2.56-7.91,7.83-7.92,5.63,0,11.28.29,16.88-.14a10.4,10.4,0,0,0,6.6-3.07c5.84-7,11.27-14.33,16.76-21.6,2.76-3.65,5.7-6.38,10.77-4.42s8,5.52,7.88,11a88.27,88.27,0,0,1-.91,12.16c-.72,4.69,1,6.44,5.66,6.12a91.43,91.43,0,0,1,10.47,0c7.34.32,12.45,5.27,11.48,12.39-1.62,11.88-3.78,23.72-6.44,35.42-1.31,5.75-6.3,8.11-12.1,8.06-7.17-.06-14.5.56-21.46-.72C52.4,90.89,46,87.62,38.71,85Zm-.3-28.16c0,8.12-.22,13.57.13,19a6.64,6.64,0,0,0,2.76,4.74A64.34,64.34,0,0,0,81.18,88c2.65-.32,6.62-3,7.16-5.27,2.62-10.91,4.48-22,6.18-33.13.75-4.86-2-7.72-7-7.94-3.49-.14-7,0-10.48-.05-8.62-.07-10.92-2.78-10-11.52.41-4,1.14-8.2.57-12.14-.31-2.14-2.76-4.43-4.84-5.63-.88-.52-3.67,1.19-4.9,2.52-2.75,3-4.77,6.67-7.59,9.56C40.6,34.23,37.35,44.12,38.41,56.8Zm-28,7.86c0,6,.17,12-.06,18-.14,3.89,1,5.8,5.23,5.56a116.47,116.47,0,0,1,12.81,0c4.1.22,5.51-1.51,5.41-5.49-.19-7.76,0-15.52,0-23.29,0-18.58,0-18.58-18.4-17.89a5.81,5.81,0,0,1-.59,0c-3.3-.33-4.46,1.24-4.39,4.44C10.5,52.24,10.41,58.45,10.4,64.66Z"/></svg>
                </button>

                <button name="unlike">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><path d="M39,43V83a12.64,12.64,0,0,1-.15,2L38.71,85a11.66,11.66,0,0,1-1.09,3.64,7.64,7.64,0,0,1-6.11,4.17l-.23,0-.12,0a18.86,18.86,0,0,1-3.4.1c-4.64-.24-9.32.08-14-.1-5.64-.21-8-2.63-8-8.4-.09-13.19,0-26.38,0-39.57,0-5.22,2.56-7.91,7.83-7.92,3.34,0,6.69.1,10,.1l1.71,0H30a16.64,16.64,0,0,1,3,0c4.23.91,5.48,3.43,5.85,4.9,0,.08,0,.17,0,.24s0,.19.05.27A3.19,3.19,0,0,1,39,43Z"/><path d="M99.16,49.36c-1.62,11.88-3.78,23.72-6.44,35.42-1.31,5.75-6.3,8.11-12.1,8.06-7.17-.06-14.5.56-21.46-.72A66.53,66.53,0,0,1,46.33,88l-.07,0a0,0,0,0,1,0,0C45.73,87.66,43,85.59,43,72V32s-.89-4.14,4.5-11.52l0-.07.36-.46,5.9-7.83c2.76-3.65,5.7-6.38,10.77-4.42s8,5.52,7.88,11a88.27,88.27,0,0,1-.91,12.16c-.72,4.69,1,6.44,5.66,6.12a91.43,91.43,0,0,1,10.47,0C95,37.29,100.13,42.24,99.16,49.36Z"/><path d="M39,43V83a12.64,12.64,0,0,1-.15,2,9.66,9.66,0,0,1-1.23,3.59,9.18,9.18,0,0,1-6.11,4.17l-.23,0-.12,0L11,59l1-16s4.89-5.89,11.61-6l1.71,0H30a16.64,16.64,0,0,1,3,0c4.23.91,5.48,3.43,5.85,4.9,0,.08,0,.17,0,.24s0,.19.05.27A3.19,3.19,0,0,1,39,43Z"/><path d="M64,20,63,33V61c0,1-10,24-10,24l-6.67,3-.07,0a0,0,0,0,1,0,0C45.73,87.66,43,85.59,43,72V32s-.89-4.14,4.5-11.52l0-.07.36-.46C53.47,13.3,64,20,64,20Z"/></svg>

                </button>
              </div>
              <p><?php echo $comment_likes?></p>

              <div class="comment-dislike-button comment-like-wrapper
                <?php 
                  if($disliked) {
                    echo "comment-dislike-wrapper-active";
                  }
                ?>
              ">
                <button name="dislike">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><path d="M38.71,85c-1,6.57-5.16,8.26-10.95,8-4.64-.24-9.32.08-14-.1-5.64-.21-8-2.63-8-8.4-.09-13.19,0-26.38,0-39.57,0-5.22,2.56-7.91,7.83-7.92,5.63,0,11.28.29,16.88-.14a10.4,10.4,0,0,0,6.6-3.07c5.84-7,11.27-14.33,16.76-21.6,2.76-3.65,5.7-6.38,10.77-4.42s8,5.52,7.88,11a88.27,88.27,0,0,1-.91,12.16c-.72,4.69,1,6.44,5.66,6.12a91.43,91.43,0,0,1,10.47,0c7.34.32,12.45,5.27,11.48,12.39-1.62,11.88-3.78,23.72-6.44,35.42-1.31,5.75-6.3,8.11-12.1,8.06-7.17-.06-14.5.56-21.46-.72C52.4,90.89,46,87.62,38.71,85Zm-.3-28.16c0,8.12-.22,13.57.13,19a6.64,6.64,0,0,0,2.76,4.74A64.34,64.34,0,0,0,81.18,88c2.65-.32,6.62-3,7.16-5.27,2.62-10.91,4.48-22,6.18-33.13.75-4.86-2-7.72-7-7.94-3.49-.14-7,0-10.48-.05-8.62-.07-10.92-2.78-10-11.52.41-4,1.14-8.2.57-12.14-.31-2.14-2.76-4.43-4.84-5.63-.88-.52-3.67,1.19-4.9,2.52-2.75,3-4.77,6.67-7.59,9.56C40.6,34.23,37.35,44.12,38.41,56.8Zm-28,7.86c0,6,.17,12-.06,18-.14,3.89,1,5.8,5.23,5.56a116.47,116.47,0,0,1,12.81,0c4.1.22,5.51-1.51,5.41-5.49-.19-7.76,0-15.52,0-23.29,0-18.58,0-18.58-18.4-17.89a5.81,5.81,0,0,1-.59,0c-3.3-.33-4.46,1.24-4.39,4.44C10.5,52.24,10.41,58.45,10.4,64.66Z"/></svg>
                </button>

                <button name="undislike">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 105 100"><path d="M39,43V83a12.64,12.64,0,0,1-.15,2L38.71,85a11.66,11.66,0,0,1-1.09,3.64,7.64,7.64,0,0,1-6.11,4.17l-.23,0-.12,0a18.86,18.86,0,0,1-3.4.1c-4.64-.24-9.32.08-14-.1-5.64-.21-8-2.63-8-8.4-.09-13.19,0-26.38,0-39.57,0-5.22,2.56-7.91,7.83-7.92,3.34,0,6.69.1,10,.1l1.71,0H30a16.64,16.64,0,0,1,3,0c4.23.91,5.48,3.43,5.85,4.9,0,.08,0,.17,0,.24s0,.19.05.27A3.19,3.19,0,0,1,39,43Z"/><path d="M99.16,49.36c-1.62,11.88-3.78,23.72-6.44,35.42-1.31,5.75-6.3,8.11-12.1,8.06-7.17-.06-14.5.56-21.46-.72A66.53,66.53,0,0,1,46.33,88l-.07,0a0,0,0,0,1,0,0C45.73,87.66,43,85.59,43,72V32s-.89-4.14,4.5-11.52l0-.07.36-.46,5.9-7.83c2.76-3.65,5.7-6.38,10.77-4.42s8,5.52,7.88,11a88.27,88.27,0,0,1-.91,12.16c-.72,4.69,1,6.44,5.66,6.12a91.43,91.43,0,0,1,10.47,0C95,37.29,100.13,42.24,99.16,49.36Z"/><path d="M39,43V83a12.64,12.64,0,0,1-.15,2,9.66,9.66,0,0,1-1.23,3.59,9.18,9.18,0,0,1-6.11,4.17l-.23,0-.12,0L11,59l1-16s4.89-5.89,11.61-6l1.71,0H30a16.64,16.64,0,0,1,3,0c4.23.91,5.48,3.43,5.85,4.9,0,.08,0,.17,0,.24s0,.19.05.27A3.19,3.19,0,0,1,39,43Z"/><path d="M64,20,63,33V61c0,1-10,24-10,24l-6.67,3-.07,0a0,0,0,0,1,0,0C45.73,87.66,43,85.59,43,72V32s-.89-4.14,4.5-11.52l0-.07.36-.46C53.47,13.3,64,20,64,20Z"/></svg>
                </button>

              </div>
              <p><?php echo $comment_dislikes?></p>
            </form>

            <?php if($comment_user['username']==$username) { ?>
              <form action="" method="POST" class="comment-delete-form">
                <input type="text" name="comment_id" value="<?php echo $comment['comment_id'];?>" hidden>
                <input type="text" name="recipe_id" value="<?php echo $recipe['recipe_id'];?>" hidden>

                <button name="comment-delete">
                  <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 92 100"><defs></defs><path class="cls-1" d="M14.7,26.7V85.92A10.35,10.35,0,0,0,25,96.25H67A10.35,10.35,0,0,0,77.3,85.92V26.7ZM37,86.51H28.61V36.44H37Zm26.43,0H55V36.44h8.35Z"/><path class="cls-1" d="M80.08,19.05H11.92a4.87,4.87,0,0,1,0-9.74H80.08a4.87,4.87,0,1,1,0,9.74Z"/><path class="cls-1" d="M35.59,3.75H56.41a3.5,3.5,0,0,1,3.5,3.5v7.63a0,0,0,0,1,0,0H32.09a0,0,0,0,1,0,0V7.25A3.5,3.5,0,0,1,35.59,3.75Z"/></svg>
                </button>
              </form>
            <?php } ?>
          </div>

          <?php } ?>

          <!-- <div class="recipe-main-comment recipe-main-comment-from-current-user">
            <div class="recipe-main-comment-header">
              <div class="recipe-main-commnent-img-wrapper">
                <img src="Images/Avatars/11.svg">
              </div>

              <div class="recipe-main-comment-user-info">
                <div class="recipe-main-comment-user-name">
                  <h6>Emeril Lagasse</h6>
                  <p>12h</p>
                </div>
                <h5>Fantastic!</h5>
              </div>
            </div>

            <div class="recipe-main-comment-content">
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
          </div> -->

          <span>&nbsp;</span>
        </div>
      </div>

      <input type="radio" name="recipe-comment-form-trigger" id="recipe-comment-form-open" hidden>
      <input type="radio" name="recipe-comment-form-trigger" id="recipe-comment-form-close" hidden checked>

      <label for="recipe-comment-form-close">
        <span class="recipe-rating-form-open-span">&nbsp;</span>
      </label>

      <form class="recipe-main-comment-form" method="POST" action="">
        <label for="recipe-comment-form-close">
          <svg class="recipe-rating-form-close" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
        </label>

        <input type="text" placeholder="Subject" name="subject" maxlength="50" required>
        <textarea name="comment" placeholder="Comment" rows="7" required></textarea>

        <input type="text" value="<?php echo $recipe_id?>" name="recipe_id" hidden>
        
        <div class="recipe-rating-rate-button">
          <button name="recipe-comment-button">Comment</button>
          <span>&nbsp;</span>
        </div>
      </form>

      <?php if($username == "Guest") { ?> 

      <div class="recipe-main-add-a-comment recipe-main-add-a-comment-disabled">
        <label for="recipe-comment-form-open">
          <p>Log in to comment.</p>
        </label>
      </div>

      <?php } else { ?>

      <div class="recipe-main-add-a-comment">
        <label for="recipe-comment-form-open">
          <img src="Images/Icons/comment.svg">
          <p>Add a comment</p>
        </label>
      </div>

      <?php } ?>

    </div>
  </div>
</body>
</html>