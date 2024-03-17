<?php
session_start();
include('connection.php');

if (isset($_POST['displaySendAnimals'])) {
    $table = '
        <table id="animalTable" class="table table-hover">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Type</th>
                <th scope="col">Name</th>
                <th scope="col">Age</th>
                <th scope="col">Gender</th>
                <th scope="col">Breed</th>
                <th scope="col">Weight</th>
                <th scope="col">Kapon</th>
                <th scope="col">Anti-Rabies</th>
                <th scope="col">Deworm</th>
                <th scope="col">Image</th>
                <th scope="col">Operations</th>
                </tr>
            </thead>
    ';

    $sql = "SELECT * FROM animal_identification";
    $result = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['animal_id'];
        $type = $row['animal_type'];
        $name = $row['animal_name'];
        $age = $row['animal_age'];
        $gender = $row['animal_gender'];
        $breed = $row['animal_breed'];
        $weight = $row['animal_weight'];
        $kapon = $row['kapon_date'];
        $arv = $row['deworm_date'];
        $image  = $row['animal_image'];


        $table .= '
        <tr>
            <td>' . $type . '</td>
            <td>' . $name . '</td>
            <td>' . $age . '</td>
            <td>' . $gender . '</td>
            <td>' . $breed . '</td>
            <td>' . $weight . '</td>
            <td>' . $kapon . '</td>
            <td>' . $arv . '</td>
            <td>' . $image . '</td>
            <td>
                <button class="btn btn-dark" onclick="GetAnimalDetails(' . $id . ')"><i class="fa-solid fa-pen"></i></button>
                <button class="btn btn-danger" onclick="DeleteAnimal(' . $id . ')"><i class="fa-solid fa-trash"></i></button>
            </td>
        </tr>
        ';
    }
    $table .= '</table>';
    echo $table;
}
?>
<script>
    $(document).ready(function() {
        $('#animalTable').DataTable({
            pagingType: 'full_numbers',
            scrollX: true
        });
    });
</script>