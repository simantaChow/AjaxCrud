<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/jquery-3.7.0.min.js"></script>
    <script src="./js/toastify-js.js"></script>
    <script src="./js/config.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <form id="cat_form" method="POST" type="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="cat_name" class="form-label">Category Name</label>
            <input type="type" class="form-control" id="cat_name" name="category" placeholder="Category Name">
        </div>
        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name</label>
            <input type="type" class="form-control" id="product_name" name="product_name" placeholder="Product Name">
        </div>

        <div class="mb-3">
            <label for="qty" class="form-label">Quantity</label>
            <input type="type" class="form-control" id="qty" name="quantity" placeholder="Quantity">
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="type" class="form-control" id="price" name="price" placeholder="Price">
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label">Upload Image</label>
            <input class="form-control" type="file" id="pord_img" name="img_url">
        </div>
            <button type="submit" class="btn btn-primary" id="cat_submit">Create</button>
        </form>
        <a href="{{url('/categories')}}" class="stretched-link">Category List</a>
    </div>
</div>

<script !src="">
    $(document).ready(function(){
        $("#cat_form").submit(function (event){
            event.preventDefault();
            let form = $("#cat_form")[0];
            let data = new FormData(form);
            $("#cat_submit").prop("disabled",true);
            $.ajax({
                type : "POST",
                url :"{{route('createcat')}}",
                data:data,
                processData:false,
                contentType:false,
                success:function (data){
                    successToast("Request Completed");
                    $(cat_name).val('');
                    $(product_name).val('');
                    $(qty).val('');
                    $(price).val('');
                    $(pord_img).val('');
                    $("#cat_submit").prop("disabled",false);
                },
                error:function (){
                    errorToast("Request Fail");
                    $(cat_name).val('');
                    $(product_name).val('');
                    $(qty).val('');
                    $(price).val('');
                    $(pord_img).val('');
                    $("#cat_submit").prop("disabled",false);
                }
           });
        });
    });
</script>

</body>
</html>
