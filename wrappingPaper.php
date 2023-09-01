<?php
// Start or resume the session
session_start();
$conn = mysqli_connect('localhost','root','','mishti_db') or die('connection failed');
// Fetch data from the 'wrappers' table
$sql = "SELECT wrapperID, image FROM wrappers";
$result = $conn->query($sql);

// Check if there are any rows in the result set
if ($result->num_rows > 0) {
    $optionsHtml = '';
    while ($row = $result->fetch_assoc()) {
        $wrapperID = $row['wrapperID'];
        $image = $row['image'];
        $optionsHtml .= "<div class='wrappingPaperOption' data-value='$wrapperID'>";
        $optionsHtml .= "<img src='uploaded_img/$image' alt='Option $wrapperID'>";
        $optionsHtml .= "</div>";
    }
} else {
    // Handle the case when there are no records in the database
    $optionsHtml = '<p>No wrapping paper options available.</p>';
}

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700,900|Ubuntu:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link id="stylesheet" rel="stylesheet" href="styleMain.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <link rel="icon" href="img/favicon.png" type="image/png">

    <!------- Stylesheet and Page Title: ------->

    <link id="stylesheet" rel="stylesheet" href="styleWrappingPaper.css">
    <title>Wrapping Paper</title>
  </head>

  <body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <div id="navbarPlaceholder"></div>
    
    <div class="myContainer">
      
      <!-------------- Write Code Here: -------------->

      <div class="row" id="myRow">
        <div class="col-md-8 mx-auto">
          <p class="pageTitle">Wrapping Paper</p>

            <div class="row">
              <div class="col-lg-6">
                <img src="img/wrappingPaperMain.png" id="mockupImg">
              </div>
              <div class="col-lg-6">
                <p class="pageDescription">
                  Impress your guests with our high quality wrapping papers, 
                  complementary with your purchase. <br><br>
                  We will wrap your boxes before sending the sweets 
                  right to your doorstep.
                </p>
              </div>
            </div>

          <br>
          <h1>Choose wrapping paper:</h1>
          <br>

          <form id="wrappingPaperForm" method="POST">
            <div id="wrappingOptionsContainer">
                <?php echo $optionsHtml; ?>
            </div>
            <br>
            <div class="bottomButtonContainer">
                <a href="cart.php" class="altButton">back</a>
                <a href="payment.php" class="myButton">next</a>
                <!--<input type="submit" value="Next" class="myButton">-->
            </div>
          </form>

          <script>
              const wrappingOptions = document.querySelectorAll('.wrappingPaperOption');

              wrappingOptions.forEach(option => {
                  option.addEventListener('click', () => {
                      // Remove the 'selected' class from all options
                      wrappingOptions.forEach(opt => opt.classList.remove('selected'));
                      // Add the 'selected' class to the clicked option
                      option.classList.add('selected');
                      // Set the selected value in the form input field
                      document.getElementById('wrappingPaperSelection').value = option.getAttribute('data-value');
                  });
              });
          </script>

        </div>
      </div>















    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>