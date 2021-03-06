<?php
    session_start();

    $userID = $_SESSION['userID'];

    //database information
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'swap_information';

    //create the connection with the database
    $conn = new mysqli($servername, $username, $password, $database);

    //query to get select the currenlty logged in user from the database
    $result = $conn->query("SELECT Username, First_name, Last_name, Contact, Address, social_account FROM user_information WHERE User_info_id = $userID");
    //convert the result of the query into an associative array
    $userdata = mysqli_fetch_assoc($result);

    //store each user data in a variable
    $username = $userdata["Username"];
    $firstname = $userdata["First_name"];
    $lastname = $userdata["Last_name"];
    $fullname = $firstname.' '.$lastname;
    $contact = '0'.$userdata["Contact"];
    $address = $userdata["Address"];
    $social = $userdata["social_account"];
?>

<!DOCTYPE html>
<html lang="en">
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./CSS/infoEdit.css"/>
        <link rel="icon" href="./image/white_logo.webp"/> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1fb0c16617.js" crossorigin="anonymous"></script>
        <title>SWAP | Profile</title>
    </head>

    <body>
      <header>
        <nav class="navbar justify-content-center">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <a  style="color: whitesmoke;" class="navbar-brand" href="index.php"><img src="./image/white_logo.webp" alt="logo" >Swap</a>
          </div>

          <div class="input-group col-lg-4 col-md-4 col-sm-12">
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-light" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </div>
          </div>
          
          <div class="col-lg-4 col-md-4 col-sm-12">
            <a id="profile" href="profile.php">Profile</a>
            <a class="ml-4" href="php/logout.php">Log out</a>
          </div>
        </nav>

        <div class="navigationbar">
          <nav class="nav-bar navbar-expand-md navbar-light">
              <div class="container-fluid">
                <button data-toggle="collapse" class="navbar-toggler" data-target="#navbarCollapse"><span class="sr-only">Toggle navigation</span><i class="fa fa-bars" aria-hidden="true" style="color:#e6e6ff"></i></button>
       
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="nav-bar mx-auto">
                   <ul class="nav">
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link" href="index.php">Home</a>
                      </li>
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link" href="posts.php">Posts</a>
                      </li>
                      <li class="nav-item col-lg-4 col-md-4 col-sm-12">
                         <a class="nav-link " href="notifications.php">Notifications</a>
                      </li>
                   </ul>
                </div>
              </div>
              </div>    
          </nav>
        </div>  
      </header>
      
      <main>
        <div class="information-mar">
            <h3>Edit info</h3>
            <div class="editInfo">
                <div class="col-lg-6 col-md-6 col-sm-12 mx-auto">
                    <?php
                      echo "
                      <form action='php/info_edit_db.php' method='post'>
                        <div>
                          <h4 class='firstname_old'>$firstname to: </h4> 
                          <input type='text' placeholder='enter new name' name='firstname' id='firstname_new'>
                        </div>

                        <div>
                            <h4 class='lastname_old'>$lastname to: </h4>
                            <input type='text' placeholder='enter new last name' name='lastname' id='lastname_new'>
                        </div>

                        <div>
                            <h4 class='contact_old'>$contact to: </h4> 
                            <input type='text' placeholder='Enter your 11-digit number' id='contactnumber_new' name='contact' pattern='[0-9].{10}' title='11-digits required'>
                        </div>

                        <div>
                            <h4 class='facebook_old'>$social to: </h4>
                            <input type='text' placeholder='enter new facebook' id='facebook_new' name='facebook' id='facebook_new'>
                        </div>

                        <div class='btn'>
                            <button class='savebtn' type='submit'>Save</button>
                            <a class='cancelbtn' href='profile.php'>Cancel</a> 
                        </div>
                      </form>
                      ";
                    ?>
                </div>
            </div>
        </div>
      </main>
      
      <footer>
        <div id="foots">
        <div class="container-fluid">
          <div class="row mx-auto">
            <div class="col-md-6">
              <h1 class="text-dark">About Us</h1>
              <p class="text-muted">Swap website is created to let our User experience the new way of barter and making sure that they are at ease when using Swap by ensuring their safety, security, and mostly, to give them a convinient service at all times!</p>
            </div>
            <div class="col-md-6">
              <p class="pt-4 text-muted justify-content-center">Swap &copy2020  All Rights Reserved </p>
            </div>
        </div>
        </div>
      </div>
      </footer>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
   </body>
</html>