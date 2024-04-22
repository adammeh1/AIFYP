<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="style-review.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"  crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Kumbh+Sans:wght@400;700&display=swap"  rel="stylesheet" />
    <style>
       
    </style>
</head>
<body>

    <!-- header section here  -->
    <header class="header">
      <div class="header__container">
        <a href="./index.html" id="header__logo"><i class="fas fa-robot"></i>AI</a>
        <div class="header__toggle" id="header-mobile-menu">
          <span class="hamBar"></span> <span class="hamBar"></span>
          <span class="hamBar"></span>
        </div>
        <ul class="header__menu">
          <li class="header__item">
            <a href="../index.html" class="header__links">Home</a>
          </li>
          <li class="header__item">
            <a href="../test-1.html" class="header__links">RealWorld</a>
          </li>
          <li class="header__item">
            <a href="../test-2.html" class="header__links">Ethics</a>
          </li>
          <li class="header__item">
            <a href="#" class="header__links">Review</a>
          </li>
          <li class="header__btn"><a href="../quiz.html" class="button">QUIZ</a></li>
        </ul>
      </div>
    </header>
    <!-- header section here  -->

    <div class="containerNew">

        <h2>Submit a Review</h2>
        <form action="submit.php" method="post">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" required></textarea><br>
            <label for="rating">Rating (1-5):</label><br>
            <input type="number" id="rating" name="rating" min="1" max="5" required><br>
            <input type="submit" value="Submit">
        </form>


        <br> <br>

        <h1>Reviews</h1>
        <ul>
            <?php
                // Connect to MySQL database
                $db = mysqli_connect("localhost", "root", "", "reviews");

                // Check connection
                if (!$db) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Fetch reviews from the database
                $query = "SELECT * FROM reviews ORDER BY created_at DESC";

                $result = mysqli_query($db, $query);

                if (mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<li>";
                        echo "<h3>" . $row['title'] . "</h3>";
                        echo "<p>" . $row['content'] . "</p>";
                        echo "<p class='rating'>";
                        for ($i = 1; $i <= 5; $i++) {
                            if ($i <= $row['rating']) {
                                echo "<span>&#9733;</span>"; // Filled star
                            } else {
                                echo "<span>&#9734;</span>"; // Empty star
                            }
                        }
                        echo "</p>";
                        echo "</li>";
                    }
                } else {
                    echo "<li>No reviews yet.</li>";
                }

                mysqli_close($db);
            ?>
        </ul>

    </div>


        <!-- Footer Section -->
        <div class="footerSection">
      <div class="footerInnerLinks">
        <div class="footerInnerWrapper">
          <div class="footerLinks">
            
          <div class="footerLinks">
            <h2>Social Media</h2>
            <a href="#">Instagram</a> <a href="/">Facebook</a>
            <a href="#">Youtube</a> <a href="/">Twitter</a>
          </div>
        </div>
      </div>
      <section class="socialSection">
        <div class="socialSectionInner">
          <div class="footerLogo">
            <a href="#" id="footerLogo"><i class="fas fa-robot">  </i>AI</a>
          </div>
          <p class="copyRight">© AI 2024. All rights reserved</p>
          <div class="footerSocial">
            <a class="footerSocialLinks" href="#" target="_blank" aria-label="Facebook" >
              <i class="fab fa-facebook"></i>
            </a>
            <a class="footerSocialLinks" href="#" target="_blank" aria-label="Instagram" >
              <i class="fab fa-instagram"></i>
            </a>
            <a class="footerSocialLinks" href="#" target="_blank" aria-label="Youtube" >
              <i class="fab fa-youtube"></i>
            </a>
            <a class="footerSocialLinks" href="#" target="_blank" aria-label="Twitter" >
              <i class="fab fa-twitter"></i>
            </a>
            <a class="footerSocialLinks" href="#" target="_blank" aria-label="LinkedIn" >
              <i class="fab fa-linkedin"></i>
            </a>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- Footer Section -->
 
    <script src="../app.js"></script>
</body>
</html>
