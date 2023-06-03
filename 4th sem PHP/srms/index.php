<?php

require './includes/header.php';
require './includes/database.php';
require './includes/formHandler.php';

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

?>

<a href="./addStu.php" class="btn p1">Add Student</a>

<table class="borderTable">
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
            <td><a href="<?php echo './stuMarksheet.php?id='.$student['id']; ?>"><?= $student['name']?></a></td>
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