<?php
require 'includes/header.php';
protectPage();
?>

<div class="container">
    <div class="row form-group">
        <div class="col-md-3">Doctor Name</div>
        <div class="col-md-9">
            <input type="text" value="Dr. XYZ" class="full-width">
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-6">
            <div class="label-area">Month</div>
            <div class="field-area">
                <select class="form-control">
                    <option>Jan</option>
                    <option>Feb</option>
                    <option>March</option>
                </select>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div class="label-area">Year</div>
            <div class="field-area">
                <select class="form-control">
                    <option>2018</option>
                    <option>2017</option>
                    <option>2016</option>
                </select>
            </div>
        </div>
    </div>

    <table class="table table-striped table-bordered table-hover2">
        <thead class="thead-light">
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Date</th>
            <th scope="col">No of cases</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>23-05-2015</td>
            <td>13</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>23-05-2015</td>
            <td>5</td>
        </tr>
        </tbody>
    </table>

    <div class="form-group row justify-content-center">
        <button type="submit" class="btn btn-primary align-items-center">Go back</button>
    </div>

</div>

<?php require 'includes/footer.php'; ?>
