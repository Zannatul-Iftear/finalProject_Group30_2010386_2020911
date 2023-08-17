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

    <link id="stylesheet" rel="stylesheet" href="styleContactUs.css">
    <title>Contact Us</title>
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
          <p class="pageTitle">Contact Us</p>
          <div class="row">
            <div class="col-xl-6">

              <div id="contactInfoContainer">

                <div class="contactInfo">
                  <img src="img/iconAddress.png">
                  <div class="infoText">
                    <h1>Address</h1>
                    <h2>46/A Kuddus Road, Modhubazar, Dhaka 1209, Bangladesh</h2>
                  </div>
                </div>

                <div class="contactInfo">
                  <img src="img/iconPhone.png">
                  <div class="infoText">
                    <h1>Let's talk</h1>
                    <a href="https://wa.me/8801987654321">+8801987654321</a>
                  </div>
                </div>

                <div class="contactInfo">
                  <img src="img/iconMail.png">
                  <div class="infoText">
                    <h1>Shoot us an email</h1>
                    <a href="mailto:mishtiBeshi@modhubazar.com">mishtiBeshi@modhubazar.com</a>
                  </div>
                </div>


              </div>
            </div>


            <!-------------- Feedback Form: -------------->

            <div class="col-xl-6">
              <div class="myRightCol">
      
                <form class="myForm" action="signup.php" method="POST">
                  <h1>We'd love to hear your feedback!</h1>
      
                  <div class="form-group">
                    <label class="form-control">Tell us your name *</label>
                    <div class="row">
                      <div class="col-6 pr-0">
                        <input type="text" class="form-control br-0" name="fName" 
                        placeholder="First name" required>
                        <div class="invalid-feedback">This field is required.</div>
                      </div>
                      <div class="col-6 pl-0">
                        <input type="text" class="form-control" name="lName" 
                        placeholder="Last name" required>
                        <div class="invalid-feedback">This field is required.</div>
                      </div>
                    </div>
                  </div>
      
                  <div class="form-group">
                    <label class="form-control">Enter your email *</label>
                    <input type="email" class="form-control" name="email"
                    placeholder="Eg. example@email.com" required>
                    <div class="invalid-feedback">This field is required.</div>
                  </div>
      
                  <div class="form-group">
                    <label class="form-control">Enter phone number</label>
                    <input type="text" class="form-control" name="phone"
                    placeholder="Eg. +8801987654321">
                  </div>
      
                  <div class="form-group">
                    <label class="form-control">Message *</label>
                    <textarea type="text" class="form-control" id="messageBox" name="message"
                    placeholder="Write us a message" rows="4" required></textarea>
                    <div class="invalid-feedback">This field is required.</div>
                  </div>

                  <div id="buttonContainer">
                    <input type="hidden" name="form_submitted" value="1"/>
                    <input class="myButton" type="submit" value="Submit">
                  </div>
      

      
                </form>
      
              </div>
            </div>
          </div>
 
    
        </div>
      </div>












    </div>
    <div id="footerPlaceholder"></div>
  </body>
</html>
<script src="loadNavbar.js"></script>
<script src="loadFooter.js"></script>