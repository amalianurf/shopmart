</header>
<div onclick="deleteConfirm()" id="modalBackground" class="modal-background hidden"></div>
<div id="modal" class="modal hidden">
    <div class="close-wrapper">
        <p>Delete Confirmation</p>
        <button onclick="deleteConfirm()" class="close-button"><span class="material-symbols-outlined">close</span></button>
    </div>
    <p>Apakah Anda yakin akan menghapus item?</p>
    <div class="button-wrapper">
        <a id="deleteLink" class="delete-button">Yes</a>
        <button onclick="deleteConfirm()" class="cancel-button">Cancel</button>
    </div>
</div>
<main>
    <?php if (isset($_SESSION['success_message'])): ?>
        <div id="success" class="notification">
            <div><span style="color: green;" class="material-symbols-outlined"><span class="material-symbols-outlined">check_circle</span></div>
            <p><?= $_SESSION['success_message'] ?></p>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['fail_message'])): ?>
        <div id="fail" class="notification">
            <div><span style="color: red;" class="material-symbols-outlined">cancel</span></div>
            <p><?= $_SESSION['fail_message'] ?></p>
        </div>
    <?php endif; ?>
    <section class="admin-section-title">
        <h1>Data User</h1>
        <div>
            <a href="users/add" id="addBtn">Add User</a>
        </div>
    </section>
    <section class="admin-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Profile</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="items">
                <?php foreach ($data["users"] as $user): ?>
                    <tr>
                        <td><?=$user["id_user"]?></td>
                        <td><?=$user["nama"]?></td>
                        <td><?=$user["email"]?></td>
                        <td><?=$user["no_hp"]?></td>
                        <td><?=$user["alamat"]?></td>
                        <td><img src="<?= BASEURL ?>/public/img/profile/<?=$user["photo_profil"]?>" height="100" alt="<?=$user["photo_profil"]?>"></td>
                        <td><a href="users/edit/<?=$user["id_user"]?>"><span class="material-symbols-outlined" style="color: blue;">edit</span></a></td>
                        <td><button onclick="deleteConfirm(`users/delete/<?=$user['id_user']?>`)" id="deleteBtn" class="delete-item"><span class="material-symbols-outlined">delete</span></button></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </section>
</main>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
            "responsive": true,
            "columnDefs": [
                {
                    "targets": [6],
                    "render": function(data, type, row) {
                        var edit_user = row[6];
                        var delete_user = row[7];
                        return '<div style="display: flex; justify-content: center; gap: 16px;">' + edit_user + ' ' + delete_user + '</div>';
                    }
                },
                {
                    "targets": [7],
                    "visible": false,
                }
            ]
        });
    });

    <?php if (isset($_SESSION['success_message'])): ?>
        var success = document.getElementById("success");
        success.style.display = 'flex';

        setTimeout(function() {
            <?php unset($_SESSION['success_message']); ?>
        }, 2000);
    <?php endif; ?>

    <?php if (isset($_SESSION['fail_message'])): ?>
        var fail = document.getElementById("fail");
        fail.style.display = 'flex';

        setTimeout(function() {
            <?php unset($_SESSION['fail_message']); ?>
        }, 2000);
    <?php endif; ?>
</script>