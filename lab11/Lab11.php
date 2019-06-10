<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here
$dbhost="localhost";
$dbuser="root";
$dbpass="fd346013";
$dbname="travel";
//创建连接
$conn=new mysqli($dbhost,$dbuser,$dbpass,$dbname);
if($conn->connect_error){
    die("连接失败: ".$conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Lab11</title>

      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    
    

    <link rel="stylesheet" href="css/captions.css" />
    <link rel="stylesheet" href="css/bootstrap-theme.css" />    

</head>

<body>
    <?php include 'header.inc.php'; ?>
    


    <!-- Page Content -->
    <main class="container">
        <div class="panel panel-default">
          <div class="panel-heading">Filters</div>
          <div class="panel-body">

              <form action="Lab11.php" method="get" class="form-horizontal" >
              <div class="form-inline">
              <select name="continent" class="form-control">
                <option value="empty">Select Continent</option>
                <?php
                //Fill this place
                //****** Hint ******
                //display the list of continents
                $sql="SELECT * From continents";
                $result=$conn->query($sql);
                while($row = $result->fetch_assoc()) {
                  echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
                }
                ?>
              </select>     
              
              <select name="country" class="form-control">
                <option value="empty">Select Country</option>
                <?php 
                //Fill this place
                //****** Hint ******
                /* display list of countries */
                $sql="SELECT * From countries";
                $result=$conn->query($sql);
                while($row = $result->fetch_assoc()){
                    echo '<option value='.$row['ISO'].'>'.$row['CountryName'].'</option>';
                }
                ?>
              </select>    
              <input type="text"  placeholder="Search title" class="form-control" name=title>
              <button type="submit" class="btn btn-primary">Filter</button>
              </div>
            </form>
<!--              <iframe name="formsubmit" style="display:none;"></iframe>-->
<!--              <!-- 将form表单提交的窗口指向隐藏的ifrmae,并通过ifrmae提交数据。 xxxxx-->
          </div>
        </div>     
                                    

		<ul class="caption-style-2">
            <?php 
            //Fill this place

            //****** Hint ******
            /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */

            //展示一张图片
            function showOne($row){
                echo "<li>
                         <a href=\"detail.php?id=".$row['ImageID']."\" class=\"img-responsive\" >
                            <img src=\"images/square-medium/".$row['Path']."\" alt=\" ".$row['Title']."\" width='225px'>
                                 <div class='caption'>
                                    <div class='blur'></div>
                                     <div class='caption-text'>
                                          <p>".$row['Title']."</p>
                                </div>
                              </div>
                          </a>
                       </li>";
            }

            //显示所有图片
            function showAll(){
                $sql="SELECT * From imagedetails";
                $result=$GLOBALS['conn']->query($sql);
                while($row=$result->fetch_assoc()){
                      showOne($row);
                }
            }

            //通过国家展示图片
            function showCountry($country){
                $sql="SELECT * From imagedetails WHERE CountryCodeISO='$country' ";
                $result=$GLOBALS['conn']->query($sql);
                while($row=$result->fetch_assoc()){
                    showOne($row);
                }
            }

            //通过洲显示图片
            function showContinent($continent){
                $sql="SELECT * From imagedetails WHERE ContinentCode='$continent' ";
                $result=$GLOBALS['conn']->query($sql);
                while($row=$result->fetch_assoc()){
                    showOne($row);
                }
            }

            //通过洲和国家显示图片
            function showBoth($country,$continent){
                $sql="SELECT * From imagedetails WHERE ContinentCode='$continent' AND CountryCodeISO='$country' ";
                $result=$GLOBALS['conn']->query($sql);
                while($row=$result->fetch_assoc()){
                    showOne($row);
                }
            }

                $country2=isset($_GET['country'])?htmlspecialchars($_GET['country']):"empty";
                $continent2=isset($_GET['continent'])?htmlspecialchars($_GET['continent']):"empty";
//                echo  "continent2是".$continent2."  | country2是".$country2." <br>";
                if($continent2=="empty" && $country2=="empty"){
                    showAll();
                }

               else if($continent2==="empty" && $country2!=="empty"){
                    showCountry($country2);


                }
               else  if($continent2!=="empty" && $country2==="empty"){
                    showContinent($continent2);


                }
                else if($continent2!=="empty" && $country2!=="empty"){
                    showBoth($country2,$continent2);

                }
                else{
                    echo "未找到符合条件的物品";
                }

                //关闭连接
                $conn->close();
            ?>

       </ul>       

      
    </main>
    
    <footer>
        <div class="container-fluid">
                    <div class="row final">
                <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
                <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
            </div>            
        </div>
        

    </footer>


        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>