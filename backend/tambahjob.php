<?php

if(isset($_POST['addjob'])){

    $n = $_POST['jobname'];
    $d = $_POST['desc'];
    $s = $_POST['start'];
    $e = $_POST['end'];
    $er = $_POST['endregist'];
    $jl = $_POST['jobloc'];
    $wt = $_POST['workingtype'];

    $tambahjob = mysqli_query($conn,"insert into job (jobname,jobdesc,jobstart,jobend,registerend,jobloc,workingtype)
                                    values ('$n','$d','$s','$e','$er','$jl','$wt')");

    if($tambahjob){
        echo 'Berhasil';
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    };

};



?>