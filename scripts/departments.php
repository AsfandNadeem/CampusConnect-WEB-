<?php

include('../Includes/connect.php');
$id=$_POST["id"];
$query0="SELECT * from department where Uid ={$id} and status = 'approved'";
$res0=mysqli_query($con,$query0);
if($res0>0)
{
    if(mysqli_num_rows($res0)>0)
    {
        while($row=mysqli_fetch_assoc($res0))
        {?>
            <option value="<?=$row['Did']?>"><?=$row['Dname'] ?></option>
       <?php }
    }
}    

?>