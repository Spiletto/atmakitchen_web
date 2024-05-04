<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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

        .signup-btn {
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
                        <span style="color: hsl(218, 81%, 75%)">Cicipi Surga Manis Dalam Setiap Produk Kami!</span>
                    </h1>
                    <p class="mb-4 opacity-70 justify-content-center"
                        style="color: hsl(218, 81%, 85%); text-align: justify">
                        Are you tired of feeling sluggish and out of shape? Do you want to improve your health and fitness
                        level? Look no further than your local gym!
                    </p>
                    <p class="mb-4 opacity-70 " style="color: hsl(218, 81%, 85%); text-align: justify;">
                        At the gym, you'll have access to state-of-the-art equipment and a variety of fitness classes to help
                        you reach your fitness goals. Whether you're looking to build muscle, lose weight, or simply improve
                        your overall health, our gym has everything you need to succeed. Our experienced and knowledgeable
                        trainers are on hand to provide guidance and support every step of the way. They can help you develop
                        a personalized workout plan that's tailored to your specific needs and goals, and they'll be there to
                        encourage and motivate you to push yourself to new heights. And with a community of like-minded
                        individuals, you'll have the support and encouragement you need to stay motivated and committed to
                        your fitness journey. You'll make new friends, have fun, and most importantly, see results.
                    </p>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form class="form" method="POST" action="{{ route('login.check') }}">
                                @csrf
                                <div>
                                    <h4 class="mb-3 text-center">LOGIN</h4>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!-- Nama input -->
                                <div class="form-floating mb-2">
                                    <input type="email" class="form-control" name="email_karyawan" id="floatingInput" placeholder="Masukkan Email"
                                        required />
                                    <label for="floatingInput">Email</label>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <!-- Password -->
                                <div class="form-floating">
                                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
                                        required />
                                    <label for="floatingPassword">Password</label>
                                </div>
                                
                                <!-- Submit button -->
                                <button type="submit" style="width: 100%;"
                                    class="btn btn-primary btn-block mb-2 mt-3"> {{ __('Login') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Tombol Sign Up -->
            <a href="{{ url('register') }}" class="btn btn-outline-light signup-btn">Sign Up</a>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jl