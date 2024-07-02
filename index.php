<!DOCTYPE html>
<html>

<head>
	<title>Grafik Sensor</title>

	<!-- panggil file bootstrap -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<script type="text/javascript" src="assets/js/jquery-3.4.0.min.js"></script>
	<script type="text/javascript" src="assets/js/mdb.min.js"></script>
	<script type="text/javascript" src="jquery-latest.js"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->


	<!-- memanggil data grafik -->
	<script type="text/javascript">
		var refreshid = setInterval(function () {
			$('#responsecontainer').load('data.php');
		}, 1000);
	</script>
</head>

<body>

	<!-- tempat untuk tampilan grafik -->
	<div class="container" style="text-align: center;">
		<h3>Grafik Sensor Secara Realtime</h3>
		<p>(Data yang ditampilkan adalah 5 data terakhir)</p>
	</div>

	<!-- <div>
		<canvas id="myChart"></canvas>
	</div> -->

	<!-- div untuk grafik -->
	<div class="container">
		<div class="container" id="responsecontainer" style="width: 90%; text-align: center"></div>
	</div>

	<!-- Pemanis untuk menampilkan gambar -->
	<!-- <div class="container" style="text-align: center;">
		<img src="assets/img/kodingperangkat.png">
	</div> -->

	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap.min.js"></script>

	<script>
		const ctx = document.getElementById('myChart');

		new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				datasets: [{
					label: '# of Votes',
					data: [12, 19, 3, 5, 2, 3],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
	</script>
</body>

</html>