

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Cart</h1>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php
            if (isset($cart_data)) {
                $url = "index.php/Dashboard/editCart/" . $cart_data[0]->cart_id;
            } else {
                $url = "index.php/Dashboard/addCart";
            }
            ?>
            <form method="post" action="<?= base_url($url) ?>" autocomplete="off">
                <br>
                <div class="col-md-6">
                    <label for="floatingInput">Make Name</label>
                    <select class="form-control" name="make_id" id="make_id">
                        <option value="0">Select Make</option>
                        <?php
                        if (isset($make_list) && count((array) $make_list)) {
                            foreach ($make_list as $make) {
                                ?>
                                <option value="<?= $make->make_id ?>" <?= (isset($cart_data) && $cart_data[0]->make_id == $make->make_id) ? 'selected="selected"' : '' ?>><?= $make->make_name ?></option>
                            <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="floatingInput">Model Name</label>
                    <input type="text" id="model_ajax" class="form-control" readonly="true" value="<?= (isset($cart_data)) ? $cart_data[0]->model_name : '' ?>"/>
                    <input type="hidden" name="model_id" id="model_id" value="<?= (isset($cart_data)) ? $cart_data[0]->model_id : '' ?>" />
                </div>
                <div class="col-md-6">
                    <label for="floatingInput">Processor Name</label>
                    <input type="text" id="processor_ajax" class="form-control" readonly="true" value="<?= (isset($cart_data)) ? $cart_data[0]->processor_name : '' ?>"/>
                    <input type="hidden" name="processor_id" id="processor_id" value="<?= (isset($cart_data)) ? $cart_data[0]->processor_id : '' ?>"/>
                </div>
                <div class="col-md-6">
                    <label for="floatingInput">Status</label>
                    <select class="form-control" name="status">
                        <option value="0">Select Status</option>
                        <option value="1" <?= (isset($cart_data) && $cart_data[0]->status == 1) ? 'selected="selected"' : '' ?>>Active</option>
                        <option value="0" <?= (isset($cart_data) && $cart_data[0]->status == 0) ? 'selected="selected"' : '' ?>>In-Active</option>
                    </select>
                </div>
                <br />
                <input class="btn btn-sm btn-primary" type="submit" name="submit" value="<?= (isset($cart_data)) ? 'Update' : 'Submit' ?>"/>
            </form>
        </div>
    </div>
</main>
</div>
</div>

<script src="<?= base_url() ?>assets/js/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
    $("#make_id").on("change", function (e) {
        e.preventDefault();
        var make_id = $(this).val();
        if (make_id == 0) {
            $("#model_ajax").val("");
            $("#model_id").val("");
            $("#processor_ajax").val("");
            $("#processor_id").val("");
        } else {
            $.ajax({
                url: "<?= base_url() ?>index.php/Dashboard/getAjaxCallDetails",
                data: {make_id: make_id},
                dataType: 'json',
                method: 'post',
                success: function (result) {
                    var make_list = JSON.parse(JSON.stringify(result));
                    $("#model_ajax").val(make_list.model_name);
                    $("#model_id").val(make_list.model_id);
                    $("#processor_ajax").val(make_list.processor_name);
                    $("#processor_id").val(make_list.processor_id);
                }
            });
        }
    });
</script>


