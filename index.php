<?php
 

require_once("bancoDadosText.php");
$inputs = [];
if (isset($_POST)) {
    foreach ($_POST as $key => $input) {
        $inputs[$key] = $input;
    }

    if (
        isset($inputs["txt_nome_contato"]) && strlen(trim($inputs["txt_nome_contato"])) > 0
        && isset($inputs["txt_tel_contato"]) &&  strlen(trim($inputs["txt_tel_contato"])) > 0
        && isset($inputs["txt_email_contato"])  && strlen(trim($inputs["txt_email_contato"])) > 0
    ) {
        if (save(sprintf(
            "%s;%s;%s\n",
            $inputs["txt_nome_contato"],
            $inputs["txt_tel_contato"],
            $inputs["txt_email_contato"]
        ))) {
            header("location:index.php");
        }  
    } 
}







?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Contatos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Vadodara:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="fontawesome-free-5.15.4-web/css/all.css" rel="stylesheet">
    <!--load all styles -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="generics.css?v1">
    <link rel="stylesheet" href="app.css">


</head>

<body>






    <div id="container-principal">

        <form id="form-contato" action="index.php" method="POST">
            <div class="form-contatos-main">

                <h1>Cadastre um novo contato</h1>

                <div>
                    <div class="container-img  ">
                        <img src="img/img1.jpg" class="imgs round Color2pxSolidBlack " />
                    </div>
                </div>
                <hr>

                <div class="form-group-block">
                    <span><label>Digite o Nome do Novo Contato.!</label></span>
                    <input class="form-input wht-620px  <?php if ($error) {
                                                            echo ('alert');
                                                        } ?>  " name="txt_nome_contato" value="<?php if (isset($_SESSION["inputs"]["txt_nome_contato"])) {
                                                                                                    echo $_SESSION["inputs"]["txt_nome_contato"];
                                                                                                } ?>" placeholder="" />
                </div>

                <div class="form-group-block">
                    <span><label>Digite o Telefone do Novo Contato.!</label></span>
                    <input class="form-input wht-620px  <?php echo ($error) ? 'alert' : ' '; ?> " value="<?php if (isset($_SESSION["inputs"]["txt_tel_contato"])) {
                                                                                                                echo $_SESSION["inputs"]["txt_tel_contato"];
                                                                                                            } ?>" name="txt_tel_contato" placeholder=" " />
                </div>
                <div class="form-group-block">
                    <span><label>Digite o Email do Novo Contato.!</label></span>
                    <input class="form-input  wht-620px <?php echo ($error) ? 'alert' : ' '; ?> no-uppercase" value="<?php if (isset($_SESSION["inputs"]["txt_email_contato"])) {
                                                                                                            echo $_SESSION["inputs"]["txt_email_contato"];
                                                                                                        } ?>" name="txt_email_contato" placeholder=" " />
                </div>

                <div class="form-group-block">

                    <div class="container-btn">
                        <a href="index.html" id="btn-clear" class="btn Color2pxSolidBlack round ">
                            <i class="fas fa-broom"></i> Limpar</a>
                    </div>

                    <div class="container-btn ">
                        <a href="index.html" id="btn-save" class="btn Color2pxSolidBlack round">
                            <i class="fas fa-user"></i> Salvar</a>
                    </div>
                </div>


            </div>
        </form>

    </div>








    <script>
        var error = "<?php echo $error ?>"
        var info = "<?php echo $info ?>"


        document.addEventListener("DOMContentLoaded", function(event) {
            console.log("DOM completamente carregado e analisado");


            document.getElementById("btn-clear").addEventListener("click", function(e) {

                window.location.href = "index.php"
                e.preventDefault();

            });


            document.getElementById("btn-save").addEventListener("click", function(e) {
                e.preventDefault();
                document.getElementById("form-contato").submit()
            });


           







        });




       
    </script>






</body>

</html>