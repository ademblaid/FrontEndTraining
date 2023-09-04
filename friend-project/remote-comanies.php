<?php
require 'php/db_connection.php'; // Include the database connection code

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Remote Companies</title>
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
          <li><a class="active" href="remote-comanies.php">All COMPANIES</a></li>
          <li><a href="remote-work-resources.php">All Work RESOURCES</a></li>
        </ul>
        <a href="sign-up.php"><i class="far fa-envelope fa-lg"></i></a>
        <a href="poste-remote-job.php">Post Jobs</a>
      </nav>
    </div>
  </header>
  <!-- end header -->

  <!-- start landing -->
  <div class="landing remote-campanies">
    <div class="container">
      <h1>All Companies Q&A</h1>
      <p>The leading companies and virtual teams answer your questions</p>
    </div>
  </div>
  <!-- end landing -->

  <!-- start stats -->
  <div class="stats">
    <div class="container">
      <div class="box">
        <i class="fa-solid fa-message"></i>
        <div class="number">37</div>
        <p>Questions</p>
      </div>
      <div class="box">
        <i class="fa-solid fa-cloud"></i>
        <div class="number">146</div>
        <p>Remote Teams</p>
      </div>
      <div class="box">
        <i class="fa fa-person"></i>
        <div class="number">126,800+</div>
        <p>Remote Team Members</p>
      </div>
    </div>
  </div>
  <!-- end stats -->

  <!-- start search -->
  <div class="search-q-a">
    <div class="container">
      <form action="#">
        <input type="text" name="search-q-a"
          placeholder="Remote communication, hiring remotely, remote onboarding, etc.">
        <input type="submit" value="Search Q&A'S">
      </form>
      <div class="msg">
        Want to tell your company's remote story here? <a href="#">Contact us ></a>
      </div>
    </div>

  </div>
  <!-- end search -->

  <!-- start content -->
  <div class="camp-qst">
    <div class="container">
      <div class="qst">
        <div class="heading">
          <h2>The Questions</h2>
          <div></div>
        </div>
        <div class="box">
          <div class="title">
            <h3><i class="fa-solid fa-circle-info"></i>Personal Development</h3>
          </div>
          <div class="content">
            <ul>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Achieving Personal Goals: Strategies for Success</h1>">What are some effective
                  strategies for setting and achieving personal goals?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title=" <h1>How to Improve Time Management Skills for Increased Productivity</h1>">How can I
                  improve my time management
                  skills to be more productive?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Enhancing Emotional Intelligence: A Key to Personal Growth</h1>">What are some ways to
                  enhance my
                  emotional intelligence in both personal and professional
                  life?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Building Resilience: How to Cope with Life's Challenges</h1>">How can I build
                  resilience to better
                  cope with challenges and setbacks?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Fostering a Growth Mindset: A Path to Continuous Improvement</h1>">What steps should I
                  take to foster a
                  growth mindset and continuously improve myself?</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="box">
          <div class="title">
            <h3><i class="fa-solid fa-circle-info"></i>Career and Job Search</h3>
          </div>
          <div class="content">
            <ul>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Tips for Crafting a Standout Resume and Cover Letter</h1>">What tips do you have for
                  crafting a standout resume and cover letter?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>How to Effectively Prepare for Job Interviews</h1>">How can I effectively prepare
                  for job interviews and present myself as the best
                  candidate?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title=" <h1>How to Evaluate a Job Offer and Potential Employer</h1>">What are the key factors to
                  consider when evaluating a job offer or potential
                  employer?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Navigating Career Transitions: Switching Industries and Advancing Your Career</h1>">What
                  strategies can I use to
                  navigate career transitions, such as switching industries or
                  advancing in my current field?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Building a Strong Professional Network for Career Success</h1>">How can I build a
                  strong
                  professional network to enhance my career opportunities?</a></li>
            </ul>
          </div>
        </div>
        <div class="box">
          <div class="title">
            <h3><i class="fa-solid fa-circle-info"></i>Health and Well-being</h3>
          </div>
          <div class="content">
            <ul>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Health and Well-being: Maintaining a Healthy Work-Life Balance</h1>">What are some
                  practical ways to maintain a healthy work-life balance?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Effective Stress Management Techniques for Workplace Well-being</h1>">How can I
                  establish and stick to a fitness routine that suits my lifestyle?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Strategies for Fostering a Positive and Inclusive Work Environment</h1>">What dietary
                  habits can promote overall well-being and sustained energy throughout the
                  day?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Managing Workplace Stress: Strategies for a Healthier You</h1>">What are effective
                  stress management techniques to reduce workplace stress?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Prioritizing Mental Health in a Work-Centric World</h1>">How can I prioritize mental
                  health and seek help if needed in a work-centric world?</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="box">
          <div class="title">
            <h3><i class="fa-solid fa-circle-info"></i>Finance and Money Management</h3>
          </div>
          <div class="content">
            <ul>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Essential Financial Planning Strategies for Long-Term Financial Security</h1>">What are some essential
                  financial planning strategies for long-term financial
                  security?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Effective Budgeting Strategies</h1>">How can I create and stick to
                  a budget that aligns with my financial goals?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Investing in Your Financial Future: A Guide to Financial Asset Management</h1>">What are the key considerations when investing in stocks, bonds, or other financial
                  assets?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Managing Debt Effectively: Tips for Financial Freedom</h1>">How can I reduce and manage
                  debt effectively, including student loans and credit card
                  debt?</a></li>
              <li><a href="article.php" class="article-link"
                  data-title="<h1>Planning for Retirement: Securing Your Financial Future</h1>">What steps should I take to
                  plan for retirement and ensure financial independence in my
                  later years?</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class="comapanies">
        <div class="heading">
          <h2>The Companies</h2>
          <div></div>
        </div>
        <div class="content">
          <?php
    

    // SQL query to retrieve names and photos from the company table
    $sql = "SELECT name, photo FROM company WHERE accepted = 'yes'";
    $result = $conn->query($sql);

    // Display photos and names
    while ($row = $result->fetch_assoc()) {
        $name = $row['name'];
        $photo = $row['photo'];
        
        // Display name
        // echo "<h2>Name: $name</h2>";

        // Display photo
        // echo '<img src="data:image/jpeg;base64,' . base64_encode($photoBlob) . '" alt="Photo" /><br><br>';

        echo '<div>';
        echo '<img src="' . $photo . '" alt="">';
        echo '<p>' . $name . '</p>';
        echo '</div>';
    }

    // Close the database connection
    $conn->close();
    ?>
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