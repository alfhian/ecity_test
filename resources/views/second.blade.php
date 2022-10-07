<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECity Employee Test</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendors/bootstrap/css/bootstrap.min.css') }}">
</head>
<body>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="w-75">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">API Rupiah</h5>
                            <table class="w-100">
                                <tr>
                                    <td>
                                        <input type="text" name="npminal" id="nominal" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" id="submit2" class="btn btn-sm btn-primary">Submit</button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h5 class="card-title">Output</h5>
                            <div id="output">

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <a href="/" class="btn btn-sm btn-success">Previous</a>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="third" class="btn btn-sm btn-success">Next</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
	<script src="{{ asset('vendors/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/javascript.js') }}"></script>
</body>
</html>