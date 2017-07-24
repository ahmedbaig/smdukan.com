<?php
session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    header('location: ../../.././404.html');
} else if (isset($_SESSION['logged']) || $_SESSION['logged'] == true) {
    $conn = null;
    require ('../scripts/acceptor.php');
    ?>
<style>
	thead th{
		font-size: 1em!important;
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
						<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="10px"
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
								<th>Downpayment</th>
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
								<th>Downpayment</th>
							</tr>
							</tfoot>
							<tbody>
							<?php
								$sql = "SELECT * FROM dataSheet ORDER BY id ASC";
								$result = $conn->query($sql);
								if($result->num_rows > 0){
									while($row = $result->fetch_assoc()){
                                        if($row['remaining'] == 0) {
                                            echo '<tr class="danger">';
                                        }else{
                                            echo '<tr>';
                                        }
											echo '<td>'.$row['customerName'].'</td>';
											echo '<td>'.$row['customerID'].'</td>';
											echo '<td>'.$row['contactNo'].'</td>';
											echo '<td>'.$row['item'].'</td>';
											echo '<td>'.$row['lastUpdated'].'</td>';
											echo '<td>'.$row['installments'].'</td>';
											echo '<td>'.$row['installmentPlan'].'</td>';
											echo '<td>'.$row['amount'].'</td>';
											echo '<td>'.$row['downpayment'].'</td>';
										echo '</tr>';
									}
								}
							?>
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
<script type="text/javascript">
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

        // Edit record
        table.on('click', '.edit', function () {
            var $tr = $(this).closest('tr');

            var data = table.row($tr).data();
            alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function (e) {
            var $tr = $(this).closest('tr');
            table.row($tr).remove().draw();
            e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function () {
            alert('You clicked on Like button');
        });

        $('.card .material-datatables label').addClass('form-group');
    });
</script>

<?php
}
?>