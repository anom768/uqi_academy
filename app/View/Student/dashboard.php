<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $model['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
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
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
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
                    <img src="/img/uqi/academy/2024/1/<?= $model["student"]->getPhoto() ?>" alt="Profile Picture" class="profile-img">
                    <h2 class="mb-3"><?= $model["student"]->getFullname() ?></h2>
                    <p>Bioengineering Student</p>

                    <!-- Contact Info -->
                    <div class="mt-4 text-start">
                        <h5 class="fw-bold">Contact</h5>
                        <hr class="divider">
                        <p><i class="bi bi-telephone-fill"></i> 000-000-0000</p>
                        <p><i class="bi bi-envelope-fill"></i> jane.smith@gmail.com</p>
                        <p><i class="bi bi-geo-alt-fill"></i> London, GB</p>
                        <p><i class="bi bi-globe"></i> janesmith.com</p>
                    </div>

                    <!-- Skills -->
                    <div class="mt-4 text-start">
                        <h5 class="fw-bold">Skills</h5>
                        <hr class="divider">
                        <ul class="list-unstyled">
                            <li>MS Word, MS Excel</li>
                            <li>PTC Creo, Catia</li>
                            <li>Python, Java, CSS</li>
                        </ul>
                    </div>

                    <!-- Languages -->
                    <div class="mt-4 text-start">
                        <h5 class="fw-bold">Languages</h5>
                        <hr class="divider">
                        <p>English, German, Spanish</p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="col-md-8 bg-light-blue p-5 rounded-end">
                    <!-- Summary -->
                    <div class="mb-4">
                        <h5 class="section-title">Professional Summary</h5>
                        <p>Motivated and results-oriented Bioengineering graduate with experience in robotics, economics, and business management. Aiming to leverage my technical and analytical skills in a dynamic, forward-thinking organization.</p>
                    </div>

                    <!-- Education Section -->
                    <div class="mb-4">
                        <h5 class="section-title">Education</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">M.Sc. Bioengineering</h6>
                                <p class="mb-0">Harvard University, Cambridge, MA</p>
                                <small>Clubs: Robotics Society, Business Club</small>
                            </div>
                            <small>2014 - Present</small>
                        </div>
                        <hr class="divider">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">B.A. Applied Economics</h6>
                                <p class="mb-0">Yale University, New Haven, CT</p>
                                <small>Graduated Summa Cum Laude</small>
                            </div>
                            <small>2010 - 2014</small>
                        </div>
                    </div>

                    <!-- Experience Section -->
                    <div>
                        <h5 class="section-title">Experience</h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">Intern</h6>
                                <p class="mb-0">Tesla Inc., Fremont, CA</p>
                                <small>Contributed to team projects on sustainable engineering solutions.</small>
                            </div>
                            <small>2018 - Present</small>
                        </div>
                        <hr class="divider">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">Intern</h6>
                                <p class="mb-0">Boeing, Pleasanton, CA</p>
                                <small>Worked on component testing and analysis.</small>
                            </div>
                            <small>2016 - 2018</small>
                        </div>
                        <hr class="divider">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h6 class="fw-bold mb-1">Intern</h6>
                                <p class="mb-0">Audi Palo Alto, Palo Alto, CA</p>
                                <small>Assisted in engineering design projects.</small>
                            </div>
                            <small>2014 - 2016</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-5">
            <button onclick="generatePDF()" class="btn btn-primary">Download as PDF</button>
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
                        scale: 2
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