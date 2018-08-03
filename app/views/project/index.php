<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/nav.php'; ?>

<div class="container">
	<div class="card">
		<div class="card-header">
            <div class="card-column-title">
                <div class="float-right">
                    <i class="fa fa-list fa-fw"></i>
                </div>

                Browse Projects
            </div>
		</div>

		<ul class="list-group list-group-flush">
		<?php foreach ($projects as $project) : ?>
			<li class="list-group-item">
                <p class="lead font-weight-bold"><?= $project['name'] ?></p>
                <?php if (!empty($project['description'])) : ?>
                <p><?= $project['description'] ?></p>
                <?php endif ?>

                <span class="pr-3">Reported issues: <span class="badge badge-pill badge-primary"><?= $project['count_issue'] ?></span></span>
                <span class="pr-3">Resolved issues: <span class="badge badge-pill badge-success"><?= $project['count_resolved'] ?></span></span>
                <span class="pr-3">Unresolved issues: <span class="badge badge-pill badge-danger"><?= $project['count_unresolved'] ?></span></span>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
</div>

<?php require ROOT_PATH . '/app/views/layouts/token.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/copyright.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
