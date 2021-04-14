<!-- Jumbotron for Title -->
<div class="container-fluid pl-0 pr-0">
    <?php require("nav.php"); ?>
</div>

<div class="row">
    <div class="col-lg-2"></div>

    <div class="col-lg-8">
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-sm btn-success float-right d-inline mb-3" data-toggle="modal"
                data-target="#myModal">
            Einfügen
        </button>

        <!-- The Modal for add a Person  -->
        <?php require("modal.php"); ?>

        <?php if (isset($data[1])): ?>
            <span class="text-danger"><?= "Es einer fehler zu speichern. "; ?></span>
        <?php endif; ?>

        <!-- Address Book Table -->
        <form action="home/delete" method="post" id="form_delete">
            <table class="table table-bordered text-center">
                <thead>
                <tr>
                    <th><input title="alle" id="checkAll" type="checkbox"></th>
                    <th><a title="sortieren mit vorname" class="btn btn-light btn-block dropdown-toggle" href="home/sort/firstname">Vorname</a></th>
                    <th><a title="sortieren mit nachname" class="btn btn-light btn-block dropdown-toggle" href="home/sort/lastname">Nachname</a></th>
                    <th><a title="sortieren mit stadt" class="btn btn-light btn-block dropdown-toggle" href="home/sort/city">Stadt</a></th>
                    <th><a title="sortieren mit adresse" class="btn btn-light btn-block dropdown-toggle" href="home/sort/address">Adresse</a></th>
                    <th><a title="sortieren mit email" class="btn btn-light btn-block dropdown-toggle" href="home/sort/email">Email</a></th>
                    <th><a title="sortieren mit telefon" class="btn btn-light btn-block dropdown-toggle" href="home/sort/telefon">Telefon</a></th>
                    <td></td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($data[0] as $row): ?>
                    <!--  Form to Group deleting -->
                    <tr>
                        <th><input type="checkbox" class="check" value="<?= $row['id'] ?>" name="delete_group[]"></th>
                        <td><?= $row['firstname'] ?></td>
                        <td><?= $row['lastname'] ?></td>
                        <td><?= $row['city'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['telefon'] ?></td>
                        <td><a href="edit/index/<?= $row['id'] ?>"><i title="bearbeiten" id="checkbox-edit"></i></a></td>
                        <td><a href="home/delete/<?= $row['id'] ?>"><i title="löschen" id="checkbox-delete"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <button type="submit" class="btn btn-sm btn-danger">Löschen</button>
        </form>
        <!--  End Form to Group deleting -->

    </div>
    <div class="col-lg-2"></div>
    <!-- End Address Book Table -->

</div>

<script>
    $("#checkAll").click(function () {
        $(".check").prop('checked', $(this).prop('checked'));
    });
</script>

</body>
</html>