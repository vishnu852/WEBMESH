<?php
include '../connection.php';
$aid=$_GET['aid'];
$sel_opentry=mysql_query("select * from op_entry where admit_num='$aid'");
$r_opentry=mysql_fetch_row($sel_opentry);
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <script src="js/jquery1111.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../authority/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="../authority/assets/font-awesome/4.5.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../authority/assets/css/fonts.googleapis.com.css" />
        <title></title>
    </head>
    <body>
        <h4><strong>MEDICINE USED</strong></h4>
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td colspan="5"><center>PRESCRIPTION</center></td>
            </tr>
            <tr>
                <td>#</td>
                <td>Medicine Name</td>
                <td>Qty.</td>                
            </tr>
            <?php
            $i=1;
            $sel_op_mdcn=mysql_query("select * from op_medicine where opentry_id='$r_opentry[0]'");
            while($r_opm=mysql_fetch_row($sel_op_mdcn))
            {
                ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php
                $sel_mn=mysql_query("select * from medicin_data where id='$r_opm[5]'");
                $r_mn=mysql_fetch_row($sel_mn);
                echo $r_mn[2];                
                ?><span style="float: right;"><?php echo $r_opm[8] ?></span></td>
                <td>
                    <?php echo $r_opm[6] ?>
                </td>
            </tr>
            <?php
            $i++;
            }      
            ?>
            <tr>
                <td colspan="5"><?php echo $r_opentry[6] ?></td>
            </tr>
        </table>
        <h4><strong>REQUIRED LAB TEST</strong></h4>
        <table class="table table-bordered table-condensed table-hover table-responsive table-striped">
            <tr>
                <td>#</td>
                <td>Test Name</td>
                <td>More</td>
            </tr>
            <?php
            $sel_test=mysql_query("select * from op_lab where opentry_id='$r_opentry[0]'");
            if(mysql_num_rows($sel_test)>0)
            {
                $i=1;
                while($r_test=mysql_fetch_row($sel_test))
                {
                    ?>
            <tr>
                <td><?php echo $i ?></td>
                <td><?php 
                $sel_tst=mysql_query("select * from labtest_data where id='$r_test[5]'");
                $r_tst=  mysql_fetch_row($sel_tst);
                echo $r_tst[1];
                ?></td>
                <td>
                    <?php
                    $sel_plab=mysql_query("select * from purchase_lab_test where op_lab_id='$r_test[0]'");
                    $r_plab=mysql_fetch_row($sel_plab);
                    if($r_plab[9]==1)
                    {
                        ?><a  target="_BLANK" href="../lab/<?php echo "$r_plab[8]/$r_plab[7]"; ?>">
                            <span class="glyphicon glyphicon-download" style="color: green"></span></a>
                    <?php
                    }
                    else
                    {
                         ?>
                    <span class="glyphicon glyphicon-eye-close" style="color: red"></span>
                    <?php
                    }
                    ?>
                </td>
            </tr>
            <?php
            $i++;
                }
            }
            else
            {
                ?>
            <tr>
                <td colspan="5">No Test Required</td>
            </tr>
            <?php
            }
            ?>
        </table>
    </body>
</html>
