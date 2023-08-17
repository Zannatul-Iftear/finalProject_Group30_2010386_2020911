


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

          <form id="wrappingPaperForm">
            <div id="wrappingOptionsContainer">
              <div class="wrappingPaperOption">
                <img src="img/wrappingPaper1.png">
                <input type="radio" class="myRadioButton" id="option1" name="options" value="option1">
              </div>
              <div class="wrappingPaperOption">
                <img src="img/wrappingPaper2.png">
                <input type="radio" class="myRadioButton" id="option2" name="options" value="option2">
              </div>
              <div class="wrappingPaperOption">
                <img src="img/wrappingPaper3.png">
                <input type="radio" class="myRadioButton" id="option3" name="options" value="option3">
              </div>
              <div class="wrappingPaperOption">
                <img src="img/wrappingPaper4.png">
                <input type="radio" class="myRadioButton" id="option4" name="options" value="option4">
              </div>
            </div>

            <br>
            <div class="bottomButtonContainer">
              <a href="cart.php" class="altButton">back</a>
              <a href="payment.php" class="myButton">Next</a>
              <!--input type="submit" value="Next" class="myButton"-->
            </div>
          
          </form>
        </div>
      </div>















    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>