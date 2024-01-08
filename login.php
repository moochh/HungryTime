<?php
  include('functions.php');

  $origin = $_GET['origin'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login/Signup | HungryTime</title>
  <link rel="icon" href="Images/Others/HungryTime Icon.png">
  <link rel="stylesheet" href="Styles/style.css">

  <script>
    if (window.history.replaceState) {
      window.history.replaceState( null, null, window.location.href );
    }
  </script> 
</head>
<body class="login-body">
  <img src="Images/Others/login.jpg">

  <input type="radio" name="login-panel-trigger" id="login-trigger" hidden checked>
  <input type="radio" name="login-panel-trigger" id="signup-trigger" hidden 
    <?php 
      if(isset($_POST['signup-button'])) {
        echo "checked";
      }

      if(isset($_GET['signup'])) {
        echo "checked";
      }
    ?>
  >

  <form class="login-form" id="login-form" method="POST" action="login.php?origin=<?php echo $origin;
    if(isset($_GET['country'])) {
      if($_GET['country']!=NULL) {
        echo "&country=".$_GET['country'];
      }
    }
    if(isset($_GET['time'])) {
      if($_GET['time']!=NULL) {
        echo "&time=".$_GET['time'];
      }
    }
    if(isset($_GET['category'])) {
      if($_GET['category']!=NULL) {
        echo "&category=".$_GET['category'];
      }
    }
    if(isset($_GET['profile_visit'])) {
      echo "&profile_visit=".$_GET['profile_visit'];
    }
    if(isset($_GET['origin_2'])) {
      echo "&origin_2=".$_GET['origin_2'];
    }
    if(isset($_GET['recipe_id'])) {
      echo "&recipe_id=".$_GET['recipe_id'];
    }
    if(isset($_GET['origin_3'])) {
      echo "&origin_3=".$_GET['origin_3'];
    }
    if(isset($_GET['origin_4'])) {
      echo "&origin_4=".$_GET['origin_4'];
    }
    if(isset($_GET['search'])){
      echo "&search=".$_GET['search'];
    }?>">
    <a href="<?php echo $origin;?>?<?php
        if(isset($_GET['country'])) {
          if($_GET['country']!=NULL) {
            echo "&country=".$_GET['country'];
          }
        }
        if(isset($_GET['time'])) {
          if($_GET['time']!=NULL) {
            echo "&time=".$_GET['time'];
          }
        }
        if(isset($_GET['category'])) {
          if($_GET['category']!=NULL) {
            echo "&category=".$_GET['category'];
          }
        }
        if(isset($_GET['profile_visit'])) {
          echo "&profile_visit=".$_GET['profile_visit'];
        }
        if(isset($_GET['origin_2'])) {
          echo "&origin=".$_GET['origin_2'];
        }
        if(isset($_GET['recipe_id'])) {
          echo "&recipe_id=".$_GET['recipe_id'];
        }
        if(isset($_GET['origin_3'])) {
          echo "&origin_2=".$_GET['origin_3'];
        }
        if(isset($_GET['origin_4'])) {
          echo "&origin_3=".$_GET['origin_4'];
        }
        if(isset($_GET['search'])){
          echo "&search=".$_GET['search'];
        }
      ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
        <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)" fill="#1e1a34"/>
      </svg>

      <p>Back</p>
    </a>

    <?php if($login_success==TRUE) { ?>

      <div class="login-form-main">
        <div class="login-success-notice">
          <h1>Login Successful.</h4>
          <a href="<?php echo $origin;?>?login_notif=yes<?php
              if(isset($_GET['country'])) {
                if($_GET['country']!=NULL) {
                  echo "&country=".$_GET['country'];
                }
              }
              if(isset($_GET['time'])) {
                if($_GET['time']!=NULL) {
                  echo "&time=".$_GET['time'];
                }
              }
              if(isset($_GET['category'])) {
                if($_GET['category']!=NULL) {
                  echo "&category=".$_GET['category'];
                }
              }
              if(isset($_GET['profile_visit'])) {
                echo "&profile_visit=".$_GET['profile_visit'];
              }
              if(isset($_GET['origin_2'])) {
                echo "&origin=".$_GET['origin_2'];
              }
              if(isset($_GET['recipe_id'])) {
                echo "&recipe_id=".$_GET['recipe_id'];
              }
              if(isset($_GET['origin_3'])) {
                echo "&origin_2=".$_GET['origin_3'];
              }
              if(isset($_GET['origin_4'])) {
                echo "&origin_3=".$_GET['origin_4'];
              }
              if(isset($_GET['search'])){
                echo "&search=".$_GET['search'];
              }
            ?>
          ">Start Exploring</a>
        </div>

      </div>

    <?php } else { ?>

    <div class="login-form-main">
      <p>Welcome To HungryTime</p>
      <h1>LOGIN</h1>

      <div class="login-input-wrapper">
        <input type="text" id="email" name="email" required
          <?php
            if($login_fail==TRUE ) {
              echo "value=".$email;
            }
          ?>
        >
        <label for="email">Email or Username</label>
        <?php if($login_error_email==TRUE) { ?>
          <div class="login-error-notice">
            <p>!</p>
            <div class="login-error-notice-info">Email or username does not exist.</div>
          </div>
        <?php } ?>
      </div>
      <div class="login-input-wrapper">
        <input type="password" name="password" id="password" required>
        <label for="password">Password</label>

        <?php if($login_error_password==TRUE) { ?>
          <div class="login-error-notice">
            <p>!</p>
            <div class="login-error-notice-info">Password is incorrect.</div>
          </div>
        <?php } ?>
      </div>

      <button class="login-button" name="login-button">Login</button>
    </div>

    <?php } ?>

    <div class="login-form-footer">
      <div class="login-form-footer-row">
        <p>Don't have an account?</p>
        <label for="signup-trigger" class="login-yellow-label">Sign Up</label>
      </div>

      <div class="login-form-footer-row">
        <a href="Documents/HungryTime Terms of Use.pdf" download>Terms of Use</a>
        <p>&#8226;</p>
        <a href="Documents/HungryTime Privacy Policy.pdf" download>Privacy Policy</a>
      </div>
    </div>
  </form>

  <form class="login-form" id="signup-form" action="login.php?origin=<?php echo $origin;
    if(isset($_GET['country'])) {
      if($_GET['country']!=NULL) {
        echo "&country=".$_GET['country'];
      }
    }
    if(isset($_GET['time'])) {
      if($_GET['time']!=NULL) {
        echo "&time=".$_GET['time'];
      }
    }
    if(isset($_GET['category'])) {
      if($_GET['category']!=NULL) {
        echo "&category=".$_GET['category'];
      }
    }
    if(isset($_GET['profile_visit'])) {
      echo "&profile_visit=".$_GET['profile_visit'];
    }
    if(isset($_GET['origin_2'])) {
      echo "&origin_2=".$_GET['origin_2'];
    }
    if(isset($_GET['recipe_id'])) {
      echo "&recipe_id=".$_GET['recipe_id'];
    }
    if(isset($_GET['origin_3'])) {
      echo "&origin_3=".$_GET['origin_3'];
    }
    if(isset($_GET['search'])){
      echo "&search=".$_GET['search'];
    }?>" method="POST">
    <a href="<?php echo $origin;?>?<?php
        if(isset($_GET['country'])) {
          if($_GET['country']!=NULL) {
            echo "&country=".$_GET['country'];
          }
        }
        if(isset($_GET['time'])) {
          if($_GET['time']!=NULL) {
            echo "&time=".$_GET['time'];
          }
        }
        if(isset($_GET['category'])) {
          if($_GET['category']!=NULL) {
            echo "&category=".$_GET['category'];
          }
        }
        if(isset($_GET['profile_visit'])) {
          echo "&profile_visit=".$_GET['profile_visit'];
        }
        if(isset($_GET['origin_2'])) {
          echo "&origin=".$_GET['origin_2'];
        }
        if(isset($_GET['recipe_id'])) {
          echo "&recipe_id=".$_GET['recipe_id'];
        }
        if(isset($_GET['origin_3'])) {
          echo "&origin_2=".$_GET['origin_3'];
        }
        if(isset($_GET['origin_4'])) {
          echo "&origin_3=".$_GET['origin_4'];
        }
        if(isset($_GET['search'])){
          echo "&search=".$_GET['search'];
        }
      ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
        <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)" fill="#1e1a34"/>
      </svg>

      <p>Back</p>
    </a>

    <?php if($signup_success==TRUE) { ?>

      <div class="login-form-main">
        <div class="login-success-notice">
          <h1>Account Created.</h4>
          <a href="intro.html">Start Exploring</a>
        </div>

      </div>

    <?php } else { ?>

    <div class="login-form-main">
      <p>Welcome To HungryTime</p>
      <h1>SIGN UP</h1>

      <input type="radio" name="signup-form-progress-trigger" id="signup-1-trigger" hidden checked>
      <input type="radio" name="signup-form-progress-trigger" id="signup-2-trigger" hidden>
      <input type="radio" name="signup-form-progress-trigger" id="signup-3-trigger" hidden>

      <div class="signup-input-container" id="signup-input-container-1">
        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-1">
          <input type="text" id="first_name" name="first_name" required
            <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['first_name'];
              }
            ?>>
          <label for="first_name">First Name</label>

          <?php if($signup_error_first_name==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Name must not contain any number or special character.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-2">
          <input type="text" id="desc_1" name="desc_1" required 
          <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['desc_1'];
              }
            ?>>
          <label for="desc_1">Describe yourself in 1 word</label>

          <?php if($signup_error_desc_1==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Maximum of 1 word only.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-3">
          <input type="email" id="email_input" name="email" required
          <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['email'];
              }
            ?>>
          <label for="email_input">Email</label>

          <?php if($signup_error_email==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">This email already has an account.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-spaceholder">
          <input type="text" id="first_name">
          <label for="first_name">First Name</label>
        </div>
      </div>

      <div class="signup-input-container" id="signup-input-container-2">
        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-1">
          <input type="text" id="last_name" name="last_name" required
          <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['last_name'];
              }
            ?>>
          <label for="last_name">Last Name</label>

          <?php if($signup_error_last_name==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Name must not contain any number or special character.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-2">
          <input type="text" id="desc_2" name="desc_2" required
          <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['desc_2'];
              }
            ?>>
          <label for="desc_2">Describe yourself in 1 word</label>

          <?php if($signup_error_desc_2==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Maximum of 1 word only.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-3">
          <input type="password" id="password_1" name="password" required>
          <label for="password_1">Password</label>

          <?php if($signup_error_password_requirements==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Password must contain at least 6 chars (max. 20 chars), an uppercase letter, and a number.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-spaceholder">
          <input type="text" id="first_name">
          <label for="first_name">First Name</label>
        </div>
      </div>

      <div class="signup-input-container" id="signup-input-container-3">
        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-1">
          <input type="text" id="username" name="username" required
          <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['username'];
              }
            ?>>
          <label for="username">Username</label>

          <?php if($signup_error_username==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Username already exists.</div>
            </div>
          <?php } ?>

          <?php if($signup_error_username_length==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Username must contain at least 6 chars (max. 14 chars).</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-2">
          <input type="text" id="desc_3" name="desc_3" required
          <?php
              if($signup_error == TRUE) {
                echo "value=".$_POST['desc_3'];
              }
            ?>>
          <label for="desc_3">Describe yourself in 1 word</label>

          <?php if($signup_error_desc_3==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Maximum of 1 word only.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-wrapper-3">
          <input type="password" id="password_confirm" name="password_confirm" required>
          <label for="password_confirm">Confirm Password</label>

          <?php if($signup_error_password==TRUE) { ?>
            <div class="login-error-notice">
              <p>!</p>
              <div class="login-error-notice-info">Passwords do not match.</div>
            </div>
          <?php } ?>
        </div>

        <div class="login-input-wrapper signup-input-wrapper signup-input-spaceholder">
          <input type="text" id="first_name">
          <label for="first_name">First Name</label>
        </div>

        <label for="signup-2-trigger" class="signup-next-button" id="signup-2-trigger-button">Next

          <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
            <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)"/>
          </svg>

        </label>
        <label for="signup-1-trigger" class="signup-next-button signup-back-button" id="signup-1-trigger-button">
          <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
            <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)"/>
          </svg>
        
          Back
        </label>
        <label for="signup-3-trigger" class="signup-next-button" id="signup-3-trigger-button">Next

          <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
            <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)"/>
          </svg>
        </label>
        <label for="signup-2-trigger" class="signup-next-button signup-back-button" id="signup-2-trigger-button-back">
          <svg xmlns="http://www.w3.org/2000/svg" width="32.032" height="55.057" viewBox="0 0 32.032 55.057">
            <path id="Path_6" data-name="Path 6" d="M50.7,32.032a4.392,4.392,0,0,1-3.1-1.288L27.418,10.567,7.242,30.743a4.392,4.392,0,0,1-6.179-6.208L24.314,1.285a4.392,4.392,0,0,1,6.208,0L53.772,24.535a4.392,4.392,0,0,1-3.075,7.5Z" transform="translate(32.032) rotate(90)"/>
          </svg>
        
          Back
        </label>
        <button class="login-button signup-button" name="signup-button">Sign Up</button>
      </div>
    </div>

    <?php } ?>

    <div class="login-form-footer">
      <div class="login-form-footer-row">
        <p>Already have an account?</p>
        <label for="login-trigger" class="login-yellow-label">Login</label>
      </div>

      <div class="login-form-footer-row">
        <a href="Documents/HungryTime Terms of Use.pdf" download>Terms of Use</a>
        <p>&#8226;</p>
        <a href="Documents/HungryTime Privacy Policy.pdf" download>Privacy Policy</a>
      </div>
    </div>
  </form>
</body>
</html>