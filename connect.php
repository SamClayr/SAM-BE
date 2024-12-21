<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "corememories";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM islandcontents WHERE color = '#C4D199'";
$result = $conn->query($sql);

$contents = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $contents[] = '<img src="' . $row['image'] . '" style="width:100%">';
  }
} else {
  echo "No records found.";
}


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM islandcontents WHERE color = '#82C293'";
$result = $conn->query($sql);

$contents2 = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $contents2[] = '<img src="' . $row['image'] . '" style="width:100%">';
  }
} else {
  echo "No records found.";
}

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM islandcontents WHERE color = '#655C9E'";
$result = $conn->query($sql);

$contents3 = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Store each image in the array
    $contents3[] = '<img src="' . $row['image'] . '" style="width:100%">';
  }
} else {
  echo "No records found.";
}

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM islandcontents WHERE color = '#FF85A5'";
$result = $conn->query($sql);

$contents4 = [];

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {

    $contents4[] = '<img src="' . $row['image'] . '" style="width:100%">';
  }
} else {
  echo "No records found.";
}

$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
  <title>W3.CSS Template</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="⁦https://www.w3schools.com/w3css/4/w3.css⁩">
  <link rel="stylesheet" href="⁦https://fonts.googleapis.com/css?family=Montserrat⁩">
  <link rel="stylesheet" href="⁦https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css⁩">
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
      font-family: "Montserrat", sans-serif
    }

    .w3-row-padding img {
      margin-bottom: 12px
    }

    .w3-sidebar {
      width: 120px;
      background: #222;
    }

    #main {
      margin-left: 120px
    }

    @media only screen and (max-width: 600px) {
      #main {
        margin-left: 0
      }
    }
  </style>
</head>

<body class="w3-black">


  <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

    <img src="/w3images/avatar_smoke.jpg" style="width:100%">
    <a href="#" class="w3-bar-item w3-button w3-padding-large w3-black">
      <i class="fa fa-home w3-xxlarge"></i>
      <p>FRIENDSHIP</p>
    </a>
    <a href="#about" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-user w3-xxlarge"></i>
      <p>PASSION</p>
    </a>
    <a href="#photos" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-eye w3-xxlarge"></i>
      <p>ADVENTURE</p>
    </a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-envelope w3-xxlarge"></i>
      <p>FAMILY</p>
    </a>
  </nav>


  <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="#" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
      <a href="#about" class="w3-bar-item w3-button" style="width:25% !important">ABOUT</a>
      <a href="#photos" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
      <a href="#contact" class="w3-bar-item w3-button" style="width:25% !important">CONTACT</a>
    </div>
  </div>


  <div class="w3-padding-large" id="main">
    <!-- Friendship -->
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
      <h1 class="w3-jumbo"><span class="w3-hide-small">FRIENDSHIP ISLAND</h1>
    </header>
    <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
      <h2 class="w3-text-light-grey">Friendship Island</h2>
      <hr style="width:200px" class="w3-opacity">
      <p>Represents the strong connections and bonds you’ve built with the people who bring joy, trust, and support into your life. It’s where memories of shared laughter, adventures, and heartfelt conversations reside. This island reflects the value you place on loyalty, understanding, and the mutual growth that comes from meaningful relationships. Whether it’s old friends or new ones, this island thrives on the moments that strengthen these ties.
      </p>


      <div class="w3-padding-64 w3-content" id="photos">
        <h2 class="w3-text-light-grey">Photos</h2>
        <hr style="width:200px" class="w3-opacity">


        <div class="w3-row-padding" style="margin:0 -16px">
          <div class="w3-half">
            <?php

            foreach ($contents as $content) {
              echo $content;
            }
            ?>
          </div>

          <div class="w3-half">

          </div>
        </div>
      </div>


      <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
        <h1 class="w3-jumbo"><span class="w3-hide-small">PASSION ISLAND</h1>
      </header>
      <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
        <h2 class="w3-text-light-grey">Passion Island</h2>
        <hr style="width:200px" class="w3-opacity">
        <p>Is where my creativity and self-expression come to life, driven by my love for dancing. It’s a place that holds snapshots of my journey—whether I’m performing on stage, practicing in the studio, or just dancing for the joy of it. This island reflects how dancing fuels my energy, fills me with happiness, and lets me connect with myself and others in the most vibrant way.
        </p>


        <div class="w3-padding-64 w3-content" id="photos">
          <h2 class="w3-text-light-grey">Photos</h2>
          <hr style="width:200px" class="w3-opacity">


          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <?php

              foreach ($contents2 as $content) {
                echo $content;
              }
              ?>
            </div>

            <div class="w3-half">

            </div>
          </div>
        </div>


        <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
          <h1 class="w3-jumbo"><span class="w3-hide-small">ADVENTURE ISLAND</h1>
        </header>
        <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
          <h2 class="w3-text-light-grey">Adventure Island</h2>
          <hr style="width:200px" class="w3-opacity">
          <p>Adventure Island is all about my love for trying new things and exploring the world. It’s filled with memories of fun trips, exciting activities, and times when I stepped out of my comfort zone. This island shows my curiosity and the happiness I feel when I discover something new or go on an adventure. It’s a place full of stories and special moments.
          </p>


          <div class="w3-padding-64 w3-content" id="photos">
            <h2 class="w3-text-light-grey">Photos</h2>
            <hr style="width:200px" class="w3-opacity">


            <div class="w3-row-padding" style="margin:0 -16px">
              <div class="w3-half">
                <?php

                foreach ($contents3 as $content) {
                  echo $content;
                }
                ?>
              </div>

              <div class="w3-half">

              </div>
            </div>
          </div>


          <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
            <h1 class="w3-jumbo"><span class="w3-hide-small">FAMILY ISLAND</h1>
          </header>
          <div class="w3-content w3-justify w3-text-grey w3-padding-64" id="about">
            <h2 class="w3-text-light-grey">Family Island</h2>
            <hr style="width:200px" class="w3-opacity">
            <p>Family Island is where the love and support of my family shine. It’s filled with memories of happy moments, traditions, and times when we stood by each other. This island shows how much my family means to me and reminds me of the strength and joy we share together. It’s a place where I feel safe, loved, and connected.
            </p>


            <div class="w3-padding-64 w3-content" id="photos">
              <h2 class="w3-text-light-grey">My Photos</h2>
              <hr style="width:200px" class="w3-opacity">


              <div class="w3-row-padding" style="margin:0 -16px">
                <div class="w3-half">
                  <?php

                  foreach ($contents4 as $content) {
                    echo $content;
                  }
                  ?>
                </div>

                <div class="w3-half">

                </div>
              </div>
            </div>


            <footer class="w3-content w3-padding-64 w3-text-grey w3-xlarge">
              <i class="fa fa-facebook-official w3-hover-opacity"></i>
              <i class="fa fa-instagram w3-hover-opacity"></i>
              <i class="fa fa-snapchat w3-hover-opacity"></i>
              <i class="fa fa-pinterest-p w3-hover-opacity"></i>
              <i class="fa fa-twitter w3-hover-opacity"></i>
              <i class="fa fa-linkedin w3-hover-opacity"></i>
              <p class="w3-medium">Powered by <a href="⁦https://www.w3schools.com/w3css/default.asp⁩" target="_blank" class="w3-hover-text-green">w3.css</a></p>
            </footer>

          </div>

</body>

</html>