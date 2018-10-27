	<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {
	 $flight_name = $_POST['flight_name'];
   $airl_name = $_POST['airl_name'];    
	$air_name=$_POST['air_name'];
	$source=$_POST['source'];
	$destination=$_POST['destination'];
	$arrival=$_POST['arrival'];
	$depature=$_POST['depature'];
	$duration=$_POST['duration'];
	$status=$_POST['status'];
    
    $addcategory = addflight($flight_name,$airl_name,$air_name,$source,$destination,$arrival,$depature,$duration,$status);
    if ($addcategory > 0 && $addcategory != '') {
        $message = "<div class='alert alert-success' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Success!</strong> Category data added successfully.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Success!</strong> Category data added successfully.
                                </div></div>";
    } else {
        $message = "<div class='alert alert-error' style='padding: 10px;'><button type='button' class='close' data-dismiss='alert'>&times;</button><strong>Error!</strong> problem in adding category data.<div class='alert alert-success' style='display:none'>
                                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                                        <strong>Error!</strong> problem in adding category data.
                                </div></div>";
    }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Flight        
        </h1>        
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <form role="form" method="post" id="addcategory" name="categoryform" enctype="multipart/form-data">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Enter Flight Details</h3>
                        </div>                         	
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name*</label>                                
                                    <input type="text" class="form-control" id="vCategoryName" name="flight_name" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Airlience Name*</label>
<select class="form-control" name="airl_name">
								   <?php
										    global $conn;
    $temp = array();
	$select_query = "SELECT *FROM airlines ORDER BY id DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
      
	  					echo "<option value=". $row['airl_name'] .">". $row['airl_name'] ."</option>";
	
        }
    }
								   ?>								
                                </select>
								</div>
								<div class="form-group">
                                    <label>Source*</label>
<select class="form-control" name="source">
								   <?php
										    global $conn;
    $temp = array();
	$select_query = "SELECT *FROM airport ORDER BY id DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
      
	  					echo "<option value=". $row['city'] .">". $row['city'] ."</option>";
	
        }
    }
								   ?>								
                                </select>
								</div>
								<div class="form-group">
                                    <label>Destination*</label>
<select class="form-control" name="destination">
								   <?php
										    global $conn;
    $temp = array();
	$select_query = "SELECT *FROM airport ORDER BY id DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
      
	  					echo "<option value=". $row['city'] .">". $row['city'] ."</option>";
	
        }
    }
								   ?>								
                                </select>
								</div>
								
								
								<div class="form-group">
                                    <label>arrival*(Hour:Minute AM?PM)</label>                                
                                    <input type="time" class="form-control" id="vCategoryName" name="arrival" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>depature*(Hour:Minute AM?PM)</label>                                
                                    <input type="time" class="form-control" id="vCategoryName" name="depature" required onkeypress="return spacerestri(event, this);">                                
                                </div>
							
							
								<div class="form-group">
                                    <label>duration*(Hour:Minute AM?PM)</label>                                
                                    <input type="time" class="form-control" id="vCategoryName" name="duration" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>status*</label>                        
									<select class="form-control" name="status">
										<option value="On Time">On Time</option>
										<option value="Delay">Delay</option>
										
										
									</select>
                                </div>
								
								<div class="form-group">
                                    <label>Airport name*</label>                                
                                   <select class="form-control" name="air_name">
								   <?php
										    global $conn;
    $temp = array();
	$select_query = "SELECT *FROM airport ORDER BY id DESC";
    $select_res = mysqli_query($conn, $select_query);
    if (mysqli_num_rows($select_res) > 0) {
        $i = 0;
        while ($row = mysqli_fetch_array($select_res)) {
      
	  					echo "<option value=". $row['air_name'] .">". $row['air_name'] ."</option>";
	
        }
    }
								   ?>
										<option>
									</select>                               
                                </div> 
                            </div>
                        </div> 
                        <div class="box-footer">
                            <div class="col-md-12">
                                <input type="submit" class="btn btn-primary" value="Save" name="submitdata">
                            </div>
                        </div>
                    </div>                    
                </div>
            </form>
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?php include 'footer.php'; ?>
<script type="text/javascript">
    $('.categorypic').on('change', '#tImage', function (e) {
        var fname = e.target.files[0].name;
        var fileExtension;
        fileExtension = fname.replace(/^.*\./, '');
        if (fileExtension != 'gif' && fileExtension != 'jpg' && fileExtension != 'png' && fileExtension != 'jpeg') {
            alert('Image file type must be PNG, JPG, JPEG or GIF');
            $('input[type=file]').val('');
            return false;
        }
        if ((this.files[0].size) > 2048000) {
            alert('File size must be less than or equal to 2 MB');
            $('input[type=file]').val('');
            return false;
        }
    });
</script>
</body>
</html>

