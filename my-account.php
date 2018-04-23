<?php
require 'includes/header.php';
protectPage();


$month = date("m");
$year = date("Y");

if (isset($_REQUEST['month']) && isset($_REQUEST['year'])) {
    $month = $_REQUEST['month'];
    $year = $_REQUEST['year'];
}

if(isset($_SESSION['symptom_names'])) { unset($_SESSION['symptom_names']); }

$curl = new Curl();
$curl->setHeader("email", $_SESSION["email"]);
$curl->setHeader("token", $_SESSION["token"]);
$url = APP_URL . "/caseHistory/" . $month . "/".$year;
$result = $curl->get($url);
$data = json_decode($result);

$month_list = array(
    "01" => "Jan",
    "02" => "Feb",
    "03" => "Mar",
    "04" => "Apr",
    "05" => "May",
    "06" => "Jun",
    "07" => "Jul",
    "08" => "Aug",
    "09" => "Sep",
    "10" => "Oct",
    "11" => "Nov",
    "12" => "Dec",
);

$year_list = array();
$start_year = date("Y");
for ($i = $start_year; $i > $start_year - 10; $i--) {
    $year_list[] = $i;
}

?>

<div class="container">
    <div class="row form-group">
        <div class="col-md-3">Doctor Name</div>
        <div class="col-md-9">
            <input type="text" value="Dr. XYZ" class="full-width">
        </div>
    </div>
    <form action="my-account" method="post">
        <div class="row">
            <div class="form-group col-md-6">
                <div class="label-area">Month</div>
                <div class="field-area">
                    <select name="month" onchange="this.form.submit()" class="form-control">
                        <?php
                        foreach ($month_list as $numeric_month => $month_name) {
                            $selected = '';
                            if ($numeric_month == $month) {
                                $selected = 'selected="selected"';
                            }
                            echo "<option " . $selected . " value='".$numeric_month."'>" . $month_name . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="label-area">Year</div>
                <div class="field-area">
                    <select name="year" onchange="this.form.submit()" class="form-control">
                        <?php
                        foreach ($year_list as $y) {
                            $selected = '';
                            if ($y == $year) {
                                $selected = 'selected="selected"';
                            }
                            echo "<option " . $selected . ">" . $y . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </form>

    <table class="table table-striped table-bordered table-hover2">
        <thead class="thead-light">
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Date</th>
            <th scope="col">No of cases</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $total_cases = 0;
        $serial = 0;
        foreach ($data as $item) {
            $total_cases = $total_cases + $item->count;
            $serial++;
            $day_obj = $item->_id;
            $date = $day_obj->day . "-" . $day_obj->month . "-" . $day_obj->year;
            ?>
            <tr>
                <th scope="row"><?php echo $serial; ?></th>
                <td><?php echo $date; ?></td>
                <td><?php echo $item->count; ?></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <th scope="row">Total</th>
            <td></td>
            <td><?php echo$total_cases; ?></td>
        </tr>
        </tbody>
    </table>

    <div class="form-group row justify-content-center">
        <button type="submit" class="btn btn-primary align-items-center">Go back</button>
    </div>

</div>

<?php require 'includes/footer.php'; ?>
