<!DOCTYPE html>
<html lang="en-US">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Right Resume</title>
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
  $cvID = isset($_GET['cvID']) ? $_GET['cvID'] : '';
  $conn = new mysqli('localhost', 'root', '123456', 'cvbuilderDB');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $cv = "SELECT * FROM cv WHERE id = '$cvID'";
  $result_cv = $conn->query($cv);

  if ($result_cv && $result_cv->num_rows > 0) {
    // Fetch the data as an associative array
    $cvData = $result_cv->fetch_assoc();
    // Access individual fields
    $fname = $cvData['fname'];
    $lname = $cvData['lname'];
    $title = $cvData['title'];
    $dob = $cvData['dob'];
    $location = $cvData['location'];
    $objective = $cvData['objective'];
    $img = $cvData['img'];
    $hobby = $cvData['hobby'];
  }

  ?>
  <div class="page-content">
    <div class="container">
      <div class="cover shadow-lg bg-white">
        <div class="cover-bg p-3 p-lg-4 text-white">
          <div class="row">
            <div class="col-lg-4 col-md-5">
              <div class="avatar hover-effect bg-white shadow-sm p-1">
                <img src="<?php echo $img; ?>" width="200" height="200" />
              </div>
            </div>
            <div class="col-lg-8 col-md-7 text-center text-md-start">
              <h2 class="h1 mt-2" data-aos="fade-left" data-aos-delay="0">
                <?php echo $fname . ' ' . $lname; ?>
              </h2>
              <p data-aos="fade-left" data-aos-delay="100">
                <?php echo $title; ?> </p>
              <div class="d-print-none" data-aos="fade-left" data-aos-delay="200">
                <a class="btn btn-light text-dark shadow-sm mt-1 me-1" href="right-resume.pdf" target="_blank">Download CV</a>
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
                <div class="col-sm-4">
                  <div class="pb-1">Date of Birth</div>
                </div>
                <div class="col-sm-8">
                  <div class="pb-1 text-secondary">
                    <?php echo $dob; ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="pb-1">Email</div>
                </div>
                <div class="col-sm-8">
                  <div class="pb-1 text-secondary">Joyce@company.com</div>
                </div>
                <div class="col-sm-4">
                  <div class="pb-1">Phone</div>
                </div>
                <div class="col-sm-8">
                  <div class="pb-1 text-secondary">+0718-111-0011</div>
                </div>
                <div class="col-sm-4">
                  <div class="pb-1">Address</div>
                </div>
                <div class="col-sm-8">
                  <div class="pb-1 text-secondary">
                    <?php echo $location; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="d-print-none" />

        <hr class="d-print-none" />
        <div class="work-experience-section px-3 px-lg-4">
          <h2 class="h3 mb-4">Work Experience</h2>
          <div class="timeline">
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">
                  Frontend Developer
                  <span class="text-muted h6">at Creative Agency</span>
                </div>
                <div class="text-muted text-small mb-2">
                  May, 2015 - Present
                </div>
                <div>
                  Leverage agile frameworks to provide a robust synopsis for
                  high level overviews. Iterative approaches to corporate
                  strategy foster collaborative thinking to further the
                  overall value proposition.
                </div>
              </div>
            </div>
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">
                  Graphic Designer
                  <span class="text-muted h6">at Design Studio</span>
                </div>
                <div class="text-muted text-small mb-2">
                  June, 2013 - May, 2015
                </div>
                <div>
                  Override the digital divide with additional clickthroughs
                  from DevOps. Nanotechnology immersion along the information
                  highway will close the loop on focusing solely on the bottom
                  line.
                </div>
              </div>
            </div>
            <div class="timeline-card timeline-card-primary card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">
                  Junior Web Developer
                  <span class="text-muted h6">at Indie Studio</span>
                </div>
                <div class="text-muted text-small mb-2">
                  Jan, 2011 - May, 2013
                </div>
                <div>
                  User generated content in real-time will have multiple
                  touchpoints for offshoring. Organically grow the holistic
                  world view of disruptive innovation via workplace diversity
                  and empowerment.
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="d-print-none" />
        <div class="page-break"></div>
        <div class="education-section px-3 px-lg-4 pb-4">
          <h2 class="h3 mb-4">Education</h2>
          <div class="timeline">
            <div class="timeline-card timeline-card-success card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">
                  Masters in Information Technology
                  <span class="text-muted h6">from International University</span>
                </div>
                <div class="text-muted text-small mb-2">2011 - 2013</div>
                <div>
                  Leverage agile frameworks to provide a robust synopsis for
                  high level overviews. Iterative approaches to corporate
                  strategy foster collaborative thinking to further the
                  overall value proposition.
                </div>
              </div>
            </div>
            <div class="timeline-card timeline-card-success card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">
                  Bachelor of Computer Science
                  <span class="text-muted h6">from Regional College</span>
                </div>
                <div class="text-muted text-small mb-2">2007 - 2011</div>
                <div>
                  Override the digital divide with additional clickthroughs
                  from DevOps. Nanotechnology immersion along the information
                  highway will close the loop on focusing solely on the bottom
                  line.
                </div>
              </div>
            </div>
            <div class="timeline-card timeline-card-success card shadow-sm">
              <div class="card-body">
                <div class="h5 mb-1">
                  Science and Mathematics
                  <span class="text-muted h6">from Mt. High Scool</span>
                </div>
                <div class="text-muted text-small mb-2">1995 - 2007</div>
                <div>
                  User generated content in real-time will have multiple
                  touchpoints for offshoring. Organically grow the holistic
                  world view of disruptive innovation via workplace diversity
                  and empowerment.
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr class="d-print-none" />

        <!-- <footer class="pt-4 pb-4 text-muted text-center d-print-none"> </footer> -->
        <script src="scripts/bootstrap.bundle.min.js?ver=1.2.0"></script>
        <script src="scripts/aos.js?ver=1.2.0"></script>
        <script src="scripts/main.js?ver=1.2.0"></script>
</body>

</html>