<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Resume Builder</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="crossorigin" />
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" media="print" onload="this.media='all'" />
  <noscript>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&amp;family=Roboto:wght@300;400;500;700&amp;display=swap" />
  </noscript>
  <link href="css/font-awesome/css/all.min.css?ver=1.2.0" rel="stylesheet" />
  <link href="css/bootstrap.min.css?ver=1.2.0" rel="stylesheet" />
  <link href="css/aos.css?ver=1.2.0" rel="stylesheet" />
  <link href="css/main.css?ver=1.2.0" rel="stylesheet" />
  <noscript>
    <style type="text/css">
      [data-aos] {
        opacity: 1 !important;
        transform: translate(0) scale(1) !important;
      }
    </style>
  </noscript>
</head>

<body id="top">
  <?php
  // Include the script that fetches CV data
  include('fetch_cv_data.php');
  ?>
  <div class="page-content">
    <div class="container">
      <div class="cover shadow-lg bg-white">
        <div class="cover-bg p-3 p-lg-4 text-white">
          <div class="row">
            <div class="col-lg-4 col-md-5">
              <div class="avatar hover-effect bg-white shadow-sm p-1">
                <img src="http://localhost<?php echo $img; ?>" width="200" height="200" />
              </div>
            </div>
            <div class="col-lg-8 col-md-7 text-center text-md-start">
              <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">
                <?php echo $fname . ' ' . $lname; ?>
              </h2>
              <p data-aos="fade-left" data-aos-delay="100">
                <?php echo $title; ?> </p>
              <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
                <a class="btn btn-light text-dark shadow-sm mt-1 me-1" href="indexPDF.php?cvID=<?php echo $cvID?>" target="_blank" id="btnDownload">Download CV</a>
              </div>
            </div>
          </div>
        </div>
        <div class="about-section pt-4 px-3 px-lg-4 mt-1">
          <div class="row">
            <div class="col-md-6">
              <h2 class="h3 mb-3">About Me</h2>
              <p>
                <?php echo $objective; ?>
              </p>
            </div>
            <div class="col-md-5 offset-md-1">
              <div class="row mt-2">
                <?php
                $data = array(
                  "Date of Birth" => $dob,
                  "Email" => $email,
                  "Phone" => $phone,
                  "Language" => $lang,
                  "Address" => $location,
                  "Hobby" => $hobby
                );

                foreach ($data as $label => $value) {
                  echo '<div class="col-sm-4">';
                  echo '<div class="pb-1">' . $label . '</div>';
                  echo '</div>';
                  echo '<div class="col-sm-8">';
                  echo '<div class="pb-1 text-secondary">' . $value . '</div>';
                  echo '</div>';
                }
                ?>
              </div>
            </div>
          </div>
        </div>
        <hr class="d-print-none" />

        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <h2 class="h3 mb-4">Work Experience</h2>
          <div class="timeline">
            <?php
            if ($resultWorkExperience->num_rows > 0) {
              while ($workRow = $resultWorkExperience->fetch_assoc()) {
                echo '<div class="timeline-card timeline-card-primary card shadow-sm">';
                echo '<div class="card-body">';
                echo '<div class="h5 mb-1">' . $workRow['title'] . '<span class="text-muted h6"> at ' . $workRow['company'] . '</span></div>';
                echo '<div class="text-muted text-small mb-2">' . $workRow['startYear'] . ' - ' . ($workRow['endYear'] == 0 ? 'Present' : $workRow['endYear']) . '</div>';
                echo '<div>' . $workRow['detail'] . '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              // If there are no work experiences, leave it empty
              echo '<p>No Work experience inforamtion available.</p>';
            }
            ?>
          </div>
        </div>
        <hr class="d-print-none" />
        <div class="page-break"></div>
        <div class="education-section px-3 px-lg-4 pb-4">
          <h2 class="h3 mb-4">Education</h2>
          <div class="timeline">
            <?php if ($resultEducation->num_rows > 0) {
              while ($educationRow = $resultEducation->fetch_assoc()) {
                echo '<div class="timeline-card timeline-card-primary card shadow-sm">';
                echo '<div class="card-body">';
                echo '<div class="h5 mb-1">' . $educationRow['major'] . '<span class="text-muted h6"> from ' . $educationRow['school'] . '</span></div>';
                echo '<div class="text-muted text-small mb-2">' . $educationRow['startYear'] . ' - ' . $educationRow['endYear'] . '</div>';
                echo '<div><strong>GPA:</strong> ' . $educationRow['gpa'] . '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              // Handle the case where there is no education information
              echo '<p>No education information available.</p>';
            }
            ?>
          </div>
        </div>

        <hr class="d-print-none" />
        <div class="page-break"></div>
        <div class="certification-section px-3 px-lg-4 pb-4">
          <h2 class="h3 mb-4">Certifications</h2>
          <div class="timeline">
            <?php
            if ($resultCertification->num_rows > 0) {
              while ($certificationRow = $resultCertification->fetch_assoc()) {
                echo '<div class="timeline-card timeline-card-primary card shadow-sm">';
                echo '<div class="card-body">';
                echo '<div class="h5 mb-1">' . $certificationRow['detail'] . '</div>';
                echo '<div class="text-muted text-small mb-2">' . $certificationRow['year'] . '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              // Handle the case where there are no certifications
              echo '<p>No certifications available.</p>';
            }
            ?>
          </div>
        </div>

        <hr class="d-print-none" />
        <div class="page-break"></div>
        <div class="award-section px-3 px-lg-4 pb-4">
          <h2 class="h3 mb-4">Awards</h2>
          <div class="timeline">
            <?php
            if ($resultAward->num_rows > 0) {
              while ($awardRow = $resultAward->fetch_assoc()) {
                echo '<div class="timeline-card timeline-card-primary card shadow-sm">';
                echo '<div class="card-body">';
                echo '<div class="h5 mb-1">' . $awardRow['detail'] . '</div>';
                echo '<div class="text-muted text-small mb-2">' . $awardRow['year'] . '</div>';
                echo '</div>';
                echo '</div>';
              }
            } else {
              // Handle the case where there are no awards
              echo '<p>No awards available.</p>';
            }
            ?>
          </div>
        </div>
        <hr class="d-print-none" />
        <div class="page-break"></div>
        <div class="activity-section px-3 px-lg-4 pb-4">
          <h2 class="h3 mb-4">Activities</h2>
          <div class="timeline">
            <?php
            if ($resultActivity->num_rows > 0) {
              while ($activityRow = $resultActivity->fetch_assoc()) {
                echo '<div class="timeline-card timeline-card-primary card shadow-sm">';
                echo '<div class="card-body">';
                echo '<div class="h5 mb-1">' . $activityRow['title'] . '</div>';
                echo '<div class="text-muted text-small mb-2">' . $activityRow['startYear'] . ' - ' . $activityRow['endYear'] . '</div>';
                echo '<div class="text-muted text-small mb-2">' . $activityRow['detail'] . '</div>';

                echo '</div>';
                echo '</div>';
              }
            } else {
              // Handle the case where there are no activities
              echo '<p>No activities available.</p>';
            }
            ?>
          </div>
        </div>
        <hr class="d-print-none" />

        <footer class="pt-4 pb-4 text-muted text-center d-print-none">
          <?php
          // Explode the concatenated links into an array
          $socialLinksArray = explode(', ', $socialLinks);
          // Output each link as a clickable link
          echo "Social Accounts: ";
          foreach ($socialLinksArray as $link) {
            echo '<a href="' . $link . '" target="_blank">' . $link . '</a>, ';
          }
          ?>

        </footer>
        <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
        <script src="scripts/aos.js?ver=1.2.0"></script>
        <script src="scripts/main.js?ver=1.2.0"></script>
</body>

</html>