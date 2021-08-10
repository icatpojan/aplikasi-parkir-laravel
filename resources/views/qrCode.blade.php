<!DOCTYPE html>
<html>

<head>
    <title>Laravel 5.8 Generate QR Code Tutorial with Example - W3Adda</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        {{-- <div class="row"> --}}
        {{-- <div class="col-md-4">
                <h5>Simple Qr Code With String</h5>
                {!! QrCode::size(200)->generate('W3Adda Laravel Tutorial') !!}
            </div> --}}

        {{-- <div class="col-md-4">
                <h5>Qr Code With Color</h5>
                <br><br><br>
                {!! QrCode::size(200)->backgroundColor(255, 55, 0)->generate('W3Adda Laravel Tutorial') !!}
            </div> --}}
        {{-- <div class="col"> --}}
        <center>
            <h5>Kode parkir</h5>
        </center>
        <br>

        <img src="data:image/png;base64, {!! base64_encode(
    QrCode::format('png')->merge('https://m.ayotasik.com/images-tasik/post/articles/2017/03/15/179/parkir.jpg', 0.3, true)->size(200)->errorCorrection('H')->generate( $nomer_plat ),
) !!} ">
        {{-- </div> --}}
        {{-- </div> --}}

    </div>

</body>

</html>
