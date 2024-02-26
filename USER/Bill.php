<?php
include("../Assets/Connection/Connection.php"); 
$selqry="select * from tbl_booking b inner join tbl_movieschedule ms on ms.movieschedule_id=b.movieschedule_id inner join tbl_movie m on m.movie_id=ms.movie_id inner join tbl_screen s on s.screen_id=ms.screen_id inner join tbl_user u on u.user_id=b.user_id where booking_id='".$_GET["id"]."'";
$result=$Conn->query($selqry);
$data=$result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Bill</title>
    <link rel="shortcut icon" type="image/png" href="./favicon.png" />
    <style>
      * {
        box-sizing: border-box;
      }

      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        word-break: break-all;
      }

      body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        font-size: 16px;
      }
      .h4-14 h4 {
        font-size: 12px;
        margin-top: 0;
        margin-bottom: 5px;
      }
      .img {
        margin-left: "auto";
        margin-top: "auto";
        height: 30px;
      }
      pre,
      p {
        /* width: 99%; */
        /* overflow: auto; */
        /* bpicklist: 1px solid #aaa; */
        padding: 0;
        margin: 0;
      }
      table {
        font-family: arial, sans-serif;
        width: 100%;
        border-collapse: collapse;
        padding: 1px;
      }
      .hm-p p {
        text-align: left;
        padding: 1px;
        padding: 5px 4px;
      }
      td,
      th {
        text-align: left;
        padding: 8px 6px;
      }
      .table-b td,
      .table-b th {
        border: 1px solid #ddd;
      }
      th {
        /* background-color: #ddd; */
      }
      .hm-p td,
      .hm-p th {
        padding: 3px 0px;
      }
      .cropped {
        float: right;
        margin-bottom: 20px;
        height: 100px; /* height of container */
        overflow: hidden;
      }
      .cropped img {
        width: 400px;
        margin: 8px 0px 0px 80px;
      }
      .main-pd-wrapper {
        box-shadow: 0 0 10px #ddd;
        background-color: #fff;
        border-radius: 10px;
        padding: 15px;
      }
      .table-bordered td,
      .table-bordered th {
        border: 1px solid #ddd;
        padding: 10px;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
 <br /><br /><br /><br /><br /><br />
  <button id="cmd" onClick="printDiv('content')" style="float:right;color:#FFF;background:#0C0;border:none;margin:20px;padding:10px;border-radius:10px" >Download Ticket</button>
    <section class="main-pd-wrapper" style="width: 1000px; margin: auto" id="content">
      <div style="display: table-header-group">
        <h4 style="text-align: center; margin: 0">
          <b>Ticket</b>
        </h4>

        <table style="width: 100%; table-layout: fixed">
          <tr>
            <td
              style="border-left: 1px solid #ddd; border-right: 1px solid #ddd"
            >
              <div
                style="
                  text-align: center;
                  margin: auto;
                  line-height: 1.5;
                  font-size: 14px;
                  color: #4a4a4a;
                "
              >
              	<span
                style="color:#F93;font-size:56px">Movie Booking</span>

                <p style="font-weight: bold; margin-top: 15px">
                  GST TIN : 06AAFCD6498P1ZT
                </p>
                <p style="font-weight: bold">
                  Toll Free No. :
                  <a href="tel:018001236477" style="color: #00bb07"
                    >1800-123-6477</a
                  >
                </p>
              </div>
            </td>
            <td
              align="right"
              style="
                text-align: right;
                padding-left: 50px;
                line-height: 1.5;
                color: #323232;
              "
            >
              <div>
                <h4 style="margin-top: 5px; margin-bottom: 5px">
                 Ticket for 
                </h4>
                <p style="font-size: 14px">
                <?php echo $data["user_name"] ?>
                  <br />
                  <?php echo $data["user_address"] ?>
                  <br />
                  Tel:<?php echo $data["user_contact"] ?>
                </p>
              </div>
            </td>
          </tr>
        </table>
      </div>
      <table
        class="table table-bordered h4-14"
        style="width: 100%; -fs-table-paginate: paginate; margin-top: 15px"
      >
        <thead style="display: table-header-group">
          <tr
            style="
              margin: 0;
              background: #fcbd021f;
              padding: 15px;
              padding-left: 20px;
              -webkit-print-color-adjust: exact;
            "
          >
            <td colspan="3">
              <p>Booking Date:- <?php echo $data["booking_date"] ?></p>
            </td>
            <td colspan="3" style="width: 300px">
              <h4 style="margin: 0">Ticket For</h4><br>
              <p>
                <?php echo $data["movie_name"] ?>
              </p>
              <p>
                <?php echo $data["slot_name"] ?>
              </p>
              <p>
                <?php echo $data["screen_name"] ?>
              </p>
            </td>
          </tr>
        </tbody>
        <tfoot></tfoot>
      </table>

    </section>
    
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</body>
</html>
