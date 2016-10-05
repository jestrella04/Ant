<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th class="col-md-6">Details</th>
                        <th class="col-md-2">Total issues</th>
                        <th class="col-md-2">Unresolved issues</th>
                        <th class="col-md-2">Actions</th>
                    </thead>

                    <tbody>
                        <?php foreach ($projects as $project):?>
                            <tr>
                                <td class="col-md-6">
                                    <h5><?php echo $project['name'] ?></h5>
                                    <small class="text-muted"><?php echo $project['description'] ?></small>
                                </td>
                                <td class="col-md-2"><span class="badge"><?php echo $project['count_issue'] ?></span></td>
                                <td class="col-md-2"><span class="badge"><?php echo $project['count_unresolved'] ?></span></td>
                                <td class="col-md-2">
                                    <div class="btn-group btn-group-xs" role="group" aria-label="">
                                        <button type="button" class="btn btn-default">Browse</button>
                                        <button type="button" class="btn btn-default">Edit</button>
                                        <button type="button" class="btn btn-default">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
