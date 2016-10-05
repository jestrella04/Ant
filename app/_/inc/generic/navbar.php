<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="<?php echo $GLOBALS['baseHref'] ?>">Ant Bug Tracker (My Company)</a>
        </div>

        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><?php echo printLink('index.php/create/issue', 'New Issue', 'Report a new issue', 'fa-plus fa-fw') ?></li>
                <li><?php echo printLink('index.php/browse/projects/', 'Projects', 'Browse all projects', 'fa-list-alt fa-fw') ?></li>
                <li><?php echo printLink('index.php/browse/issues/', 'Issues', 'Browse all issues', 'fa-bug fa-fw') ?></li>
                <li><?php echo printLink('index.php/admin/', 'Admin', 'Configure Ant', 'fa-cogs fa-fw') ?></li>
                <li class="hidden-md hidden-lg"><?php echo printLink('index.php/user/', 'My Profile', 'View my profile', 'fa-user fa-fw') ?></li>
                <li class="hidden-md hidden-lg"><?php echo printLink('index.php/?user_logout=true', 'Logout', 'Log out of the system', 'fa-sign-out fa-fw') ?></li>
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
                                            <a href="index.php/user/<?php echo $_SESSION['user_id']; ?>/" class="btn btn-primary btn-block">
                                                <?php echo printIcon('fa-user fa-fw') ?> My Profile
                                            </a>

                                            <a href="index.php/?user_logout=true" class="btn btn-danger btn-block">
                                                <?php echo printIcon('fa-sign-out fa-fw') ?> Logout
                                            </a>
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
