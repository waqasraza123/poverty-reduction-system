<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "AdminLTE Dashboard" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    @include("Partials.donner-head-scripts")

</head>
<body class="skin-blue">
{{--<form action="/test" method="post">
    <input type="hidden" name="_token" id="crsf" value="{{csrf_token()}}">
    <input type="text" name="name">
    <input type="submit" name="submit" value="ok" id="click">
</form>--}}
{{--My data is
<?php /*include(("/../../../../../registration/modules/problem_sharing/public/test.php")); */?>

<script>
    $("#click").click(function(event){
        event.preventDefault();
        $.ajax({
            url: "/test",
            headers: {
                'X-CSRF-TOKEN': $('#crsf').val()
            },
            type: "post",
            data: {type : 'hi',titles : "title"},
            success: function(data){
                alert(data);
            },
            error : function(e){
                console.log(e.responseText);
            }

        });
    });

</script>--}}

<a href="/rating_api/public/rating/seller=talha&buyer=ahmad&redirect=registration/modules/problem_sharing/public/test">click</a>


<p>Please enter the amount you want to donate</p>
<form action="/registration/modules/problem_sharing/app/payment_api/payment.php" method="POST">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <label>Amount in Rupees</label>
    <input type="number" name="amount" form-control>
    <input type="submit" value="submit">
</form>


</body>
</html>