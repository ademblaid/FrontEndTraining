<?php
require "php/db_connection.php";
require "php/function.php";
$jobId = $_GET['job_id'];  // Replace with how you retrieve the job_id
$jobDetails = getJobDetailsById($jobId, $conn);

if (!$jobDetails) {
  echo "Job not found.";
} 

$addedTimestamp = $jobDetails['added_date'];
$formattedTime = formatTimeAgo($addedTimestamp);



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Finding</title>
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
        <a href="poste-remote-job.php">Post Jobs</a>
      </nav>
    </div>
  </header>
  <!-- end header -->

  <!-- start introduction -->
  <div class="introduction">
    <div class="container">
      <p><span>Home</span> / <span> <?php echo $jobDetails['category'] ;?></span> / <?php echo  $jobDetails['name'] ;?>
      </p>
    </div>
  </div>
  <!-- end introduction -->

  <!-- start content -->
  <div class="remote-tips">
    <div class="container">
      <div class="main-content detail-page">
        <div class="detail-content">


          <h2><?php echo $jobDetails['job_name'] ;?> at <?php echo $jobDetails['name']; ?></h2>
          <ul>
            <li><span>Location:</span> <?php echo $jobDetails['location'] ;?> </li>
            <li><span>Salary:</span> <?php echo $jobDetails['salary'] ;?> k a year</li>
            <li><span>Posted:</span> <?php echo $formattedTime; ?>| <span
                class="tags"><?php echo $jobDetails['job_tags'] ;?></span> | <span class="tags">high-paying</span></li>
          </ul>
          <hr>
          <p>Title: <?php echo $jobDetails['job_name'] ;?></p>
          <p>Location: <?php echo $jobDetails['location'] ;?></p>
          <?php echo $jobDetails['job_description'] ;?>
          <a href="<?php echo $jobDetails['job_post_link'] ;?>">Apply for job</a>
          <a href="remote-jobs.php">See All Edition Jobs ></a>
        </div>
        <a href="sign-up.php">Sign up for daily remote job alerts ></a>
      </div>

      <aside>
        <a href="poste-remote-job.html">Post Remote Jobs ></a>
        <div class="q&a-section">
          <a href="#">remote companies q&a</a>
          <a href="#">remote workers q&a</a>
          <a href="#">remote articles</a>
          <a href="#">remote jobs</a>
        </div>
        <div class="folow-us">
          Folow Us: <a href="#"><i class="fa-brands fa-facebook"></i></a> <a href="#"><i
              class="fa-brands fa-linkedin"></i></a>
          <a href="#"><i class="fa-brands fa-twitter"></i></a>
        </div>
        <div class="news-letter">
          <p>Sign Up for Our Weekly Fresh Jobs Newsletter</p>
          <form action="php/handel-newsletter.php" method="POST">
            <div>
              <label for="name">First Name</label>
              <input type="text" name="name">
            </div>
            <div>
              <label for="email">Email Address</label>
              <input type="email" name="email">
            </div>
            <p>What Type of jobs?</p>
            <div>
              <input type="checkbox" name="job-type[]" value="Technology">
              <label for="Technology">Technology</label>
            </div>
            <div>
              <input type="checkbox" name="job-type[]" value="General">
              <label for="General">General</label>
            </div>
            <input type="submit" value="Subscribe">
          </form>
        </div>
        <div class="articles">
          <h2>Popular</h2>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="#">5 Things Remote Employees Need for a Productive Career</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="#">Distractions While Working from Home</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="#">Remote Workers Share How They Embrace Spring</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="#">Working from Home When Your Kids Are Out of School</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="#">What Are QA Jobs? How to Land a Remote Position in QA</a>
          </div>

        </div>
      </aside>
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