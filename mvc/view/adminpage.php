<?php 
$users = $selectEx['data'];

$states=[
    'gj'=>'gujrat',
    'dl'=>'delhi',
    'rj'=>'rajesthan',
    'mh' => 'Maharashtra',
    'sk' => 'Sikkim',
    'pb' => 'Punjab'
];

?>
        <div class="album py-5 bg-light" style="height:100vh;">
            <div class="row h-100 justify-content-center">
                <table class="table table-hover" style="max-width: 85rem;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Fname</th>
                            <th scope="col">Lname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Address</th>
                            <th scope="col">State</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $i=1;
                            foreach($users as $user){   // users is array main and user is its key i.e. one object
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $user->fname; ?></td>
                            <td><?php echo $user->lname; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->contact; ?></td>
                            <td><?php echo $user->gender; ?></td>
                            <td><?php echo $user->address; ?></td>
                            <td><?php echo isset($states[$user->state])? $states[$user->state]: null; ?></td>
                            <td>
                                <img src="<?php echo 'uploads/'.$user->profile ?>" alt="alt" height="80px" width="80px"/>
                            </td>
                            <td>

                                <a href="update?user=<?php echo $user->id?>" class="btn btn-warning">Edit</a>
                                <a href="adminpage?user=<?php echo $user->id?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php 
                            $i++;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>