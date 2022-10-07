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
                            <h5 class="card-title">API Counting Stars</h5>
                            <table class="w-100">
                                <tr>
                                    <td>
                                        <select name="type" id="type" class="form-control">
                                            <option value="1">Tipe 1</option>
                                            <option value="2">Tipe 2</option>
                                            <option value="3">Tipe 3</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="text" name="star" id="star" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" id="submit" class="btn btn-sm btn-primary">Submit</button>
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
                    <div class="mt-3 d-flex justify-content-end">
                        <a href="second" class="btn btn-sm btn-success">Next</a>
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