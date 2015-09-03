<?php $this->load->view('partial/header'); ?>
</head>

<body>

<div id="wrapper">

    <?php $this->load->view('partial/navigation', array('user' => $user,'position'=>$position)); ?>


    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <?php $this->load->view('partial/top_bar'); ?>

        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget navy-bg p-md text-center">
                        <div class="m-b-md">
                            <h2 class="font-bold no-margins">
                                <?= $user->first_name . " " . $user->last_name ?>
                            </h2>
                            <small><?= $position ?></small>
                        </div>
                        <img src="<?php echo base_url('profile_pictures/' . $user->profile_pic); ?>"
                             class="img-circle circle-border m-b-md"
                             alt="profile"
                            width="128px">
                    </div>
                </div>
                <div class="col-lg-8">
                    <div style="padding-top: 25px" class="row">
                        <div class="col-lg-6">
                            <a href="inbox">
                                <div class="widget style1 lazur-bg">
                                    <div class="row">
                                        <div class="col-xs-4">
                                            <i class="fa fa-envelope-o fa-5x"></i>
                                        </div>
                                        <div class="col-xs-8 text-right">
                                            <span> New messages </span>

                                            <h2 class="font-bold"><?= $inbox_count ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget style1 red-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-dollar fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Pending Transactions </span>

                                        <h2 class="font-bold"><?= $pending_transaction_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="widget style1 yellow-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-quote-left fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Articles </span>

                                        <h2 class="font-bold"><?= $published_article_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="widget style1 blue-bg">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <span> Registration Requests </span>

                                        <h2 class="font-bold"><?= $registration_request_count ?></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget white-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <br/><br/><br/>
                                <i class="fa fa-dollar fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Total Monthly Transactions </span>

                                <h2 class="font-bold">Rs. 15250.00</h2>
                                <br/>
                                <span> Total Monthly Donations </span>

                                <h2 class="font-bold">Rs. 9300.00</h2>
                                <br/>
                                <span> Total Monthly Transfers </span>

                                <h2 class="font-bold">Rs. 5950.00</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <div class="widget gray-bg no-padding">
                        <div style="margin-top: 10px;height: 190px" class="flot-chart dashboard-chart">
                            <span class="h3"> Fund Status </span>

                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                    </div>

                </div>
            </div>
            <!--            <div class="row">-->
            <!--                <div class="col-lg-4">-->
            <!--                    <div class="widget gray-bg">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-xs-4">-->
            <!--                                <i class="fa fa-briefcase fa-5x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-8 text-right">-->
            <!--                                <span> Students Entrolled </span>-->
            <!---->
            <!--                                <h2 class="font-bold">28</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            <div class="col-lg-4">-->
            <!--                <div class="widget red-bg">-->
            <!--                    <div class="row">-->
            <!--                        <div class="col-xs-4">-->
            <!--                            <i class="fa fa-dollar fa-5x"></i>-->
            <!--                        </div>-->
            <!--                        <div class="col-xs-8 text-right">-->
            <!--                            <span> Total Monthly Transactions </span>-->
            <!---->
            <!--                            <h2 class="font-bold">Rs. 15250.00</h2>-->
            <!---->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--                <div class="col-lg-4">-->
            <!--                    <div class="widget gray-bg">-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-xs-4">-->
            <!--                                <i class="fa fa-cloud fa-5x"></i>-->
            <!---->
            <!--                            </div>-->
            <!--                            <div class="col-xs-8 text-right">-->
            <!--                                <span> Total Backup Size </span>-->
            <!---->
            <!--                                <h2 class="font-bold">14 MB</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!---->
            <!--            </div>-->


            <!--            <div class="row">-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget style1 navy-bg">-->
            <!--                        <div class="row vertical-align">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-user fa-3x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <h2 class="font-bold">217</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget style1 navy-bg">-->
            <!--                        <div class="row vertical-align">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-thumbs-up fa-3x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <h2 class="font-bold">400</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget style1 navy-bg">-->
            <!--                        <div class="row vertical-align">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-rss fa-3x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <h2 class="font-bold">10</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget style1 lazur-bg">-->
            <!--                        <div class="row vertical-align">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-phone fa-3x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <h2 class="font-bold">120</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget style1 lazur-bg">-->
            <!--                        <div class="row vertical-align">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-euro fa-3x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <h2 class="font-bold">462</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget style1 yellow-bg">-->
            <!--                        <div class="row vertical-align">-->
            <!--                            <div class="col-xs-3">-->
            <!--                                <i class="fa fa-shield fa-3x"></i>-->
            <!--                            </div>-->
            <!--                            <div class="col-xs-9 text-right">-->
            <!--                                <h2 class="font-bold">610</h2>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="row">-->
            <!--                <div class="col-lg-4">-->
            <!--                    <div class="widget-head-color-box navy-bg p-lg text-center">-->
            <!--                        <div class="m-b-md">-->
            <!--                            <h2 class="font-bold no-margins">-->
            <!--                                Alex Smith-->
            <!--                            </h2>-->
            <!--                            <small>Founder of Groupeq</small>-->
            <!--                        </div>-->
            <!--                        <img src="img/a4.jpg" class="img-circle circle-border m-b-md" alt="profile">-->
            <!---->
            <!--                        <div>-->
            <!--                            <span>100 Tweets</span> |-->
            <!--                            <span>350 Following</span> |-->
            <!--                            <span>610 Followers</span>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="widget-text-box">-->
            <!--                        <h4 class="media-heading">Alex Smith</h4>-->
            <!---->
            <!--                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>-->
            <!---->
            <!--                        <div class="text-right">-->
            <!--                            <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>-->
            <!--                            <a class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget navy-bg p-lg text-center">-->
            <!--                        <div class="m-b-md">-->
            <!--                            <i class="fa fa-shield fa-4x"></i>-->
            <!---->
            <!--                            <h1 class="m-xs">456</h1>-->
            <!---->
            <!--                            <h3 class="font-bold no-margins">-->
            <!--                                Shield-->
            <!--                            </h3>-->
            <!--                            <small>power</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="widget  p-lg text-center">-->
            <!--                        <div class="m-b-md">-->
            <!--                            <i class="fa fa-flash fa-4x"></i>-->
            <!---->
            <!--                            <h1 class="m-xs">612</h1>-->
            <!---->
            <!--                            <h3 class="font-bold no-margins">-->
            <!--                                Thunder-->
            <!--                            </h3>-->
            <!--                            <small>amount</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-4">-->
            <!--                    <div class="widget lazur-bg p-xl">-->
            <!---->
            <!--                        <h2>-->
            <!--                            Janet Smith-->
            <!--                        </h2>-->
            <!--                        <ul class="list-unstyled m-t-md">-->
            <!--                            <li>-->
            <!--                                <span class="fa fa-envelope m-r-xs"></span>-->
            <!--                                <label>Email:</label>-->
            <!--                                mike@mail.com-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <span class="fa fa-home m-r-xs"></span>-->
            <!--                                <label>Address:</label>-->
            <!--                                Street 200, Avenue 10-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <span class="fa fa-phone m-r-xs"></span>-->
            <!--                                <label>Contact:</label>-->
            <!--                                (+121) 678 3462-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!---->
            <!--                    </div>-->
            <!--                    <div class="widget red-bg p-lg text-center">-->
            <!--                        <div class="m-b-md">-->
            <!--                            <i class="fa fa-bell fa-4x"></i>-->
            <!---->
            <!--                            <h1 class="m-xs">47</h1>-->
            <!---->
            <!--                            <h3 class="font-bold no-margins">-->
            <!--                                Notification-->
            <!--                            </h3>-->
            <!--                            <small>We detect the error.</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-2">-->
            <!--                    <div class="widget yellow-bg p-lg text-center">-->
            <!--                        <div class="m-b-md">-->
            <!--                            <i class="fa fa-thumbs-up fa-4x"></i>-->
            <!---->
            <!--                            <h1 class="m-xs">520</h1>-->
            <!---->
            <!--                            <h3 class="font-bold no-margins">-->
            <!--                                Likes-->
            <!--                            </h3>-->
            <!--                            <small>amount</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                    <div class="widget yellow-bg p-lg text-center">-->
            <!--                        <div class="m-b-md">-->
            <!--                            <i class="fa fa-warning fa-4x"></i>-->
            <!---->
            <!--                            <h1 class="m-xs">Alarm</h1>-->
            <!---->
            <!--                            <h3 class="font-bold no-margins">-->
            <!--                                Do-->
            <!--                            </h3>-->
            <!--                            <small>something</small>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="row m-t-lg">-->
            <!--                <div class="col-lg-6">-->
            <!--                    <div class="ibox float-e-margins">-->
            <!---->
            <!--                        <div class="ibox-content">-->
            <!---->
            <!--                            <div>-->
            <!--                                <div class="chat-activity-list">-->
            <!---->
            <!--                                    <div class="chat-element">-->
            <!--                                        <a href="#" class="pull-left">-->
            <!--                                            <img alt="image" class="img-circle" src="img/a2.jpg">-->
            <!--                                        </a>-->
            <!---->
            <!--                                        <div class="media-body ">-->
            <!--                                            <small class="pull-right text-navy">1m ago</small>-->
            <!--                                            <strong>Mike Smith</strong>-->
            <!---->
            <!--                                            <p class="m-b-xs">-->
            <!--                                                Lorem Ipsum is simply dummy text of the printing and typesetting-->
            <!--                                                industry. Lorem Ipsum has been-->
            <!--                                            </p>-->
            <!--                                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="chat-element right">-->
            <!--                                        <a href="#" class="pull-right">-->
            <!--                                            <img alt="image" class="img-circle" src="img/a4.jpg">-->
            <!--                                        </a>-->
            <!---->
            <!--                                        <div class="media-body text-right ">-->
            <!--                                            <small class="pull-left">5m ago</small>-->
            <!--                                            <strong>John Smith</strong>-->
            <!---->
            <!--                                            <p class="m-b-xs">-->
            <!--                                                Lorem Ipsum is simply dummy text of the printing.-->
            <!--                                            </p>-->
            <!--                                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!---->
            <!--                                    <div class="chat-element ">-->
            <!--                                        <a href="#" class="pull-left">-->
            <!--                                            <img alt="image" class="img-circle" src="img/a2.jpg">-->
            <!--                                        </a>-->
            <!---->
            <!--                                        <div class="media-body ">-->
            <!--                                            <small class="pull-right">2h ago</small>-->
            <!--                                            <strong>Mike Smith</strong>-->
            <!---->
            <!--                                            <p class="m-b-xs">-->
            <!--                                                Lorem Ipsum is simply dummy text of the printing and typesetting-->
            <!--                                                industry. Lorem Ipsum has been-->
            <!--                                            </p>-->
            <!--                                            <small class="text-muted">Today 4:21 pm - 12.06.2014</small>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                            <div class="chat-form">-->
            <!--                                <form role="form">-->
            <!--                                    <div class="form-group">-->
            <!--                                        <textarea class="form-control" placeholder="Message"></textarea>-->
            <!--                                    </div>-->
            <!--                                    <div class="text-right">-->
            <!--                                        <button type="submit" class="btn btn-sm btn-primary m-t-n-xs"><strong>Send-->
            <!--                                                message</strong></button>-->
            <!--                                    </div>-->
            <!--                                </form>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-6">-->
            <!--                    <div>-->
            <!--                        <table class="table">-->
            <!--                            <tbody>-->
            <!--                            <tr>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-danger m-r-sm">12</button>-->
            <!--                                    Total messages-->
            <!--                                </td>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-primary m-r-sm">28</button>-->
            <!--                                    Posts-->
            <!--                                </td>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-info m-r-sm">15</button>-->
            <!--                                    Comments-->
            <!--                                </td>-->
            <!--                            </tr>-->
            <!--                            <tr>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-info m-r-sm">20</button>-->
            <!--                                    News-->
            <!--                                </td>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-success m-r-sm">40</button>-->
            <!--                                    Likes-->
            <!--                                </td>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-danger m-r-sm">30</button>-->
            <!--                                    Notifications-->
            <!--                                </td>-->
            <!--                            </tr>-->
            <!--                            <tr>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-warning m-r-sm">20</button>-->
            <!--                                    Albums-->
            <!--                                </td>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-default m-r-sm">40</button>-->
            <!--                                    Groups-->
            <!--                                </td>-->
            <!--                                <td>-->
            <!--                                    <button type="button" class="btn btn-warning m-r-sm">30</button>-->
            <!--                                    Permissions-->
            <!--                                </td>-->
            <!--                            </tr>-->
            <!--                            </tbody>-->
            <!--                        </table>-->
            <!--                    </div>-->
            <!--                    <div>-->
            <!--                        <div class="row">-->
            <!--                            <div class="col-md-6">-->
            <!--                                <div class="ibox-content text-center">-->
            <!--                                    <h1>Nicki Smith</h1>-->
            <!---->
            <!--                                    <div class="m-b-sm">-->
            <!--                                        <img alt="image" class="img-circle" src="img/a8.jpg">-->
            <!--                                    </div>-->
            <!--                                    <p class="font-bold">Consectetur adipisicing</p>-->
            <!---->
            <!--                                    <div class="text-center">-->
            <!--                                        <a class="btn btn-xs btn-white"><i class="fa fa-thumbs-up"></i> Like </a>-->
            <!--                                        <a class="btn btn-xs btn-primary"><i class="fa fa-heart"></i> Love</a>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                            <div class="col-md-6">-->
            <!--                                <div class="ibox-content">-->
            <!--                                    <div>-->
            <!--                                        <div>-->
            <!--                                            <span>Memory</span>-->
            <!--                                            <small class="pull-right">10/200 GB</small>-->
            <!--                                        </div>-->
            <!--                                        <div class="progress progress-small">-->
            <!--                                            <div style="width: 60%;" class="progress-bar"></div>-->
            <!--                                        </div>-->
            <!---->
            <!--                                        <div>-->
            <!--                                            <span>Bandwidth</span>-->
            <!--                                            <small class="pull-right">20 GB</small>-->
            <!--                                        </div>-->
            <!--                                        <div class="progress progress-small">-->
            <!--                                            <div style="width: 50%;" class="progress-bar"></div>-->
            <!--                                        </div>-->
            <!---->
            <!--                                        <div>-->
            <!--                                            <span>Activity</span>-->
            <!--                                            <small class="pull-right">73%</small>-->
            <!--                                        </div>-->
            <!--                                        <div class="progress progress-small">-->
            <!--                                            <div style="width: 40%;" class="progress-bar"></div>-->
            <!--                                        </div>-->
            <!---->
            <!--                                        <div>-->
            <!--                                            <span>FTP</span>-->
            <!--                                            <small class="pull-right">400 GB</small>-->
            <!--                                        </div>-->
            <!--                                        <div class="progress progress-small">-->
            <!--                                            <div style="width: 20%;" class="progress-bar progress-bar-danger"></div>-->
            <!--                                        </div>-->
            <!--                                    </div>-->
            <!--                                </div>-->
            <!--                            </div>-->
            <!--                        </div>-->
            <!---->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="row">-->
            <!--                <div class="col-lg-6">-->
            <!--                    <div class="ibox-content">-->
            <!--                        <h2>TODO List</h2>-->
            <!--                        <small>This is example of task list</small>-->
            <!--                        <ul class="todo-list m-t">-->
            <!--                            <li>-->
            <!--                                <input type="checkbox" value="" name="" class="i-checks"/>-->
            <!--                                <span class="m-l-xs">Buy a milk</span>-->
            <!--                                <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <input type="checkbox" value="" name="" class="i-checks" checked/>-->
            <!--                                <span class="m-l-xs">Go to shop and find some products.</span>-->
            <!--                                <small class="label label-info"><i class="fa fa-clock-o"></i> 3 mins</small>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <input type="checkbox" value="" name="" class="i-checks"/>-->
            <!--                                <span class="m-l-xs">Send documents to Mike</span>-->
            <!--                                <small class="label label-warning"><i class="fa fa-clock-o"></i> 2 mins</small>-->
            <!--                            </li>-->
            <!--                            <li>-->
            <!--                                <input type="checkbox" value="" name="" class="i-checks"/>-->
            <!--                                <span class="m-l-xs">Go to the doctor dr Smith</span>-->
            <!--                                <small class="label label-danger"><i class="fa fa-clock-o"></i> 42 mins</small>-->
            <!--                            </li>-->
            <!--                        </ul>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-lg-6">-->
            <!--                    <div class="ibox float-e-margins">-->
            <!--                        <div class="ibox-content">-->
            <!--                            <h2>TODO Small version</h2>-->
            <!--                            <small>This is example of small version of todo list</small>-->
            <!--                            <ul class="todo-list m-t small-list">-->
            <!--                                <li>-->
            <!--                                    <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>-->
            <!--                                    <span class="m-l-xs todo-completed">Buy a milk</span>-->
            <!---->
            <!--                                </li>-->
            <!--                                <li>-->
            <!--                                    <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>-->
            <!--                                    <span class="m-l-xs  todo-completed">Go to shop and find some products.</span>-->
            <!---->
            <!--                                </li>-->
            <!--                                <li>-->
            <!--                                    <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
            <!--                                    <span class="m-l-xs">Send documents to Mike</span>-->
            <!--                                    <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins</small>-->
            <!--                                </li>-->
            <!--                                <li>-->
            <!--                                    <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
            <!--                                    <span class="m-l-xs">Go to the doctor dr Smith</span>-->
            <!--                                </li>-->
            <!--                                <li>-->
            <!--                                    <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>-->
            <!--                                    <span class="m-l-xs">Plan vacation</span>-->
            <!--                                </li>-->
            <!--                            </ul>-->
            <!--                        </div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--            <div class="row m-t-lg">-->
            <!--                <div class="col-lg-12">-->
            <!--                    <div class="ibox-content">-->
            <!--                        <h2>Word map</h2>-->
            <!--                        <small>This is simple example of map</small>-->
            <!--                        <div id="world-map" style="height: 300px;"></div>-->
            <!--                    </div>-->
            <!--                </div>-->
            <!---->
            <!--            </div>-->

        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<?php $this->load->view('partial/common_js'); ?>

<!-- Custom and plugin javascript -->
<script src="<?php echo base_url('assets'); ?>/js/inspinia.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/iCheck/icheck.min.js"></script>

<!-- Jvectormap -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- Flot -->
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/plugins/flot/jquery.flot.spline.js"></script>


<!-- ChartJS-->
<script src="<?php echo base_url('assets'); ?>/js/plugins/chartJs/Chart.min.js"></script>
<script>
    $(document).ready(function () {


        var data1 = [
            [0, 4], [1, 8], [2, 5], [3, 10], [4, 4], [5, 16], [6, 5], [7, 11], [8, 6], [9, 11], [10, 30], [11, 10], [12, 13], [13, 4], [14, 3], [15, 3], [16, 6]
        ];
        var data2 = [
            [0, 1], [1, 0], [2, 2], [3, 0], [4, 1], [5, 3], [6, 1], [7, 5], [8, 2], [9, 3], [10, 2], [11, 1], [12, 0], [13, 2], [14, 8], [15, 0], [16, 0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1, data2
            ],
            {
                series: {
                    lines: {
                        show: false,
                        fill: true
                    },
                    splines: {
                        show: true,
                        tension: 0.4,
                        lineWidth: 1,
                        fill: 0.4
                    },
                    points: {
                        radius: 0,
                        show: true
                    },
                    shadowSize: 2
                },
                grid: {
                    hoverable: true,
                    clickable: true,
                    tickColor: "#d5d5d5",
                    borderWidth: 1,
                    color: '#d5d5d5'
                },
                colors: ["#1ab394", "#464f88"],
                xaxis: {},
                yaxis: {
                    ticks: 4
                },
                tooltip: false
            }
        );


        /*var doughnutData = [
         {
         value: 300,
         color: "#a3e1d4",
         highlight: "#1ab394",
         label: "App"
         },
         {
         value: 50,
         color: "#dedede",
         highlight: "#1ab394",
         label: "Software"
         },
         {
         value: 100,
         color: "#b5b8cf",
         highlight: "#1ab394",
         label: "Laptop"
         }
         ];

         var doughnutOptions = {
         segmentShowStroke: true,
         segmentStrokeColor: "#fff",
         segmentStrokeWidth: 2,
         percentageInnerCutout: 45, // This is 0 for Pie charts
         animationSteps: 100,
         animationEasing: "easeOutBounce",
         animateRotate: true,
         animateScale: false,
         };
         var ctx = document.getElementById("doughnutChart").getContext("2d");
         var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);
         */
    });
</script>


</body>

</html>
