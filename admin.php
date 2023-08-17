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

    <link id="stylesheet" rel="stylesheet" href="styleAdmin.css">
    <title>Admin Panel</title>
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
          <p class="pageTitle">Admin Panel</p>
          <div id="userInfoContainer">
            <div id="userImgInfo">
              <img src="img/iconDashboard.png" id="userImg">
              <div id="userInfo">
                <h1>Full Name</h1>
                <h2>email@gmail.com</h2>
                <h2>Address, Road, Dhaka</h2>
                <h2>01987654321</h2>
              </div>
            </div>
            <div id="userEditButtonContainer">
              <button class="myButton">EDIT profile</button>
              <button class="myButton" id="logoutButton">Logout</button>
            </div>
          </div>

          <!--------------- Products List --------------->

          <h1>Products:</h1>
          <div class="adminList">

            <div class="adminListEntry" id="roshogolla">
              <div class="adminListDetails">
                <div class="adminListSerial">1.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">Roshogolla</h1>
                  <h2 id="productPriceLabel">Price: 350tk per kg</h2>
                  <h2 id="productImgLabel">Image: “img/productImgRoshogolla.png”</h2>
                  <h2 id="productQuantityLabel">Quantity sold: 45kg</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="kalaJaam">
              <div class="adminListDetails">
                <div class="adminListSerial">2.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">Kala Jaam</h1>
                  <h2 id="productPriceLabel">Price: 500tk per kg</h2>
                  <h2 id="productImgLabel">Image: “img/productImgKalajaam.png”</h2>
                  <h2 id="productQuantityLabel">Quantity sold: 290kg</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="laddu">
              <div class="adminListDetails">
                <div class="adminListSerial">3.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">Laddu</h1>
                  <h2 id="productPriceLabel">Price: 420tk per kg</h2>
                  <h2 id="productImgLabel">Image: “img/productImgRoshogolla.png”</h2>
                  <h2 id="productQuantityLabel">Quantity sold: 22kg</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="chchana">
              <div class="adminListDetails">
                <div class="adminListSerial">4.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">Chchana</h1>
                  <h2 id="productPriceLabel">Price: 280tk per kg</h2>
                  <h2 id="productImgLabel">Image: “img/productImgChchana.png”</h2>
                  <h2 id="productQuantityLabel">Quantity sold: 67kg</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="buttonContainer">
              <button class="myButton" id="addProductButton">Add product</button>
            </div>
            
          </div>

          <!--------------- Wrapping Paper List --------------->

          <h1>Wrapping Papers:</h1>
          <div class="adminList">

            <div class="adminListEntry" id="roshogolla">
              <div class="adminListDetails">
                <div class="adminListSerial">1.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">“img/wrappingPaper1.png”</h1>
                  <h2 id="productPriceLabel">Quantity sold: 5</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="kalaJaam">
              <div class="adminListDetails">
                <div class="adminListSerial">2.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">“img/wrappingPaper2.png”</h1>
                  <h2 id="productPriceLabel">Quantity sold: 10</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="laddu">
              <div class="adminListDetails">
                <div class="adminListSerial">3.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">“img/wrappingPaper3.png”</h1>
                  <h2 id="productPriceLabel">Quantity sold: 8</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="chchana">
              <div class="adminListDetails">
                <div class="adminListSerial">4.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">“img/wrappingPaper4.png”</h1>
                  <h2 id="productPriceLabel">Quantity sold: 8</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="buttonContainer">
              <button class="myButton" id="addWrapperButton">Add Wrapping Paper</button>
            </div>
            
          </div>

          <!--------------- Users List --------------->

          <h1>Users:</h1>
          <div class="adminList">

            <div class="adminListEntry" id="roshogolla">
              <div class="adminListDetails">
                <div class="adminListSerial">1.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">Ahmed Korim</h1>
                  <h2 id="productPriceLabel">email@gmail.com</h2>
                  <h2 id="productImgLabel">Address, Road, Dhaka</h2>
                  <h2 id="productQuantityLabel">01999999999</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="kalaJaam">
              <div class="adminListDetails">
                <div class="adminListSerial">2.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">Sanzar Adnan Alam</h1>
                  <h2 id="productPriceLabel">email@gmail.com</h2>
                  <h2 id="productImgLabel">Address, Road, Dhaka</h2>
                  <h2 id="productQuantityLabel">01777777777</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
              </div>
            </div>

            <div class="adminListEntry" id="kalaJaam">
              <div class="adminListDetails">
                <div class="adminListSerial">3.</div>
                <div class="adminListText">
                  <h1 id="productNameLabel">ADMIN: Doggo Kuddus</h1>
                  <h2 id="productPriceLabel">email@gmail.com</h2>
                  <h2 id="productImgLabel">Address, Road, Dhaka</h2>
                  <h2 id="productQuantityLabel">01777777777</h2>
                </div>
              </div>
              <div class="adminListButtons">
                <button class="myButton" id="editButton">Edit</button>
                <button class="myButton" id="deleteButton">Delete</button>
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

<!-- LOGOUT CODE FROM CHAT GPT -->

<script>
// Attach a click event listener to the button
document.getElementById("logoutButton").addEventListener("click", function() {
    // Create an AJAX request
    var xhr = new XMLHttpRequest();
    
    // Define the PHP script to call
    var phpScript = "logout.php"; // Replace with the actual filename
    
    // Configure the AJAX request
    xhr.open("GET", phpScript, true);
    
    // Define the callback function
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // Handle the response here if needed
            // For example, you could redirect using JavaScript
            window.location.href = "index.html";
        }
    };
    
    // Send the AJAX request
    xhr.send();
});
</script>
