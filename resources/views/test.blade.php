<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .testtest{
            background: red;
            height: 100px;
            width: 100px;
            /* transition: 1s; */
        }
        #input:checked ~ .testtest{
            background: blue;
            transition: 1s;
        }
    </style>
</head>
<body>

        <div style="margin: 0 auto; width: 300px">
            <input id="input" type="checkbox">
        
            <label for="label" class="label"></label>

            <div class="testtest"></div>

        </div>


</body>
</html>

<script>
    export default{
        data: {
            test: false
        }
    }
</script>