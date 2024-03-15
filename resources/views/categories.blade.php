<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
{{--    <link rel="stylesheet" href="./css/bootstrap.css">--}}
    <script src="./js/jquery-3.7.0.min.js"></script>
    <script src="./js/toastify-js.js"></script>
    <script src="./js/config.js"></script>
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">
        <table class="table" id="cat_table">
            <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Categories</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Image</th>
                <th scope="col">Update</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <a href="{{url('/')}}" class="stretched-link">Create Categories</a>
    </div>
</div>

<script !src="">
    $(document).ready(function(){
        $.ajax({
            type : "GET",
            url :"{{route('getcat')}}",
            success:function (data){
                console.log(data);
                if (data.categories.length <= 0) {
                    $("#cat_table").append(`<tr> <td colspan="4"> Data Not Found</td> </tr>`)
                } else {
                    for (let i = 0; i < data.categories.length; i++) {
                        let img = data.categories[i]['img_url'];
                        $("#cat_table").append(`<tr>
                        <td>` + (i+1) + `</td>
                        <td>` + (data.categories[i]['category']) + `</td>
                        <td>` + (data.categories[i]['product_name']) + `</td>
                        <td>` + (data.categories[i]['price']) + `</td>
                        <td>` + (data.categories[i]['quantity']) + `</td>
                        <td><img src="{{asset('storage/`+img+`')}}" alt="+img+" height=100px width=100px></td>
                        <td> <a href="/getcategorybyid/`+ (data.categories[i]['id']) +`" class="stretched-link">Update</a> </td>
                       </tr>`)

                    }
                }

            },
            error:function (){
                errorToast("Request fail");
            }
        })
    });
</script>

</body>
</html>
