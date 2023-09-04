<?php
function getArticleTextFromDatabase($conn, $title) {
  // Sanitize the title to prevent SQL injection (this is a basic example)
$sanitizedTitle = $conn->real_escape_string($title);

  // Query to retrieve the article text from the database based on the title
$sql = "SELECT content FROM qst_and_articles WHERE title = '$sanitizedTitle'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    return $row['content'];
} else {
    return "Article not found.";
}
}

//get pictures

function getCompanyData($connection, $limit) {
  $query = "SELECT photo, name FROM company LIMIT $limit";
  $result = $connection->query($query);

  return $result;
}

// calculate time

function formatTimeAgo($timestamp) {
  $addedTimestamp = new DateTime($timestamp);
  $currentTimestamp = new DateTime();

  $timeDifference = $currentTimestamp->diff($addedTimestamp);

  if ($timeDifference->days > 0) {
      return $timeDifference->days . " days ago";
  } elseif ($timeDifference->h > 0) {
      return $timeDifference->h . " hours ago";
  } else {
      return "Less than an hour";
  }
}

// get 3 jobs from every category
function getJobsDataByLimit($conn, $limit) {
  $query = "
  WITH NumberedJobs AS (
    SELECT
        jp.job_id,  -- Add the job_id column
        jp.category,
        jp.added_date,
        jp.job_name,
        jp.job_tags,
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
    job_id,  -- Include job_id in the SELECT
    category,
    added_date,
    job_name,
    job_tags,
    photo,
    company_name_in_post
FROM
    NumberedJobs
WHERE
    row_num <= ?;
  ";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "i", $limit);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $jobsData = array();

  if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
          $jobsData[] = $row;
      }
      mysqli_free_result($result);
  } else {
      echo "Error executing query: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);

  return $jobsData;
}


// category and limit 
function getJobsDataByCategoryAndLimit($conn, $category, $limit) {
  $query = "
  WITH NumberedJobs AS (
    SELECT
        jp.job_id,
        jp.category,
        jp.added_date,
        jp.job_name,
        jp.job_tags,
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
    job_id,
    category,
    added_date,
    job_name,
    job_tags,
    photo,
    company_name_in_post
FROM
    NumberedJobs
WHERE
    category = ? AND row_num <= ?
  ";

  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "si", $category, $limit);  // Bind category as string and limit as integer
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  $jobsData = array();

  if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
          $jobsData[] = $row;
      }
      mysqli_free_result($result);
  } else {
      echo "Error executing query: " . mysqli_error($conn);
  }

  mysqli_stmt_close($stmt);

return $jobsData;
}

// get job by id to the detail page
function getJobDetailsById($jobId, $conn) {
$sql = "SELECT jp.category, jp.job_name, c.name,
    jp.job_post_link, jp.contact_email, jp.job_description, jp.location,
    jp.salary, jp.added_date, jp.job_tags
    FROM job_post jp
    INNER JOIN company c ON jp.company_id = c.company_id
    WHERE jp.job_id = ?";
    
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $jobId);  // Assuming job_id is an integer
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $jobDetails = $result->fetch_assoc();
    return $jobDetails;
} else {
    return null;  // No job found with the given job_id
}
}



?>