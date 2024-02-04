<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/parent_dashboard.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Dashboard</title>
</head>

<body>

	<!-- sidebar -->
	<nav class="sidebar">

		<div class="menu_content">
			<div class="logo">
				<img src="/img/iAttend.png" alt="iAttend Attendance Monitoring">
			</div>
			<ul class="menu_items">
				<div class="menu_title menu_setting"></div>
				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-sr-heart-rate"></i>
						</span>
						<span class="navlink">Dashboard</span>
					</a>
				</li>
				<li class="item">
					<a href="{{ route('parentAnnouncement') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-megaphone"></i>
						</span>
						<span class="navlink">Announcements</span>
					</a>
				</li>
			</ul>

			<ul class="menu_items">
				<div class="menu_title menu_profile"></div>
				<li class="item">
					<a href="{{ route('parentAccountSettings') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-admin-alt"></i>
						</span>
						<span class="navlink">Account Settings</span>
					</a>
				</li>
			</ul>

			<ul class="menu_items">
				<div class="menu_title menu_attendance"></div>
				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-admin-alt"></i>
						</span>
						<span class="navlink">Attendance History</span>
					</a>
				</li>

				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-admin-alt"></i>
						</span>
						<span class="navlink">Excuse Letter Form</span>
					</a>
				</li>
			</ul>

		</div>
		<div class="bottom_content">
			<a href="{{ route('logout') }}" class="nav_link">
				<span class="navlink_icon">
					<i class="fi fi-rs-enter"></i>
				</span>
				<span class="navlink">Log Out</span>
			</a>
		</div>
	</nav>



	<div class="home-content">
		<div class="home-content-topic">Dashboard</div>
		<div class="box">
			<div class="topic">Summary</div>
			<div class="overview-boxes">
				<div class="box">
					<div class="right-side">
						<div class="box-topic">Excused Absences</div>
						@php
						$excusedCount = isset($attendanceCounts['excused']) ? $attendanceCounts['excused'] : 0;
						$excusedText = ($excusedCount != 1) ? 'days' : 'day';
						@endphp
						<div class="number">{{ $excusedCount }} {{ $excusedText }}</div>
						<div class="indicator">

							<div class="button">
								<a href="#">View</a>
							</div>

						</div>
					</div>
				</div>

				<div class="box">
					<div class="right-side">
						<div class="box-topic">Total Days Present</div>
						@php
						$presentCount = isset($attendanceCounts['present']) ? $attendanceCounts['present'] : 0;
						$presentText = ($presentCount != 1) ? 'days' : 'day';
						@endphp
						<div class="number"> {{ $presentCount }} {{ $presentText }} </div>
						<div class="indicator">


							<div class="button">
								<a href="#">View</a>
							</div>

						</div>
					</div>
				</div>

				<div class="box">
					<div class="right-side">
						<div class="box-topic">Unexcused Absences</div>
						@php
						$unexcusedCount = isset($attendanceCounts['absent']) ? $attendanceCounts['absent'] : 0;
						$unexcusedText = ($unexcusedCount != 1) ? 'times' : 'time';
						@endphp
						<div class="number">
							{{ $unexcusedCount }} {{ $unexcusedText }}
						</div>
						<div class="indicator">
							@php
							$absentCount = $attendanceCounts['absent'] ?? 0;
							$indicatorClass = ($absentCount == 0 ? 'green' : ($absentCount <= 2 ? 'yellow' : 'red' )); @endphp <i class="fi fi-rr-triangle-warning" style="color: {{ $indicatorClass === 'green' ? '#16FF00' : ($indicatorClass === 'yellow' ? '#FFFF00' : '#FF0000') }}"></i>

								<div class="button">
									<a href="#">View</a>
								</div>

						</div>
					</div>
				</div>

				<div class="box">
					<div class="right-side">
						<div class="box-topic">Total Lates</div>
						@php
						$lateCount = $attendanceCounts['late'] ?? 0;
						$lateText = ($lateCount != 1) ? 'times' : 'time';
						@endphp
						<div class="number">
							{{ $lateCount }} {{ $lateText }}
						</div>
						<div class="indicator">
							@php
							$lateCount = $attendanceCounts['late'] ?? 0;
							$indicatorClass = ($lateCount == 0 ? 'green' : ($lateCount <= 2 ? 'yellow' : 'red' )); @endphp <i class="fi fi-rr-triangle-warning" style="color: {{ $indicatorClass === 'green' ? '#16FF00' : ($indicatorClass === 'yellow' ? '#FFFF00' : '#FF0000') }}"></i>

								<div class="button">
									<a href="#">View</a>
								</div>

						</div>
					</div>
				</div>
			</div>

			<div class="overview">
				<div class="topic">Overview</div>
				<div class="overview-boxes">
					<div class="box-big">
						<div class="right-side">

							<canvas id="presentByMonthChart" width="1200" height="500"></canvas>
						</div>
					</div>

				</div>


			</div>
		</div>

		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

		<!-- Your JavaScript code for creating the chart -->
		<script type="text/javascript">
			document.addEventListener('DOMContentLoaded', function() {
				// Mock data, replace it with your actual data
				var presentData = @json($attendance['present'] ?? []);

				// Get the canvas element
				var presentByMonthChartCanvas = document.getElementById('presentByMonthChart');

				// Create the chart
				var presentByMonthChart = new Chart(presentByMonthChartCanvas, {
					type: 'bar',
					data: {
						labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
						datasets: [{
							label: 'Present',
							data: presentData,
							backgroundColor: 'rgba(12, 53, 106, 0.7)', // Green color
							borderColor: 'rgba(12, 53, 106, 0.7)', // Border color
							borderWidth: 1
						}]
					},
					options: {
						scales: {
							y: {
								beginAtZero: false,
								min: 0, // Add this line
								max: 50, // Add this line
							}
						}
					}
				});
			});
		</script>

</body>


</html>