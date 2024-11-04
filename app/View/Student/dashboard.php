<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $model['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
    <style>
        .section-title {
            font-size: 1.25rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 15px;
            text-transform: uppercase;
        }

        .divider {
            height: 2px;
            background-color: #007bff;
            margin: 10px 0;
        }

        .profile-img {
            width: 200px;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            /* Sedikit rounding di ujung */
            margin-bottom: 10px;
        }

        .bg-light-blue {
            background-color: #e9f4ff;
        }

        .bg-dark-blue {
            background-color: #1d3c5b;
            color: white;
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
                        <a class="nav-link" href="/profile/<?= $model["student"]->getId() ?>">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container col-xl-10 col-xl-8 px-0 py-5">
        <div class="welcome-message text-center text-center py-5" style="margin-top: 56px;">
            <h1 class="display-4 fw-bold">Welcome to UQI Academy Student Portal</h1>
        </div>
        <div class="container my-5" id="cv-content">
            <div class="row">
                <!-- Sidebar -->
                <div class="col-md-4 bg-dark-blue text-white text-center p-4 rounded-start">
                    </br>
                    <img src="/img/uqi/academy/2024/1/<?= $model["student"]->getPhoto() ?>" alt="Profile Picture" class="profile-img">
                    <h2 class="mb-3"><?= $model["student"]->getFullname() ?></h2>
                    <p><?= $model["student"]->getSpecialist() ?? "(edit your specialist)" ?></p>

                    <!-- Contact Info -->
                    <div class="mt-4 text-start">
                        <h5 class="fw-bold">Contact</h5>
                        <hr class="divider">
                        <p><i class="bi bi-telephone-fill"></i> <?= $model["student"]->getPhone() ?></p>
                        <p><i class="bi bi-envelope-fill"></i> <?= $model["student"]->getEmail() ?? "(edit your email)" ?></p>
                        <p><i class="bi bi-geo-alt-fill"></i> <?= $model["student"]->getAddress() ?></p>
                        <p><i class="bi bi-globe"></i> <?= $model["student"]->getWebsite() ?? "(edit your website)" ?></p>
                    </div>

                    <!-- Skills -->
                    <div class="mt-4 text-start">
                        <h5 class="fw-bold">Skills</h5>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            <?php for ($i = 0; $i < sizeof($model["skills"]); $i++) { ?>
                                <li class="d-flex justify-content-between">
                                    <span><?= $model["skills"][$i]->getSkill() ?></span>
                                    <span><?= $model["skills"][$i]->getScore() ?></span> <!-- Score untuk skill ini -->
                                </li>
                            <?php } ?>
                        </ul>
                    </div>


                    <!-- Languages -->
                    <div class="mt-4 text-start">
                    <h5 class="fw-bold">Languages</h5>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            <?php for ($i = 0; $i < sizeof($model["languages"]); $i++) { ?>
                                <li class="d-flex justify-content-between">
                                    <span><?= $model["languages"][$i]->getLanguage() ?></span>
                                    <span><?= $model["languages"][$i]->getScore() ?></span> <!-- Score untuk skill ini -->
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-8 bg-light-blue p-5 rounded-end">
                    <!-- Summary -->
                    <div class="mb-4">
                        <h5 class="section-title">Biography</h5>
                        <p><?= $model["student"]->getBio() ?></p>
                    </div>

                    <!-- Education Section -->
                    <div class="mb-4">
                        <h5 class="section-title">Educations</h5>
                        <?php for ($i = 0; $i < sizeof($model["educations"]); $i++) { ?>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1"><?= $model["educations"][$i]->getSchool() ?></h6>
                                    <!-- <p class="mb-0">Harvard University, Cambridge, MA</p>
                                    <small>Clubs: Robotics Society, Business Club</small> -->
                                </div>
                                <small><?= $model["educations"][$i]->getEntryYear() ?> - <?= $model["educations"][$i]->getGraduateYear() ?></small>
                            </div>
                            <hr class="divider">
                        <?php } ?>
                    </div>

                    <!-- Experience Section -->
                    <div>
                        <h5 class="section-title">Experiences</h5>
                        <?php for($i = 0; $i < sizeof($model["experiences"]); $i++) { ?>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h6 class="fw-bold mb-1"><?= $model["experiences"][$i]->getType() ?></h6>
                                    <p class="mb-0"><?= $model["experiences"][$i]->getCompany() ?></p>
                                    <small><?= $model["experiences"][$i]->getDescription() ?></small>
                                </div>
                                <small><?= $model["experiences"][$i]->getEntryDate() ?> - <?= $model["experiences"][$i]->getEndDate() ?></small>
                            </div>
                            <hr class="divider">
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <!-- <button onclick="generatePDF()" class="btn btn-primary">Download as PDF</button> -->
        </div>

        <script>
            function generatePDF() {
                const element = document.getElementById('cv-content');
                const options = {
                    margin: 0.5,
                    filename: 'Jane_Smith_CV.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 0.98
                    },
                    html2canvas: {
                        scale: 3
                    },
                    jsPDF: {
                        unit: 'in',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                html2pdf().set(options).from(element).save();
            }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <footer class="bg-light text-center text-lg-start">
            <div class="container p-4">
                <section class="mb-4">
                    <a class="btn btn-primary btn-lg m-1" href="https://www.facebook.com" role="button">Facebook</a>
                    <a class="btn btn-primary btn-lg m-1" href="https://www.twitter.com" role="button">Twitter</a>
                    <a class="btn btn-primary btn-lg m-1" href="https://www.instagram.com" role="button">Instagram</a>
                </section>
            </div>
            <div class="text-center p-3 bg-light">
                © 2024 UQI Academy
            </div>
        </footer>
</body>

</html>