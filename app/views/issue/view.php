<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/nav.php'; ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="card-column-title">
				<div class="float-right">
					<i class="fa fa-bug fa-fw"></i>
				</div>

				[#<?= $issue['id'] ?>] <?= $issue['title'] ?>
			</div>
		</div>

		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-tags fa-fw"></i> Tags:</p>
					<p class="issue-data-inline"><?= printLabels($labels) ?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-list-alt fa-fw"></i> Project:</p>
					<p class="issue-data-inline"><?= $issue['project_name'] ?></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-object-group fa-fw"></i> Category:</p>
					<p class="issue-data-inline"><?= $issue['category_name'] ?></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-asterisk fa-fw"></i> Priority:</p>
					<p class="issue-data-inline"><?= $issue['priority_name'] ?></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-star fa-fw"></i> Status:</p>
					<p class="issue-data-inline"><span class="badge <?= getStatusBadge($issue['status_name']) ?>" title="<?= $issue['status_desc'] ?>"><?= $issue['status_name'] ?></span></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-fire-extinguisher fa-fw"></i> Resolution:</p>
					<p class="issue-data-inline"><?= $issue['resolution_name'] ?></p>
				</div>

				<div class="col-md-4"></div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-calendar fa-fw"></i> Date created:</p>
					<p class="issue-data-inline"><span class="date"><?= $issue['date_created'] ?></a></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-calendar fa-fw"></i> Date updated:</p>
					<p class="issue-data-inline"><span class="date"><?= $issue['date_updated'] ?></span></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-calendar fa-fw"></i> Date resolved:</p>
					<p class="issue-data-inline"><span class="date"><?= $issue['date_resolved'] ?></a></p>
				</div>
			</div>

			<div class="row">
				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-user fa-fw"></i> Reporter:</p>
					<p class="issue-data-inline"><?= $issue['reporter_user_id'] ?></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-user fa-fw"></i> Assignee:</p>
					<p class="issue-data-inline"><?= $issue['assignee_user_id'] ?></p>
				</div>

				<div class="col-md-4">
					<p class="issue-data-inline font-weight-bold"><i class="fa fa-user fa-fw"></i> Last update:</p>
					<p class="issue-data-inline"><?= $issue['last_update_user_id'] ?></p>
				</div>
			</div>

			<div class="section-divider"></div>

			<div class="row">
				<div class="col-md-12">
					<h4 class="issue-heading"><i class="fa fa-sticky-note fa-fw"></i> Description</h4>
					<hr>
					<p><?= $issue['description'] ?></p>
				</div>
			</div>

			<div class="section-divider"></div>

			<div class="row">
				<div class="col-md-12">
					<h4 class="issue-heading"><i class="fa fa-paperclip fa-fw"></i> Attachments</h4>
					<hr>
					<?= printAttachments($files) ?>
				</div>
			</div>

			<div class="section-divider"></div>

			<h4 class="issue-heading"><i class="fa fa-bullhorn fa-fw"></i> Activity</h4>
			<hr>

			<div class="row">
				<div class="col-md-6">
					<i class="fa fa-comment fa-fw"></i> Comments</a>

					<div id="ant-comment-container"></div>
				</div>

				<div class="col-md-6">
					<i class="fa fa-tasks fa-fw"></i> History</p></a>

					<div id="ant-history-container"></div>
				</div>
			</div>
		</div>
	</div>

</div>

<?php require ROOT_PATH . '/app/views/layouts/token.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/copyright.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
