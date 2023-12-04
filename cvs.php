<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      defer
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <title><?php echo trim(substr($_SERVER['PHP_SELF'], 0, strpos($_SERVER['PHP_SELF'], ".")), '/');
    ?></title>
    <link rel="stylesheet" href="./navbar.css" />
    <link rel="stylesheet" href="./styles.css" />
    <script src="./script.js" defer></script>
  </head>
  <body>
    <?php include "./navbar.html" ?>
    <div class="container-fluid d-flex justify-content-center flex-column w-100 align-items-center" style="padding: 2%" id="content-container">
      <?php 
        if(isset($_GET['search']) && $_GET['search'] != '') {
          echo "<div class=\"row row-cols-1 w-75 mb-3\">
                  <h3>Search result for \"".$_GET['search']."\"</h3>
                </div>";
        }
      ?>
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-5 col-lg-10">
        <?php 
            $servername = "localhost";
            $username = "root";
            $dbname = "cvbuilderdb";
            $conn = new mysqli($servername, $username, NULL, $dbname);
        
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            if(isset($_GET['search']) && $_GET['search'] != '') {
              $query = "SELECT * FROM cv WHERE `id` = ".$_GET['search']." OR `fname` LIKE \"%".$_GET['search']."%\" 
              OR `lname` LIKE \"%".$_GET['search']."%\" OR `title` LIKE \"%".$_GET['search']."%\"";
            }
            else {
              $query = "SELECT * FROM cv";
            }
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<div class=\"col\">
                        <a href=\"./cv_template.php?cvID=".$row["id"]."\" class=\"text-decoration-none\">
                          <div class=\"card shadow-sm item d-flex\">
                              <div class=\"card-body p-0\">
                                <div class=\"img-container\">
                                  <img class=\" d-lg-block img-fluid\" src=\"./images/avatar.jpg\" alt=\"...\"/>
                                </div>
                                <div class=\"text-container p-3\">
                                  <h5 class=\"card-title\">".$row["fname"]." ". $row["lname"]."</h5>
                                  <p class=\"card-text\">
                                  ". $row["title"]."
                                  </p>
                                </div>
                              </div>
                          </div>
                        </a>
                    </div>";
                }
            } else {
              echo "<h4>0 result</h4>";
            }
        
            $conn->close();
        ?>
      </div>
    </div>
  </body>
</html>