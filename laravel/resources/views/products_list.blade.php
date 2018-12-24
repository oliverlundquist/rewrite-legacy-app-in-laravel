<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Product List</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Product List</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product ID</th>
                                <th>Product Name</th>
                                <th>Display in Shop?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>
                                        <form method="post" action="products_list.php">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="action" value="update_display_in_shop">
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="radio" name="display_in_shop" value="yes"{{ $product->display_in_shop === 1 ? ' checked' : '' }}> Yes
                                            <input type="radio" name="display_in_shop" value="no"{{ $product->display_in_shop !== 1 ? ' checked' : '' }}> No
                                            <button type="submit" class="btn btn-info">Update!</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
