<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TAP Security Employment Submitted</title>
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,600&subset=latin,greek,latin-ext,vietnamese' rel='stylesheet' type='text/css'>
    <link href="//fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
</head>
<body class="employment-thanks-body">
    <section class="employment-thanks">
        <div class="container">
            <div class="employment-thanks-card text-center">
                <span class="employment-thanks-kicker">Application submitted</span>
                <h1>Thank you!</h1>
                <p>Your employment request has been sent successfully.</p>
                <div class="employment-thanks-actions">
                    <a class="btn btn-danger btn-medium" href="/form8850">Complete Form 8850</a>
                    <a class="btn btn-outline-secondary btn-medium" href="/employment-form">Submit another application</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .employment-thanks-body {
            margin: 0;
            background: #f5f7fb;
            font-family: 'Open Sans', sans-serif;
        }

        .employment-thanks {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .employment-thanks-card {
            background: #fff;
            padding: 3rem 2rem;
            box-shadow: 0 24px 60px rgba(3,16,89,.12);
        }

        .employment-thanks-kicker,
        .employment-thanks-card h1 {
            font-family: 'Bebas Neue', sans-serif;
            letter-spacing: .08em;
        }

        .employment-thanks-kicker {
            display: inline-block;
            margin-bottom: 1rem;
            color: #b7161c;
            text-transform: uppercase;
        }

        .employment-thanks-card h1 {
            color: #031059;
            font-size: clamp(2.5rem, 4vw, 4rem);
            margin-bottom: .75rem;
        }

        .employment-thanks-actions {
            display: flex;
            justify-content: center;
            gap: .75rem;
            flex-wrap: wrap;
            margin-top: 1.5rem;
        }
    </style>
</body>
</html>
