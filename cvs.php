<?php
  if(count($_GET) == 0) {
    header("Location: ".$_SERVER["REQUEST_URI"]."?page=1");
  }
  else if(!isset($_GET["page"])) {
    header("Location: ".$_SERVER["REQUEST_URI"]."&page=1");
  }
  $page = intval($_GET["page"]);
  $search_string_query = ""
 ?>
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
    <link rel="stylesheet" href="./cvs_navbar.css" />
    <link rel="stylesheet" href="./cvs.css" />
    <script src="./cvs.js" defer></script>
  </head>
  <body>
    <?php include "./cvs_navbar.html" ?>
    <div class="container-fluid d-flex justify-content-center flex-column w-100 align-items-center" id="content-container">
      <?php 
        if(isset($_GET['search']) && $_GET['search'] != '') {
          echo "<div class=\"row row-cols-1 w-75 mb-3\">
                  <h3>Search result for \"".$_GET['search']."\"</h3>
                </div>";
          $search_string_query = "search=".$_GET["search"]."&";
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
              if(intval($_GET['search'])) {
                $query = "SELECT * FROM cv WHERE `id` = ".$_GET['search'];
              }
              else {
                $query = "SELECT * FROM cv WHERE `fname` LIKE \"%".$_GET['search']."%\"
                OR `lname` LIKE \"%".$_GET['search']."%\" OR `title` LIKE \"%".$_GET['search']."%\"";
              }
            }
            else {
              $query = "SELECT * FROM cv";
            }
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                // output data of each row
                $offset = 12*(intval($_GET["page"])-1);
                $result->data_seek($offset);
                $i = 0;
                while($i < 12) {
                    $row = $result->fetch_assoc();
                    if($row == NULL) break;
                    $image = $row["img"];
                    if($image == NULL) $image = "./images/avatar.jpg";
                    echo "<div class=\"col\">
                        <a href=\"./cv_template.php?cvID=".$row["id"]."\" class=\"text-decoration-none\" title=\"".$row["fname"]." ".$row["lname"]."\">
                          <div class=\"card shadow-sm item d-flex\">
                              <div class=\"card-body p-0\">
                                <div class=\"img-container w-100 d-flex flex-column align-items-center p-2\">
                                  <img class=\" d-lg-block w-100\" height=\"300px\" src=\"".$image."\" alt=\"".$row["fname"]." ".$row["lname"]."\"/>
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
                    $i++;
                }
            } else {
              echo "<h4>0 result</h4>";
            }
        
            $conn->close();
        ?>
      </div>
      <nav aria-label="Page navigation" class="mt-5">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="<?php 
            $page_prev = $page - 1;
            if($page_prev < 1) $page_prev = 1;
            echo $_SERVER["SCRIPT_NAME"]."?".$search_string_query."page=".$page_prev
            ?>" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
          </li>
          <?php 
          for($i = 0; $i < ceil($result->num_rows/12.0); $i++)
            if($i + 1 == $page) {
              echo ("<li class=\"page-item active\"><a class=\"page-link\" href=\"".$_SERVER["SCRIPT_NAME"]."?".$search_string_query."page=".($i+1)."\">".($i+1)."</a></li>");
            }
            else {
              echo ("<li class=\"page-item\"><a class=\"page-link\" href=\"".$_SERVER["SCRIPT_NAME"]."?".$search_string_query."page=".($i+1)."\">".($i+1)."</a></li>");
            }
          ?>
          <li class="page-item">
            <a class="page-link" href="<?php 
            $page_next = $page+1;
            if($page_next > ceil($result->num_rows/12.0)) {
              $page_next = ceil($result->num_rows/12.0);
            }
            echo $_SERVER["SCRIPT_NAME"]."?".$search_string_query."page=".$page_next
            ?>" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </body>
</html>