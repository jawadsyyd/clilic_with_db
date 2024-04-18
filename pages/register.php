<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .awm {
        display: grid;
        justify-content: center;
        align-items: center;
        margin-block: 7rem;
    }
    </style>
</head>

<body>
    <div class="awm mx-3">
        <div class="container-fluid bg-dark text-light py-3">
            <header class="text-center">
                <h1 class="display-6">Register</h1>
            </header>
        </div>
        <section class="container py-3">
            <form class="row g-3" method="POST">
                <div class="col-6 col-md-3">
                    <label for="inputFname4" class="form-label">First name</label>
                    <input type="text" class="form-control" id="inputFname4" require>
                </div>
                <div class="col-6 col-md-3">
                    <label for="inputLname4" class="form-label">Last name</label>
                    <input type="text" class="form-control" id="inputLname4" require>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" require>
                </div>
                <div class="col-6 col-md-4">
                    <label for="inputUsernamr4" class="form-label">Username</label>
                    <input type="text" class="form-control" id="inputUsernamr4" require>
                </div>
                <div class="col-6 col-md-4">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" require>
                </div>
                <div class="col-4 col-md-4">
                    <label for="inputRole" class="form-label">Role</label>
                    <select id="inputRole" class="form-select" require>
                        <option selected>Patient</option>
                        <option>Admin</option>
                    </select>
                </div>
                <!--  -->
                <div class="col-8 col-md-3">
                    <label for="inputDate4" class="form-label">Date of birthday</label>
                    <input type="date" class="form-control" id="inputDate4" require>
                </div>

                <div class="col-4 col-md-3">
                    <label for="inputGender" class="form-label">Gender</label>
                    <select id="inputGender" class="form-select" require>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="col-4 col-md-3">
                    <label for="inputPhnb4" class="form-label">Phone number</label>
                    <input type="tel" class="form-control" id="inputPhnb4" require>
                </div>

                <div class="col-4 col-md-3">
                    <label for="inputEph4" class="form-label">Emergency contact</label>
                    <input type="tel" class="form-control" id="inputEph4">
                </div>
                <!--  -->
                <div class="col-12">
                    <button type="submit" class="btn btn-dark px-3">Sign in</button>
                </div>
            </form>
        </section>
    </div>
</body>

</html>