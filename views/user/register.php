<?php include_once(ROOT.'/views/layouts/header.php'); ?>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Registration Form</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">First name</label>
                                    <input class="input--style-4" type="text" name="first_name" value="<?php if(isset($name)) echo $name; ?>" required>
                                </div>
                            </div>
                        </div>
                        <p style='color:red;'><?php if(isset($errors['name'])) echo $errors['name']; ?></p>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Last name</label>
                                    <input class="input--style-4" type="text" name="last_name" value="<?php if(isset($lastName)) echo $lastName; ?>" required>
                                </div>
                            </div>
                        </div>
                        <p style='color:red;'><?php if(isset($errors['lastName'])) echo $errors['lastName']; ?></p>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php if(isset($email)) echo $email; ?>" required>
                                </div>
                            </div>
                        </div>
                        <p style='color:red;'><?php if(isset($errors['email'])) echo $errors['email']; ?></p>
                        <p style='color:red;'><?php if(isset($errors['emailExist'])) echo $errors['emailExist']; ?></p>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <p style='color:red;'><?php if(isset($errors['password'])) echo $errors['password']; ?></p>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                    <p style='padding-top:20px;'>Already have account? 
                        <a href="/login">Log in</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php include_once(ROOT.'/views/layouts/footer.php'); ?>