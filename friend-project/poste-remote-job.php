<?php
require 'php/db_connection.php'; // Include the database connection code
require "php/function.php";
// Your HTML and PHP content here
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Remote Jobs</title>
  <!-- web font css file -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- normalize css file -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- main css styling -->
  <link rel="stylesheet" href="css/style.css">
  <!-- google font styles -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Tajawal:wght@200;300;400;500;700;800;900&family=Work+Sans:wght@200;400;500;700;800&display=swap"
    rel="stylesheet">
  <style>

  </style>
</head>

<body>
  <!-- start header -->
  <header>
    <div class="container">
      <a href="index.php" class="logo">
        <img src="images/find-me-a-job-logo.png" alt="">
      </a>
      <nav>
        <ul>
          <li><a href="remote-jobs.php">All JOBS</a></li>
          <li><a href="remote-comanies.php">All COMPANIES</a></li>
          <li><a href="remote-work-resources.php">All Work RESOURCES</a></li>
        </ul>
        <a href="sign-up.php"><i class="far fa-envelope fa-lg"></i></a>
        <a href="poste-remote-job.php">Post A Jobs</a>
      </nav>
    </div>
  </header>
  <!-- end header -->

  <!-- start landing -->
  <div class="landing-post-remote-jobs">
    <div class="container">
      <h1>All Things Remote Work</h1>
      <a href="post-remote-job-formela.php">post A job!</a>
    </div>
  </div>
  <!-- end landing -->

  <!-- after landing start-->
  <div class="after-landing">
    <div class="container">
      <img src="images/press.png" alt="">
    </div>
  </div>
  <!-- after landing end -->

  <!-- start content -->
  <div class="post-content">
    <div class="container">
      <div class="first">
        <h1>Why Post on Find Me a job</h1>
        <p>The Remote.co job board is exlusively for remote jobs. Job posts are free for qualifying companies. If you
          have any questions please <a href="#">contact</a></p>
        <div class="content">
          <div>
            <h3>Targeted</h3>
            <i class="fa fa-fw fa-5x fa-bullseye"></i>
            <p>We only list remote jobs. Save time by focusing on remote condidates.</p>
            <a href="#">learn more +</a>
          </div>
          <div>
            <h3>easy</h3>
            <i class="fa fa-fw fa-5x fa-check-circle"></i>
            <p>Post a job in 60 seconds. Need a hand? <a href="#">Contact us.</a></p>
            <a href="#">learn more +</a>
          </div>
        </div>
        <a href="post-remote-job-formela.php" class="post-a-remote-job-button">Post a job!</a>
      </div>
    </div>
  </div>

  <div class="secend">
    <div class="container">
      <h3>Used by leading remote friendly companies:</h3>
      <div>
        <?php
                    // Call the function with the connection and desired limit
                    $limit = 15;
                    $result = getCompanyData($conn, $limit);

                    $companyData = array();
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $companyData[] = $row;
                        }
                        foreach ($companyData as $company) {
                        $imagePath = $company['photo'];
                        echo '<img src=" ' . $imagePath . '" alt="' . $company['name'] . '">';
                    }
                    }else {
                      echo 'No data available.';
                  }
                    // Close the database connection
                  
                    ?>
      </div>
      <p>"remote.co helped us find just the right condidate -
        I won't hestate to post open positions in the future!</p>
    </div>
  </div>

  <div class="thered">
    <div class="container">
      <a href="post-remote-job-formela.php" class="post-a-remote-job-button">Post A Jobs!</a>
    </div>

  </div>
  <!-- end content -->

  <!-- start footer -->
  <div class="footer">
    <div class="container">
      <div class="footer-content">

        <div>
          <h3>Meet FindMeaJob.co</h3>
          <ul>
            <li><a href="#">About & contact press & media</a></li>
            <li><a href="#">The Mobile Minds Project</a></li>
          </ul>
        </div>

        <div>
          <div>
            <h3>Work Q&A</h3>
            <ul>
              <li>
                <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
                  Companies Q&A</a>
              </li>
              <li>
                <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
                  Workers Q&A</a>
              </li>
              <li><a href="remote-work-resources.php">Jobs articles</a></li>
              <li><a href="remote-jobs.php">All jobs</a></li>
            </ul>
          </div>

          <div>
            <h3>remote work Q&A</h3>
            <ul>
              <li>
                <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
                  Companies Q&A</a>
              </li>
              <li>
                <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
                  Workers Q&A</a>
              </li>
              <li><a href="remote-work-resources.php">Jobs articles</a></li>
              <li><a href="remote-jobs.php">All jobs</a></li>
            </ul>
          </div>

        </div>

        <div>
          <h3>remote work Q&A</h3>
          <ul>
            <li>
              <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
                Companies Q&A</a>
            </li>
            <li>
              <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
                Workers Q&A</a>
            </li>
            <li><a href="remote-work-resources.php">Jobs articles</a></li>
            <li><a href="remote-jobs.php">All jobs</a></li>
          </ul>
        </div>

        <div>
          <h3>remote work Q&A</h3>
          <ul>
            <li>
              <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
                Companies Q&A</a>
            </li>
            <li>
              <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
                Workers Q&A</a>
            </li>
            <li><a href="remote-work-resources.php">Jobs articles</a></li>
            <li><a href="remote-jobs.php">All jobs</a></li>
          </ul>
        </div>

        <div>
          <h3>remote work Q&A</h3>
          <ul>
            <li>
              <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
                Companies Q&A</a>
            </li>
            <li>
              <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
                Workers Q&A</a>
            </li>
            <li><a href="remote-work-resources.php">Jobs articles</a></li>
            <li><a href="remote-jobs.php">All jobs</a></li>
          </ul>
        </div>

      </div>
    </div>
  </div>
  <!-- end footer -->

  <!-- start policy -->
  <div class="policy">
    <div class="container">
      2015-2023 FindMeaJob.co | <a href="#">TOS & Privacy Policy</a>
    </div>
  </div>
  <!-- end policy -->
</body>

</html>