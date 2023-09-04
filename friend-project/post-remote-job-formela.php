<?php
require 'php/db_connection.php'; // Include the database connection code

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $companyName = $_POST['company-name'];
    $email = $_POST['email'];
    $jobPostTitle = $_POST['job-post-title'];
    $postLinkOrEmail = $_POST['postlink-email'];
    $jobPostText = $_POST['hiddenContent'];
    $locationReq = $_POST['location-req'];

    // Handling the 'other' location option if selected
    if ($locationReq === 'other') {
        $otherLocation = $_POST['other-location'];
    }

    // Initialize selectedTags as an empty array
    $selectedTags = isset($_POST['tags']) ? $_POST['tags'] : array();

    // Convert selected tags array into a comma-separated string
    $tagsString = implode(',', $selectedTags);

    // Get the current timestamp
    $currentTimestamp = date('Y-m-d H:i:s');

    // Insert data into the database
    $sql = "INSERT INTO job_post (company_name, job_post_link, contact_email, job_description, location, job_tags, added_date, job_name)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssss", $companyName, $postLinkOrEmail, $email, $jobPostText, $locationReq, $tagsString, $currentTimestamp, $jobPostTitle);
    mysqli_stmt_execute($stmt);

    // Close the prepared statement
    mysqli_stmt_close($stmt);

    // Close the database connection
    mysqli_close($conn);

    // Redirect to a success page or display a success message
    echo "success";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Post Remote Jobs formela</title>
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
  <!-- link to quill css -->
  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="js/script.js"></script>
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
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
      <p><span>Home</span> / <span>why Post on FIND ME A JOB</span> / Post a Job</p>
    </div>
  </div>
  <!-- end introduction -->

  <!-- start content -->
  <div class="posteremotejobformela">
    <div class="container">
      <div class="content">
        <h1>Post Remote Jobs *</h1>
        <form action="post-remote-job-formela.php" method="POST">
          <div>
            <label for="company-name">Your Company's Name</label>
            <input type="text" name="company-name" required aria-required="true">
          </div>
          <div>
            <label for="email">Your Email Address</label>
            <input type="email" name="email" required aria-required="true">
          </div>
          <div>
            <label for="job-post-title">Job Post Title</label>
            <input type="text" name="job-post-title" required aria-required="true">
          </div>
          <div>
            <label for="postlink-email">Job Post Link Or Email Address</label>
            <input type="text" name="postlink-email" required aria-required="true">
          </div>
          <div>
            <label for="hiddenContent">Job Post Text</label>
            <div class="editor-container">
              <div id="editor"></div>
              <input type="hidden" id="hiddenContent" name="hiddenContent">
            </div>
          </div>
          <div>
            <h3>Location Requirement?</h3>
            <div>
              <input type="radio" name="location-req" id="option1" value="anywhere">
              <label for="option1">Anywhere in the world</label>
            </div>
            <div>
              <input type="radio" name="location-req" id="option2" value="us-only">
              <label for="option2">US locations only</label>
            </div>
            <div>
              <input type="radio" name="location-req" id="option3" value="other">
              <input type="text" name="other-location" placeholder="Other">
            </div>
          </div>
          <div>
            <h3>Tags (add any that apply)</h3>
            <div>
              <input type="checkbox" name="tags[]" id="tag1" value="entry-level">
              <label for="tag1">Entry-level job</label>
            </div>
            <div>
              <input type="checkbox" name="tags[]" id="tag2" value="freelance">
              <label for="tag2">Freelance job</label>
            </div>
            <div>
              <input type="checkbox" name="tags[]" id="tag3" value="part-time">
              <label for="tag3">Part-time job</label>
            </div>
          </div>
          <input type="submit" value="Submit job">
        </form>

        <p>*jobs subject to editorial approval. <br>
          Question? <a href="#">Contact us.</a></p>
      </div>
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
  <!-- end policy -->

</body>

</html>