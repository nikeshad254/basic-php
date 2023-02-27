<div class="album py-5 bg-light">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="card border-success" style="max-width: 65rem;padding: 2%;">
                    <h2> Registration </h2> <hr>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="fname" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Meet" required="">
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" placeholder="Shah" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required="">
                                </div>
                                <div class="col">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="password" required="">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="mobile" class="form-label">Contact Number</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="1234567890" required="">
                                </div>
                                <div class="col">
                                    <label for="gender" class="form-label">Gender</label><br>
                                    <input type="radio" id="gender" name="gender" value="Male" checked>Male
                                    <input type="radio" id="gender" name="gender" value="Female">Female
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label for="address" class="form-label">Address</label>
                                    <textarea class="form-control" id="address" rows="3" name="address" placeholder="address" required=""></textarea>
                                </div>
                                <div class="col">
                                    <label for="inputState" class="form-label">State</label>
                                    <select class="form-select" id="inputState" name="state" aria-label="Default select example" required="">
                                        <option selected disabled>Select</option>
                                        <option value="gj">Gujarat</option>
                                        <option value="dl">Delhi</option>
                                        <option value="rj">Rajasthan</option>
                                        <option value="mh">Maharashtra</option>
                                        <option value="sk">Sikkim</option>
                                        <option value="pb">Punjab</option>
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
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[]" value="Travelling">
                                        <label class="form-check-label" for="inlineCheckbox1">Travelling</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]" value="Music">
                                        <label class="form-check-label" for="inlineCheckbox2">Music</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]" value="Coding">
                                        <label class="form-check-label" for="inlineCheckbox3">Coding</label>
                                    </div>
                                </div>

                            </div><br>
                            <div class="mb-3">
                                <input type="submit" name="regist" id="regist" value="Registration" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>