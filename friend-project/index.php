<?php
require 'php/db_connection.php'; // Include the database connection code
require "php/function.php";

$query = "
    WITH NumberedJobs AS (
        SELECT
            jp.category,
            jp.added_date,
            jp.job_name,
            c.photo,
            c.name AS company_name_in_post,
            ROW_NUMBER() OVER (PARTITION BY jp.category ORDER BY jp.added_date DESC) AS row_num
        FROM
            job_post jp
        JOIN
            company c ON jp.company_id = c.company_id
        WHERE
            c.accepted = 'yes'
    )
    SELECT
        category,
        added_date,
        job_name,
        photo,
        company_name_in_post
    FROM
        NumberedJobs
    WHERE
        row_num = 1;
";


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

  <!-- start landing -->
  <div class="landing">
    <div class="container">
      <h1>All Things Remote Work</h1>
      <ul>
        <li>Learn About Remote Work</li>
        <li>Find Jobs</li>
        <li>Post Job</li>
      </ul>
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
  <div class="remote-tips">
    <div class="container">
      <div class="main-content">
        <!-- first box -->
        <div class="tips">
          <div class="heading">
            <h2>Companies Share Tips</h2>
            <div></div>
          </div>
          <p>35 leading companies and virtual teams answer your
            top questions about work.</p>
          <div class="qst-comp">
            <div class="qst-comp-container">
              <div class="qst">
                <h2>30    Questions</h2>
                <a href="article.php" class="article-link"
                  data-title="<h1>Tech Transformation: How Technology is Reshaping Job Searching</h1>"><i
                    class="fa-solid fa-circle-question"></i>Tech Transformation</a>
                <a href="article.php" class="article-link"
                  data-title="<h1>Seeker Struggles: Navigating Challenges in Today's Job Market</h1>"><i
                    class="fa-solid fa-circle-question"></i>Seeker Struggles</a>
                <a href="article.php" class="article-link"
                  data-title="<h1>Remote Revolution: Adapting Job Search to the Remote Work Era</h1>"><i
                    class="fa-solid fa-circle-question"></i>Remote Revolution</a>
                <a href="article.php" class="article-link"
                  data-title="<h1>AI Job Matching: Balancing Promise and Pitfalls in Automated Hiring</h1>"><i
                    class="fa-solid fa-circle-question"></i>AI Job Matching</a>
                <a href="article.php" class="article-link"
                  data-title="<h1>Social Networking: The Role of Online Platforms in Professional Networking</h1>"><i
                    class="fa-solid fa-circle-question"></i>Social Networking</a>
              </div>
              <div class="comp">
                <h2>25 Company</h2>
                <div>
                  <?php
                    // Call the function with the connection and desired limit
                    $limit = 12;
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
              </div>
            </div>
            <a href="remote-comanies.php">See All Question & Companies</a>
          </div>
        </div>
        <!-- second box -->
        <div class="remote-jobs">
          <div class="heading">
            <h2>Recent Jobs</h2>
            <div></div>
          </div>
          <div class="remote-container">
            <?php
            $result = mysqli_query($conn, $query);

            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $addedTimestamp = $row['added_date'];
                $formattedTime = formatTimeAgo($addedTimestamp);
                $category=$row['category'];
                echo '<a href="display-all-jobs.php?category=' . strtolower($category) . '&limit=10">';
                echo '<div class="comp-box">';
                echo '<h2>' . $row['category'] . ' ></h2>';
                echo '<div class="content">';
                echo '<img src="' . $row['photo'] . '" alt="' . $row['company_name_in_post'] . '">';
                echo '<div class="info">';
                echo '<h3>' .$row['job_name'] . '</h3>';
                echo $row['company_name_in_post'] . '<span>' . $formattedTime.'</span>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
              }
                mysqli_free_result($result);
              } else {
                echo "Error executing query: " . mysqli_error($conn);
              }
            ?>

          </div>
          <a href="remote-jobs.php">See All Remote Jobs ></a>
        </div>
        <!-- thured box -->
        <div class="articles">
          <div class="heading">
            <h2>Work articles</h2>
            <div></div>
          </div>
          <div class="cards">
            <div class="card">
              <img src="images/watch.jpg" alt="">
              <div class="info">
                <a href="article.php" class="article-link"
                  data-title="<h1>Navigating the Future of Work: Trends and Strategies for Success</h1>">
                  Navigating the Future of Work: Trends and Strategies for Success</a>
                <p>The world of work is undergoing a transformation like never before. Traditional employment structures
                  are evolving,andthe global workforce is facing a plethora of changes and challenges.From technological
                  advancements to shifting demographics and the aftermath of the COVID-19 pandemic, the future of work
                  is taking on a new shape.
                </p>
              </div>
            </div>
            <div class="card">
              <img src="images/Challenges-and-Benefits-of-Working-Across-Time-Zones.jpg" alt="">
              <div class="info">
                <a href="article.php" class="article-link"
                  data-title="<h1>The Work Revolution: Adapting to a Changing Job Landscape</h1>">
                  The Work Revolution: Adapting to a Changing Job Landscape</a>
                <p>In recent years, the nature of work has undergone a profound transformation, sparking what many have
                  come to call the "work revolution." This shift in the job landscape has been driven by technological
                  advancements, demographic changes, and global events like the COVID-19 pandemic</p>
              </div>
            </div>
            <div class="card">
              <img src="images/How-to-Drive-Employee-Motivation-With-Company-Culture.jpg" alt="">
              <div class="info">
                <a href="article.php" class="article-link"
                  data-title="<h1>From 9 to 5 to Remote Paradise: Redefining the Modern Workday</h1>">
                  From 9 to 5 to Remote Paradise: Redefining the Modern Workday</a>
                <p>The traditional 9-to-5 workday, once a cornerstone of the professional world, has undergone a
                  significant transformation in recent years. Thanks to advancements in technology and changes in
                  workplace culture, remote work has emerged as a viable alternative, offering employees more
                  flexibility and companies new opportunities to reimagine the modern workday. </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <aside>
        <form action="#">
          <input type="text" name="search" placeholder="Search Articles...">
          <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <div class="q&a-section">
          <a href="article.php" class="article-link" data-title="<h1>Remote Companies Q&A</h1>">
            Companies Q&A</a>
          <a href="article.php" class="article-link" data-title="<h1>Workers Q&A</h1>">
            Workers Q&A</a>
          <a href="remote-work-resources.php">Jobs articles</a>
          <a href="remote-jobs.php">All jobs</a>
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
  <?php $conn->close(); ?>
</body>

</html>