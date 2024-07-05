<!DOCTYPE html>
<html>

<head>
    <title>Grafik Sensor</title>

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS for dark theme -->
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }
        .navbar {
            background-color: #1f1f1f;
        }
        .sidebar {
            background-color: #1f1f1f;
            color: #ffffff;
            height: 100vh;
            position: fixed;
            width: 250px;
            top: 0;
            left: 0;
            overflow-x: hidden;
            padding-top: 20px;
        }
        .sidebar a {
            color: #ffffff;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #575757;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .card {
            background-color: #1f1f1f;
            border: none;
			max-width: 40%;
        }
        .card-body {
            background-color: #242424;
        }
        .alert-info {
            background-color: #333333;
            color: #ffffff;
            border-color: #444444;
        }
        canvas {
            background-color: #242424;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

    <!-- memanggil data grafik -->
    <script type="text/javascript">
        var refreshid = setInterval(function () {
            $('#responsecontainer').load('data.php');
        }, 1000);
    </script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sensor Dashboard</a>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Menu</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
        </ul>
    </div>

    <!-- Main content -->
    <div class="main-content">
        <div class="container text-center">
            <h3>Grafik Sensor Secara Realtime</h3>
            <p>(Data yang ditampilkan adalah 5 data terakhir)</p>
        </div>

        <div class="container" id="responsecontainer" style="width: 100%; text-align: center"></div>
    </div>
</body>

</html>
