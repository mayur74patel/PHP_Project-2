<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';
$category_data = array();
$category_data = getAllticketData();
?>
<style>
    .editteacher, deleteteacher{
        margin-bottom: 10px;
    }
</style>
<div class="content-wrapper">
    <div class="example-modal">
        <div class="modal modal-primary" id="deletemodal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirm</h4>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure want to delete this Category data?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-outline" iCategoryID="" id="delete_yes">Yes</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Ticket List          
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="alert alert-success alert-dismissible" id="event-true" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-check"></i> Success! Category data successfully deleted.</h4>

                </div>
                <div class="alert alert-danger alert-dismissible" id="event-false" style="display: none;">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4 style="margin-bottom: 0px;"><i class="icon fa fa-ban"></i> Error! problem in deleting Category data.</h4>                    
                </div>
                <div class="box">                    
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="categorydata" class="table table-bordered table-striped">
                            <thead>
                                <tr>                                                              
                                    
									<th>Passenger Name</th>
									<th>Passenger Address</th>	
									<th>passenger Age</th>
									<th>Ticket No.</th>										   
                                    <th>Ticket Type.</th>
									<th>Passenger Mobile No.</th>										   
                                    <th>Flight Name</th>	
									<th>Passenger Email</th>
									<th>Ticket Price</th>	
									<th>Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($category_data)) {
                                    foreach ($category_data as $val) {
                                        echo "<tr id='row_" . $val['iCategoryID'] . "'>";
                                        echo "<td>" . $val['pass_name'] . "</td>";
										echo "<td>" . $val['pass_address'] . "</td>";
										echo "<td>" . $val['pass_age'] . "</td>";                                       
                                        echo "<td>" . $val['ticket_no'] . "</td>"; 
										echo "<td>" . $val['ticket_type'] . "</td>";                                       
                                        echo "<td>" . $val['pass_mo_no'] . "</td>";                                         
                                        echo "<td>" . $val['flight_name'] . "</td>";                                       
                                        echo "<td>" . $val['pass_email'] . "</td>";  
										echo "<td>" . $val['ticket_price'] . "</td>";                                       
                                        echo "<td>" . $val['date'] . "</td>";  	
										echo "<td><a href='#deletemodal' id='deletecategory" . $val['iCategoryID'] . "' iCategoryID='" . $val['iCategoryID'] . "' role='button' class='deletecategory btn btn btn-danger' data-toggle='modal'>Remove</a> </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                            </tbody>                        
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>


<?php include 'footer.php'; ?>
<script type="text/javascript">
    $(document).ready(function () {
        $("#categorydata").DataTable({
            "ordering": false
        });

        $(document).delegate('.deletecategory', 'click', function () {
            $('#delete_yes').attr('iCategoryID', $(this).attr('iCategoryID'));
        });

        $('#delete_yes').on('click', function ()
        {
            var catid = $(this).attr('iCategoryID');
            var data = {"catid": catid};
            $.ajax({
                url: "ticketdelete.php",
                data: data,
                method: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#deletemodal').modal('hide');
                    if (data == 1) {
                        $('#row_' + catid).remove();
                        $('#event-true').show().delay(5000).fadeOut();
                    } else {
                        $('#event-false').show().delay(5000).fadeOut();
                    }
                }
            });
        });

    });
</script> 
</body>
</html>

