<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Stories API</title>

</head>
<body>
    <div id="app">
        <div class="container">
            <app></app>
        </div>

    </div>


    <!--
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>
    -->
    <script type="text/javascript">
        window.csrf_token = "{{ csrf_token() }}"
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue-resource/1.5.1/vue-resource.min.js"
    integrity="sha512-wGKmIfDWUJSUvxUfUayQPJj7ADCD60La3up0VCbq+MTFcOUQ2hlH2McnYFafHgLTsOrGwOdiHKX4p1v0BerCyQ=="
    crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ mix('js/app.js') }}" ></script>

</body>
</html>
