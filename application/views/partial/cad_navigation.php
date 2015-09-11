<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle"
                                 src="<?php echo base_url('profile_pictures/' . $user->profile_pic); ?>" width="65px"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong
                                        class="font-bold"><?= $user->first_name . " " . $user->last_name ?></strong>
                             </span> <span class="text-muted text-xs block"><?= $position ?> <b
                                        class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInUp m-t-xs">
                        <li><a href="/index.php/profile">Profile</a></li>
                        <li><a href="/index.php/inbox">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="/index.php/users/logout">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    CAD
                </div>
            </li>
            <li>
                <a href="/index.php/dashboard"><i class="fa fa-th-large"></i> <span
                        class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/compose">Compose</a></li>
                    <li><a href="/index.php/inbox">Inbox <span id="nav-inbox-count"
                                                               class="label label-default pull-right">0</span></a></li>
                    <li><a href="/index.php/sentbox">Sent</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span
                        class="nav-label">Student</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/users/add_student">Add Student</a></li>
                    <li><a href="/index.php/users/students">View Students</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Funds </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/funds/transfer">Transfer Funds</a></li>
                    <li><a href="/index.php/funds/status">Fund Status</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-pencil"></i> <span class="nav-label">Tests </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/tests/create">Manage Test</a></li>
                    <li><a href="/index.php/tests/add_marks">Add Marks</a></li>
                    <li><a href="/index.php/tests/edit_marks">Edit Marks</a></li>
                </ul>
            </li>

            <li>
                <a href="/index.php/articles/add_article"><i class="fa fa-quote-left"></i> <span
                        class="nav-label">Add Article</span></a>
            </li>
            <!--            <li>-->
            <!--                <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Reports </span><span-->
            <!--                        class="fa arrow"></span></a>-->
            <!--                <ul class="nav nav-second-level">-->
            <!--                    <li><a href="/index.php/reports/fund_report/summary">Summary Fund</a></li>-->
            <!--                    <li><a href="/index.php/reports/fund_report/detailed">Detailed Fund</a></li>-->
            <!--                    <li><a href="/index.php/reports/student_results">Latest Results</a></li>-->
            <!--                    <li><a href="/index.php/reports/student_results/past">Past Results</a></li>-->
            <!--                </ul>-->
            <!--            </li>-->
        </ul>

    </div>
</nav>