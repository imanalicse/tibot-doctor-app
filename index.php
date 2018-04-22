<?php
require 'includes/header.php';
protectPage();
?>

    <div class="container home-page">
        <?php

        $curl = new Curl();
        $curl->setHeader("email", $_SESSION["email"]);
        $curl->setHeader("token", $_SESSION["token"]);
        $result = $curl->get(APP_URL."/caseDetail");
        $data = json_decode($result);

//        $curl = new Curl();
//        $curl->setHeader("email", $_SESSION["email"]);
//        $curl->setHeader("token", $_SESSION["token"]);
        $result = $curl->get(APP_URL."/symptomNames");
        $symptom_names = json_decode($result);
        if(!empty($symptom_names)) {
            $symptom_names = $symptom_names->message;
        }else {
            $symptom_names = array();
        }

        $_SESSION["symptom_names"] = $symptom_names;

        // form submitted action
        if (isset($_POST['mainCondition']) && !empty($_POST['mainCondition'])) {
            $mainCondition = $_POST['mainCondition'];
            $secondaryCondition = $_POST['secondaryCondition'];
            $severity = $_POST['severity'];
            $suggestedAction = $_POST['suggestedAction'];


            $postData = array(
                "email" => $_SESSION["email"],
                "token" => $_SESSION["token"],
                "caseId" => $data->case_id,
                "mainCondition" => $mainCondition,
                "secondaryCondition" => $secondaryCondition,
                "severity" => $severity,
                "severity" => $severity,
                "suggestedAction" => $suggestedAction,
            );

            $curl = new Curl();
            $curl->setHeader("email", $_SESSION["email"]);
            $curl->setHeader("token", $_SESSION["token"]);
            $post_result = $curl->post(APP_URL."/caseDetail", $postData);
//            echo "<pre>";
//            print_r($post_result);
//            echo "</pre>";
        }


        if(!empty($data)):

        ?>
        <div class="row form-group">
            <div class="col-md-3">Case Id</div>
            <div class="col-md-3">
                <input type="text" value="<?php echo $data->case_id; ?>" class="form-control" readonly>
            </div>
        </div>

        <div class="row banner-container justify-content-center">
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
                    <input type="text" value="<?php echo isset($data->itch) ? $data->itch: ''; ?>" class="form-control full-width fever" readonly>
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

        <hr>

        <form id="next-case" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Main Condition</label>
                <div class="col-sm-9">
                    <select name="mainCondition" class="form-control">
                        <?php
                            if(isset($_SESSION["symptom_names"]) && !empty($_SESSION["symptom_names"])) {
                                foreach ($_SESSION["symptom_names"] as $symptom_name) {
                                    echo "<option value='".$symptom_name->name."'>".$symptom_name->name."</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Secondary Condition</label>
                <div class="col-sm-9">
                    <select name="secondaryCondition" class="form-control">

                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Severity</label>
                <div class="col-sm-9">
                    <select name="severity" class="form-control">
                        <option value="Grade_1">Grade 1</option>
                        <option value="Grade_2">Grade 2</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-3 col-form-label">Suggested Action</label>
                <div class="col-sm-9">
                    <input name="suggestedAction" type="text" class="form-control full-width">
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