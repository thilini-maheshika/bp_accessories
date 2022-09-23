<?php
    require_once 'pages/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12 title">
            <h1><i class="fa fa-bars"></i> Customers <button class="btn btn-sm btn-default"><a
                        href="index.php">Back</a></button></h1>
        </div>
        <div class="search-div">
            <div class="col-sm-9">
                All( <?php 
                    $all=getAllCustomers();
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
                                <th>Customer Name</th>
                                <th>Customer Email</th>
                                <th>Customer Phone</th>
                                <th>Date Updated</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Customer Name</th>
                            <th>Customer Email</th>
                            <th>Customer Phone</th>
                            <th>Date Updated</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php
                            $getcust= getAllCustomers();
                            while($row=mysqli_fetch_assoc($getcust)){ ?>

                            <tr>

                                <td>
                                    <a href="#"><?php echo $row['cust_name']; ?></a>
                                </td>

                                <td>
                                    <a href="#"><?php echo $row['cust_email']; ?></a>
                                </td>

                                <td>
                                    <a href="#"><?php echo $row['cust_phone']; ?></a>
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