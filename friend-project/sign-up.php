<?php
require_once "php/db_connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $selectedCategories = isset($_POST['categories']) ? $_POST['categories'] : [];
    $selectedJobTypes = isset($_POST['jobType']) ? $_POST['jobType'] : [];
    $newsletterCheckbox = isset($_POST['subsbcribetion']) ? 'Subscribe' : 'Not Subscribe';

    // Prepare and bind the SQL query
    $stmt = $conn->prepare("INSERT INTO job_letter (email, job_category, job_type, subscribe) VALUES (?, ?, ?, ?)");
    // $name = "Unknown"; // You can change this to the user's name if you collect it
    $jobCategory = implode(', ', $selectedCategories);
    $jobType = implode(', ', $selectedJobTypes);
    $stmt->bind_param("ssss",$email, $jobCategory, $jobType, $newsletterCheckbox);

    // Execute the query
    if ($stmt->execute()) {
        echo "Data inserted successfully into the database";
    } else {
        echo "Error inserting data: " . $conn->error;
    }

    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
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
  .selected {
    background-color: #333;
    /* Change this to the desired color */
    color: #fff;
    /* Change this to the desired text color */
    cursor: pointer;
    /* Optional: Change cursor style to indicate interactivity */
  }
  </style>
</head>

<body>
  <!-- start header -->
  <header>
    <div class="container">
      <a href="index.html" class="logo">
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
  <div class="landing remote-jobs">
    <div class="container">
      <h1>Sign Up</h1>
    </div>
  </div>
  <!-- end landing -->

  <!-- start introduction -->
  <div class="introduction">
    <div class="container">
      <p><span>Home</span> / Sign up for Job alerts </p>
    </div>
  </div>
  <!-- end introduction -->

  <!-- start content -->
  <div class="sign-up">
    <div class="container">
      <div class="content">
        <div class="box">
          <div class="heading">
            <h2>Looking for remote work?</h2>
          </div>
          <div class="before">
            <i class="far fa-envelope fa-lg"></i>
            <h3>Sign up for our Daily Job Alerts.</h3>
            <p>Receive the latest jobs from your selected categories up to once a day.</p>
          </div>
          <form action="sign-up.php" method="POST">
            <div>
              <label for="email">Your Email Address:</label>
              <input type="email" name="email" placeholder="YourName@Email.com" required>
            </div>
            <div>
              <label>Select Job Categories:</label>
              <div id="categoryContainer">
                <input type="checkbox" name="categories[]" id="1" value="Accounting"><label for="1"> Accounting</label>
                <input type="checkbox" name="categories[]" id="2" value="Customer Service"><label  for="2"> Customer Service</label>
                <input type="checkbox" name="categories[]" id="3" value="Data Entry"><label for="3"> Data Entry</label>
                <input type="checkbox" name="categories[]" id="4" value="Design"><label for="4"> Design</label>
                <input type="checkbox" name="categories[]" id="5" value="Developer"><label for="5"> Developer</label>
                <input type="checkbox" name="categories[]" id="6" value="Editing"><label for="6"> Editing</label>
                <input type="checkbox" name="categories[]" id="7" value="Healthcare"><label for="7"> Healthcare</label>
                <input type="checkbox" name="categories[]" id="8" value="HR"><label for="8"> HR</label>
                <input type="checkbox" name="categories[]" id="9" value="IT"><label for="9"> IT</label>
                <input type="checkbox" name="categories[]" id="11" value="Legal"><label for="11"> Legal</label>
                <input type="checkbox" name="categories[]" id="12" value="Marketing"><label for="12"> Marketing</label>
                <input type="checkbox" name="categories[]" id="13" value="Project Manager"><label for="13"> Project Manager</label>
                <input type="checkbox" name="categories[]" id="14" value="QA"><label for="14"> QA</label>
                <input type="checkbox" name="categories[]" id="15" value="Other"><label for="15"> Other</label>
              </div>
            </div>
            <div>
              <label>Select Job Types:</label>
              <div id="jobTypeContainer">
                <input type="checkbox" name="jobType[]" value="Full-time" id="o1"><label for="o1"> Full-time</label>
                <input type="checkbox" name="jobType[]" value="Part-time" id="o2"><label for="o2"> Part-time</label>
                <input type="checkbox" name="jobType[]" value="International" id="o3"><label for="o3"> International</label>
              </div>
            </div>
            <div>
              <label><input type="checkbox" name="subscribtion" value="subsbcribe">Also sign up for our Fresh Jobs newsletter featuring curated jobs twice a
                week</label>
            </div>
            <input type="submit" value="Sign Up!">
          </form>
          <div class="after">
            <a href="remote-jobs.php">Start searching for remote jobs now ></a>
            Employer? <a href="poste-remote-job.php">Post remote jobs ></a>
          </div>
        </div>
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

  <script>
    // Function to handle label click and toggle class on associated label
    function handleLabelClick(event) {
      const label = event.currentTarget;
      label.classList.toggle('selected');
    }

    // Attach click event listeners to category and job type labels
    const categoryLabels = document.querySelectorAll('#categoryContainer label');
    categoryLabels.forEach(label => {
      label.addEventListener('click', handleLabelClick);
    });

    const jobTypeLabels = document.querySelectorAll('#jobTypeContainer label');
    jobTypeLabels.forEach(label => {
      label.addEventListener('click', handleLabelClick);
    });
  </script>


</body>

</html>