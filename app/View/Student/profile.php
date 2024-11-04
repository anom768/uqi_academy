<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PPDB Online - Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="/img/logo_uqi.png" alt="UQI Academy Logo" width="auto" height="30" class="d-inline-block align-text-top">
                UQI Academy
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav"> <!-- Added id here -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile/<?= $model["student"]->getId() ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav></br>
    <div class="container col-xl-10 col-xl-8 px-0 py-5">
        <?php session_start();
        if (isset($_SESSION['success'])) { ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['success'] ?>
                </div>
            </div>
        <?php } elseif (isset($model['error'])) { ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    <?= $model['error'] ?>
                </div>
            </div>
        <?php }
        unset($_SESSION["success"]); ?>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Profile</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/profile/<?= $model["student"]->getId() ?>">
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getPhoto() ?? "" ?>" name="photo" type="text" class="form-control" id="photo" placeholder="photo">
                        <label for="photo">Photo*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getId() ?? "" ?>" name="id" type="text" class="form-control" id="id" placeholder="id" disabled>
                        <label for="id">ID*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getFullname() ?? "" ?>" name="fullname" type="text" class="form-control" id="fullname" placeholder="fullname">
                        <label for="fullname">Full Name*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getSpecialist() ?? "" ?>" name="specialist" type="text" class="form-control" id="specialist" placeholder="specialist">
                        <label for="specialist">Specialist*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getEmail() ?? "" ?>" name="email" type="text" class="form-control" id="email" placeholder="email">
                        <label for="email">Email*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getWebsite() ?? "" ?>" name="website" type="text" class="form-control" id="website" placeholder="website">
                        <label for="website">Website*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getbio() ?? "" ?>" name="bio" type="text" class="form-control" id="bio" placeholder="bio">
                        <label for="bio">Bio*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getPhone() ?? "" ?>" name="phone" type="text" class="form-control" id="phone" placeholder="phone">
                        <label for="phone">Phone*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getAddress() ?? "" ?>" name="address" type="text" class="form-control" id="address" placeholder="address">
                        <label for="address">Address*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getSchool() ?? "" ?>" name="school" type="text" class="form-control" id="school" placeholder="school">
                        <label for="school">School*</label>
                    </div>
                    <!-- <div class="form-floating mb-3">
                        <input name="year" type="number" class="form-control" id="year" placeholder="year" value="2024">
                        <label for="year">Year*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="batch" type="number" class="form-control" id="batch" placeholder="batch" value="1">
                        <label for="batch">Batch*</label>
                    </div> -->
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Update Password</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/password/<?= $model["student"]->getId() ?>">
                    <div class="form-floating mb-3">
                        <input name="password" type="password" class="form-control" id="password" placeholder="password">
                        <label for="password">Password*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="confirmPassword" type="password" class="form-control" id="confirmPassword" placeholder="confirmPassword">
                        <label for="confirmPassword">Confirm Password*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Update Password</button>
                </form>
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Education</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/education/<?= $model["student"]->getId() ?>">
                    <?php for ($i = 0; $i < sizeof($model["educations"]); $i++) { ?>
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input value="<?= $model["educations"][$i]->getSchool() ?>" name="school<?= $i ?>" type="text" class="form-control" id="school<?= $i ?>" placeholder="school">
                                    <label for="school<?= $i ?>">School*</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input value="<?= $model["educations"][$i]->getEntryYear() ?>" name="entryDate<?= $i ?>" type="number" class="form-control" id="entryDate<?= $i ?>" placeholder="entryDate">
                                    <label for="entryDate<?= $i ?>">Entry Date*</label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input value="<?= $model["educations"][$i]->getGraduateYear() ?>" name="graduateDate<?= $i ?>" type="number" class="form-control" id="graduateDate<?= $i ?>" placeholder="graduateDate">
                                    <label for="graduateDate<?= $i ?>">Graduate Date*</label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input name="school" type="text" class="form-control" id="school" placeholder="school">
                                <label for="school">School*</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input name="entryDate" type="number" class="form-control" id="entryDate" placeholder="entryDate">
                                <label for="entryDate">Entry Date*</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating">
                                <input name="graduateDate" type="number" class="form-control" id="graduateDate" placeholder="graduateDate">
                                <label for="graduateDate">Graduate Date*</label>
                            </div>
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Education</button>
                </form>
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Experience</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/experience/<?= $model["student"]->getId() ?>">
                    <?php for ($i = 0; $i < sizeof($model["experiences"]); $i++) { ?>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input value="<?= $model["experiences"][$i]->getCompany() ?>" name="company<?= $i ?>" type="text" class="form-control" id="company<?= $i ?>" placeholder="company">
                                    <label for="company<?= $i ?>">Company*</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input value="<?= $model["experiences"][$i]->getType() ?>" name="type<?= $i ?>" type="text" class="form-control" id="type<?= $i ?>" placeholder="type">
                                    <label for="type<?= $i ?>">Type*</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input value="<?= $model["experiences"][$i]->getEntryDate() ?>" name="entryDate<?= $i ?>" type="date" class="form-control" id="entryDate<?= $i ?>" placeholder="entryDate">
                                    <label for="entryDate<?= $i ?>">Entry Date*</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-floating">
                                    <input value="<?= $model["experiences"][$i]->getEndDate() ?>" name="endDate<?= $i ?>" type="date" class="form-control" id="endDate<?= $i ?>" placeholder="endDate">
                                    <label for="endDate<?= $i ?>">End Date*</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input value="<?= $model["experiences"][$i]->getDescription() ?>" name="description<?= $i ?>" type="text" class="form-control" id="description<?= $i ?>" placeholder="description">
                        <label for="description<?= $i ?>">Description*</label>
                    </div>
                    <?php } ?>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="company" type="text" class="form-control" id="company" placeholder="company">
                                <label for="company">Company*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="type" type="text" class="form-control" id="type" placeholder="type">
                                <label for="type">Type*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="entryDate" type="date" class="form-control" id="entryDate" placeholder="entryDate">
                                <label for="entryDate">Entry Date*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="endDate" type="date" class="form-control" id="endDate" placeholder="endDate">
                                <label for="endDate">End Date*</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="description" type="text" class="form-control" id="description" placeholder="description">
                        <label for="description">Description*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Experience</button>
                </form>
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Skill</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/skill/<?= $model["student"]->getId() ?>">
                    <?php for ($i = 0; $i < sizeof($model["skills"]); $i++) { ?>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input value="<?= $model["skills"][$i]->getSkill() ?>" name="skill<?= $i ?>" type="text" class="form-control" id="skill<?= $i ?>" placeholder="Skill">
                                    <label for="skill<?= $i ?>">Skill*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input value="<?= $model["skills"][$i]->getScore() ?>" name="score<?= $i ?>" type="number" class="form-control" id="score<?= $i ?>" placeholder="Score">
                                    <label for="score<?= $i ?>">Score*</label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="skill" type="text" class="form-control" id="skill" placeholder="Skill">
                                <label for="skill">Skill*</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="score" type="number" class="form-control" id="score" placeholder="Score">
                                <label for="score">Score*</label>
                            </div>
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Skill</button>
                </form>
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Language</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/language/<?= $model["student"]->getId() ?>">
                    <?php for ($i = 0; $i < sizeof($model["languages"]); $i++) { ?>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input value="<?= $model["languages"][$i]->getLanguage() ?>" name="language<?= $i ?>" type="text" class="form-control" id="language<?= $i ?>" placeholder="language">
                                    <label for="language<?= $i ?>">Language*</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input value="<?= $model["languages"][$i]->getScore() ?>" name="score<?= $i ?>" type="number" class="form-control" id="score<?= $i ?>" placeholder="Score">
                                    <label for="score<?= $i ?>">Score*</label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="language" type="text" class="form-control" id="language" placeholder="language">
                                <label for="language">Language*</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="score" type="number" class="form-control" id="score" placeholder="Score">
                                <label for="score">Score*</label>
                            </div>
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Language</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>