	<?php
	// koneksi database
	$konek = mysqli_connect("localhost", "root", "", "dbremons");

	// baca data dari tabel tb_sensor

	// baca ID tertinggi
	$sql_ID = mysqli_query($konek, "SELECT MAX(ID) FROM tbarduino");
	// tanggap datanya
	$data_ID = mysqli_fetch_array($sql_ID);
	// ambil ID terakhir / terbesar
	$ID_akhir = $data_ID['MAX(ID)'];   // ID = 8
	$ID_awal = $ID_akhir - 4;

	// baca informasi tanggal untuk 5 data terakhir - sumbu X di grafik
	$tanggal = mysqli_query($konek, "SELECT datetime FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
	// baca informasi sensor untuk 5 data terakhir - sumbu Y di grafik
	$flowsensor = mysqli_query($konek, "SELECT flow_sensor FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
	$phmeter = mysqli_query($konek, "SELECT ph_meter FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
	$ketinggian = mysqli_query($konek, "SELECT ketinggian FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");

	// Fetch the latest data for each sensor
	$latest_flow = mysqli_query($konek, "SELECT flow_sensor FROM tbarduino WHERE ID='$ID_akhir'");
	$latest_ph = mysqli_query($konek, "SELECT ph_meter FROM tbarduino WHERE ID='$ID_akhir'");
	$latest_ketinggian = mysqli_query($konek, "SELECT ketinggian FROM tbarduino WHERE ID='$ID_akhir'");

	$data_latest_flow = mysqli_fetch_array($latest_flow);
	$data_latest_ph = mysqli_fetch_array($latest_ph);
	$data_latest_ketinggian = mysqli_fetch_array($latest_ketinggian);
	?>

	<!-- tampilan grafik -->
	 <div>
	<div class="panel panel-primary" style="width: 140% !important; height: 160% !important; margin-left: 0 !important;">
		<div class="panel-heading">
			Grafik Sensor
		</div>

		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<!-- siapkan canvas untuk grafik -->
					<canvas id="myChart"></canvas>
					<!-- kotak data terakhir -->
					<div class="alert alert-info mt-3">
						Flow Sensor Terakhir: <?php echo $data_latest_flow['flow_sensor']; ?> Liter/detik
					</div>
				</div>
				<div class="col-md-4">
					<canvas id="myChart2"></canvas>
					<!-- kotak data terakhir -->
					<div class="alert alert-info mt-3">
						PH Meter Terakhir: <?php echo $data_latest_ph['ph_meter']; ?> Ph
					</div>
				</div>
				<div class="col-md-4">
					<canvas id="myChart3"></canvas>
					<!-- kotak data terakhir -->
					<div class="alert alert-info mt-3">
						Ketinggian Terakhir: <?php echo $data_latest_ketinggian['ketinggian']; ?> M
					</div>
				</div>
			</div>

			<!-- gambar grafik -->

			<script type="text/javascript">
				// Data untuk chart pertama (flowsensor)
				var canvas1 = document.getElementById('myChart');
				var data1 = {
					labels: [
						<?php
						$tanggal = mysqli_query($konek, "SELECT datetime FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
						while ($data_tanggal = mysqli_fetch_array($tanggal)) {
							echo '"' . $data_tanggal['datetime'] . '",';
						}
						?>
					],
					datasets: [
						{
							label: "flowsensor",
							fill: true,
							backgroundColor: "rgba(52, 231, 43, 0.2)",
							borderColor: "rgba(52, 231, 43, 1)",
							lineTension: 0.5,
							pointRadius: 5,
							data: [
								<?php
								while ($data_suhu = mysqli_fetch_array($flowsensor)) {
									echo $data_suhu['flow_sensor'] . ',';
								}
								?>
							]
						}
					]
				};

				var option = {
					showLines: true,
					animation: { duration: 0 }
				};

				var myLineChart1 = Chart.Line(canvas1, {
					data: data1,
					options: option
				});

				// Data untuk chart kedua (phmeter)
				var canvas2 = document.getElementById('myChart2');
				var data2 = {
					labels: [
						<?php
						$tanggal = mysqli_query($konek, "SELECT datetime FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
						while ($data_tanggal = mysqli_fetch_array($tanggal)) {
							echo '"' . $data_tanggal['datetime'] . '",';
						}
						?>
					],
					datasets: [
						{
							label: "phmeter",
							fill: true,
							backgroundColor: "rgba(239, 82, 93, 0.2)",
							borderColor: "rgba(239, 82, 93, 1)",
							lineTension: 0.5,
							pointRadius: 5,
							data: [
								<?php
								while ($data_kelembaban = mysqli_fetch_array($phmeter)) {
									echo $data_kelembaban['ph_meter'] . ',';
								}
								?>
							]
						}
					]
				};

				var myLineChart2 = Chart.Line(canvas2, {
					data: data2,
					options: option
				});

				// Data untuk chart ketiga (ketinggian)
				var canvas3 = document.getElementById('myChart3');
				var data3 = {
					labels: [
						<?php
						$tanggal = mysqli_query($konek, "SELECT datetime FROM tbarduino WHERE ID>='$ID_awal' and ID<='$ID_akhir' ORDER BY ID ASC");
						while ($data_tanggal = mysqli_fetch_array($tanggal)) {
							echo '"' . $data_tanggal['datetime'] . '",';
						}
						?>
					],
					datasets: [
						{
							label: "ketinggian",
							fill: true,
							backgroundColor: "rgba(82, 93, 239, 0.2)",
							borderColor: "rgba(82, 93, 239, 1)",
							lineTension: 0.5,
							pointRadius: 5,
							data: [
								<?php
								while ($data_kelembaban1 = mysqli_fetch_array($ketinggian)) {
									echo $data_kelembaban1['ketinggian'] . ',';
								}
								?>
							]
						}
					]
				};

				var myLineChart3 = Chart.Line(canvas3, {
					data: data3,
					options: option
				});
			</script>
		</div>
	</div>
	</div>