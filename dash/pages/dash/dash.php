<?php
session_start();
if (!isset($_SESSION['logged']) || $_SESSION['logged'] == false) {
    header('location: ../.././../404.html');
} else if (isset($_SESSION['logged']) || $_SESSION['logged'] == true) {
    $conn = null;
    require ('../scripts/acceptor.php');
    ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header">
						<div class="icon icon-warning">
							<i class="fa fa-clipboard"></i>
						</div>
					</div>
					<div class="card-content">
						<p class="category"><strong>Entries</strong></p>
						<!--Update entries from number of rows from database-->
						<h5 class="card-title">
							<?php
                            $sql = "SELECT * FROM balanceSheet";
                            $result = $conn->query($sql);
                            if($result->num_rows < 10){
                                echo '0';
                            }
                            echo $result->num_rows;
                            ?>
						</h5>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="fa fa-clipboard"></i> Total Balance Sheet Entries
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header">
						<div class="icon icon-rose">
							<i class="fa fa-handshake-o"></i>
						</div>
					</div>
					<div class="card-content">
						<p class="category"><strong>Customers</strong></p>
						<!--Update total installments from number of rows in database-->
						<h5 class="card-title">
                            <?php
                            $sql = "SELECT * FROM dataSheet";
                            $result = $conn->query($sql);
                            if($result->num_rows < 10){
                                echo '0';
                            }
                            echo $result->num_rows;
                            ?>
						</h5>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="fa fa-tag"></i> Total Active Customers
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header">
						<div class="icon icon-success">
							<i class="fa fa-dollar"></i>
						</div>
					</div>
					<div class="card-content">
						<p class="category"><strong>Amount</strong></p>
						<!--Total amount summed from al given loan in database-->
						<h5 class="card-title"><?php
                            $sql = "SELECT * FROM dataSheet";
                            $result = $conn->query($sql);
                            if($result->num_rows == 0){
                                echo "0 PKR";
                            }else{
                                $sql = "SELECT SUM(remaining) AS value_sum FROM dataSheet";
                                $result = $conn->query($sql);
                                $row = $result->fetch_assoc();
                                $sum = $row['value_sum'];
                                echo $sum." PKR";
                            }
                            ?>
						</h5>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="fa fa-money"></i> Remaining Loaned Amount
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="card card-stats">
					<div class="card-header">
						<div class="icon icon-info">
							<i class="fa fa-user-secret"></i>
						</div>
					</div>
					<div class="card-content">
						<p class="category"><strong>Admins</strong></p>
						<h5 class="card-title"><?php
							$sql = "SELECT * FROM Admins";
							$result = $conn->query($sql);
							if($result->num_rows < 10){
								echo '0';
							}
							echo $result->num_rows;
							?>
						</h5>
					</div>
					<div class="card-footer">
						<div class="stats">
							<i class="fa fa-history"></i> last updated:
							<?php
							$sql = "SELECT * FROM Admins ORDER BY id DESC";
                            $result = $conn->query($sql);
                            if($result->num_rows > 0) {
                                if ($row = $result->fetch_array()) {
                                    echo substr($row[7], 0, 15);
                                } else {
                                    echo $conn->error;
                                }
                            }else{
                            	echo "not found";
                            }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<!--Gone-->
				<div class="card">
					<div class="card-header card-header-text">
						<h4 class="card-title">Balance Sheet</h4>
						<p class="category">Recent balance sheet entries</p>
					</div>
					<div class="card-content table-responsive">
						<table class="table table-hover">
							<thead class="text-primary">
							<th>Date</th>
							<th>Description</th>
							<th>Debit</th>
							<th>Withdraw</th>
							<th>Balance</th>
							</thead>
							<tbody>
							<?php
								$sql = "SELECT * FROM balanceSheet ORDER BY id DESC LIMIT 10";
								$result = $conn->query($sql);
								if($result->num_rows > 0){
									while($row = $result->fetch_assoc()){
										echo '<tr>';
											echo '<td>'.$row['date'].'</td>';
											echo '<td>'.$row['description'].'</td>';
											echo '<td>'.$row['debit'].'</td>';
											echo '<td>'.$row['withdraw'].'</td>';
											echo '<td>'.$row['balance'].'</td>';
										echo '</tr>';
									}
								}else{
									echo '<tr class="text-center"><td colspan="5">There is currently no data available!</tr>';
								}
							?>
							<!--use while loop to change values by id order descending limit 10-->
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<!--Gone-->
				<div class="card">
					<div class="card-header card-header-text">
						<h4 class="card-title">Data Sheet</h4>
						<p class="category">Recent data sheet entries</p>
					</div>
					<div class="card-content table-responsive">
						<table class="table table-hover">
							<thead class="text-primary">
							<th>ID</th>
							<th>Name</th>
							<th>Amount</th>
							<th>Remaining</th>
							<th>Last Updated</th>
							</thead>
							<tbody>
							<?php
								$sql = "SELECT * FROM dataSheet ORDER BY id DESC LIMIT 10";
								$result = $conn->query($sql);
								if($result->num_rows > 0){
									while($row = $result->fetch_assoc()){
										if($row['remaining'] == 0) {
                                            echo '<tr class="danger">';
                                        }else{
                                            echo '<tr>';
										}
											echo '<td>' . $row['customerID'] . '</td>';
											echo '<td>' . $row['customerName'] . '</td>';
											echo '<td>' . $row['amount'] . '</td>';
											echo '<td>' . $row['remaining'] . '</td>';
											echo '<td>' . $row['lastUpdated'] . '</td>';
										echo '</tr>';
									}
								}else{
                                    echo '<tr class="text-center"><td colspan="5">There is currently no data available!</tr>';
                                }
							?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php
}
?>