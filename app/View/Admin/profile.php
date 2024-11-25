<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>PPDB Online - Registration Form</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <style>
        .portfolio-media {
            max-width: 100px;
            /* Atur ukuran maksimum agar sama dengan gambar */
            max-height: auto;
            /* Pertahankan aspek rasio */
            display: block;
            /* Pastikan elemen tidak tumpang tindih */
            margin: 0 auto;
            /* Opsional, jika ingin mengatur rata tengah */
        }
    </style>
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
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav></br>
    <div class="container-fluid px-5 py-5">
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
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/modify/profile/<?= $model["student"]->getId() ?>" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getPhoto() ?? "" ?>" name="currentimage" type="hidden" class="form-control" id="currentimage" placeholder="currentimage">
                        <!-- <label for="image">Image*</label> -->
                    </div>
                    <div class="form-floating mb-3">
                        <input name="photo" type="file" class="form-control" id="photo" accept="image/*" placeholder="Upload image">
                        <label for="photo">Curent Image: <?= $model["student"]->getPhoto() ?? "" ?></label>
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
                        <input value="<?= $model["student"]->getWebsite() ?? "" ?>" name="website" type="text" class="form-control" id="website" placeholder="website" disabled>
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
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getYear() ?? 0 ?>" name="year" type="number" class="form-control" id="year" placeholder="year" disabled>
                        <label for="year">Year*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input value="<?= $model["student"]->getBatch() ?? 0 ?>" name="batch" type="number" class="form-control" id="batch" placeholder="batch" disabled>
                        <label for="batch">Batch*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Update Profile</button>
                </form>
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Update Password</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/modify/password/<?= $model["student"]->getId() ?>">
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

                <?php if (sizeof($model["educations"]) == 0) { ?>
                    <h1 class="display-10 lh-1 mb-3 text-center">--No data education found--</h1>
                <?php } else { ?>
                    <div class="row align-items-right g-lg-5 py-5">
                        <div class="mx-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Type</th>
                                        <th class="text-center" scope="col">School Name</th>
                                        <th class="text-center" scope="col">Entry Year</th>
                                        <th class="text-center" scope="col">Graduate Year</th>
                                        <th class="text-center" scope="col">Address</th>
                                        <th class="text-center" scope="col">Description</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach ($model["educations"] as $education) { ?>
                                        <form method="post" action="/education/update/<?= $education->getId() ?>">
                                            <tr>
                                                <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                                <td class="text-center align-middle">
                                                    <select name="type" class="form-select" id="type">
                                                        <option value="" <?= $education->getType() === "" ? "selected" : "" ?>>Choose</option>
                                                        <option value="SD" <?= $education->getType() === "SD" ? "selected" : "" ?>>SD</option>
                                                        <option value="SMP" <?= $education->getType() === "SMP" ? "selected" : "" ?>>SMP</option>
                                                        <option value="SMA" <?= $education->getType() === "SMA" ? "selected" : "" ?>>SMA</option>
                                                        <option value="SMK" <?= $education->getType() === "SMK" ? "selected" : "" ?>>SMK</option>
                                                        <option value="D1" <?= $education->getType() === "D1" ? "selected" : "" ?>>D1</option>
                                                        <option value="D2" <?= $education->getType() === "D2" ? "selected" : "" ?>>D2</option>
                                                        <option value="D3" <?= $education->getType() === "D3" ? "selected" : "" ?>>D3</option>
                                                        <option value="S1" <?= $education->getType() === "S1" ? "selected" : "" ?>>S1</option>
                                                        <option value="S2" <?= $education->getType() === "S2" ? "selected" : "" ?>>S2</option>
                                                        <option value="S3" <?= $education->getType() === "S3" ? "selected" : "" ?>>S3</option>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="hidden" name="idStudent" class="form-control" value="<?= $model["student"]->getId() ?>">
                                                    <input type="text" name="school" class="form-control" value="<?= $education->getSchool() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="number" name="entryYear" class="form-control" value="<?= $education->getEntryYear() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="number" name="graduateYear" class="form-control" value="<?= $education->getGraduateYear() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="text" name="address" class="form-control" value="<?= $education->getAddress() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <textarea name="description" class="form-control" rows="2"><?= $education->getDescription() ?></textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="submit" class="btn btn-success" formaction="/modify/education/update/<?= $education->getId() ?>">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this education data?');" formaction="/modify/education/delete/<?= $education->getId() ?>">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>

                <!-- <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/education/<?= $model["student"]->getId() ?>">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select name="type" class="form-control" id="type">
                                    <option value="" selected>Choose</option>
                                    <option value="SD">SD</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                                <label for="type">Type*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="school" type="text" class="form-control" id="school" placeholder="school">
                                <label for="school">School Name*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="entryYear" type="number" class="form-control" id="entryYear" placeholder="entryYear">
                                <label for="entryYear">Entry Year*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="graduateYear" type="number" class="form-control" id="graduateYear" placeholder="graduateYear">
                                <label for="graduateYear">Graduate Year*</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="address" type="text" class="form-control" id="address" placeholder="address">
                        <label for="address">Address*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="description" type="text" class="form-control" id="description" placeholder="description">
                        <label for="description">Description*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Education</button>
                </form> -->
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Experience</h1>
                <?php if (sizeof($model["experiences"]) == 0) { ?>
                    <h1 class="display-10 lh-1 mb-3 text-center">--No data experience found--</h1>
                <?php } else { ?>
                    <div class="row align-items-right g-lg-5 py-5">
                        <div class="mx-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Type</th>
                                        <th class="text-center" scope="col">Company</th>
                                        <th class="text-center" scope="col">Entry Date</th>
                                        <th class="text-center" scope="col">End Date</th>
                                        <th class="text-center" scope="col">Address</th>
                                        <th class="text-center" scope="col">Website</th>
                                        <th class="text-center" scope="col">Description</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach ($model["experiences"] as $experience) { ?>
                                        <form method="post" action="/experience/update/<?= $experience->getId() ?>">
                                            <tr>
                                                <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                                <td class="text-center align-middle">
                                                    <select name="type" class="form-select" id="type">
                                                        <option value="" <?= $experience->getType() === "" ? "selected" : "" ?>>Choose</option>
                                                        <option value="Full-Time" <?= $experience->getType() === "Full-Time" ? "selected" : "" ?>>Full-Time</option>
                                                        <option value="Part-Time" <?= $experience->getType() === "Part-Time" ? "selected" : "" ?>>Part-Time</option>
                                                        <option value="Internship" <?= $experience->getType() === "Internship" ? "selected" : "" ?>>Internship</option>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="hidden" name="idStudent" class="form-control" value="<?= $model["student"]->getId() ?>">
                                                    <input type="text" name="company" class="form-control" value="<?= $experience->getCompany() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="date" name="entryDate" class="form-control" value="<?= $experience->getEntryDate() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="date" name="endDate" class="form-control" value="<?= $experience->getEndDate() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="text" name="address" class="form-control" value="<?= $experience->getAddress() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="url" name="website" class="form-control" value="<?= $experience->getWebsite() ?>" placeholder="https://example.com">
                                                </td>
                                                <td class="text-center align-middle">
                                                    <textarea name="description" class="form-control" rows="2"><?= $experience->getDescription() ?></textarea>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="submit" class="btn btn-success" formaction="/modify/experience/update/<?= $experience->getId() ?>">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this experience data?');" formaction="/modify/experience/delete/<?= $experience->getId() ?>">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>

                <!-- <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/experience/<?= $model["student"]->getId() ?>">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-floating">
                                <select name="type" class="form-control" id="type">
                                    <option value="" selected>Choose</option>
                                    <option value="Intern">Intern</option>
                                    <option value="Work">Work</option>
                                </select>
                                <label for="type">Type*</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-floating">
                                <input name="company" type="text" class="form-control" id="company" placeholder="company">
                                <label for="company">Company*</label>
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
                        <input name="address" type="text" class="form-control" id="address" placeholder="address">
                        <label for="address">Address*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="website" type="text" class="form-control" id="website" placeholder="website">
                        <label for="website">Website</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="description" type="text" class="form-control" id="description" placeholder="description">
                        <label for="description">Description*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Experience</button>
                </form> -->
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Skill</h1>

                <?php if (sizeof($model["skills"]) == 0) { ?>
                    <h1 class="display-10 lh-1 mb-3 text-center">--No data skill found--</h1>
                <?php } else { ?>
                    <div class="row align-items-right g-lg-5 py-5">
                        <div class="mx-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Skill</th>
                                        <th class="text-center" scope="col">Score</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach ($model["skills"] as $skill) { ?>
                                        <form method="post" action="/skill/update/<?= $skill->getId() ?>">
                                            <tr>
                                                <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                                <td class="text-center align-middle">
                                                    <input type="hidden" name="idStudent" class="form-control" value="<?= $model["student"]->getId() ?>">
                                                    <input type="text" name="skill" class="form-control" value="<?= $skill->getSkill() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="number" name="score" class="form-control" value="<?= $skill->getScore() ?>" min="0" max="100" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="submit" class="btn btn-success" formaction="/modify/skill/update/<?= $skill->getId() ?>">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this skill data?');" formaction="/modify/skill/delete/<?= $skill->getId() ?>">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>

                <!-- <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/skill/<?= $model["student"]->getId() ?>">
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
                </form> -->
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Language</h1>
                <?php if (sizeof($model["languages"]) == 0) { ?>
                    <h1 class="display-10 lh-1 mb-3 text-center">--No data language found--</h1>
                <?php } else { ?>
                    <div class="row align-items-right g-lg-5 py-5">
                        <div class="mx-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Language</th>
                                        <th class="text-center" scope="col">Score</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach ($model["languages"] as $language) { ?>
                                        <form method="post" action="/language/update/<?= $language->getId() ?>">
                                            <tr>
                                                <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                                <td class="text-center align-middle">
                                                    <input type="hidden" name="idStudent" class="form-control" value="<?= $model["student"]->getId() ?>">
                                                    <input type="text" name="language" class="form-control" value="<?= $language->getLanguage() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="number" name="score" class="form-control" value="<?= $language->getScore() ?>" min="0" max="100" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="submit" class="btn btn-success" formaction="/modify/language/update/<?= $language->getId() ?>">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this language data?');" formaction="/modify/language/delete/<?= $language->getId() ?>">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
                <!-- <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/language/<?= $model["student"]->getId() ?>">
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
                </form> -->
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Social Media</h1>
                <?php if (sizeof($model["socialMedias"]) == 0) { ?>
                    <h1 class="display-10 lh-1 mb-3 text-center">--No data social media found--</h1>
                <?php } else { ?>
                    <div class="row align-items-right g-lg-5 py-5">
                        <div class="mx-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Platform</th>
                                        <th class="text-center" scope="col">URL</th>
                                        <th class="text-center" scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach ($model["socialMedias"] as $socialMedia) { ?>
                                        <form method="post" action="/socialMedia/update/<?= $socialMedia->getId() ?>">
                                            <tr>
                                                <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                                <td class="text-center align-middle">
                                                    <select name="platform" class="form-select" id="platform" required>
                                                        <option value="" disabled <?= $socialMedia->getPlatform() === "" ? "selected" : "" ?>>Select a platform</option>
                                                        <option value="facebook" <?= $socialMedia->getPlatform() === "facebook" ? "selected" : "" ?>>Facebook</option>
                                                        <option value="instagram" <?= $socialMedia->getPlatform() === "instagram" ? "selected" : "" ?>>Instagram</option>
                                                        <option value="twitter" <?= $socialMedia->getPlatform() === "twitter" ? "selected" : "" ?>>Twitter</option>
                                                        <option value="linkedin" <?= $socialMedia->getPlatform() === "linkedin" ? "selected" : "" ?>>LinkedIn</option>
                                                        <option value="youtube" <?= $socialMedia->getPlatform() === "youtube" ? "selected" : "" ?>>YouTube</option>
                                                        <option value="tiktok" <?= $socialMedia->getPlatform() === "tiktok" ? "selected" : "" ?>>TikTok</option>
                                                        <option value="snapchat" <?= $socialMedia->getPlatform() === "snapchat" ? "selected" : "" ?>>Snapchat</option>
                                                        <option value="pinterest" <?= $socialMedia->getPlatform() === "pinterest" ? "selected" : "" ?>>Pinterest</option>
                                                        <option value="reddit" <?= $socialMedia->getPlatform() === "reddit" ? "selected" : "" ?>>Reddit</option>
                                                    </select>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <input type="hidden" name="idStudent" class="form-control" value="<?= $model["student"]->getId() ?>">
                                                    <input type="url" name="url" class="form-control" value="<?= $socialMedia->getURL() ?>" required>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <button type="submit" class="btn btn-success" formaction="/modify/socialMedia/update/<?= $socialMedia->getId() ?>">
                                                        <i class="bi bi-check-circle-fill"></i>
                                                    </button>
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this social media data?');" formaction="/modify/socialMedia/delete/<?= $socialMedia->getId() ?>">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php } ?>
                <!-- <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/socialMedia/<?= $model["student"]->getId() ?>">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <select name="platform" class="form-select" id="platform" required>
                                    <option value="" disabled selected>Select a platform</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="twitter">Twitter</option>
                                    <option value="linkedin">LinkedIn</option>
                                    <option value="youtube">YouTube</option>
                                    <option value="tiktok">TikTok</option>
                                    <option value="snapchat">Snapchat</option>
                                    <option value="pinterest">Pinterest</option>
                                    <option value="reddit">Reddit</option>
                                </select>
                                <label for="platform">Platform*</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input name="url" type="text" class="form-control" id="url" placeholder="url">
                                <label for="url">URL*</label>
                            </div>
                        </div>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Social Media</button>
                </form> -->
            </div>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Portofolio</h1>
                <?php if (sizeof($model["portofolios"]) == 0) { ?>
                    <h1 class="display-10 lh-1 mb-3 text-center">--No data portofolio found--</h1>
                <?php } else { ?>
                    <div class="row align-items-right g-lg-5 py-5">
                        <div class="mx-auto">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center" scope="col">Preview</th>
                                        <th class="text-center" scope="col">Type</th>
                                        <th class="text-center" scope="col">Portofolio Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $index = 1;
                                    foreach ($model["portofolios"] as $portofolio) { ?>
                                        <tr>
                                            <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                            <td class="text-center align-middle">
                                                <?php if ($portofolio->getType() == "image") { ?>
                                                    <img src="/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/portofolio/' . $portofolio->getId() . $portofolio->getPortofolioName() ?>"
                                                        alt="Photo of <?= $model["student"]->getFullname() ?>"
                                                        class="portfolio-media">
                                                <?php } else if ($portofolio->getType() == "video") { ?>
                                                    <video controls class="portfolio-media">
                                                        <source src="/img/uqi/academy/<?= $model["student"]->getYear() . '/' . $model["student"]->getBatch() . '/' . $model["student"]->getId() . '/portofolio/' . $portofolio->getId() . $portofolio->getPortofolioName() ?>"
                                                            type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center align-middle"><?= $portofolio->getType() ?></td>
                                            <td class="text-center align-middle"><?= $portofolio->getPortofolioName() ?></td>
                                            <td class="text-center align-middle">
                                                <form method="post">
                                                    <input type="hidden" name="idStudent" class="form-control" value="<?= $model["student"]->getId() ?>">
                                                    <button class="btn btn-danger" formaction="/modify/portofolio/delete/<?= $portofolio->getId() ?>"><i class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                <?php } ?>
                <!-- <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/portofolio/<?= $model["student"]->getId() ?>" enctype="multipart/form-data">
                    <div class="form-floating mb-3">
                        <input name="portofolio" type="file" class="form-control" id="portofolio" accept="image/*,video/*" placeholder="Upload image or video" required>
                        <label for="portofolio">Upload Image or Video*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Add Portofolio</button>
                </form> -->
            </div>
        </div>
    </div>
</body>

</html>