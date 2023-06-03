<?php

include './includes/database.php';
include './includes/formHandler.php';
$conn = getDB();
if (isset($_GET['id'])) {
    $sql = "select * from student where id = " . $_GET['id'];
    $result = mysqli_query($conn, $sql);
    if($result!=null){
        $student = mysqli_fetch_assoc($result);
    }
} else {
    $student = null;
}

require './includes/header.php';

?>
<?php if ($student === null) : ?>
    <p>No student found</p>
<?php else :  ?>

<h3>Marksheet</h3>
<div>
    <table class="marksheet">
        <tbody>
            <tr>
                <td>Name:</td>
                <td><?= $student['name'] ?></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><?= $student['phone'] ?></td>
            </tr>

            <tr>
                <td colspan="2">
                <table class="borderTable">
                    <thead>
                        <th>Subjects</th>
                        <th>FM</th>
                        <th>PM</th>
                        <th>OM</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Math</td>
                            <td>100</td>
                            <td>40</td>
                            <td><?= $student['math'] ?></td>
                        </tr>
                        <tr>
                            <td>Science</td>
                            <td>100</td>
                            <td>40</td>
                            <td><?= $student['science'] ?></td>
                        </tr>
                        <tr>
                            <td>Social</td>
                            <td>100</td>
                            <td>40</td>
                            <td><?= $student['social'] ?></td>
                        </tr>
                        <tr>
                            <td>English</td>
                            <td>100</td>
                            <td>40</td>
                            <td><?= $student['english'] ?></td>
                        </tr>
                        <tr>
                            <td>Nepali</td>
                            <td>100</td>
                            <td>40</td>
                            <td><?= $student['nepali'] ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">Total</td>
                            <td><?= $student['math']+$student['science']+$student['social']+$student['english']+$student['nepali'] ?></td>
                        </tr>
                    </tfoot>
                </table>
                </td>
            </tr>
            <tr>
                <td>Percentage:</td>
                <td><?= passFail($student['math'], $student['science'], $student['social'], $student['english'], $student['nepali']); ?></td>
            </tr>
            <tr>
                <td>Division:</td>
                <td><?= getDivision($student['math'], $student['science'], $student['social'], $student['english'], $student['nepali']); ?></td>
            </tr>
            <tr>
                <td>GPA</td>
                <td><?= getGPA($student['math'], $student['science'], $student['social'], $student['english'], $student['nepali']); ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php endif;
require './includes/footer.php'
?>