<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-right">
            <?php echo printIcon('fa-bug fa-fw') ?>
        </div>

        <h3 class="panel-title">[<?php echo $issueDetails['id'] ?>] <?php echo $issueDetails['title'] ?></h3>
    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <p class="issue-data-inline"><?php echo printIcon('fa-tags fa-fw') ?> Tags:</p>
                <p class="issue-data-inline"><?php echo printTags($issueTags) ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-list-alt fa-fw') ?> Project:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['project_name'] ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-object-group fa-fw') ?> Category:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['category_name'] ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-asterisk fa-fw') ?> Priority:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['priority_name'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-star fa-fw') ?> Status:</p>
                <p class="issue-data-inline"><?php echo printStatus($issueDetails['status_name'], $issueDetails['status_desc']) ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-fire-extinguisher fa-fw') ?> Resolution:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['resolution_name'] ?></p>
            </div>

            <div class="col-md-4"></div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-calendar fa-fw') ?> Date created:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['date_created'] ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-calendar fa-fw') ?> Date updated:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['date_updated'] ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-calendar fa-fw') ?> Date resolved:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['date_resolved'] ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-user fa-fw') ?> Reporter:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['user_reporter'] ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-user fa-fw') ?> Assignee:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['user_assignee'] ?></p>
            </div>

            <div class="col-md-4">
                <p class="issue-data-inline"><?php echo printIcon('fa-user fa-fw') ?> Last update:</p>
                <p class="issue-data-inline"><?php echo $issueDetails['user_last_update'] ?></p>
            </div>
        </div>

        <div class="section-divider"></div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="issue-heading"><?php echo printIcon('fa-sticky-note-o') ?> Description</h4>
                <hr>
                <p><?php echo $issueDetails['description'] ?></p>
            </div>
        </div>

        <div class="section-divider"></div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="issue-heading"><?php echo printIcon('fa-paperclip') ?> Attachments</h4>
                <hr>

                <?php echo printAttachments($issueFiles) ?>
            </div>
        </div>

        <div class="section-divider"></div>

        <div class="row">
            <div class="col-md-12">
                <h4 class="issue-heading"><?php echo printIcon('fa-bullhorn') ?> Activity</h4>
                <hr>

                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#"><?php echo printIcon('fa-comment-o fa-fw') ?> Comments</a></li>
                    <li role="presentation"><a href="#"><?php echo printIcon('fa-tasks fa-fw') ?> History</p></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
