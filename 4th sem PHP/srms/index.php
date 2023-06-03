<?php

require './includes/header.php';
require './includes/database.php';

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
        <tr>
            <td>1</td>
            <td><a href="#">name</a></td>
            <td>Phone</td>
            <td>Matd</td>
            <td>Science</td>
            <td>English</td>
            <td>Social</td>
            <td>Nepali</td>
            <td>Remark</td>
            <td>Division</td>
            <td>GPA</td>
        </tr>
    </tbody>
</table>

<?php require './includes/footer.php'; ?>