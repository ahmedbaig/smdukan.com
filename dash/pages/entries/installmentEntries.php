<?php
session_start();
if(!isset($_SESSION['logged']) || $_SESSION['logged'] == false){
    header('location: ../../../.././404.html');
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-content">
					<h4 class="card-title">New Installment Entry</h4>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Customer Name</label>
						<input type="text" class="form-control" id="CustomerName" value="" required>
						<span class="help-block">Enter full customer name.</span>
					</div>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Contact Number</label>
						<input type="text" class="form-control" id="ContactNo" value="">
						<span class="help-block">Enter customer contact number.</span>
					</div>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Customer ID</label>
						<input type="text" class="form-control" id="CustomerID" value="" required>
						<span class="help-block">Enter customer ID.</span>
					</div>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Item</label>
						<input type="text" class="form-control" id="item" value="" required>
						<span class="help-block">Enter item name.</span>
					</div>
					<div class="form-group label-floating is-empty">
						<label class="control-label"></label>
						<input id="dat" type="text" class="form-control datepicker" value='' />
						<span class="help-block">Select entry date.</span>
				</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-content">
					<h4 class="card-title">Installments</h4>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Number of Installments</label>
						<input type="text" class="form-control" id="numberOfInstallments" value="" required>
						<span class="help-block">Enter number of installments.</span>
					</div>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Installments plan</label>
						<input type="text" id="formula" class="form-control" value="" required>
						<span class="help-block">Installment details.</span>
					</div>
					<div class="form-group label-floating is-empty" id="RmClass">
						<label class="control-label">Amount</label>
						<input type="text" id='Calculated' class="form-control" value="" >
						<span class="help-block">Total calculated amount.</span>
					</div>
					<div class="form-group label-floating is-empty">
						<label class="control-label">Downpayment</label>
						<input type="text" id="downpayment" class="form-control" value="" required>
						<span class="help-block">Downpayment amount.</span>
					</div>
				</div>
			</div>
		</div>
			<!-- end card -->
		<div class="row">
			<div class="content text-center">
				<button class="btn btn-success" id="reload">insert</button>
			</div>
		</div>

		<div class="row">
			<div class="content">
				<div class="col-md-12" id="dataSheet">

				</div>
				<script>
                    $('#dataSheet').empty();
                    $('#dataSheet').load('tables/dataSheet.php');
				</script>
			</div>
		</div>
	</div>
</div>

<script>
    $(document).ready(function () {
        demo.initFormExtendedDatetimepickers();
    });
    $(document).ready(function () {
	    $('#formula').blur(function (){
	        var $Numbers = $(this).val();
	        $('#RmClass').removeClass('is-empty');
	        $Numbers = eval($Numbers.replace(/[^\d*-+/().]\s/g, ''));
	        $('#Calculated').prop('value', $Numbers);
	        //alert(eval($Numbers));
	    });
    });
	$(document).ready(function () {
	    $('#reload').click(function () {
            var $name = $('#CustomerName').val();
            var $number = $('#ContactNo').val();
            var $id = $('#CustomerID').val();
            var $item = $('#item').val();
            var $entrydate = $('#dat').val();
            var $installments = $('#numberOfInstallments').val();
            var $formula = $('#formula').val();
            var $amount = parseInt($('#Calculated').val());
            var $downpayment = parseInt($('#downpayment').val());
            var $remaining = $amount-$downpayment;
            if (
                parseInt($name.length) == 0
                && parseInt($number.length) == 0
                && parseInt($id.length) == 0
                && parseInt($item.length) == 0
                && parseInt($entrydate.length) == 0
                && parseInt($installments.length) == 0
                && parseInt($formula.length) == 0
                && $amount.length == 0
                && $downpayment.length == 0
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
                $.post("scripts/insertDataSheet.php",
                    {
                        protector: true,
                        name: $name,
                        number: $number,
                        id: $id,
                        item: $item,
                        entrydate: $entrydate,
                        installments: $installments,
                        formula: $formula,
                        amount: $amount,
                        downpayment: $downpayment,
                        remaining: $remaining
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
		    $('#CustomerName').val('');
            $('#ContactNo').val('');
            $('#CustomerID').val('');
            $('#item').val('');
            $('#entryDate').val('');
            $('#numberOfInstallments').val('');
            $('#formula').val('');
            $('#Calculated').val('');
            $('#downpayment').val('');
            $('#dataSheet').empty();
            $('#dataSheet').load('tables/dataSheet.php');
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#submitToData').click(function () {

        });
    });
</script>