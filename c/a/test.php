<?php
  require_once '../../config/includes.php';
  require_once 'session.php';

  $sql ="SELECT * FROM um_request";
  $result=$link->query($sql);
  $chart_data="";

  while ($row = mysqli_fetch_array($result)) { 
    $productname[]  = $row['um_reqtype_name'];
    $sales[] = $row['um_req_qty'];
  }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Graph</title> 
    </head>
    <body>
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header" >Order Reports (Today)</h2>
            <canvas id="chartjs_bar"></canvas> 
        </div>    
    </body>

  <?php include 'scripts.php'; ?>

    <script type="text/javascript">
      var ctx = document.getElementById("order").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels:['Diploma','Transcript of Records (TOR)','Account Statement','Diploma authenticated','Transcript of Records (TOR) authenticated'],
                datasets: [{
                    backgroundColor: [
                       "#5969ff",
                        "#ff407b",
                        "#25d5f2",
                        "#ffc750",
                        "#2ec551",
                        "#7040fa",
                        "#ff004e"
                    ],
                    data:[10,12,7,3,17],
                }]
            },

            options: {
              legend: {
                display: true,
                position: 'bottom',
                labels: {
                    fontColor: '#71748d',
                    fontFamily: 'Circular Std Book',
                    fontSize: 14,
                }
              },
            }
        });
    </script>
</html>