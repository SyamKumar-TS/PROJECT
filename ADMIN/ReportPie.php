<?php

include("../Assets/Connection/Connection.php");


?>
<!DOCTYPE html>
<html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<div id="tab" align="center">
 <form method="post">
 <select name='sel_name'>
  <option value=''>select language</option>
  <?php 
    $select = "select distinct(movie_language) from tbl_movie";
    $row1=$Conn->query($select);
    while($data1=$row1->fetch_assoc())
    {
      ?>
        <option value='<?php echo $data1["movie_language"] ?>'><?php echo $data1["movie_language"] ?></option>
      <?php
    }
  ?>
</select>
<input type="submit" name="btn_find" value="Find">
</form>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>


var xValues = [
<?php 

  $sel="select * from tbl_category";
  $row=$Conn->query($sel);
  while($data=$row->fetch_assoc())
  {
        echo "'".$data["category_name"]."',";
      
  }

?>
];

var yValues = [
<?php 
  $sel="select * from tbl_category ";
  $row=$Conn->query($sel);
  while($data=$row->fetch_assoc())
  {
	  
	 $sel1="select COALESCE(count(m.movie_id),0) as id from tbl_booking b inner join tbl_movieschedule c on c.movieschedule_id=b.movieschedule_id inner join tbl_movie m on m.movie_id=c.movie_id WHERE m.category_id='".$data["category_id"]."'";


    if(isset($_POST["btn_find"]))
    {
      $sel1=$sel1."and movie_language='".$_POST["sel_name"]."'";

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
  type: "pie",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "All Movie Category Sales"
    }
  }
});
</script>

</div>
</body>
</html>
