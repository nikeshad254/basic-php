<?php

require './includes/header.php';
require './includes/database.php';

$conn = getDB();
$sql = "select * from student";
$result = mysqli_query($conn, $sql);
if ($result === false) {
    echo mysqli_error($conn);
} else {
    $students = mysqli_fetch_all($result,  MYSQLI_ASSOC);

    // echo '<pre>';
    // print_r($students);
    // exit;
}

function passFail($math, $science, $english, $social, $nepali){
    if($math>=40 && $science>=40 && $english>=40 && $social>=40 && $nepali>=40){
        return "PASS";
    }else{
        return "FAIL";
    }
}

function getDivision($math, $science, $english, $social, $nepali){
    if(passFail($math, $science, $english, $social, $nepali) == "FAIL"){
        return "#";
    }
    else{
        $percentage = ($math + $science + $english + $social + $nepali) / (5 * 100) * 100;
        $division = $percentage >= 90 ? "DISTINCTION" : ($percentage >= 80 ? "FIRST" : ($percentage >= 60 ? "SECOND" : ($percentage >= 40 ? "THIRD" : "#")));
        return $division;
    }
}

function getGPA($math, $science, $english, $social, $nepali){
    if(passFail($math, $science, $english, $social, $nepali) == "FAIL"){
        return "#";
    }
    else{
        $percentage = ($math + $science + $english + $social + $nepali) / (5 * 100) * 100;
        return $percentage/100*4;
    }
}

?>

<a href="./addStu.php">Add Student</a>

<table>
    <thead>
        <th>S.N.</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Math</th>
        <th>Science</th>
        <th>English</th>
        <th>Social</th>
        <th>Nepali</th>
        <th>Remark</th>
        <th>Division</th>
        <th>GPA</th>
    </thead>
    <tbody>
        <?php if (empty($students)) : ?>
            <p>no students data ... </p>
        <?php else : ?>

            <?php $count = 1; 
                foreach ($students as $student) :?>
        <tr>
            <td><?= $count ?></td>
            <td><a href="#"><?= $student['name']?></a></td>
            <td><?= $student['phone']?></td>
            <td><?= $student['math']?></td>
            <td><?= $student['science']?></td>
            <td><?= $student['social']?></td>
            <td><?= $student['english']?></td>
            <td><?= $student['nepali']?></td>
            <td><?= passFail($student['math'], $student['science'], $student['social'], $student['english'], $student['nepali']); ?></td>
            <td><?= getDivision($student['math'], $student['science'], $student['social'], $student['english'], $student['nepali']); ?></td>
            <td><?= getGPA($student['math'], $student['science'], $student['social'], $student['english'], $student['nepali']); ?></td>
        </tr>
            <?php $count++; endforeach; ?>
        <?php endif;?>
    </tbody>
</table>

<?php require './includes/footer.php'; ?>