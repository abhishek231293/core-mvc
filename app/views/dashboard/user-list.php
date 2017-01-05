<h2 class="sub-header">Users</h2>

<button style="margin-top: -5%;" type="button" class="pull-right btn btn-info btn-circle" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus" aria-hidden="true"></i></button>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>State</th>
            <th>Address</th>
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        <?php $count=1; foreach($this->userList as $index=>$value){ ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['email']; ?></td>
                <td><?php echo $value['department_name']; ?></td>
                <td><?php echo $value['state_name']; ?></td>
                <td><?php echo $value['address']; ?></td>
                <td>
                    <button type="button" class="btn btn-warning btn-circle"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                    <button type="button" class="btn btn-success btn-circle"><i class="fa fa-user" aria-hidden="true"></i></button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>