

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Models</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
              <a class="btn btn-sm btn-outline-secondary" href="<?= base_url() ?>index.php/Dashboard/addModel">Add Model</a>
          </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Model Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($model_list) && count((array) $model_list) > 0) {
                    $i = 1;
                    foreach ($model_list as $model) {
                        $status = 'Active';
                        if ($model->status == 1) {
                            $status = 'Active';
                        } else {
                            $status = 'In-Active';
                        }
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $model->model_name ?></td>
                            <td><?= $status ?></td>
                            <td><a href="<?= base_url() ?>index.php/Dashboard/editModel/<?= $model->model_id ?>">Edit</a> &nbsp; &nbsp;<a href="<?= base_url() ?>index.php/Dashboard/deleteModel/<?= $model->model_id ?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                } else {
                    ?>
                    No Data Found
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>



