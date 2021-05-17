

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Model</h1>
    </div>
    <div class="row">
        <div class="col-md-9">
            <?php 
            if(isset($model_data)){
                $url = "index.php/Dashboard/editModel/".$model_data[0]->model_id;
            }else{
                $url = "index.php/Dashboard/addModel";
            }
            ?>
            <form method="post" action="<?= base_url($url) ?>" autocomplete="off">
                <div class="col-md-6">
                     <label for="floatingInput">Model Name</label>
                     <input type="text" class="form-control" name="model_name" id="floatingInput" required="true" value="<?= (isset($model_data)) ? $model_data[0]->model_name : '' ?>">
                </div>
                <br>
                <div class="col-md-6">
                     <label for="floatingInput">Status</label>
                     <select class="form-control" name="status">
                         <option value="0">Select Status</option>
                         <option value="1" <?= (isset($model_data) && $model_data[0]->status ==1) ? 'selected="selected"' : '' ?>>Active</option>
                         <option value="0" <?= (isset($model_data) && $model_data[0]->status ==0) ? 'selected="selected"' : '' ?>>In-Active</option>
                     </select>
                </div>
                <br />
                <input class="btn btn-sm btn-primary" type="submit" name="submit" value="<?= (isset($model_data)) ? 'Update' : 'Submit' ?>"/>
            </form>
        </div>
    </div>
</main>
</div>
</div>



