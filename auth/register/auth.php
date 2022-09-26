<?php

    if(!isset($_SESSION['customer'])){
        echo '<script>window.location.href = "admin/login.php"</script>';
    }
?>