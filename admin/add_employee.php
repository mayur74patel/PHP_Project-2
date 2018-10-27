	<?php
session_start();
include 'commonincludefiles.php';
global $conn;
include 'header.php';
include 'sidebar.php';

if (isset($_POST['submitdata']) && $_POST['submitdata'] == 'Save') {

    $emp_name = $_POST['emp_name'];    
	$emp_phone_no=$_POST['emp_phone_no'];
	$emp_age=$_POST['emp_age'];
	$emp_salary=$_POST['emp_salary'];
	$emp_sex=$_POST['emp_sex'];
	$emp_address=$_POST['emp_address'];
	$emp_job_type=$_POST['emp_job_type'];
	$air_name=$_POST['air_name'];
    
    $addcategory = addemployee($emp_name,$emp_phone_no,$emp_age,$emp_salary,$emp_address,$emp_job_type,$air_name);
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
            Add Employee        
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
                            <h3 class="box-title">Enter Employee Details</h3>
                        </div>                         	
                        <div class="box-body">
                            <?php echo $message; ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name*</label>                                
                                    <input type="text" class="form-control" id="vCategoryName" name="emp_name" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Phone No*</label>                                
                                    <input type="number" class="form-control" id="vCategoryName" name="emp_phone_no" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Age*</label>                                
                                    <input type="number" class="form-control" id="vCategoryName" name="emp_age" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Salary*</label>                                
                                    <input type="number" class="form-control" id="vCategoryName" name="emp_salary" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Sex*</label>                                
                                    <select class="form-control" name="emp_sex">
										<option value="male">Male</option>
										<option value="female">Female</option>
									</select>                                
                                </div>
								
								<div class="form-group">
                                    <label>Address*</label>                                
                                    <input type="text" class="form-control" id="vCategoryName" name="emp_address" required onkeypress="return spacerestri(event, this);">                                
                                </div>
								<div class="form-group">
                                    <label>Job Type*</label>                        
									<select class="form-control" name="emp_job_type">
										<option value="Administrative Support">Administrative Support</option>
										<option value="Engineer">Engineer</option>
										<option value="Traffic Monitor">Traffic Monitor</option>
										<option value="Airport Authority">Airport Authority</option>
										
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

