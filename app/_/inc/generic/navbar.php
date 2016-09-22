<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="#">Ant Bug Tracker (My Company)</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="#"><span class="fa fa-check"></span> Link1</a></li>
                <li><a href="#"><span class="fa fa-eye-open"></span> Link 2</a></li>
                <li><a href="#"><span class="fa fa-book"></span> Link 3</a></li>
                <li><a href="#"><span class="fa fa-ok-sign"></span> Link 4</a></li>
                <li class="hidden-md hidden-lg"><a href="#"><span class="fa fa-stats"></span> Link 6</a></li>
                <li class="hidden-md hidden-lg"><a href="#" class=""><span class="fa fa-off"></span> Link 7</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="fa fa-user"></span> 
                        <strong><?php echo $_SESSION['user_id']; ?></strong>
                    </a>

                    <ul class="dropdown-menu">
                        <li>
                            <div class="navbar-login">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-center">
                                            <span class="fa fa-user icon-size"></span>
                                        </p>
                                    </div>

                                    <div class="col-lg-8">
                                        <p class="text-left"><strong><?php echo $_SESSION['user_id']; ?></strong></p>
                                        <p class="text-left small"><?php echo $_SESSION['user_id']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="divider"></li>
                        <li>
                            <div class="navbar-login navbar-login-session">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <p>
                                            <a href="#" class="btn btn-primary btn-block"><span class="fa fa-user"></span>My Profile</a>
                                            <a href="#" class="btn btn-danger btn-block"><span class="fa fa-sign-out"></span> Logout</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
