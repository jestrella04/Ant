<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/nav.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="float-right">
						<i class="fa fa-bug fa-fw"></i>
					</div>

					<h5>Recent Issues</h5>
				</div>

				<ul class="list-group list-group-flush">
				<?php foreach ($issues as $issue) : ?>
					<li class="list-group-item">
						<span class="badge <?= getStatusBadge($issue['status_name']) ?>" title="<?= $issue['status_desc'] ?>"><?= $issue['status_name'] ?></span>
						<a href="issues/<?= $issue['id'] ?>">[#<?= $issue['id'] ?>] <?= $issue['title'] ?></a><br>
						<small>
							<span class="pr-3">Reported: <?= $issue['reporter_user_id'] ?></span>
							<span class="pr-3">Reported: <?= $issue['date_created'] ?></span>
							<span class="pr-3">Project: <?= $issue['project_name'] ?></span>
						</small>
					</li>
				<?php endforeach ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php require ROOT_PATH . '/app/views/layouts/token.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/copyright.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
