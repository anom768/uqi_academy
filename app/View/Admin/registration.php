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
    <div class="container col-xl-10 col-xl-8 px-0 py-5">
        <?php if (isset($model['success'])) { ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    <?= $model['success'] ?>
                </div>
            </div>
        <?php } elseif (isset($model['error'])) { ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    <?= $model['error'] ?>
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <form method="get" action="/">
                <button class="w-15 btn btn-lg btn-danger" type="submit">Back</button>
            </form>
        </div>
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-md-10 mx-auto col-lg-9">
                <h1 class="display-4 fw-bold lh-1 mb-3 text-center">Registration Form</h1>
                <form class="p-4 p-md-5 border rounded-3 bg-light" method="post" action="/register">
                    <div class="form-floating mb-3">
                        <input name="photo" type="text" class="form-control" id="photo" placeholder="photo">
                        <label for="photo">Photo*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="fullname" type="text" class="form-control" id="fullname" placeholder="fullname">
                        <label for="fullname">Full Name*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="phone" type="text" class="form-control" id="phone" placeholder="phone">
                        <label for="phone">Phone*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="address" type="number" class="form-control" id="address" placeholder="address">
                        <label for="address">Address*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="school" type="text" class="form-control" id="school" placeholder="school">
                        <label for="school">School*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="year" type="number" class="form-control" id="year" placeholder="year" value="2024">
                        <label for="year">Year*</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input name="batch" type="number" class="form-control" id="batch" placeholder="batch" value="1">
                        <label for="batch">Batch*</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>