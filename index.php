<?php include 'key.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo SITE_KEY; ?>"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/sweetalert2.min.css" />
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="alto bg-info">
                    <h1>AJAX FORMULARIO</h1>
                </div>
                <div id="contacto">
                    <form id="form1" method="POST" onsubmit="return enviar();">
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" />
                        <br> <br>
                        <input type="text" name="correo" id="correo" placeholder="Correo" />
                        <br> <br>
                        <textarea name="msj" id="msj" placeholder="Mensaje"></textarea>
                        <br />
                        <input type="text" name="g-recaptcha-response" id="g-recaptcha-response" />
                        <br>
                        <input type="submit" name="submit" />
                        <!-- <button type="submit" name="submit" onclick="return enviar();" data-toggle="modal" data-target="#antony-modal">enviar</button> -->
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <div id="res"></div> -->
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('<?php echo SITE_KEY; ?>', {
                action: 'homepage'
            }).then(function(token) {
                document.getElementById('g-recaptcha-response').value = token;
            });
        });
    </script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script src="js/contacto.js"></script>
    <script src="js/jquery-3-5-1-min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>