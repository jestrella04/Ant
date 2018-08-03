<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/nav.php'; ?>

<div class="container">
	<form id="issue-submit-form">
		<fieldset>
			<h3 class="margin-bottom-xs">
				<div class="float-right">
					<i class="fas fa-bug"></i>
				</div>

				<small>REPORT A NEW ISSUE</small>
			</h3>
			<hr>
			<div class="section-divider-2x"></div>

			<div class="form-group row">
				<label for="" class="col-md-2 control-label">Title:</label>
				
				<div class="col-md-10">
					<input type="test" class="form-control" id="" name="" placeholder="What is going on?" required>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-md-2 control-label">Category:</label>

				<div class="col-md-10">
					<select class="form-control" id="" name="" required>
						<option value=""></option>
						<?php foreach($categories as $category): ?>
						<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-md-2 control-label">Project:</label>

				<div class="col-md-10">
					<select class="form-control" id="" name="" required>
						<option value=""></option>
						<?php foreach($projects as $project): ?>
						<option value="<?= $project['id'] ?>"><?= $project['name'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-md-2 control-label">Priority:</label>

				<div class="col-md-10">
					<select class="form-control" id="" name="" required>
						<option value=""></option>
						<?php foreach($priorities as $priority): ?>
						<option value="<?= $priority['id'] ?>"><?= $priority['name'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<div class="form-group row">
				<label for="" class="col-md-2 control-label">Description:</label>

				<div class="col-md-10">
					<textarea class="form-control rich-text-editor" id="" name="" placeholder="Enter full detailed description and steps to replicate" required></textarea>
				</div>
			</div>

			<div class="form-group row">
				<label class="col-md-2 control-label">Attachments:</label>

				<div class="col-md-10">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="" multiple>
						<label class="custom-file-label" for="">Choose files</label>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-md-10 offset-md-2 ">
					<ul class="list-group" id="files-selected">
						<li class="list-group-item text-muted">No files selected</li>
					</ul>
				</div>
			</div>

			<div class="section-divider-2x"></div>
			<hr>
			<div class="section-divider-2x"></div>

			<div class="form-group row">
				<div class="col-md-10 offset-md-2 ">
					<button type="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-danger">Clear</button>
				</div>
			</div>
		</fieldset>
	</form>
</div>

<?php require ROOT_PATH . '/app/views/layouts/token.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/copyright.php'; ?>
<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
