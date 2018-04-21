<?php
session_start();

$sub_symptoms = array();
if(isset($_SESSION["symptom_names"]) && !empty($_SESSION["symptom_names"])) {
    foreach ($_SESSION["symptom_names"] as $symptom_name) {
        if($_REQUEST['symptom_name'] == $symptom_name->name) {
            $sub_symptoms = $symptom_name->subSymptoms;
        }
    }
}
echo json_encode($sub_symptoms);
die();