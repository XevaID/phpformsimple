<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD sederhana</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <div class="main_container" id="main_container">
        <div class="submain_container" id="submain_container">
            <form autocomplete="off" onsubmit="insSubmitFor()">
                <div class="input_produk_style">
                    <label for="productCode">Kode produk</label>
                    <input type="text" id="productCode" class="productCode">
                </div>
                <div class="input_produk_style">
                    <label for="productName">Nama produk</label>
                    <input type="text" id="productName" class="productName">
                </div>
                <div class="input_produk_style">
                    <label for="productType">Tipe produk</label>
                    <input type="text" id="productType" class="productType">
                </div>
                <div class="button_submit_action">
                    <input type="button" value="Submit" class="btn btn-primary">
                    <input type="button" value="Reset" class="btn btn-danger">
                </div>

            </form>

            <table class="output_list" id="outputlist">
            <thead>
                
                <tr>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Tipe Produk</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
                
            </table>
        </div>
    </div>


    <script src="app.js"></script>
    <!-- Bootstrap -->
     
</body>
</html>