<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="static/img/ant-logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Ant Bug Tracker - <?= $settings['company_name'] ?>
        </a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#tracker-navbar-collapse" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="ant-navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="issues/create" title="Report a new issue">
                        <i class="fas fa-plus"></i> New Issue
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="projects" title="Browse all projects">
                        <i class="fas fa-list"></i> Projects
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="issues" title="Browse all issues">
                        <i class="fas fa-bug"></i> Issues
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="admin" title="System Administration">
                        <i class="fas fa-cogs"></i> Administration
                    </a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-outline-danger" href="logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
