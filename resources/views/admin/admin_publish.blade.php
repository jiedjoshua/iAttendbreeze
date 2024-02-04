<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="/css/admin.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
	<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Publish Announcement</title>
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
					<a href=" {{ route ('adminDashboard') }} " class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-sr-heart-rate"></i>
						</span>
						<span class="navlink">Dashboard</span>
					</a>
				</li>
				<li class="item">
					<a href="{{ route('adminAnnouncement') }}" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-megaphone"></i>
						</span>
						<span class="navlink">Announcements</span>
					</a>
				</li>
				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-comment-alt-edit"></i>
						</span>
						<span class="navlink">Publish Announcement</span>
					</a>
				</li>
			</ul>

			<ul class="menu_items">
				<div class="menu_title menu_profile"></div>
				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-admin-alt"></i>
						</span>
						<span class="navlink">Account Settings</span>
					</a>
				</li>
			</ul>

			<ul class="menu_items">
				<div class="menu_title menu_manageaccounts"></div>
				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-chalkboard-user"></i>
						</span>
						<span class="navlink">Teachers</span>
					</a>
				</li>

				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rr-users-alt"></i>
						</span>
						<span class="navlink">Parents</span>
					</a>
				</li>
			</ul>

			<ul class="menu_items">
				<div class="menu_title menu_managesection"></div>
				<li class="item">
					<a href="#" class="nav_link">
						<span class="navlink_icon">
							<i class="fi fi-rs-book-open-cover"></i>
						</span>
						<span class="navlink">Subjects</span>
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
		<div class="home-content-topic">Publish Announcements</div>
		<div class="box">
			<div class="publishannouncement-box">
				<form action="{{ route('submit.announcement') }}" method="post">
					@csrf

					<label for="subject">
						<div class="topic">Subject</div>
					</label>
					<input type="text" id="subject" name="subject" required>

					<label for="content">
						<div class="topic">Message</div>
					</label>
					<textarea id="content" name="content" rows="17" required></textarea>

					<div class="button">
						<button type="reset" id="cancel">Cancel</button>
						<button type="submit" id="publish">Publish</button>
					</div>
				</form>
			</div>
		</div>
	</div>

	@if(session('success'))
	<script>
		alert("{{ session('success') }}");
	</script>
	@elseif(session('error'))
	<script>
		alert("{{ session('error') }}");
	</script>
	@endif

</body>

</html>