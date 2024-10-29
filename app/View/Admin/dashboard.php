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
    </nav>

    <div class="container col-xl-10 col-xl-8 px-0 py-5">
        <?php if (isset($model['error'])) { ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    <?= $model['error'] ?>
                </div>
            </div>
        <?php } ?>
        <div class="welcome-message text-center text-center py-5" style="margin-top: 56px;">
            <h1 class="display-4 fw-bold">Welcome to UQI Academy Admin Portal</h1>
        </div>
        <?php if (sizeof($model["students"]) == 0) { ?>
            <h1 class="display-10 lh-1 mb-3 text-center">--No data Found--</h1>
        <?php } else { ?>
            <div class="row align-items-right g-lg-5 py-5">
                <div class="mx-auto">
                    <form id="deleteForm" method="post" style="display: none">
                    </form>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Photo</th>
                                <th class="text-center" scope="col">ID</th>
                                <th class="text-center" scope="col">Temp Password</th>
                                <th class="text-center" scope="col">Fullname</th>
                                <th class="text-center" scope="col">Phone</th>
                                <th class="text-center" scope="col">School</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $index = 1;
                            foreach ($model["students"] as $student) { ?>
                                <tr>
                                    <th class="text-center align-middle" scope="row"><?= $index++ ?></th>
                                    <td>
                                        <img src="/img/uqi/academy/2024/1/<?= $student->getPhoto() ?>" alt="Photo of <?= $student->getFullname() ?>" width="100" height="auto" class="img-fluid">
                                    </td>
                                    <td class="text-center align-middle">
                                        <a href="/profile/<?= $student->getId() ?>" class="text-decoration-underline"><?= $student->getId() ?></a>
                                    </td>
                                    <td class="text-center align-middle"><?= $student->getTempPassword() ?></td>
                                    <td class="text-center align-middle"><?= $student->getFullname() ?></td>
                                    <td class="text-center align-middle"><?= $student->getPhone() ?></td>
                                    <td class="text-center align-middle"><?= $student->getSchool() ?></td>
                                    <td class="text-center align-middle">
                                        <form method="get">
                                            <button class="btn btn-primary" formaction="/edit/<?= $student->getId() ?>"><i class="bi bi-pencil"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>
    </div>

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