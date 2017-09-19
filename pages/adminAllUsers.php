<table class="table table-sm table-hover table-bordered table-responsive">
    <thead>
    <tr class="bg-primary">
        <th>Id</th>
        <th>Name user</th>
        <th>Email user</th>
        <th>Role</th>
        <th>Delete</th>
        <th>Ban</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($user = mysqli_fetch_assoc($allUsers)) {?>
    <tr class="bg-faded">
        <td><?php echo $user['id']; ?></td>
        <td><?php echo $user['login']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['admin']; ?></td>
        <td><button type="submit" class="btn btn-danger rounded">Delete</button></td>
        <td><button type="submit" class="btn btn-warning rounded">Ban</button></td>
    </tr>
    <?php } ?>
    </tbody>
</table>