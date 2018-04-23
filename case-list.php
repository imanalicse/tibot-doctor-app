<?php
require 'includes/header.php';
protectPage();
if(!is_admin()) {
    ob_start();
    header("location:index");
}

if(isset($_SESSION['symptom_names'])) { unset($_SESSION['symptom_names']); }

?>

<div class="container">
    <table class="table table-striped table-bordered table-hover2">
        <thead class="thead-light">
        <tr>
            <th scope="col">Sr No</th>
            <th scope="col">Date</th>
            <th scope="col">Channel</th>
            <th scope="col">Actual Condition</th>
            <th scope="col">Predicted Condition</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>23-05-2015</td>
            <td>Facebook</td>
            <td>Eczema</td>
            <td>Eczema</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>23-05-2015</td>
            <td>Android</td>
            <td>Fungal</td>
            <td>Fungal Infection</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>23-05-2015</td>
            <td>Facebook</td>
            <td>Fungal</td>
            <td>Fungal Infection</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>23-05-2015</td>
            <td>Android</td>
            <td>Fungal</td>
            <td>Benign Tumor</td>
        </tr>
        <tr>
            <th scope="row">5</th>
            <td>23-05-2015</td>
            <td>Android</td>
            <td>Fungal</td>
            <td>Fungal Infection</td>
        </tr>
        <tr>
            <th scope="row">6</th>
            <td>23-05-2015</td>
            <td>Android</td>
            <td>Fungal</td>
            <td>Fungal Infection</td>
        </tr>

        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
    </nav>
</div>

<?php require 'includes/footer.php'; ?>
