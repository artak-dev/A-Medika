<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{{csrf_token()}}">
        <title>Products Page</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/2.1.2/css/dataTables.bootstrap5.css" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="category-section">
            <select class="form-select categories-sel" aria-label="Default select example">
                <option selected disabled hidden>Please select a category</option>
                <option value ="0">All</option>
                @foreach ($categories as $category)
                    <option value = "{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class= "table-section">
            <table id="products-table" class="table table-bordered table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Image</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </body>
    <footer>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
        <script src="{{ asset('js/products.js') }}"></script>
    </footer>
</html>