<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/nav.php'; ?>

<div class="container">
	<div class="card">
		<div class="card-header">
			<div class="card-column-title">
				<div class="float-right">
					<i class="fa fa-bug fa-fw"></i>
				</div>

				Browse Issues
			</div>
		</div>

		<ul class="list-group list-group-flush">
		<?php foreach ($issues as $issue) : ?>
			<li class="list-group-item">
				<span class="badge <?= getStatusBadge($issue['status_name']) ?>" title="<?= $issue['status_desc'] ?>"><?= $issue['status_name'] ?></span>
				<a href="issues/<?= $issue['id'] ?>">[#<?= $issue['id'] ?>] <?= $issue['title'] ?></a><br>

				<small>
					<span class="pr-3">Reporter: <?= $issue['reporter_user_id'] ?></span>
					<span class="pr-3">Date: <span class="date"><?= $issue['date_created'] ?></span></span>
					<span class="pr-3">Category: <?= $issue['category_name'] ?></span>
					<span class="pr-3">Project: <a href="issues/project/<?= $issue['project_id'] ?>"><?= $issue['project_name'] ?></a></span>
					<span class="pr-3">Priority: <?= $issue['priority_name'] ?></span>
				</small>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
</div>

<?php require ROOT_PATH . '/app/views/layouts/token.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/copyright.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
