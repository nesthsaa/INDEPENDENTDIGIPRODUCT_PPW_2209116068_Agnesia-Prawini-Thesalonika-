<?php
    if(isset($_POST['update'])){
        $u1 = $_POST['updatejobname'];
        $u2 = $_POST['updatedesc'];
        $u3 = $_POST['updatestart'];
        $u4 = $_POST['updateend'];
        $u5 = $_POST['updatedeadline'];
        $u6 = $_POST['updatejobloc'];
        $u7 = $_POST['updateworkingtype'];
        $idd = $_POST['updateid'];

        $updatejob = mysqli_query($conn,"update job set jobname='$u1', jobdesc='$u2', jobstart='$u3', jobend='$u4', registerend='$u5', jobloc='$u6', workingtype='$u7' where id='$idd'");

        if($updatejob){
            echo 'Berhasil
            <meta http-equiv="refresh" content="1;url=admin.php" />';
        } else {
            echo 'Gagal
                  <meta http-equiv="refresh" content="3;url=admin.php" />';
        };


    };
?>