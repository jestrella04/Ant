<div class="row">
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <?php echo printIcon('fa-bug fa-fw') ?>
                </div>

                <h1 class="panel-title">Recent Issues</h1>
            </div>

            <table class="table table-hover">
                <thead>
                    <th class="col-md-3">Project</th>
                    <th class="col-md-2">Status</th>
                    <th class="col-md-7">Issue</th>
                </thead>

                <tbody>
                    <?php foreach ($issues as $issue):?>
                        <tr>
                            <td class="col-md-3"><?php echo printLink('index.php/browse/issues/?projectId='.$issue['project_id'], $issue['project_name']) ?></td>
                            <td class="col-md-2"><?php echo printStatus($issue['status_name'], $issue['status_desc']) ?></td>
                            <td class="col-md-7"><?php echo $issue['title'] .' ['. printLink('index.php/issue/'.$issue['id'], $issue['id']) ?>]</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <?php echo printIcon('fa-bullhorn fa-fw') ?>
                </div>

                <h3 class="panel-title">Recent Activity</h3>
            </div>

            <table class="table table-hover">
                <tbody>
                    <?php foreach ($activities as $activity):?>
                        <tr>
                            <td class="col-md-12">
                                <p class="text-muted"><small><?php echo $activity['date'] ?></small></p>
                                <p><?php echo printActivity($activity['user_id'], $activity['action'], $activity['issue_id']) ?></p>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
