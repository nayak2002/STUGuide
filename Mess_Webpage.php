<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="with=device-width, initial-scale= 1.0">
        <title>Mess | STUGuide </title>
        <link rel="stylesheet" href="new_style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">

        <style>
            #heading
            {
                margin-top: 150px;
                color: rgb(145, 66, 10);
                text-align:center;
                margin-bottom: 20px;
            }
            .subheader{
                height: 50vh;
                width: 100%;
                background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)),url(img/hostel\ 1.jpeg);
                background-position: center;
                background-size: cover;
                text-align: center;
                color: #fff;
                }
        </style>

    </head>
    <body>
        <section class="subheader">
            <nav>
                <a href="index.html"><img src="img/STU Logo R.png"></a>
                <div class="nav-links">
                <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Services</a>
                            <ul class="dropdown">
                              <li><a href="living.html">Living</a></li>
                              <li><a href="grocery.html">eGrocery</a></li>
                              <li><a href="restaurant.html">eFood</a></li>
                            </ul>
                          </li>
                        <li><a href="locations.html">Locations</a></li>
                        <li><a href="aboutus.html">About</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="Login_Signin_Page.html">Login/SignUp</a></li>
                    </ul>
                </div>
            </nav>

            <h1 class="heading-separator">Mess</h1>
        </section>

        <section class="listb">
            <form action=restraunts_webpage.php method="post">
        </form>
        </section>

        <section class="product-list">
            <div>
                <h1 class="align-center">
                    Mess Available
                </h1>
              </div>
              
              <div class="searchbar">
                  <input class="search-input" placeholder="Search">
                  <span class="search-icon"></span>
                </div>
        
              <div class="product-container">
                
        <!-- First-->
        
              <div class="card">
                <div class="content">
                <div class="title">Skanda Grand</div>
                <div class="image">
                  <img
                    src="img/MImage1.jpg"
                  />
                </div>
                <div class="text">
                    <?php
                    $conn = new mysqli("localhost","root","","dbms_pro");
                    $sql1="SELECT * FROM mess_info where userid='200001AB'";
                    $result = $conn->query($sql1);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<br>".$row['uname'];
                            echo "<br>Price: ".$row['price_range'];
                            echo "<br>Location: ".$row['mlocation'];
                            echo "<br>Type: ".$row['meals_served'];
                        }
                    }
                    $conn->close();
                ?>
                </div>
                 </div>
                  <button  class="buy-button details">
                    Visit Now
                  </button>             
              </div>
               <!-- Second-->        
               <div class="card">
                <div class="content">
                <div class="title">Jose Mess</div>
                <div class="image">
                  <img
                    src="img/MImage2.jpg"
                  />
                </div>
                <div class="text">
                    <?php
                    $conn = new mysqli("localhost","root","","dbms_pro");
                    $sql1="SELECT * FROM mess_info where userid='200002AB'";
                    $result = $conn->query($sql1);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<br>".$row['uname'];
                            echo "<br>Price: ".$row['price_range'];
                            echo "<br>Location: ".$row['mlocation'];
                            echo "<br>Type: ".$row['meals_served'];
                        }
                    }
                    $conn->close();
                ?>
                </div>
                 </div>
                  <button  class="buy-button details">
                    Visit Now
                  </button>             
              </div>
              <!-- Third-->        
              <div class="card">
                <div class="content">
                <div class="title">Venad Mess</div>
                <div class="image">
                  <img
                    src="img/MImage3.jpg"
                  />
                </div>
                <div class="text">
                    <?php
                    $conn = new mysqli("localhost","root","","dbms_pro");
                    $sql1="SELECT * FROM mess_info where userid='200003AB'";
                    $result = $conn->query($sql1);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<br>".$row['uname'];
                            echo "<br>Price: ".$row['price_range'];
                            echo "<br>Location: ".$row['mlocation'];
                            echo "<br>Type: ".$row['meals_served'];
                        }
                    }
                    $conn->close();
                ?>
                </div>
                 </div>
                  <button  class="buy-button details">
                    Visit Now
                  </button>             
              </div>
              <!-- Fourth-->        
              <div class="card">
                <div class="content">
                <div class="title">S.S Mess</div>
                <div class="image">
                  <img
                    src="img/MImage4.jpg"
                  />
                </div>
                <div class="text">
                    <?php
                    $conn = new mysqli("localhost","root","","dbms_pro");
                    $sql1="SELECT * FROM mess_info where userid='200004AB'";
                    $result = $conn->query($sql1);
                    if($result->num_rows>0)
                    {
                        while($row=$result->fetch_assoc())
                        {
                            echo "<br>".$row['uname'];
                            echo "<br>Price: ".$row['price_range'];
                            echo "<br>Location: ".$row['mlocation'];
                            echo "<br>Type: ".$row['meals_served'];
                        }
                    }
                    $conn->close();
                ?>
                </div>
                 </div>
                  <button  class="buy-button details">
                    Visit Now
                  </button>             
              </div>              
                    
             
       
                 
            </section>
        </section>
        
        <section class="footer">
            <h4>About Us</h4>
            <p>Users want convenience & results, and STUGuide provides just that. STUGuide provides the users with day-to-day services, all under a single website.<br> This Project also ensure that all the day-to-day services are made available to the users making it a very reliable website and easy to use than manually searching for them.</p>
        </section>

    </body>
</html>