<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('gadmin.index') }}">
                <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120"
                    xml:space="preserve">
                    <g>
                        <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                        <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                        <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                    </g>
                </svg>
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('ladmin.index') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Dashboard</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Components</span>
        </p>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-calendar-event" viewBox="0 0 16 16">
                            <path
                                d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z" />
                            <path
                                d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">College Event Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.event.university.index') }}"><span
                                class="ml-1 item-text">College Event
                                Table</span></a>
                    </li>
                </ul>
            </li>
        </ul>



        <p class="text-muted nav-heading mt-4 mb-1">
            <span></span>
        </p>
        <br>


        <!-- Teaching Staff Management -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#teaching-staff-elements" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-person-bounding-box" viewBox="0 0 16 16">
                        <path
                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5M.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5m15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5" />
                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                    </svg>
                    <span class="ml-3 item-text">Teaching Staff Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="teaching-staff-elements">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.teachingStaff.index') }}"><span
                                class="ml-1 item-text">Teaching Staff Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.teachingStaff.create') }}"><span
                                class="ml-1 item-text">Add Teaching Staff</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.teachingStaff.archive') }}"><span
                                class="ml-1 item-text">Teaching Staff Archive</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Answer Question Management -->

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ads-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-question-diamond" viewBox="0 0 16 16">
                            <path
                                d="M6.95.435c.58-.58 1.52-.58 2.1 0l6.515 6.516c.58.58.58 1.519 0 2.098L9.05 15.565c-.58.58-1.519.58-2.098 0L.435 9.05a1.48 1.48 0 0 1 0-2.098zm1.4.7a.495.495 0 0 0-.7 0L1.134 7.65a.495.495 0 0 0 0 .7l6.516 6.516a.495.495 0 0 0 .7 0l6.516-6.516a.495.495 0 0 0 0-.7L8.35 1.134z" />
                            <path
                                d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286m1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">Question Management</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ads-elements">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.questionAnswer.new.question') }}"><span
                                class="ml-1 item-text">New Question Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.questionAnswer.history.question') }}"><span
                                class="ml-1 item-text">History Question Table</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#ui-elements" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">

                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-threads" viewBox="0 0 16 16">
                            <path
                                d="M6.321 6.016c-.27-.18-1.166-.802-1.166-.802.756-1.081 1.753-1.502 3.132-1.502.975 0 1.803.327 2.394.948s.928 1.509 1.005 2.644q.492.207.905.484c1.109.745 1.719 1.86 1.719 3.137 0 2.716-2.226 5.075-6.256 5.075C4.594 16 1 13.987 1 7.994 1 2.034 4.482 0 8.044 0 9.69 0 13.55.243 15 5.036l-1.36.353C12.516 1.974 10.163 1.43 8.006 1.43c-3.565 0-5.582 2.171-5.582 6.79 0 4.143 2.254 6.343 5.63 6.343 2.777 0 4.847-1.443 4.847-3.556 0-1.438-1.208-2.127-1.27-2.127-.236 1.234-.868 3.31-3.644 3.31-1.618 0-3.013-1.118-3.013-2.582 0-2.09 1.984-2.847 3.55-2.847.586 0 1.294.04 1.663.114 0-.637-.54-1.728-1.9-1.728-1.25 0-1.566.405-1.967.868ZM8.716 8.19c-2.04 0-2.304.87-2.304 1.416 0 .878 1.043 1.168 1.6 1.168 1.02 0 2.067-.282 2.232-2.423a6.2 6.2 0 0 0-1.528-.161" />
                        </svg>
                    </i>

                    <span class="ml-3 item-text">College Ads Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.ads.index') }}"><span
                                class="ml-1 item-text">College Ads
                                Table
                            </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.ads.create') }}"><span
                                class="ml-1 item-text">Add
                                College Ads</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.ads.archive') }}"><span
                                class="ml-1 item-text">College Ads
                                Archive</span></a>
                    </li>
                </ul>
            </li>
        </ul>



        <!-- Study Fees Management -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#study-fees-elements" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path
                                d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">College Fees Management</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="study-fees-elements">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.fees.index') }}"><span
                                class="ml-1 item-text">College Fees Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.fees.create') }}"><span
                                class="ml-1 item-text">Add College Fees</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.fees.archive') }}"><span
                                class="ml-1 item-text">College Fees Archive</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- University College Management -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#study-fees-elementss" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-building" viewBox="0 0 16 16">
                            <path
                                d="M4 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5z" />
                            <path
                                d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1zm11 0H3v14h3v-2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V15h3z" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">University College Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="study-fees-elementss">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.index') }}"><span
                                class="ml-1 item-text">University College Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.create') }}"><span
                                class="ml-1 item-text">Add University College</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.college.archive') }}"><span
                                class="ml-1 item-text">University College Archive</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- University Specialization College Management -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#study-fees-elementsss" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-layers" viewBox="0 0 16 16">
                            <path
                                d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0zM8 9.433 1.562 6 8 2.567 14.438 6z" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">Specialization College Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="study-fees-elementsss">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.specialization.college.index') }}"><span
                                class="ml-1 item-text">Specialization College Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.specialization.college.create') }}"><span
                                class="ml-1 item-text">Add Specialization College</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.specialization.college.archive') }}"><span
                                class="ml-1 item-text">Specialization College Archive</span></a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- University Location Management -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#study-fees-elementssss" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-geo-alt" viewBox="0 0 16 16">
                            <path
                                d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">University Location Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="study-fees-elementssss">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.location.index') }}"><span
                                class="ml-1 item-text">University Location Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.location.create') }}"><span
                                class="ml-1 item-text">Add University Location</span></a>
                    </li>

                </ul>
            </li>
        </ul>


        <!-- University Ads Management -->
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#study-fees-elementsssss" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-headset" viewBox="0 0 16 16">
                            <path
                                d="M8 1a5 5 0 0 0-5 5v1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V6a6 6 0 1 1 12 0v6a2.5 2.5 0 0 1-2.5 2.5H9.366a1 1 0 0 1-.866.5h-1a1 1 0 1 1 0-2h1a1 1 0 0 1 .866.5H11.5A1.5 1.5 0 0 0 13 12h-1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h1V6a5 5 0 0 0-5-5" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">University Ads Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="study-fees-elementsssss">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.ads.index') }}"><span
                                class="ml-1 item-text">University Ads Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.ads.create') }}"><span
                                class="ml-1 item-text">Add University Ads</span></a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.ads.archive') }}"><span
                                class="ml-1 item-text">University Ads Archive</span></a>
                    </li>

                </ul>
            </li>
        </ul>


        <!-- University Event Management -->

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#study-fees-elementssssss" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-emoji-smile" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="M4.285 9.567a.5.5 0 0 1 .683.183A3.5 3.5 0 0 0 8 11.5a3.5 3.5 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5m4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5" />
                        </svg>
                    </i>
                    <span class="ml-3 item-text">University Events Manage</span><span class="sr-only"></span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="study-fees-elementssssss">
                    <li class="nav-item active">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.event.index') }}"><span
                                class="ml-1 item-text">University Event Table</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('ladmin.university.event.create') }}"><span
                                class="ml-1 item-text">Add University Event</span></a>
                    </li>

                </ul>
            </li>
        </ul>



        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Authuntication</span>
        </p>
        <br>

        <ul class="navbar-nav flex-fill w-100 mb-2">

            <li class="nav-item w-100">

                <a class="nav-link pl-3" href="#" onclick="document.getElementById('logoutForm').submit();">

                    <i class="fe fe-log-out fe-16"></i>
                    <span class="ml-3 item-text">Logout</span>

                </a>

            </li>
        </ul>
        <form id="logoutForm" action="{{ route('ladmin.logout') }}" method="post">
            @csrf
        </form>
    </nav>
</aside>
