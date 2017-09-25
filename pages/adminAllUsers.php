<div style="color:green; font-weight: 700; margin-bottom: 10px;"><?php echo $change_user_success;?></div>
<table class="table table-sm table-hover table-bordered table-responsive">
    <thead>
    <tr class="bg-primary">
        <th>Id</th>
        <th>Name user</th>
        <th>Email user</th>
        <th>Status ban</th>
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
        <td><?php echo $user['ban']; ?></td>
        <td><?php echo $user['admin']; ?></td>
        <td>
            <form action="admin.php?id=<?php echo htmlspecialchars($user['id'])?>" method="POST">
                <button type="submit" name="delete_user" class="btn btn-danger rounded">Delete</button>
            </form>
        </td>
        <td>
            <form action="admin.php?id=<?php echo htmlspecialchars($user['id'])?>" method="POST">
                <?php if($user['ban'] == 0):?>
                <button type="submit" name="ban_user" class="btn btn-warning rounded">Ban</button>
                <input type="hidden" name="ban" value="1">
                <?php else:;?>
                <button type="submit" name="ban_user" class="btn btn-success rounded">Unblock</button>
                <input type="hidden" name="ban" value="0">
                <?php endif;?>
            </form>
        </td>
    </tr>
    <?php } ?>
    </tbody>
</table>