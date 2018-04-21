<?php
require 'includes/header.php';
protectPage();
?>

    <div class="container home-page">
        <?php
        $headers = array(
            "email:" . $_SESSION["email"],
            "token:" . $_SESSION["token"],
            "Content-Type: application/json"
        );

        $curl = new Curl();
        $result = $curl->get(APP_URL."/caseDetail", $headers);
        $data = json_decode($result);

        if(!empty($data)):

        ?>
        <div class="row">
            <div class="col-md-3">Case Id</div>
            <div class="col-md-3">
                <input type="text" value="<?php echo $data->case_id; ?>" class="form-control" readonly>
            </div>
        </div>

        <div class="row banner-container">
            <img class="img-fluid img-thumbnail banner-image" src="assets/img/banner1.jpg">
        </div>

        <div class="row">

            <div class="form-group col-md-6">
                <div class="label-area">Patient's details</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->patient_details; ?>" class="form-control full-width" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Fever</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->fever; ?>" class="form-control full-width" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Itch</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->itch; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Oozing</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->oozing; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Duration</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->duration; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Burning</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->burn; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Location</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->location; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Trigger 1</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->trigger_1; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Pain</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->pain; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Trigger 2</div>
                <div class="field-area">
                    <input type="text" value="<?php echo $data->trigger_2; ?>" class="form-control full-width fever" readonly>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-3 col-sm-3">Other Notes</div>
            <div class="form-group col-md-9 col-sm-9">
                <input type="text" value="<?php echo $data->notes; ?>" class="form-control full-width" readonly>
            </div>
        </div>

        <?php endif; ?>

        <form id="next-case">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Main Condition</label>
                <div class="col-sm-9">
                    <select name="main_condition" class="form-control">
                        <option selected>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Secondary Condition</label>
                <div class="col-sm-9">
                    <select name="secondary_condition" class="form-control">
                        <option selected>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Severity</label>
                <div class="col-sm-9">
                    <select name="secondary_condition" class="form-control">
                        <option selected>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Suggested Action</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control full-width">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-0 col-sm-3 col-form-label"></label>
                <div class="col-sm-12 col-md-9">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-primary">Skip</button>
                </div>
            </div>
        </form>
    </div>


<?php require 'includes/footer.php'; ?>