<?php

    include 'controllers/NotFoundController.php';
    include 'controllers/usuarioController.php';

    class menu{

        function __construct($var1 = "") {
            $this->var1 = $var1;
        }

        function menu_admin(){

            $NotFoundController = new NotFoundController();
            $usuarioController = new usuarioController();

            switch($this->var1){

                /*Perfil*/
                case 'profile':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/profile/form.php')){
                             include 'controllers/profile/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                            include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Titular*/

                case 'new_titular':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/titular/form.php')){
                             include 'views/titular/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_titular':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/titular/list.php')){
                             include 'views/titular/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_titular':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/titular/form.php')){
                             include 'views/titular/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Estudiante*/

                case 'new_estudiante':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/estudiante/form.php')){
                             include 'views/estudiante/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_estudiante':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/estudiante/list.php')){
                             include 'views/estudiante/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_estudiante':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/estudiante/form.php')){
                             include 'views/estudiante/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Pais*/

                case 'new_pais':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/pais/form.php')){
                             include 'views/pais/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_pais':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/pais/list.php')){
                             include 'views/pais/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_pais':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/pais/form.php')){
                             include 'views/pais/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Departamento*/

                case 'new_departamento':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/departamento/form.php')){
                             include 'views/departamento/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_departamento':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/departamento/list.php')){
                             include 'views/departamento/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_departamento':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/departamento/form.php')){
                             include 'views/departamento/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Ciudad*/

                case 'new_ciudad':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/ciudad/form.php')){
                             include 'views/ciudad/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_ciudad':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/ciudad/list.php')){
                             include 'views/ciudad/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_ciudad':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/ciudad/form.php')){
                             include 'views/ciudad/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Filial*/

                case 'new_filial':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/filial/form.php')){
                             include 'views/filial/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_filial':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/filial/list.php')){
                             include 'views/filial/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_filial':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/filial/form.php')){
                             include 'views/filial/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Plan*/

                case 'new_plan':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/plan/form.php')){
                            include 'views/plan/form.php';
                       }else{
                           $NotFoundController::view();
                       }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_plan':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/plan/list.php')){
                            include 'views/plan/list.php';
                       }else{
                           $NotFoundController::view();
                       }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_plan':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('views/plan/form.php')){
                            include 'views/plan/form.php';
                       }else{
                           $NotFoundController::view();
                       }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Empresa*/

                case 'new_company':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/company/form.php')){
                             include 'controllers/company/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_company':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/company/list.php')){
                             include 'controllers/company/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_company':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/company/form.php')){
                             include 'controllers/company/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Usuarios*/

                case 'new_user':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/user/form.php')){
                             include 'controllers/user/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'list_user':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/user/list.php')){
                             include 'controllers/user/list.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                case 'edit_user':
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/user/form.php')){
                             include 'controllers/user/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                             include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;

                /*Log*/

                case 'logout':
                    $usuarioController::logout();
                    echo '<script>location.href="index.php";</script>';
                    break;

                default:
                    if(isset($_SESSION['log_user'])){
                        if(file_exists('controllers/profile/form.php')){
                            include 'controllers/profile/form.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }else{
                        if(file_exists('views/login/login.php')){
                            include 'views/login/login.php';
                        }else{
                            $NotFoundController::view();
                        }
                    }
                    break;
            }
        }
    }
?>
