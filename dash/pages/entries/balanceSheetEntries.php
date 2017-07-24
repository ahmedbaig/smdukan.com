<?php
	session_start();
	if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
		header('location: ../.././../404.html');
	}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<form method="get" action="/" class="form-horizontal">
					<div class="card-header card-header-text">
						<h4 class="card-title">New Balance Sheet Entry</h4>
					</div>
					<div class="card-content">
						<div class="row">
							<label class="col-sm-2 label-on-left">Description</label>
							<div class="col-sm-10">
								<div class="form-group label-floating is-empty">
									<label for="des" class="control-label"></label>
									<input type="text" id='des' class="form-control" value="" required>
									<span class="help-block">Input entry descriptions.</span>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- end card -->
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header card-header-text">
					<h4 class="card-title">Entry Date</h4>
				</div>
				<div class="card-content">
					<div class="form-group">
						<input id="dat" type="text" class="form-control datepicker" value=""/>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<form method="get" action="/" class="form-horizontal">
					<div class="card-header card-header-text">
						<h4 class="card-title">Amount Details</h4>
					</div>
					<div class="card-content">
						<form action="" class="form-inline">
							<div class="container-fluid">
								<label class="col-sm-1 label-on-left">Deposit</label>
								<div class="col-md-3">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" id="deb" class="form-control" required/>
									</div>
								</div>
								<label class="col-sm-1 label-on-left">Withdraw</label>
								<div class="col-md-3">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" id="wid" class="form-control"/>
									</div>
								</div>
								<label class="col-sm-1 label-on-left">Balance</label>
								<div class="col-md-3">
									<div class="form-group label-floating is-empty">
										<label class="control-label"></label>
										<input type="text" id="bal" class="form-control"/>
									</div>
								</div>
							</div>
						</form>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="content text-center">
			<button class="btn btn-success" id="reload">insert</button>
			<!--Button should reload the table-->
		</div>
	</div>
	<div class="row">
		<div id="balanceSheet">
		</div>
		<script>
            $('#balanceSheet').empty();
            $('#balanceSheet').load('tables/balanceSheet.php');
		</script>
	</div>
</div>

<script>

    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });

    $(document).ready(function(){
        $('#reload').click(function () {
            var $des = $('#des').val();
            var $dat = $('#dat').val();
            var $deb = $('#deb').val();
            var $wid = $('#wid').val();
            var $bal = $('#bal').val();
            if (
                parseInt($des.length) == 0
                && parseInt($dat.length) == 0
                && parseInt($deb.length) == 0
                && parseInt($wid.length) == 0
                && parseInt($bal.length) == 0
            ) {
                var alert_ = {
                    showSwal: function (type) {
                        if (type === 'alert') {
                            swal({
                                title: 'Error',
                                text: 'Some fields are empty.',
                                buttonsStyling: false,
                                confirmButtonClass: "btn btn-success"
                            });
                        }
                    }
                };
                alert_.showSwal('alert');
            }else{
                $.post("scripts/insertBalanceSheet.php",
                    {
                        protector: true,
	                    description: $des,
	                    date: $dat,
	                    debit: $deb,
	                    withdraw: $wid,
	                    balance: $bal
                    },
                    function (data, status) {
                        var alert_ = {
                            showSwal: function (type) {
                                if (type === 'alert') {
                                    swal({
                                        title: 'Server Response',
                                        text: data + '\nStatus: ' + status,
                                        buttonsStyling: false,
                                        confirmButtonClass: "btn btn-success"
                                    });
                                }
                            }
                        };
                        alert_.showSwal('alert');
                    }
                );
            }
            $('#des').val('');
            $('#dat').val('');
            $('#deb').val('');
            $('#wid').val('');
            $('#bal').val('');
	        $('#balanceSheet').empty('').load('tables/balanceSheet.php');
        });
    });
</script>
