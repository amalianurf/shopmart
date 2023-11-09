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
        <h1>Data Category</h1>
        <div>
            <a href='categories/add' id='addBtn'>Add Category</a>
        </div>
    </section>
    <section class="admin-table">
        <table id="myTable" class="display">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Category Name</th>
                    <th>Action</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="items">
                <?php foreach ($data["categories"] as $category): ?>
                    <?php
                        $isUse = false;
                        foreach ($data["products"] as $product) {
                            if ($product["kode_kategori"] == $category["kode"]) {
                                $isUse = true;
                            }
                        }
                    ?>
                    <tr>
                        <td><?=$category["kode"]?></td>
                        <td><?=$category["nama_kategori"]?></td>
                        <td><a href="categories/edit/<?=$category["kode"]?>"><span class="material-symbols-outlined" style="color: blue;">edit</span></a></td>
                        <td><button onclick="deleteConfirm(`categories/delete/<?=$category['kode']?>`)" id="deleteBtn" class="delete-item <?= $isUse ? 'disable' : '' ?>" <?= $isUse ? 'disabled' : '' ?>><span class="material-symbols-outlined">delete</span></button></td>
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
            "columns": [
                { "width": "30%" },
                { "width": "60%" },
                { "width": "10%" }
            ],
            "columnDefs": [
                {
                    "targets": [2],
                    "render": function(data, type, row) {
                        var edit_category = row[2];
                        var delete_category = row[3];
                        return '<div style="display: flex; justify-content: center; gap: 16px;">' + edit_category + ' ' + delete_category + '</div>';
                    }
                },
                {
                    "targets": [3],
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