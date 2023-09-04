<?php
require 'php/db_connection.php'; // Adjust the path as needed
require 'php/function.php'; // Adjust the path as needed

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remote Jobs</title>
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
          <li><a class="active" href="remote-jobs.php">All JOBS</a></li>
          <li><a href="remote-comanies.php">All COMPANIES</a></li>
          <li><a href="remote-work-resources.php">All Work RESOURCES</a></li>
        </ul>
        <a href="sign-up.php"><i class="far fa-envelope fa-lg"></i></a>
        <a href="poste-remote-job.php">Post Jobs</a>
      </nav>
    </div>
  </header>
  <!-- end header -->

  <!-- start landing -->
  <div class="landing remote-jobs">
    <div class="container">
      <h1>All Jobs</h1>
    </div>
  </div>
  <!-- end landing -->

  <!-- start introduction -->
  <div class="introduction">
    <div class="container">
      <p><span>Home</span> / Remote Jobs</p>
      <p>Looking for a remote job as a developer, customer service rep, recruiter, designer or sales professional?
        Browse openings in those categories and more below. We hand curate this list to showcase the best remote job
        opportunities in the most recruited job categories. Find a remote job here to launch your work anywhere career.
      </p>
      <div class="search">
        <form action="#">
          <input type="text" name="search" placeholder="Keyword, Company Name, etc...">
          <input type="submit" value="Search jobs">
        </form>
        <div class="keywords">
          <ul>
            <li><a href="#">All</a></li>
            <li><a href="#">Accounting</a></li>
            <li><a href="#">Customer Service</a></li>
            <li><a href="#">Data Entry</a></li>
            <li><a href="#">+</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- end introduction -->

  <!-- start content -->
  <div class="remote-tips">
    <div class="container">
      <div class="main-content remote-jobs">
        <?php
$limit = isset($_GET['limit']) ? $_GET['limit'] : 3; // Default limit is 3
$jobsData = getJobsDataByLimit($conn, $limit);
 // Assuming you have a function to get all jobs data

$categories = array(); // Initialize an array to store unique categories

foreach ($jobsData as $row) {
    $category = $row['category'];
    if (!in_array($category, $categories)) {
        $categories[] = $category; // Store unique categories
    }
}

foreach ($categories as $category) {
    echo '<div class="box1 ' . strtolower($category) . '-jobs">';
    echo '    <div class="heading">';
    echo '        <h2> ' . $category . ' </h2>';
    echo '        <div></div>';
    echo '    </div>';
    echo '    <div class="content">';
    
    foreach ($jobsData as $row) {
        if ($row['category'] === $category) {
            $addedTimestamp = $row['added_date'];
            $formattedTime = formatTimeAgo($addedTimestamp);

            echo '        <a href="job_detail.php?job_id=' . $row['job_id'] .'" class="line">';
            echo '            <div class="job-info">';
            echo '                <img src="' . $row['photo'] . '" alt="">';
            echo '                <div class="info">';
            echo '                    <h3>' . $row['job_name'] . '</h3>';
            echo '                    <p><span>' . $row['company_name_in_post'] . '</span><span>' . $row['job_tags'] . '</span></p>';
            echo '                </div>';
            echo '            </div>';
            echo '            <div class="time">';
            echo '                <p>' . $formattedTime . '</p>';
            echo '            </div>';
            echo '        </a>';
        }
    }

    echo '         <div class="line">';
    echo '            <a href="display-all-jobs.php?category=' . strtolower($category) . '&limit=10" class="see-jobs-button">See All ' . $category . ' Jobs ></a>';
    echo '        </div>';    
    echo '    </div>';
    echo '</div>';
}

mysqli_close($conn);
?>

      </div>

      <aside>
        <a href="poste-remote-job.php">Post Remote Jobs ></a>
        <div class="q&a-section">
          <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
            Companies Q&A</a>
          <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
            Workers Q&A</a>
          <a href="remote-work-resources.php">remote articles</a>
          <a href="remote-jobs.php">remote jobs</a>
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
            <a href="article.php" class="article-link"
              data-title="<h1>Job Market Chronicles: Exploring Careers in the Post-Pandemic Era</h1>">
              Job Market Chronicles: Exploring Careers in the Post-Pandemic Era</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="article.php" class="article-link"
              data-title="<h1>Unlocking Your Career Potential: Strategies for Professional Growth</h1>">
              Unlocking Your Career Potential: Strategies for Professional Growth</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="article.php" class="article-link"
              data-title="<h1>The Gig Economy Unveiled: Thriving in the World of Freelance Work</h1>">
              The Gig Economy Unveiled: Thriving in the World of Freelance Work</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="article.php" class="article-link"
              data-title="<h1>Workplace Wellness: Balancing Job Satisfaction and Career Success</h1>">
              Workplace Wellness: Balancing Job Satisfaction and Career Success</a>
          </div>
          <div>
            <img src="images/5-things-remote-work-150x150.png" alt="">
            <a href="article.php" class="article-link"
              data-title="<h1>Job Hopping or Career Climbing? Deciphering the New Work Ethic</h1>">
              Job Hopping or Career Climbing? Deciphering the New Work Ethic</a>
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
  <script>
  const articleLinks = document.querySelectorAll('.article-link');

  articleLinks.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default link behavior
      const articleTitle = this.getAttribute('data-title');
      window.location.href = 'article.php?title=' + encodeURIComponent(articleTitle);
    });
  });
  </script>

</body>

</html>