<!DOCTYPE html>
<html lang="pt-br">
    <?php
    require_once 'modulo/cabecalho.php';
    ?>
    <head>
        <link rel="stylesheet" href="css/matrix-login.css">
    </head>
    <body>
        <div id="loginbox">     
            <form id="loginform" class="form-vertical" method="post" action="modulo/autenticador.php">
				 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo"></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input placeholder="Usuário" type="text" name="txtemail" value="adm@adm">
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input placeholder="Senha" type="password" name="txtsenha" value="123456">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-primary" id="to-recover">Esqueceu a Senha?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="Login"></span>
                </div>
            </form>
        </div>
        
        <script src="login_files/jquery.js"></script>  
        <script src="login_files/matrix.js"></script> 
</body></html>
