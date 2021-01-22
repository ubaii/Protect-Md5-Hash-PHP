<?php

function encrypt($value){
    $salt = '/x!a@r-$r%an¨.&e&+f*f(f(f)'; // Salt Bisa Diubah
	return hash_hmac('md5', $value, $salt);
}

if(isset($_POST['hash'])){
    echo 'Dengan Protect Md5 : ' . encrypt($_POST['hash']);
    echo '<br>';
    echo 'Tanpa Protect Md5 : ' . md5($_POST['hash']);
}else{
?>
<html>
    <head>
        <title>Protect MD5 hash</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <form id="md5" class="col-lg-6 offset-lg-3 ">
            <div class="row justify-content-center">
                <h4>Protect MD5 hash</h4>
                <input type="text" id="text" placeholder="Text apapun. Contoh : Joko">
                <span class="input-group-btn">
                <button class="btn btn-primary">Hash</button>
                </span>
            </div>
        </form>
            <div id="results" class="row justify-content-center"></div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#md5").submit(function(e) {
            e.preventDefault();
                 var text = $('#text').val();
                 $.ajax({
                    type: "POST",
                    url: 'protectMD5.php', // samakan dengan nama file.
                    data: {hash: text},
                    success: function(data){
                        $('#results').html(data);
                    }
                });
            });
        });
    </script>
</html>
<?php
}

?>
