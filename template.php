<?php
	include('dbconnect.php');
	session_start();
	if($_GET['oid']){
	$q="SELECT * from orders where order_id='{$_GET['oid']}'";
	$stm=mysqli_query($conn,$q);
	$rows=$stm->fetch_assoc();
	$cnam=$rows['cust_name'];
	$ib=$rows['itembought'];
	$isb=$rows['itemsbought'];
	$tb=$rows['total_bill'];
	$orderdate=$rows['order_date'];
    
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Invoice</title>
		<!-- font awesome cdn link  -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

		<!-- bootstrap cdn link  -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.1/css/bootstrap.min.css">
	
		<!-- custom css file link  -->
		<link rel="stylesheet" href="css/style.css">
		
		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
		<script>
			function CallPrint() {
			var prtContent = document.getElementsByTagName("html")[0];
			var WinPrint = window.open('', '_self', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
			WinPrint.document.write(prtContent.innerHTML);
			WinPrint.document.close();
			WinPrint.focus();
			WinPrint.print();
			WinPrint.close();
}
		</script>
	</head>

	<body onload="CallPrint();">
		<div class="invoice-box" >
		
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									 Coffee House 
								</td>

								<td>
									Invoice #:<?php
										echo $_GET['oid'];
									?><br />
									Order Date: <?php echo $orderdate;?><br />
									
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								

								<td>
									Customer Name: <?php echo $cnam;?><br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Quantity:</td>
				</tr>

				<tr class="item">
					<td><?php echo $ib;?></td>
					<td><?php echo $isb."X";$pc=$tb/$isb;echo $pc;?></td>

				</tr>

				<tr class="total">
					<td></td>

					<td>Total: &#8377;<?php echo $tb;?></td>
				</tr>
			</table>
		</div>
	</body>
</html>