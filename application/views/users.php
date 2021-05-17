

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Users</h1>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Role</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($user_list) && count((array) $user_list) > 0) {
                    $i = 1;
                    foreach ($user_list as $user) {
                        ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $user->first_name ?></td>
                            <td><?= $user->last_name ?></td>
                            <td><?= $user->role_name ?></td>
                            <td><?= $user->user_name ?></td>
                        </tr>
                    <?php
                    }
                }else{ ?>
                    No Data Found
                <?php }
                ?>
            </tbody>
        </table>
    </div>
</main>
</div>
</div>



