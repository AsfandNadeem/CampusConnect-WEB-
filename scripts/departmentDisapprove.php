<?php

include('../Includes/connect.php');
$id=$_REQUEST["id"];
$query0="select * FROM department where Did = {$id}";
$res0=mysqli_query($con,$query0);
if($res0)
{
    echo $id;
    while($row=mysqli_fetch_assoc($res0))
    {
        $aid=$row['Aid'];
        echo $aid;
        $query1="select * FROM admin where Aid = {$aid}";
        $res1=mysqli_query($con,$query1);
        if($res1)
        {
            while($row1=mysqli_fetch_assoc($res1))
            {
                $pid=$row1["Pid"];
                echo $pid;
                $query2="DELETE from person where Pid = {$pid}";
                $res2=mysqli_query($con,$query2);
                if($res2)
                {
                    echo $pid;
                }

            }
        }    
    }
} 


?>