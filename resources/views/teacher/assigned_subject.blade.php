<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/assignedsubject.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<script src="https://kit.fontawesome.com/5752042ef4.js" crossorigin="anonymous"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>{{ $subject->name }} - {{ optional($subject->section)->name ?? 'No section assigned' }} </title>
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
					<a href="{{ route('teacherDashboard') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-sr-heart-rate"></i>
						</span>
						<span class="navlink">Dashboard</span>
					</a>
				</li>
				<li class="item">
					<a href="{{ route('teacherAnnouncement') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-megaphone"></i>
						</span>
						<span class="navlink">Announcements</span>
					</a>
				</li>
				<li class="item">
					<a href="{{ route ('teacherSubjects') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rs-book-open-cover"></i>
						</span>
						<span class="navlink">Subjects</span>
					</a>
				</li>
			</ul>

			<ul class="menu_items">
				<div class="menu_title menu_profile"></div>
				<li class="item">
					<a href="{{ route('teacherAccountSettings') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-admin-alt"></i>
						</span>
						<span class="navlink">Account Settings</span>
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
		<div class="home-content-topic">Subjects > {{ $subject->name }} - {{ optional($subject->section)->name ?? 'No section assigned' }}</div>
		<h2 style="color: #0C356A; text-align: right; margin: -3% 4% 0% 0%; font-weight: 700;">Date Today</h2>
		<h2 id="currentDate" style="color: #0C356A; text-align: right; margin: 0% 4% 1% 0%; font-weight: 300;"></h2>
		<div class="box">
			<div class="topic">Summary</div>
			<div class="overview-boxes">
				<div class="box">
					<div class="right-side">
						<div class="box-topic">Unexcused Absences</div>
						<div class="number">3</div>
						<div class="indicator">
							<i class="fi fi-rr-triangle-warning red"></i>
							<div class="button">
								<a href="#">View</a>
							</div>

						</div>
					</div>
				</div>

				<div class="box">
					<div class="right-side">
						<div class="box-topic">Excuse Letters</div>
						<div class="number">0</div>
						<div class="indicator">

							<div class="button">
								<a href="#">View</a>
							</div>

						</div>
					</div>
				</div>

				<div class="box">
					<div class="right-side">
						<div class="box-topic">Attendance History</div>
						<div class="number">0</div>
						<div class="indicator">

							<div class="button">
								<a href="#">View</a>
							</div>

						</div>
					</div>
				</div>

			</div>

			<div class="overview">
				<div class="topic">Record Attendance</div>
				<div class="overview-boxes">
					<div class="box-big">
						<div class="right-side">
							<div class="box-topic"></div>
							<table style="width:100%">
								<tr style="background-color: #0C356A; color:white;">
									<th style="padding: 0px 90px;">Student</th>
									<th>Present</th>
									<th>Late</th>
									<th>Absent</th>
									<th>Excused</th>
								</tr>

								@foreach ($students as $student)
								@php
								$attendanceRecord = $student->attendances()
								->where('subject_id', $subject->id)
								->whereDate('date', now()->toDateString())
								->first();

								$selectedStatus = $attendanceRecord ? $attendanceRecord->status : null;
								@endphp
								<tr>
									<td>{{ $student['full_name'] }}</td>
									<td class="hover-effect-present" style="{{ $selectedStatus === 'present' ? 'background-color: green;' : '' }}">
										<a href="{{ route('attendance.present', ['student_id' => $student->id, 'subject_id' => $subject->id]) }}" class="hover-effect-present" style="{{ $selectedStatus === 'present' ? 'color: white;' : '' }}">
											<i class="fa-solid fa-check"></i>
											<br>
											<p style="font-size: 15px;">Present</p>
										</a>
									</td>
									<td class="hover-effect-late" style="{{ $selectedStatus === 'late' ? 'background-color: #F2BE22;' : '' }}">
										<a href="{{ route('attendance.late', ['student_id' => $student->id, 'subject_id' => $subject->id]) }}" class="hover-effect-late" style="{{ $selectedStatus === 'late' ? 'color: white;' : '' }}">
											<i class="fa-regular fa-clock"></i>
											<br>
											<p style="font-size: 15px;">Late</p>
										</a>
									</td>
									<td class="hover-effect-absent" style="{{ $selectedStatus === 'absent' ? 'background-color: #B80000;' : '' }}">
										<a href="{{ route('attendance.absent', ['student_id' => $student->id, 'subject_id' => $subject->id]) }}" class="hover-effect-absent" style="{{ $selectedStatus === 'absent' ? 'color: white;' : '' }}">
											<i class="fa-solid fa-xmark"></i>
											<br>
											<p style="font-size: 15px;">Absent</p>
										</a>
									</td>
									<td class="hover-effect-excused" style="{{ $selectedStatus === 'excused' ? 'background-color: #0C356A;' : '' }}">
										<a href="{{ route('attendance.excused', ['student_id' => $student->id, 'subject_id' => $subject->id]) }}" class="hover-effect-excused" style="{{ $selectedStatus === 'excused' ? 'color: white;' : '' }}">
											<i class="fa-solid fa-ban"></i>
											<br>
											<p style="font-size: 15px;">Excused</p>
										</a>
									</td>
								</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>


			</div>
		</div>


		<script>
			// JavaScript code to display the current date
			var currentDateElement = document.getElementById('currentDate');
			var currentDate = new Date();
			var options = {
				year: 'numeric',
				month: 'long',
				day: 'numeric'
			};
			currentDateElement.textContent = currentDate.toLocaleDateString('en-US', options);
		</script>

</body>

</html>