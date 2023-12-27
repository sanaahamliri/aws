<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AwsQuizz</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            margin: 0px;
            background: #1E242A;
        }

        #main {
            width: 100%;
            height: 100%;
            position: absolute;
            overflow: hidden;
        }

        #box1 {
            width: 530px;
            height: 625px;
            background-image: url(./images/1.png);
            position: absolute;
            bottom: -100%;
            left: 30%;
            animation: anim 2s forwards, anim2 3s forwards 3s;
        }

        #box1:after {
            content: '';
            position: absolute;
            width: 530px;
            height: 625px;
            background-image: url(./images/2.png);
            left: 0px;
            z-index: -1;
        }

        @keyframes anim {
            from {
                bottom: -100%;
            }

            to {
                bottom: 0%;
                left: 30%;
            }
        }

        @keyframes anim2 {
            from {
                left: 30%;
                width: 530px;
            }

            to {
                width: 0px;
                left: 50%;
            }
        }

        #box2 {
            width: auto;
            height: auto;
            /* font-family:'Courier New', Courier, monospace; */
            color: white;
            font-size: 4em;
            font-weight: 500;
            line-height: 130px;
            position: absolute;
            top: 150px;
            left: 115px;
            overflow: hidden;
        }

        #text {
            position: relative;
            left: -100%;
            animation: anim3 2s forwards 3s;
        }

        @keyframes anim3 {
            from {
                left: -100%;
            }

            to {
                left: 0%;
            }
        }

        #box3 {
            overflow: hidden;
        }

        #container {
            width: 100%;
            position: absolute;
            top: -100%;
            animation: anim4 2s forwards 2.5s;
        }

        #logo {
            float: left;
            margin-left: 100px;
            margin: 20px;
        }

        #logo img {
            width: 230px;
            margin-left: 40px;
        }

        @keyframes anim4 {
            from {
                top: -100%;
            }

            to {
                top: 0%;
            }
        }

        :root {
            --primary: #11998e;
            --secondary: #38ef7d;
            --white: #fff;
            --gray: #9b9b9b;
        }

        .form__group {
            position: relative;
            padding: 15px 0 0;
            margin-top: -40px;
            margin-left: 65px;
            width: 50%;
        }

        .form__field {
            font-family: inherit;
            width: 100%;
            border: 0;
            border-bottom: 2px solid var(--gray);
            outline: 0;
            font-size: 1.3rem;
            color: var(--white);
            padding: 7px 0;
            background: transparent;
            transition: border-color 0.2s;
        }

        .form__field::placeholder {
            color: transparent;
        }

        .form__field:placeholder-shown~.form__label {
            font-size: 1.3rem;
            cursor: text;
            top: 20px;
        }

        .form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: var(--gray);
        }

        .form__field:focus~.form__label {
            position: absolute;
            top: 0;
            display: block;
            transition: 0.2s;
            font-size: 1rem;
            color: var(--primary);
            font-weight: 700;
            padding-bottom: 6px;
            border-width: 3px;
            border-image: linear-gradient(to right, var(--primary), var(--secondary));
            border-image-slice: 1;
        }

        .form__field:required,
        .form__field:invalid {
            box-shadow: none;
        }

        .bttn {
            background-color: #11998e;
            padding: 10px;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div id="main">
        <div id="box1"></div>

        <div id="box2">
            <div id="text">
                Let's Get Started
                <div class="form__group field">
                    <input type="input" class="form__field" placeholder="Name" name="name" id='name' required />
                    <label for="name" class="form__label">Set a PseudoName</label>
                    <a href="./views/quiz.php"><button class="bttn">let's keep going!</button></a>
                </div>
            </div>

        </div>
        <div id="box3">
            <div id="container">
                <div id="logo">
                    <img src="./images/logo.png" alt="">
                </div>
            </div>
        </div>

    </div>
</body>

</html>