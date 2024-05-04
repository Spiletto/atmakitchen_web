<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="antialiased">
    <style>
        body {
            font-family: Roboto, Helvetica, Arial, sans-serif;
        }

        section {
            width: 100%;
            min-height: 100vh;
        }

        .background-radial-gradient {
            background-color: hsl(218, 41%, 15%);
            background-image: radial-gradient(650px circle at 0% 0%, hsl(218, 41%, 35%) 15%, hsl(218, 41%, 30%) 35%, hsl(
                    218, 41%, 20%) 75%, hsl(218, 41%, 19%) 80%, transparent 100%), radial-gradient(1250px circle at 100%
                    100%, hsl(218, 41%, 45%) 15%, hsl(218, 41%, 30%) 35%, hsl(218, 41%, 20%) 75%, hsl(218, 41%, 19%)
                    80%, transparent 100%);
        }

        #radius-shape-1 {
            height: 220px;
            width: 220px;
            top: -60px;
            left: -130px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        #radius-shape-2 {
            border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
            bottom: -60px;
            right: -110px;
            width: 300px;
            height: 300px;
            background: radial-gradient(#44006b, #ad1fff);
            overflow: hidden;
        }

        .bg-glass {
            background-color: hsla(0, 11%, 95%, 0.9) !important;
            backdrop-filter: saturate(200%) blur(25px);
        }

        .signin-btn {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>

    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Atma Kitchen<br />
                        <span style="color: hsl(218, 81%, 75%)">Daftarkan Dirimu Sekarang!</span>
                    </h1>
                    <p class="mb-4 opacity-70 justify-content-center"
                        style="color: hsl(218, 81%, 85%); text-align: justify">
                        Segera Daftarkan dirimu dan rasakanlah kenikmatan dari produk-produk yang kami tawarkan, dijamin nagih!!
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                        <form method="POST" action="{{ route('register.store') }}" class="form">
                                @csrf
                                <div>
                                    <h4 class="mb-3 text-center">REGISTER</h4>
                                </div>

                                <!-- Nama input -->
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="nama" name="nama_karyawan" placeholder="Nama" required />
                                    <label for="nama">Nama</label>
                                </div>

                                <!-- Username input -->
                                <div class="form-floating mb-2">
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required />
                                    <label for="username">Username</label>
                                </div>

                                <!-- Email input -->
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required />
                                    <label for="email">Email</label>
                                </div>

                                <!-- Password input -->
                                <div class="form-floating mb-2">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password"
                                        required />
                                    <label for="password">Password</label>
                                </div>

                                <!-- No. Telepon input -->
                                <div class="form-floating mb-2">
                                    <input type="tel" class="form-control" id="notelp" name="no_telp" placeholder="No. Telepon" required />
                                    <label for="notelp">No. Telepon</label>
                                </div>

                                <!-- Alamat input -->
                                <div class="form-floating mb-2">
                                    <textarea class="form-control" id="alamat" placeholder="Alamat" name="alamat"
                                        style="height: 100px;" required></textarea>
                                    <label for="alamat">Alamat</label>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" style="width: 100%;"
                                    class="btn btn-primary btn-block mb-2 mt-3">Daftar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tombol Sign In -->
            <a href="{{ url('login') }}" class="btn btn-outline-light signin-btn">Sign In</a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>