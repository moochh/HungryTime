<?php
  include('functions.php');

  if(isset($_GET['country'])) {
    $country = $_GET['country'];
  } else {
    $country = "";
  }
  
  if($country==NULL) {
    $country = "";
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

  $origin = $_GET['origin'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Styles/style.css">
  <title>Browse Filtered Recipes | HungryTime</title>
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
    <div class="main-body-wrapper">
      <section class="main-body-header">
        <h2>What are you cooking today?</h2>
  
        <div class="search-bar-wrapper">
          <form class="search-bar" method="POST" action="category-recipes.php?origin=<?php
            echo $origin;
            if(isset($_GET['country'])) {
              echo "&country=".$_GET['country'];
            }
            if(isset($_GET['time'])) {
              echo "&time=".$_GET['time'];
            }
            if(isset($_GET['category'])) {
              echo "&category=".$_GET['category'];
            }
          ?>">
            <img src="Images/Icons/search.svg">
            <input type="text" name="search" placeholder="Search Recipes" value="<?php
                if($search!=NULL) {
                  echo $search;
                }
              ?>">

            <?php if(isset($_GET['country'])) { ?>

              <input type="radio" name="country" value="<?php $_GET['country']?>" hidden>

            <?php } ?>

            <?php if(isset($_GET['time'])) { ?>

              <input type="radio" name="time" value="<?php $_GET['time']?>" hidden>

            <?php } ?>

            <?php if(isset($_GET['category'])) { ?>

              <input type="radio" name="category" value="<?php $_GET['category']?>" hidden>

            <?php } ?>
          </form>
    
          <?php
            if($username!="Guest") { ?>
              <a href="favorites.php?origin=category-recipes.php<?php 
                if(isset($_GET['country'])) {
                  echo "&country=".$_GET['country'];
                }
                if(isset($_GET['time'])) {
                  echo "&time=".$_GET['time'];
                }
                if(isset($_GET['category'])) {
                  echo "&category=".$_GET['category'];
                }
                if(isset($_GET['origin'])) {
                  echo "&origin_2=".$_GET['origin'];
                }
                if(isset($_GET['origin_2'])) {
                  echo "&origin_3=".$_GET['origin_2'];
                }?>" class="faves-icon-wrapper">
                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 117 100"><defs><style>.cls-1{fill:#1e1a34;}</style></defs><path class="cls-1" d="M28.76,12.44a17,17,0,0,1,12.05,5l6.32,6.37a15.74,15.74,0,0,0,22.3.14l.09-.08,6.3-6.3A17.08,17.08,0,1,1,100,41.71L58.34,83.21,16.69,41.58A17.07,17.07,0,0,1,28.76,12.44m0-12A29.07,29.07,0,0,0,8.2,50.07l50.12,50.1,50.13-50A28.8,28.8,0,0,0,117,29.62,29.09,29.09,0,0,0,67.33,9.07L61,15.37l0,0a3.71,3.71,0,0,1-2.64,1.09,3.79,3.79,0,0,1-2.68-1.12L49.32,9A29,29,0,0,0,28.76.44Z"/></svg>
              </a>
          <?php } ?>
        </div>
      </section>

      <?php
        if(isset($_POST['time'])) {
          $time = $_POST['time'];
        } elseif(isset($_GET['time'])) {
          $time = $_GET['time'];
        } else {
          $time = NULL;
        }

        if(isset($_POST['category'])) {
          $category = $_POST['category'];
        } elseif(isset($_GET['category'])) {
          $category = $_GET['category'];
        } else {
          $category = NULL;
        }
      ?>

      <?php 
        if($time != NULL && $category!=NULL) {
          $query = "SELECT * FROM recipes WHERE LOCATE('$country', category_country) > 0 AND category_time = '$time' AND category_specific = '$category'";
          $recipe_result = mysqli_query($db, $query);
        }  
        elseif($time != NULL && $category==NULL) {
          $query = "SELECT * FROM recipes WHERE LOCATE('$country', category_country) > 0 AND category_time = '$time'";
          $recipe_result = mysqli_query($db, $query);
        } 
        elseif($time == NULL && $category!=NULL) {
          $query = "SELECT * FROM recipes WHERE LOCATE('$country', category_country) > 0 AND category_specific = '$category'";
          $recipe_result = mysqli_query($db, $query);
        } 
        else {
          $query = "SELECT * FROM recipes WHERE LOCATE('$country', category_country) > 0";
          $recipe_result = mysqli_query($db, $query);
        }

        if($search!=NULL) {

          if($time != NULL && $category!=NULL) {
            $query = "SELECT * FROM recipes WHERE (LOCATE('$country', category_country) > 0 AND category_time = '$time' AND category_specific = '$category' AND LOCATE('$search', recipe_name) > 0) OR (LOCATE('$country', category_country) > 0 AND category_time = '$time' AND category_specific = '$category' AND LOCATE('$search', ingredients) > 0)";
            $recipe_result = mysqli_query($db, $query);
          }  
          elseif($time != NULL && $category==NULL) {
            $query = "SELECT * FROM recipes WHERE (LOCATE('$country', category_country) > 0 AND category_time = '$time' AND LOCATE('$search', recipe_name)) > 0 OR (LOCATE('$country', category_country) > 0 AND category_time = '$time' AND LOCATE('$search', ingredients) > 0)";
            $recipe_result = mysqli_query($db, $query);
          } 
          elseif($time == NULL && $category!=NULL) {
            $query = "SELECT * FROM recipes WHERE (LOCATE('$country', category_country) > 0 AND category_specific = '$category' AND LOCATE('$search', recipe_name)) > 0 OR (LOCATE('$country', category_country) > 0 AND category_specific = '$category' AND LOCATE('$search', ingredients) > 0)";
            $recipe_result = mysqli_query($db, $query);
          } else {
            $query = "SELECT * FROM recipes WHERE (LOCATE('$country', category_country) > 0 AND LOCATE('$search', recipe_name) > 0) OR (LOCATE('$country', category_country) > 0 AND LOCATE('$search', ingredients) > 0)";
            $recipe_result = mysqli_query($db, $query);
          }
        }
      ?>

      <div class="category-recipes-header">
        <h3>
        <a href="<?php echo $origin;?>?
          <?php
            if(isset($_GET['origin_2'])) {
              echo "&origin=".$_GET['origin_2'];
            }
            if(isset($_GET['origin_3'])) {
              echo "&origin_2=".$_GET['origin_3'];
            }
            if(isset($_GET['origin_4'])) {
              echo "&origin_3=".$_GET['origin_4'];
            }
          ?>
        ">
          <svg xmlns="http://www.w3.org/2000/svg" width="10.125" height="8.697" viewBox="0 0 10.125 8.697">
            <g id="HCI_Recipe_UX-03" data-name="HCI Recipe UX-03" transform="translate(10.125) rotate(90)">
              <path id="Path_5" data-name="Path 5" d="M.694,9.714A.694.694,0,0,1,0,9.02V.694a.694.694,0,0,1,1.388,0V9.02A.694.694,0,0,1,.694,9.714Z" transform="translate(3.637 0.411)"/>
              <path id="Path_6" data-name="Path 6" d="M8.008,5.06a.694.694,0,0,1-.49-.2L4.331,1.669,1.144,4.856a.694.694,0,0,1-.976-.981L3.841.2a.694.694,0,0,1,.981,0L8.494,3.876A.694.694,0,0,1,8.008,5.06Z"/>
            </g>
          </svg>
        </a>

        Showing <?php echo mysqli_num_rows($recipe_result);?> result<?php if(mysqli_num_rows($recipe_result)>1) {
          echo "s";
        };?></h3>
        <input type="radio" name="filter-form-trigger" id="filter-form-open" hidden>
        <input type="radio" name="filter-form-trigger" id="filter-form-close" hidden checked>

        <div class="filter-menu-toggle">
          <p>Filter</p>
          <img src="Images/Icons/chevron-right.svg">

          <label for="filter-form-close" id="filter-form-close-trigger"><span>&nbsp;</span></label>
          <label for="filter-form-open" id="filter-form-open-trigger"><span>&nbsp;</span></label>
        </div>       

        <form class="filter-form-wrapper" action="" method="GET">
          <div class="filter-options-wrapper">
            <div class="filter-options-column">
              <h6>Country</h6>
              <div class="filter-options-column-options">
                <input type="radio" name="country" id="French" value="French" 
                  <?php
                    if($country=="French") {
                      echo "checked";
                    }
                  ?>
                hidden>
                <label for="French" id="French">France</label>

                <input type="radio" name="country" id="Italian" value="Italian" 
                  <?php
                    if($country=="Italian") {
                      echo "checked";
                    }
                  ?>
                hidden>
                <label for="Italian" id="Italian">Italy</label>

                <input type="radio" name="country" id="Japanese" value="Japanese" 
                  <?php
                    if($country=="Japanese") {
                      echo "checked";
                    }
                  ?>
                hidden>
                <label for="Japanese" id="Japanese">Japan</label>

                <input type="radio" name="country" id="Korean" value="Korean" 
                  <?php
                    if($country=="Korean") {
                      echo "checked";
                    }
                  ?>
                hidden>
                <label for="Korean" id="Korean">Korea</label>

                <input type="radio" name="country" id="Spanish" value="Spanish" 
                  <?php
                    if($country=="Spanish") {
                      echo "checked";
                    }
                  ?>
                hidden>
                <label for="Spanish" id="Spanish">Spain</label>
              </div>

              <input type="radio" name="country" value="" id="country_clear" hidden>
              <label for="country_clear" class="filter-category-clear"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
                <p>Clear</p>
              </label>
            </div>

            <div class="filter-options-column">
              <h6>Time</h6>
              <div class="filter-options-column-options">
                <input type="radio" name="time" id="Breakfast" value="Breakfast" 
                  <?php
                    if(isset($_GET['time'])) {
                      if($_GET['time']=="Breakfast") {
                        echo "checked";
                      }
                    }
                  ?>
                hidden>
                <label for="Breakfast" id="Breakfast">Breakfast</label>

                <input type="radio" name="time" id="Lunch" value="Lunch" 
                  <?php
                    if(isset($_GET['time'])) {
                      if($_GET['time']=="Lunch") {
                        echo "checked";
                      }
                    }
                  ?>
                hidden>
                <label for="Lunch" id="Lunch">Lunch</label>

                <input type="radio" name="time" id="Dinner" value="Dinner" 
                  <?php
                    if(isset($_GET['time'])) {
                      if($_GET['time']=="Dinner") {
                        echo "checked";
                      }
                    }
                  ?>
                hidden>
                <label for="Dinner" id="Dinner">Dinner</label>
              </div>

              <input type="radio" name="time" value="" id="time_clear" hidden>
              <label for="time_clear" class="filter-category-clear"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
                <p>Clear</p>
              </label>
            </div>

            <div class="filter-options-column">
              <h6>Category</h6>
              <div class="filter-options-column-options"> 
                <?php 
                if($time==NULL && $country !=NULL) {
                  $query = "SELECT DISTINCT category_specific FROM recipes WHERE LOCATE('$country', category_country) > 0";
                  $result = mysqli_query($db, $query);
                } elseif($time!=NULL) {
                  $query = "SELECT DISTINCT category_specific FROM recipes WHERE LOCATE('$country', category_country) > 0 AND category_time = '$time'";
                  $result = mysqli_query($db, $query);
                } else {
                  $query = "SELECT DISTINCT category_specific FROM recipes";
                  $result = mysqli_query($db, $query);
                }

                while($category_select = mysqli_fetch_assoc($result)) {
              ?>

                <input type="radio" name="category" value="<?php echo $category_select['category_specific']?>" id="<?php echo $category_select['category_specific']?>"
                  <?php
                    if($category==$category_select['category_specific']) {
                      echo "checked";
                    }
                  ?>
                hidden>
                <label for="<?php echo $category_select['category_specific']?>"><?php echo $category_select['category_specific']?></label>

                <?php } ?> 
              </div>

              <input type="radio" name="category" value="" id="category_clear" hidden>
              <label for="category_clear" class="filter-category-clear"> 
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
                <p>Clear</p>
              </label>
            </div>
          </div>

          <?php if($search!=NULL) { ?>
            <input type="text" name="search" value="<?php echo $search;?>" hidden>
          <?php } ?>
          <input type="text" value="<?php echo $origin;?>" name="origin" hidden>

          <div class="filter-submit-wrapper">
              <button>Filter</button>
          </div>
        </form>
      </div>

      <div class="filter-active-indicators">
        <?php if($country!=NULL) { ?>
          <a href="category-recipes.php?origin=<?php
            echo $origin;
            if(isset($category)) {
              echo "&category=".$category;
            }
            if($search!=NULL) {
              echo "&search=".$search;
            }
          ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
            <h6><?php echo $country;?></h6>
          </a>
        <?php } ?>

        <?php if($time!=NULL) { ?>
          <a href="category-recipes.php?country=<?php echo $country;
            echo "&origin=".$origin;
            if(isset($category)) {
              echo "&category=".$category;
            }
            if($search!=NULL) {
              echo "&search=".$search;
            }
          ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
            <h6><?php echo $time;?></h6>
          </a>
        <?php } ?>

        <?php if($category!=NULL) { ?>
          <a href="category-recipes.php?country=<?php echo $country;
            echo "&origin=".$origin;
            if(isset($time)) {
              echo "&time=".$time;
            }
            if($search!=NULL) {
              echo "&search=".$search;
            }
          ?>">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90"><g id="Layer_1" data-name="Layer 1"><path d="M79.24,70.67a6.06,6.06,0,0,1-8.57,8.57L45,53.57,19.33,79.24a6.06,6.06,0,0,1-8.57-8.57L36.43,45,10.76,19.33a6.06,6.06,0,0,1,8.57-8.57L45,36.44,70.67,10.76a6.06,6.06,0,1,1,8.57,8.57L53.57,45Z"/></g></svg>
            <h6><?php echo $category;?></h6>
          </a>
        <?php } ?>
      </div>

      <div class="category-recipes-wrapper">
        <?php
        
          while($recipe = mysqli_fetch_assoc($recipe_result)) { 
            $recipe_total = $recipe['prep']+$recipe['cook'];
            
            if(floor($recipe_total/60) > 0) {
              $recipe_total_unit = "h";

              $recipe_total = floor($recipe_total/60);
            } else {
              $recipe_total_unit = "m";
            }
          ?>
        
          <a href="recipe-main.php?recipe_id=<?php echo $recipe['recipe_id'];?>&origin=category-recipes.php&origin_2=<?php echo $origin;?>&country=<?php echo $country;
            if(isset($_GET['time'])) {
              echo "&time=".$_GET['time'];
            }
            if(isset($_GET['category'])) {
              echo "&category=".$_GET['category'];
            }
            if($search!=NULL) {
              echo "&search=".$search;
            }
            
          ?>" class="category-recipe">
            <div class="category-recipe-img-wrapper">
              <img src="Images/Food/<?php echo $recipe['recipe_id'];?>.png">
            </div>

            <div class="category-recipe-details">
              <p class="category-recipe-servings"><?php echo $recipe['servings'];?> Servings</p>

              <div class="category-recipe-name">
                <h4><?php echo $recipe['recipe_name'];?> 
                <p>&#8226; <?php echo $recipe_total.$recipe_total_unit;?></p></h4>

              </div>

              <div class="category-recipe-rating">
                <?php
                  $rating_star_full = floor($recipe['ratings']);

                  for($i = 0; $i < $rating_star_full; $i++) {
                ?>

                  <img src="Images/Icons/star.svg">

                <?php } 

                  $rating_star_remainder = $recipe['ratings'] - floor($recipe['ratings']);
                
                  if($rating_star_remainder >= 0.7) { ?>

                    <img src="Images/Icons/star-.7.svg">

                <?php } elseif($rating_star_remainder >= 0.5) { ?>

                    <img src="Images/Icons/star-.5.svg">

                <?php } elseif($rating_star_remainder >= 0.3) { ?>

                  <img src="Images/Icons/star-.3.svg">

                <?php } elseif($rating_star_remainder > 0) { ?>

                  <img src="Images/Icons/star-.1.svg">

                <?php } else {} ?>
              </div>

              <div class="category-recipe-about">
                <p><?php echo $recipe['about'];?></p>
                <span>&nbsp;</span>
                <h6>&nbsp;</h6>
              </div>

              <div class="recipe-tags">
              <?php if($country==NULL) { ?>
                  <p><?php echo $recipe['category_country'];?></p>
                <?php } ?>
                <?php if($time==NULL) { ?>
                  <p><?php echo $recipe['category_time'];?></p>
                <?php } ?>
                <?php if($category==NULL) { ?>
                  <p><?php echo $recipe['category_specific'];?></p>
                <?php } ?>
              </div>
            </div>

            <form action="" method="POST" class="recipe-add-to-faves
              <?php
                if($username=="Guest") {
                  echo "guest-disabled";
                }
              ?>
            ">
              <input type="text" value="<?php echo $recipe['recipe_id'];?>" name="recipe_id" hidden>

              <?php
                $recipe_id = $recipe['recipe_id'];
                $query = "SELECT * FROM favorites WHERE recipe_id = '$recipe_id' AND username = '$username'";
                $faves_result = mysqli_query($db, $query);

                if(mysqli_num_rows($faves_result) > 0) { ?>
                  <button name="remove-from-favorites">
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

        <?php } ?>

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

  <div class="sidebar">
    <div class="sidebar-wrapper">
      <div class="sidebar-top-wrapper">
        <div class="sidebar-user">
          <a <?php
              if($username!="Guest") {
                echo "href=\"profile.php\"";
              }
            ?> class="sidebar-user-img-wrapper">
            <img src="Images/Avatars/<?php echo $user['avatar'];?>.svg">
          </a>

          <?php if($username=="Guest") { ?>

            <div class="sidebar-user-name">
              <p><a href="login.php?origin=category-recipes.php&country=<?php echo $country;?>&time=<?php echo $time;?>&category=<?php echo $category;?>&origin_2=<?php echo $origin;
                if(isset($_GET['origin_2'])) {
                  echo "&origin_3=".$_GET['origin_2'];
                }
                if($search!=NULL){
                  echo "&search=".$search;
                }?>">Login</a>/<a href="login.php?signup=yes&origin=category-recipes.php&country=<?php echo $country;?>&time=<?php echo $time;?>&category=<?php echo $category;?>&origin_2=<?php echo $origin;
                if(isset($_GET['origin_2'])) {
                  echo "&origin_3=".$_GET['origin_2'];
                }
                if($search!=NULL){
                  echo "&search=".$search;
                }?>">Signup</a></p>
            </div>

          <?php } else { ?>

            <div class="sidebar-user-name sidebar-user-name-active">
              <a href="profile.php"><?php echo $user['first_name']." ".$user['last_name'];?></a>
              <a href="login.php?origin=category-recipes.php&country=<?php echo $country;?>&time=<?php echo $time;?>&category=<?php echo $category;?>&origin_2=<?php echo $origin;
              if(isset($_GET['origin_2'])) {
                echo "&origin_3=".$_GET['origin_2'];
              }
              if($search!=NULL){
                echo "&search=".$search;
              }?>">Change Account</a>
            </div>
          
          <?php } ?>
        </div>
    
        <?php
          if($username!="Guest") { ?>
            <div class="sidebar-recently-viewed-wrapper">
              <h3>Recently Viewed</h3>

              <?php 
                $query = "SELECT * FROM recently_viewed WHERE username = '$username' ORDER BY id DESC LIMIT 2";
                $recently_viewed = mysqli_query($db, $query);

                if(mysqli_num_rows($recently_viewed)==0) {
              ?>

                  <p><i>You have not viewed any recipe yet.</i></p>
                  <br>

              <?php
                }

                while ($recently_viewed_select = mysqli_fetch_assoc($recently_viewed)) { 
                  $recently_viewed_recipe_id = $recently_viewed_select['recipe_id'];

                  $query = "SELECT * FROM recipes WHERE recipe_id = '$recently_viewed_recipe_id'";
                  $recently_viewed_recipe_select = mysqli_query($db, $query);

                  $recently_viewed_recipe = mysqli_fetch_assoc($recently_viewed_recipe_select);
              ?>

              <a href="recipe-main.php?recipe_id=<?php echo $recently_viewed_recipe['recipe_id'];?>&origin=category-recipes.php&country=<?php echo $country;?>&time=<?php echo $time;?>&category=<?php echo $category;?>&origin_2=<?php echo $origin;
                if(isset($_GET['origin_2'])) {
                  echo "&origin_3=".$_GET['origin_2'];
                }
                if($search!=NULL){
                  echo "&search=".$search;
                }?>" class="sidebar-recently-viewed-recipe">
                <img src="Images/Food/<?php echo $recently_viewed_recipe['recipe_id'];?>.png">
                <div class="sidebar-recently-viewed-recipe-details">
                  <div class="recipe-rating">
                    <img src="Images/Icons/star.svg">
                    <p><?php echo $recently_viewed_recipe['ratings'];?></p>
                  </div>
                  <h6><?php echo $recently_viewed_recipe['recipe_name'];?></h6>
                  <div class="recipe-tags">
                    <p><?php echo $recently_viewed_recipe['category_country'];?></p>
                    <p><?php echo $recently_viewed_recipe['category_time'];?></p>
                    <p><?php echo $recently_viewed_recipe['category_specific'];?></p>
                  </div>
                </div>

                <span>&nbsp;</span>
              </a>

              <?php } ?>

              <hr>
            </div>
        <?php } ?>
      </div>

      <?php if($username!="Guest") { ?>
        <form action="" method="POST">
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