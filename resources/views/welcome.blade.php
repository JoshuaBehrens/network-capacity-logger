<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Network Capacity Logger</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <script src="{{mix('/js/manifest.js')}}"></script>
        <script src="{{mix('/js/vendor.js')}}"></script>
        <script src="{{mix('/js/app.js')}}"></script>
    </head>
    <body>
        <section class="section">
            <div class="container">
                <div class="card">
                    <div class="card-image">
                        <figure class="image">
                            <canvas id="stats"></canvas>
                        </figure>
                    </div>
                    <div class="card-content">
                        <div class="content">
                            Download
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script>
            new Chart(document.getElementById("stats").getContext("2d"), {
                type: 'line',
                data: {
                    label: '# of Votes',
                    datasets: [{
                        data: @json($downspeeds),
                    }],
                    labels: @json($downspeedlabels)
                }
            });
        </script>
    </body>
</html>
