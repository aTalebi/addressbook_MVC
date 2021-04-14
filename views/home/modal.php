<!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Adresse Einfügen</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" class="form-control" name="token" value="<?php echo Model::tokenSet(); ?>">
                </div>

                <!-- Start Form for User to saving -->
                <form action="home/addperson" method="post">
                    <!-- Token set for Form -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="token" value="<?php echo Model::tokenSet(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="firstname">Vorname</label>
                        <input type="text" class="form-control" placeholder="Enter firstname" id="firstname"
                               name="firstname">
                        <span class="text-danger small"><?php
                            if (isset($data[1]['firstnameEmpty'])) {
                                echo $data[1]['firstnameEmpty'];
                            } elseif (isset($data['firstnameEmpty'])) {
                                echo $data['firstnameEmpty'];
                            }
                            ?>
                                </span>
                    </div>

                    <div class="form-group">
                        <label for="lastname">Nachname</label>
                        <input type="text" class="form-control" placeholder="Enter lastname" id="lastname"
                               name="lastname">
                        <span class="text-danger small"><?php
                            if (isset($data[1]['lastnameEmpty'])) {
                                echo $data[1]['lastnameEmpty'];
                            } elseif (isset($data[1]['lastnameInvalid'])) {
                                echo $data[1]['lastnameInvalid'];
                            }
                            ?>
                                </span>
                    </div>

                    <div class="form-group">
                        <label for="city">Stadt</label>
                        <input type="text" class="form-control" placeholder="Enter city" id="city" name="city">
                        <span class="text-danger small"><?php
                            if (isset($data[1]['cityEmpty'])) {
                                echo $data[1]['cityEmpty'];
                            } elseif (isset($data[1]['cityInvalid'])) {
                                echo $data[1]['cityInvalid'];
                            }
                            ?>
                                </span>
                    </div>

                    <div class="form-group">
                        <label for="address">Adresse</label>
                        <input type="text" class="form-control" placeholder="Enter Address" id="address" name="address">
                        <span class="text-danger small"><?php
                            if (isset($data[1]['addressEmpty'])) {
                                echo $data[1]['addressEmpty'];
                            } elseif (isset($data[1]['addressInvalid'])) {
                                echo $data[1]['addressInvalid'];
                            }
                            ?>
                                </span>
                    </div>

                    <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
                        <span class="text-danger small"><?php
                            if (isset($data[1]['emailEmpty'])) {
                                echo $data[1]['emailEmpty'];
                            } elseif (isset($data[1]['emailInvalid'])) {
                                echo $data[1]['emailInvalid'];
                            } elseif (isset($data[1]['emailExists'])) {
                                echo $data[1]['emailExists'];
                            }
                            ?>
                                </span>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="text" class="form-control" placeholder="Enter phone number" id="phone"
                               name="phone">
                        <span class="text-danger small"><?php
                            if (isset($data[1]['phoneEmpty'])) {
                                echo $data[1]['phoneEmpty'];
                            } elseif (isset($data[1]['phoneInvalid'])) {
                                echo $data[1]['phoneInvalid'];
                            }
                            ?>
                                </span>
                    </div>

                    <button type="submit" class="btn btn-sm btn-success">Einfügen</button>
                </form>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Schließen</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End The Modal -->