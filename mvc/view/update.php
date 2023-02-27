
<div class="album py-5 bg-light">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                    <h2> Update </h2> <hr>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" value="<?php echo $user->fname; ?>" id="fname" name="fname" placeholder="Meet" required="">
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" value="<?php echo $user->lname; ?>" id="lname" name="lname" placeholder="Shah" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="<?php echo $user->email; ?>" id="email" name="email" placeholder="name@example.com" required="">
                                </div>
                                <div class="col">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" value="<?php echo $user->pass; ?>" name="password" placeholder="password" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="mobile" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="mobile" value="<?php echo $user->contact; ?> "name="mobile" placeholder="1234567890" required="">
                                </div>
                                <div class="col">
                                    <label for="gender" class="form-label">Gender</label><br>
                                    <input type="radio" id="gender" name="gender" value="Male" <?php if($user->gender == 'Male'){echo 'checked'; } ?> >Male
                                    <input type="radio" id="gender" name="gender" value="Female" <?php if($user->gender == 'Female'){echo 'checked'; } ?> >Female
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="address" required=""><?php echo $user->address; ?></textarea>
                                </div>
                                <div class="col">
                                    <label for="inputState" class="form-label">State</label>
                                    <select class="form-select" id="inputState" name="state" aria-label="Default select example" required="">
                                        <option disabled>Select</option>
                                        <option value="gj" <?php if($user->state == 'gj'){echo 'selected';} ?> >Gujarat</option>
                                        <option value="dl" <?php if($user->state == 'dl'){echo 'selected';} ?> >Delhi</option>
                                        <option value="rj" <?php if($user->state == 'rj'){echo 'selected';} ?> >Rajasthan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="profile" class="form-label">Profile</label><br>
                                    <input type="file" class="form-control-file" name="profile" id="profile">
                                </div>
                                <div class="col">
                                    <label for="hobbies" class="form-label">Hobbies</label><br>
                                    <?php $hobies = explode(',',$user->hobbies) ?>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[]" value="Travelling" <?php if(in_array('Travelling',$hobies)){ echo 'checked';}  ?> >
                                        <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]" value="Music" <?php if(in_array('Music',$hobies)){ echo 'checked';}  ?> >
                                        <label class="form-check-label" for="inlineCheckbox2">Music</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]" value="Coding" <?php if(in_array('Coding',$hobies)){ echo 'checked';}  ?> >
                                        <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                                    </div>
                                </div>

                            </div><br>
                            <div class="mb-3">
                                <input type="submit" name="Update" id="update" value="Update" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>