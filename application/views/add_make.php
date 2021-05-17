

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Make</h1>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php 
            if(isset($make_data)){
                $url = "index.php/Dashboard/editMake/".$make_data[0]->make_id;
            }else{
                $url = "index.php/Dashboard/addMake";
            }
            ?>
            <form method="post" action="<?= base_url($url) ?>" autocomplete="off">
                <div class="col-md-6">
                     <label for="floatingInput">Make Name</label>
                     <input type="text" class="form-control" name="make_name" id="floatingInput" required="true" value="<?= (isset($make_data)) ? $make_data[0]->make_name : '' ?>">
                </div>
                <br>
                <div class="col-md-6">
                     <label for="floatingInput">Model Name</label>
                     <select class="form-control" name="model_id">
                         <option value="">Select Model</option>
                         <?php if(isset($model_list) && count((array) $model_list)){
                             foreach($model_list as $model){ ?>
                                 <option value="<?= $model->model_id ?>" <?= (isset($make_data) && $make_data[0]->model_id == $model->model_id) ? 'selected="selected"' : '' ?>><?= $model->model_name ?></option>
                            <?php }
                         } ?>
                     </select>
                </div>
                <div class="col-md-6">
                     <label for="floatingInput">Processor Name</label>
                     <select class="form-control" name="processor_id">
                         <option value="">Select Processor</option>
                         <?php if(isset($processor_list) && count((array) $processor_list)){
                             foreach($processor_list as $processor){ ?>
                                 <option value="<?= $processor->processor_id ?>" <?= (isset($make_data) && $make_data[0]->processor_id == $processor->processor_id) ? 'selected="selected"' : '' ?>><?= $processor->processor_name ?></option>
                            <?php }
                         } ?>
                     </select>
                </div>
                <div class="col-md-6">
                     <label for="floatingInput">Status</label>
                     <select class="form-control" name="status">
                         <option value="0">Select Status</option>
                         <option value="1" <?= (isset($make_data) && $make_data[0]->status ==1) ? 'selected="selected"' : '' ?>>Active</option>
                         <option value="0" <?= (isset($make_data) && $make_data[0]->status ==0) ? 'selected="selected"' : '' ?>>In-Active</option>
                     </select>
                </div>
                <br />
                <input class="btn btn-sm btn-primary" type="submit" name="submit" value="<?= (isset($make_data)) ? 'Update' : 'Submit' ?>"/>
            </form>
        </div>
    </div>
</main>
</div>
</div>



