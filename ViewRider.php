
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>View Rider</title>
    <link rel="stylesheet" href="CSS/View.css" type="text/css">
    <link rel="stylesheet" href="CSS/navigator.css" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/path/to/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</head>

<style>
  .w3-row-padding img {
    margin-bottom: 12px
  }

  .w3-sidebar {
    width: 120px;
    background: #00ffff;
  }

  #main {
    margin-left: 150px
  }

  @media only screen and (max-width: 600px) {
    #main {
      margin-left: 0
    }
  }

  .notification {
    text-decoration: none;
    padding: 10px 20px;
    position: relative;
    display: inline-block;
    border-radius: 2px;
  }

  .notification .badge {
    position: absolute;
    top: -10px;
    right: -3px;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
  }
</style>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body>
<header>
    <nav>
    <input type ="checkbox" id = "check">
    <label for="check" class = "checkbtn">
        <i class = "fas fa-bars"></i>
    </label>
    <div class = "logo">
        <img src = "Images/DD.png">
    </div>
    <ul>
        <li><a class = "active" href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
        <li><a href="#">Home</a></li>
    </ul>
    </nav>
</header>

<div class="w3-black">
    <!-- Icon Bar (Sidebar - hidden on small screens) -->
    <div style="color:black">
      <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">

        <a href="HOMEPAGE.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <i class="fa fa-home fa-3x "></i>
          <p><b>Home</b></p>
        </a>
        <a href="Report.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="Images/4.png" width="80%">
          <p><b>Report</b></p>
        </a>
        <a href="Registration.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
          <img src="Images/registration.png" width="100%">
          <p><b>Register Driver</b></p>
        </a>
        <a href="ViewRider.php" class="w3-bar-item w3-button w3-padding-large w3-black">
          <div class="notification">
            <img src="Images/UserList.png" width="100%">
            <p><b>View Riders</b></p>
          </div>
        </a>
        
   
  </div>

  </div>
   <section>
   <?php
	$con = mysqli_connect("localhost","root","","portx");
	
	 if(!$con) 
	 {
		die("Cannot connect with DB server"); 
	 }
	 
	 $sql = "SELECT * FROM `drivertbl`";
	 
	 $result = mysqli_query($con,$sql);	
	
	 if(mysqli_num_rows($result)>0)
	 {
		while($row = mysqli_fetch_assoc($result)) 
		{
			
      echo "
      <div class='wrap'>
      <div class='card'>
          <img src= ".$row["Photo"].">
          <div class='container'>
          <h3>".$row['Fname']."</h3> 
          <p><b>Last Name: </b>".$row["LName"]."</p>
          <p><b>NIC Number: </b>".$row["NICno"]."</p> 
          <p><b>Licsense No: </b>".$row["Licsense"]."</p>
          <p><b>Email: </b>".$row["Email"]."</p>
          <p><b>Contact No: </b>".$row["Phone"]."</p>
          <p><b>Kilometers Driven : </b>".$row["Kilometers"]."</p>
          <p><b>Comission per KM : </b>".$row["Commission"]."</p>
          <table>
          <tbody>
          <tr><td><a class = 'btn' href ='UpdateRider.php?id=".$row["Email"]."'><p>Edit</p></a></td>
          <td><a class = 'btn' href ='DeleteHandler.php?id=".$row["Email"]."'><p>Delete</p></a></td></tr>
          </tbody>
          </table>
          </div>
      </div>
      </div>
      ";
		}
	 }		
	mysqli_close($con);		
?>
   </section>
</body>

</html>