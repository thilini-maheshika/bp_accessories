<?php
    require_once 'pages/header.php';
?>

<body onload="NotifyMsgs(<?php echo $row; ?>)">


    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 title">
                <h1><i class="fa fa-bars"></i> View Contact Messages <button class="btn btn-sm btn-default"><a
                            href="index.php">Back</a></button></h1>
            </div>
            <div class="search-div">
                <div class="col-sm-9">
                    All( <?php 
                    $all=getAllMessages();
                    echo $row=mysqli_num_rows($all);;
                    ?> )
                </div>
            </div>

            <div class="col-sm-12">
                <div class="content">
                    <div class="table-responsive">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Contact Name</th>
                                    <th>Contact Email</th>
                                    <th>Contact Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Contact Name</th>
                                    <th>Contact Email</th>
                                    <th>Contact Phone</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>
                            </tfoot>
                            <tbody>

                                <?php
                            $getmsg= getAllMessages();
                            while($row=mysqli_fetch_assoc($getmsg)){
                            
                            ?>

                                <tr>

                                    <td>
                                        <a href="#"><?php echo $row['contact_name']; ?></a>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $row['contact_email']; ?></a>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $row['contact_phone']; ?></a>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $row['contact_msg']; ?></a>
                                    </td>

                                    <td>
                                        <a href="#"><?php echo $row['date_updated']; ?></a>
                                    </td>

                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</body>