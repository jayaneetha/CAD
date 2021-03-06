<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url('profile_pictures/' . $user->profile_pic); ?>" width="65px"/>
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $user->first_name . " " . $user->last_name ?></strong>
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
                <a href="/index.php/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/compose">Compose</a></li>
                    <li><a href="/index.php/inbox">Inbox <span id="nav-inbox-count" class="label label-default pull-right">0</span></a></li>
                    <li><a href="/index.php/sentbox">Sent</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">Users</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/users/create_CAD_user">Add CAD User</a></li>
                    <li><a href="/index.php/users/registration_request">Registration Requests</a></li>
                    <li><a href="/index.php/users/manage_users">Manage Users</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-bank"></i> <span class="nav-label">School</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/schools/add_school">Add School</a></li>
                    <li><a href="/index.php/schools/registered_schools">Registered Schools</a></li>
                    <li><a href="/index.php/schools/manage_classes">Manage Classes</a></li>
                    <li><a href="/index.php/schools/manage_subjects">Manage Subject</a></li>
                    <li><a href="/index.php/schools/manage_class_subjects">Add Subjects to Class</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-dollar"></i> <span class="nav-label">Funds </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/funds/accept_funds">Accept Funds</a></li>
                    <li><a href="/index.php/funds/accepted_funds">Accepted Funds</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-quote-left"></i> <span class="nav-label">Articles</span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/articles/add_article">Add Article</a></li>
                    <li><a href="/index.php/articles/manage_articles">Manage Articles</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Reports </span><span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/index.php/reports/transaction/detailed">Transaction Detailed</a></li>
                    <li><a href="/index.php/reports/transaction/summary">Transaction Summary</a></li>
                    <li><a href="/index.php/reports/transaction/history">Transaction History</a></li>
                    <li><a href="/index.php/reports/donors_birthday">Donors Birthday List</a></li>

                </ul>
            </li>
            <li>
                <a href="/index.php/backups"><i class="fa fa-cloud-download"></i> <span class="nav-label">Backup </span></a>
            </li>
        </ul>

    </div>
</nav>