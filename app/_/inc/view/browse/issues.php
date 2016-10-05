<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th class="col-md-1">Id</th>
                        <th class="col-md-2">Title</th>
                        <th class="col-md-1">Project</th>
                        <th class="col-md-1">Category</th>
                        <th class="col-md-1">Status</th>
                        <th class="col-md-1">Priority</th>
                        <th class="col-md-1">Resolution</th>
                        <th class="col-md-1">Reporter</th>
                        <th class="col-md-1">Assignee</th>
                        <th class="col-md-1">Date created</th>
                        <th class="col-md-1">Date updated</th>
                    </thead>

                    <tbody>
                        <?php foreach ($issues as $issue):?>
                            <tr>
                                <td class="col-md-1"><?php echo printLink('index.php/issue/'.$issue['id'], $issue['id']) ?></td>
                                <td class="col-md-2"><?php echo $issue['title'] ?></td>
                                <td class="col-md-1"><?php echo $issue['project_name'] ?></td>
                                <td class="col-md-1"><?php echo $issue['category_name'] ?></td>
                                <td class="col-md-1"><?php echo printStatus($issue['status_name'], $issue['status_desc']) ?></td>
                                <td class="col-md-1"><?php echo $issue['priority_name'] ?></td>
                                <td class="col-md-1"><?php echo $issue['resolution_name'] ?></td>
                                <td class="col-md-1"><?php echo $issue['user_reporter'] ?></td>
                                <td class="col-md-1"><?php echo $issue['user_assignee'] ?></td>
                                <td class="col-md-1"><?php echo $issue['date_created'] ?></td>
                                <td class="col-md-1"><?php echo $issue['date_updated'] ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
