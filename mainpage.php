

<!DOCTYPE html>

<html>
    <head>
        
        <link rel ="stylesheet" href="css/main page item.css">
        <link rel ="stylesheet" href="css/button.css">
        <link rel="stylesheet"  href="css/styles.css">
        <link rel="stylesheet" type="text/css" href="style.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <
        

    
       
    </head>
  <body>
   
      <nav>
        <div class="logo">Logo</div>
         <ul class="nav-options">
          <li><a href="index.php">Logout</a></li>
          
          <li><a href="comparison.php">Compare</a></li>
          <li><a href="admin/adminlogin.php">Admin</a></li>
        </ul>
      </nav>
      
        <div class="item-plan">
            <div class="item">
                <div class="item__inner-container">
                    <div class="item__top-part">
                        
                      </div>
                    <div class="item__bottom-part">
                    <button id="sport-button">Sport</button>
                      </div>
                </div>
            </div>
              <div class="ii-item">
                <div class="item__inner-container">
                  <div class="item__top-part">
                    
                  </div>
                <div class="item__bottom-part">
                <button id="school-button">School</button>
                  </div>
                </div>
            </div>
            
            <div class="iii-item">
                <div class="item__inner-container">
                  <div class="item__top-part">
                    
                  </div>
                <div class="item__bottom-part">
                <button id="casual-button">Casual</button>
                  </div>

                </div>
            </div>
            <div class="iv-item">
                <div class="item__inner-container">
                  <div class="item__top-part">
                    
                  </div>
                <div class="item__bottom-part">
                <button id="fashion-button">Fashion</button>
                                 
                </div>
                </div>
             </div>
            </div>
            <script>
        // JavaScript code for handling category button clicks
        $(document).ready(function() {
            $('#school-button').click(function() {
                window.location.href = 'school.php?category=school';
            });

            $('#casual-button').click(function() {
                window.location.href = 'casual.php?category=casual';
            });

            $('#fashion-button').click(function() {
                window.location.href = 'fashion.php?category=fashion';
            });

            $('#sport-button').click(function() {
                window.location.href = 'sport.php?category=sport';
            });
        });
    </script>
        
    
    
 </body>
</html>