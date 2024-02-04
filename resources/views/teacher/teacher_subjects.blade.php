<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/teacher_subjects.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Subjects</title>
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
		<div class="home-content-topic">Subjects</div>
		<div class="box">
			<div class="overview-boxes">

				@if($teacher->subjects->count() > 0)
				@foreach($teacher->subjects as $subject)
				<a href="{{ route('showAttendanceTable', ['teacherId' => $teacher->id, 'subjectId' => $subject->id, 'sectionId' => optional($subject->section)->id]) }}" class="subject_link">
					<div class="box">
						<div class="right-side">
							<div class="mariveles">
								<img src="/img/mariveles.png" alt="iAttend Attendance Monitoring">
							</div>
							<div class="subject-section">
								<div class="subject">{{ $subject->name }}</div>
								<div class="section">{{ optional($subject->section)->name ?? 'No section assigned' }}</div>
							</div>
						</div>
					</div>
				</a>
				@endforeach
				@else
				<p style="color: black; padding-top:300px; padding-bottom:300px; font-size:larger">No subjects assigned for this teacher.</p>
				@endif


			</div>


		</div>
	</div>

</body>

</html>