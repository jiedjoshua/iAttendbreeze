<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/teacher_account.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.1.0/uicons-thin-rounded/css/uicons-thin-rounded.css'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Settings</title>
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
            <a href="#" class="nav_link">
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
        <div class="home-content-topic">Account Settings</div>
        <div class="box">

            <div class="accountsettings-box">

                <form action="{{ route('update-profile') }}" method="POST">
                    @csrf
                    <table>
                        <tr>
                            <td>
                                <div class="topic">Edit Profile</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="subject">
                                    <div class="label">First Name</div>
                                </label>
                                <input type="text" id="firstname" name="firstname" required value="{{ auth()->user()->firstname}}">
                            </td>

                            <td>
                                <label for="subject">
                                    <div class="label">Last Name</div>
                                </label>
                                <input type="text" id="lastname" name="lastname" required value="{{ auth()->user()->lastname}}">
                            </td>

                            <td>
                                <label for="idnumber">
                                    <div class="label">ID Number</div>
                                </label>
                                <input type="number" id="idnumber" name="idnumber" required readonly value="{{ auth()->user()->id}}" style="background-color: #E1E5E8; color:darkgray">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label for="subject">
                                    <div class="label">Email</div>
                                </label>
                                <input type="email" id="username" name="email" required value="{{ auth()->user()->email}}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="topic"><br>Change Password</div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="subject">
                                    <div class="label">Old Password</div>
                                </label>
                                @if(session('error'))
                                <div class="alert alert-danger" style="color: red;">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <input type="password" id="oldpassword" name="oldpassword">
                            </td>

                            <td>
                                <label for="subject">
                                    <div class="label">New Password</div>
                                </label>
                                @if(session('error'))
                                <div class="alert alert-danger" style="color: red;">
                                    <p>Try again.</p>
                                </div>
                                @endif
                                <input type="password" id="newpassword" name="newpassword">
                            </td>
                        </tr>
                    </table>

                    <div class="button">

                        <button type="reset" id="cancel">Cancel</button>
                        <button type="submit" id="save">Save</button>
                    </div>

                </form>


            </div>





        </div>
    </div>

</body>

</html>