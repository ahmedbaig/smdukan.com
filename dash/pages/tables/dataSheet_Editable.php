<?php
session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    header('location: ../../.././404.html');
}
?>
<style>
	thead th {
		font-size: 1em !important;
	}
</style>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-content">
					<h4 class="card-title">Data Sheet</h4>
					<p class="category">Customers records</p>
					<div class="toolbar">
						<!--        Here you can write extra buttons/actions for the toolbar              -->
					</div>
					<div class="material-datatables">
						<table id="datatables" class="table table-striped table-no-bordered table-hover"
						       cellspacing="10px"
						       width="100%" style="width:100%">
							<thead>
							<tr>
								<th>Customer Name</th>
								<th>ID</th>
								<th>Contact No.</th>
								<th>Item</th>
								<th>Last Updated</th>
								<th>Installments</th>
								<th>Installments Plan</th>
								<th>Amount</th>
								<th>Remaining</th>
								<th>Actions</th>
							</tr>
							</thead>
							<tfoot>
							<tr>
								<th>Customer Name</th>
								<th>ID</th>
								<th>Contact No.</th>
								<th>Item</th>
								<th>Last Updated</th>
								<th>Installments</th>
								<th>Installments Plan</th>
								<th>Amount</th>
								<th>Remaining</th>
								<th>Actions</th>
							</tr>
							</tfoot>
							<tbody>
							<tr>
								<td>Ahmed Baig</td>
								<td>2016-SM-007</td>
								<td>03343665950</td>
								<td>NVIDIA GTx 1080Ti</td>
								<td>2011/04/25</td>
								<td>6</td>
								<td>(200*3)+500</td>
								<td>1100</td>
								<td>400</td>
								<td class="text-center">
									<a href="#" class="btn btn-simple btn-info btn-icon view" role="button" data-toggle="modal" data-target="#rowdetails">
										<i class="material-icons">remove_red_eye</i></a>
									<a href="#" class="btn btn-simple btn-warning btn-icon edit" role="button" data-toggle="modal" data-target="#rowedit">
										<i class="material-icons">dvr</i></a>
									<a href="#" class="btn btn-simple btn-danger btn-icon remove">
										<i class="material-icons">close</i></a>
								</td>
							</tr>
							<tr>
								<td>Garrett Winters</td>
								<td>Accountant</td>
								<td>Tokyo</td>
								<td>63</td>
								<td>2011/07/25</td>
								<td>6</td>
								<td>(200*3)+500</td>
								<td>1100</td>
								<td>400</td>
								<td class="text-center">
									<a href="#" class="btn btn-simple btn-info btn-icon view" role="button" data-toggle="modal" data-target="#rowdetails">
										<i class="material-icons">remove_red_eye</i></a>
									<a href="#" class="btn btn-simple btn-warning btn-icon edit" role="button" data-toggle="modal" data-target="#rowedit">
										<i class="material-icons">dvr</i></a>
									<a href="#" class="btn btn-simple btn-danger btn-icon remove">
										<i class="material-icons">close</i></a>
								</td>
							</tr>
							<tr>
								<td>Ashton Cox</td>
								<td>2016-SM-047</td>
								<td>San Francisco</td>
								<td>66</td>
								<td>2009/01/12</td>
								<td>6</td>
								<td>(200*3)+500</td>
								<td>1100</td>
								<td>400</td>
								<td class="text-center">
									<a href="#" class="btn btn-simple btn-info btn-icon view" role="button" data-toggle="modal" data-target="#rowdetails">
										<i class="material-icons">remove_red_eye</i></a>
									<a href="#" class="btn btn-simple btn-warning btn-icon edit" role="button" data-toggle="modal" data-target="#rowedit">
										<i class="material-icons">dvr</i></a>
									<a href="#" class="btn btn-simple btn-danger btn-icon remove">
										<i class="material-icons">close</i></a>
								</td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!-- end content-->
			</div>
			<!--  end card  -->
		</div>
		<!-- end col-md-12 -->
	</div>
</div>
<div id="rowdetails" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" >Installment Details</h4>
			</div>
			<div class="modal-body">

			</div>
			<div class="modal-footer text-center">
				<button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div id='rowedit' class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Customer Details Edit</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Customer Name</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Customer Name.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Customer ID</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Customer ID.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Contact No.</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Contact No.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Item</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Item Name.</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label"></label>
							<input id="dat" type="text" class="form-control datepicker" value='' placeholder="Last Updated"/>
							<span class="help-block">Select entry date.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Installments</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Number of Installments.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Installment Plan.</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Installment Plan.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Amount</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter Amount.</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Downpayment</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Enter downpayment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 1</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 1 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 2</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 2 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 3</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 3 payment.</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 4</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 4 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 5</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 5 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 6.</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 6 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 7</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 7 payment.</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 8</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 8 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 9</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 9 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 10.</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 10 payment.</span>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 11</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 12 payment.</span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group label-floating is-empty">
							<label class="control-label">Month 12</label>
							<input type="text" class="form-control" required/>
							<span class="help-block">Month 12 payment.</span>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer text-center">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" data-dismiss="modal">Save Changes</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });
    $(document).ready(function () {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search records",
            }

        });

        var table = $('#datatables').DataTable();

        table.on('click', '.remove', function (e) {
            var $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Edit record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });

    $(document).ready(function () {
        var table = $('#datatables').DataTable();
        table.on('click', '.view', function () {
            var $tr = $(this).closest('tr');
            var $data = table.row($tr).data();
            $('.modal-body').empty();
            for (var i = 0; i < 13; i++){
				$('.modal-body').append('<p id="'+i+'"></p>');
			}
	        $('#0').append('<strong>Downpayment:</strong> ');
            $('#1').append('<strong>Month 1:</strong> ');
            $('#2').append('<strong>Month 2:</strong> ');
            $('#3').append('<strong>Month 3:</strong> ');
            $('#4').append('<strong>Month 4:</strong> ');
            $('#5').append('<strong>Month 5:</strong> ');
            $('#6').append('<strong>Month 6:</strong> ');
            $('#7').append('<strong>Month 7:</strong> ');
            $('#8').append('<strong>Month 8:</strong> ');
            $('#9').append('<strong>Month 9:</strong> ');
            $('#10').append('<strong>Month 10:</strong> ');
            $('#11').append('<strong>Month 11:</strong> ');
            $('#12').append('<strong>Month 12:</strong> ');
	        for (i = 0; i < 13; i++){
			    //$('#'+i).append($data[i]);
			}
        });

    });

</script>