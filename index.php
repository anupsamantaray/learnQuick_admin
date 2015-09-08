<?php 
include_once('classes/config.php');
include_once('classes/admin.php');
$obj= new Admin();

if(!$obj->isAdminLoggedIn())
{
	header("Location: login.php");
	exit(0);
} 
else
{
	$admin_id = $_SESSION['admin_id'];
}

if(isset($_POST['search']))
{

}

$data=$obj->getAllUsers();

?>

<!DOCTYPE <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Admin Dashboard </title>


	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/style1.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	<style type="text/css">

</style>

</head>

<body color:red>
	<!-- header -->
	<div class="cotainer" style="width:100%;margin:0px;">
		<?php  include_once('includes/header.php'); ?>
	</div>
	<!-- /Header -->

	<!-- Main -->
	
		

	</div>
	<div class="container-fluid" style="margin-top:0px;background-color:#3E3B3C;">
		<div class="row" style="margin-top: 65px;">
			<div class="col-md-2" >
				<!-- Left column -->
				<?php  include_once('includes/side_nav.php'); ?>
			</div><!-- /col-3 -->
			<div class="col-md-10">

				<!-- column 2 -->
				
				<a href="#"><strong><i class="glyphicon glyphicon-briefcase"></i> School Admin </strong></a>

				<hr>
				<div class="row">
					<!-- center left-->
					<div class="col-md-12">
						<div class="panel panel-default panel-condensed" id="userPane">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-11">
										<strong>Users</strong>
									</div>
									<div class="col-md-1">
										<a data-toggle="collapse" data-parent="userPane" href="#userBody">
											<span class="glyphicon glyphicon-chevron-down"></span>
										</a>
									</div>
								</div>
							</div>
							<div id="userBody" class="panel-collaps collapse in">
								<div class="panel-body">

									<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper form-inline" role="grid">
			                              </br>
													<div class="table-responsive">
														<table class="data-table-column-filter table table-bordered table-striped dataTable" style="margin-bottom:0;" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
															<thead>
																<tr role="row"><th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name
																	: activate to sort column descending" style="width: 409px;">
																	Name
																</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="
																Address
																: activate to sort column ascending" style="width: 425px;">
																Address
															</th><th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="
															EmailId
															: activate to sort column ascending" style="width: 217px;">
															Email Id
														</th>

														<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="
														Status
														: activate to sort column ascending" style="width: 217px;">
														Mobile No.
													</th>

													

													<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="
													Status
													: activate to sort column ascending" style="width: 217px;">
													  Action
												</th></tr>
											</thead>


											<tbody role="alert" aria-live="polite" aria-relevant="all">
												<?php 

												if(count($data) > 0)
												{
													$i=1;
													foreach ($data as $key => $value) {

														?>

														<tr>
															<td class=" sorting_1"><?php echo $value['username'];?></td>
															<td><?php echo $value['address'];?></td>
															<td><?php echo $value['email'];?></td>
															<td><?php echo $value['mobile'];?></td>
																											<td>
																<div class="text-center">
																	<a class="btn btn-success btn-xs" href="#" onclick="UserDelete(<?php echo $value['user_id']; ?>)">
																		<i class="glyphicon glyphicon-remove tooltips" data-original-title="Delete User" title="Delete User"></i>
																	</a>
																</div>
															</td>
														</tr> 
														<?php

														$i++;
													} 
												} 

												?>

											</tbody>
										</table>
									</div> 

								
								</div>


							</div>
						</div><!--/panel-body-->
					</div><!--/panel-->



				</div><!--/col-->
			</div><!--/row-->

		</div><!--/col-span-9-->
	</div>

	<!-- /Main -->

	<?php include_once('includes/footer.php');  ?>

	<div class="modal" id="addWidgetModal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title">Add User</h4>
				</div>
				<div class="modal-body">

					 




				</div>
				<div class="modal-footer">
					<a href="#" data-dismiss="modal" class="btn btn-danger">Cancel</a>
					<a href="#" class="btn btn-primary">Save User</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dalog -->
	</div><!-- /.modal -->
</div>
<script src="js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript">

       function ChangeStatus(id,status)
        {
            var r = confirm("Are you sure?");
            if(r == false) {
                return false;
            }

           
            $("a#status_"+id).text(' ');
            $.ajax({
              type: "POST",
              url: 'ajax.php?action=changeStatusUSer',
              data: {id:id,status:status},
              success: function(data){
                  
                  window.location.reload();
              }
          });
        }

        function UserDelete(id)
        {
        	var r=confirm("Are you sure?");
        	if(r==false){
              return false;
           }
              $.ajax({
              	type:"POST",
                url:"ajax.php?action=DeleteUser",
                data:{id:id},
                success:function(data){
                    
                    alert(data);
                    window.location.reload();
                }


              });
        }
    </script>

</body>
</html>