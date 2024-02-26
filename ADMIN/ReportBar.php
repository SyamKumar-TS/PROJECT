<?php

include("../Assets/Connection/Connection.php");


?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
 <form method="post" align="center">
        	From Date <input type="date" name="fdate" max="<?php echo date("Y-m-d")?>" required>
            To Date <input type="date" name="tdate" max="<?php echo date("Y-m-d")?>" required>
            <select name='movie'>
  <option value=''>select language</option>
  <?php 
    $select = "select * from tbl_movie";
    $row1=$Conn->query($select);
    while($data1=$row1->fetch_assoc())
    {
      ?>
        <option value='<?php echo $data1["movie_id"] ?>'><?php echo $data1["movie_name"] ?></option>
      <?php
    }
  ?>
</select>
            <input type="submit" name="btn_search" value="Search">
            <br><br><br>
        </form>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_tickettype";
  $row=$Conn->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["tickettype_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_tickettype ";
  $row=$Conn->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select COALESCE(count(booking_id),0) as id from tbl_booking b inner join tbl_movieschedule ms on ms.movieschedule_id=b.movieschedule_id inner join tbl_movie m on m.movie_id=ms.movie_id  WHERE type_id='".$data["tickettype_id"]."'";


    if(isset($_POST["btn_search"]))
    {
      $sel1=$sel1." and booking_date between '".$_POST["fdate"]."' and '".$_POST["tdate"]."' and m.movie_id='".$_POST["movie"]."'";

    }



	  $row1=$Conn->query($sel1);
  while($data1=$row1->fetch_assoc())
	  {
			echo $data1["id"].",";
	  }
  }

?>
];



var barColors = [
  "#5d8aa8",
  "#ffbf00",
  "#ff033e",
  "#9966cc",
  "#a4c639",
  "#cd9575",
  "#915c83",
  "#008000",
  "#00ffff",
  "#fdee00",
  "#007fff",
  "#fe6f5e",
  "#ace5ee"
];

new Chart("myChart", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true
            }
        }]
    },
    title: {
      display: true,
      text: " Movie Sales By Ticket Type"
    }
  }
});
</script>

</div>
</body>
</html>
