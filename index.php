<!DOCTYPE html>
<html>
<head>
    <title>Друк квитків</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            &nbsp;
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="text-center">
            <img class="mx-auto" src="https://www.freeiconspng.com/uploads/user-login-icon-14.png" width="150" alt="User Login Icon" />
        </div>
    </div>
    <div class="row justify-content-md-center">
        <div class="col-md-auto">
            &nbsp;
        </div>
    </div>
    <div style="margin: auto;width: 60%;">
        <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
        </div>
        <div class="mb-3">
        <button type="button" class="btn btn-success btn-sm" id="register">Форма реєстрації</button> <button type="button" class="btn btn-success btn-sm" id="login">Форма входу</button>
        </div>

        <form id="register_form" name="form1" method="post" style="display:none;">
            <div class="form-group mb-3">
                <label for="email">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Phone:</label>
                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
            </div>
            <div class="form-group mb-3" >
                <label for="pwd">City:</label>
                <select name="city" id="city" class="form-control">
                    <option value="">Виберіть місто зі списку нижче:</option>
                    <option value="IF">Івано-Франківськ</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" autocomplete="on">
            </div>
            <input type="button" name="save" class="btn btn-primary" value="Register" id="butsave">
        </form>

        <form id="login_form" name="form1" method="post">

            <div class="form-group mb-3">
                <label for="pwd">Логін:</label>
                <input type="email" class="form-control" id="email_log" placeholder="Введіть Ваш логін" name="email">
            </div>
            <div class="form-group mb-3">
                <label for="pwd">Пароль:</label>
                <input type="password" class="form-control" id="password_log" placeholder="та пароль" name="password" autocomplete="on">
            </div>
            <input type="button" name="save" class="btn btn-primary" value="Увійти" id="butlogin">
            <a class="btn btn-dark" href="user.php">
                Екстренний вхід
<!--            <input type="button" name="save" class="btn btn-primary" value="Екстренний вхід" id="butlogin">-->
            </a>
            <a class="btn btn-dark" href="admin.php">
                Адмінка
                <!--            <input type="button" name="save" class="btn btn-primary" value="Екстренний вхід" id="butlogin">-->
            </a>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#login').on('click', function() {
                $("#login_form").show();
                $("#register_form").hide();
            });
            $('#register').on('click', function() {
                $("#register_form").show();
                $("#login_form").hide();
            });
            $('#butsave').on('click', function() {
                $("#butsave").attr("disabled", "disabled");
                var name = $('#name').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var city = $('#city').val();
                var password = $('#password').val();
                if(name!="" && email!="" && phone!="" && password!="" ){
                    $.ajax({
                        url: "save.php",
                        type: "POST",
                        data: {
                            type: 21,
                            name: name,
                            email: email,
                            phone: phone,
                            city: city,
                            password: password
                        },
                        cache: false,
                        success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                $("#butsave").removeAttr("disabled");
                                $('#register_form').find('input:text').val('');
                                $("#success").show();
                                $('#success').html('Користувач успішно зареєстрований!');
                            }
                            else if(dataResult.statusCode==201){
                                $("#error").show();
                                $('#error').html('Користувач з такою поштою уже зареєстрований!');
                            }

                        }
                    });
                }
                else{
                    alert('Усі поля обов\'язкові для заповнення');
                }
            });
            $('#butlogin').on('click', function() {
                var email = $('#email_log').val();
                var password = $('#password_log').val();
                if(email!="" && password!="" ){
                    $.ajax({
                        url: "save.php",
                        type: "POST",
                        data: {
                            type:22,
                            email: email,
                            password: password
                        },
                        cache: false,
                        success: function(dataResult){
                            var dataResult = JSON.parse(dataResult);
                            if(dataResult.statusCode==200){
                                location.href = "validate.php";
                            }
                            else if(dataResult.statusCode==201){
                                $("#error").show();
                                $('#error').html('Неправильний логін або пароль!');
                            }

                        }
                    });
                }
                else{
                    alert('Please fill all the field !');
                }
            });
        });
    </script>
</div>
</body>
</html>
