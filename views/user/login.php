<?php include_once(ROOT.'/views/layouts/header.php'); ?>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Log in</h2>
                    <form method="POST">
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Email</label>
                                    <input class="input--style-4" type="email" name="email" value="<?php if(isset($email)) echo $email; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-12">
                                <div class="input-group">
                                    <label class="label">Password</label>
                                    <input class="input--style-4" type="password" name="password" required>
                                </div>
                            </div>
                        </div>
                        <p style='color:red;'><?php if(isset($errors['incorrect'])) echo $errors['incorrect']; ?></p>
                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                    <p style='padding-top:20px;'>Still not register? 
                        <a href="/register">Register</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php include_once(ROOT.'/views/layouts/footer.php'); ?>