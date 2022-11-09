<?php

include "Connection.php";

$sql4 = "SELECT * FROM graph";
$query4 = mysqli_query($connect, $sql4);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <title>Graph Representation</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],

          <?php  
          
          while($row =  mysqli_fetch_assoc($query3)){
            echo "['Whatsapp',".$row['total']."],";
            echo "['Telegram',".$row['total2']."],";
            echo "['Instagram',".$row['total3']."],";
          }
          ?>

        ]);

        var options = {
         // title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

        
  </head>
  

  <body>
  

  <div class="content">
    
    <div class="container">
      <h2 class="mb-5">Records</h2>
      

      <div class="table-responsive">

        <table class="table table-striped custom-table">
          <thead>
            <tr>
              
              <th scope="col">ID</th>
              <th scope="col">Month</th>
              <th scope="col">Whatsapp</th>
              <th scope="col">Telegram</th>
              <th scope="col">Instagram</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            <tr scope="row">
                
           

            <?php while($row = mysqli_fetch_assoc($query)){  ?>
            <tr>
              <td><?php    echo  $row['id'];  ?></td>
              <td><?php echo  $row['month'];  ?></td>
              <td><?php echo $row['whatsapp'];  ?></td>
              <td><?php echo $row['telegram'];  ?></td>
              <td><?php echo $row['instagram'];  ?></td>
              <td><a href="#" class="more">Details</a></td>
            </tr>
            
            <?php  }  ?>

            
           
            
           
            
      
            
          </tbody>
        </table>
      </div>


    </div>

  </div>



  <div class="container">
      <h2 class="mb-5">Graph Representation</h2>

    <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Line Chart</h5>

                <div id="line"></div>

              </div>
            </div>
          </div>



          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Pie Chart</h5>

                <div id="piechart"></div>
                
              </div>
            </div>
          </div>
    </div>

  </div>
   


    
  

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>


<script>
    Morris.Bar({
        element: 'line',
        data: [<?php echo $line_chart; ?>],
        xkey: 'month',
        ykeys: ['whatsapp', 'telegram', 'instagram'],
        labels: ['whatsapp', 'telegram', 'instagram'],
        hideHover: 'auto',
        stacked: true

    });
</script>