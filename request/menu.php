<?php

    include 'controllers/NotFoundController.php';
    include 'controllers/loginController.php';

    class menu{

        function __construct($var1 = "") 
        {
            $this->var1 = $var1;
        }

        function menu_admin()
        {
            $loginController = new loginController();

            switch($this->var1) {

                /*Home*/
                case 'home':
                    $this->goto_page('views/home/list.php');
                    break;

                /*Perfil*/
                case 'profile':
                    $this->goto_page('views/profile/form.php');
                    break;

                /*Titular*/

                case 'new_titular':
                    $this->goto_page('views/titular/form.php');
                    break;
                case 'list_titular':
                    $this->goto_page('views/titular/list.php');
                    break;
                case 'edit_titular':
                    $this->goto_page('views/titular/form.php');
                    break;

                /*Estudiante*/

                case 'new_estudiante':
                    $this->goto_page('views/estudiante/form.php');
                    break;
                case 'list_estudiante':
                    $this->goto_page('views/estudiante/list.php');
                    break;
                case 'edit_estudiante':
                    $this->goto_page('views/estudiante/form.php');
                    break;

                /*Pais*/

                case 'new_pais':
                    $this->goto_page('views/pais/form.php');
                    break;
                case 'list_pais':
                    $this->goto_page('views/pais/list.php');
                    break;
                case 'edit_pais':
                    $this->goto_page('views/pais/form.php');
                    break;

                /*Departamento*/

                case 'new_departamento':
                    $this->goto_page('views/departamento/form.php');
                    break;
                case 'list_departamento':
                    $this->goto_page('views/departamento/list.php');
                    break;
                case 'edit_departamento':
                    $this->goto_page('views/departamento/form.php');
                    break;

                /*Ciudad*/

                case 'new_ciudad':
                    $this->goto_page('views/ciudad/form.php');
                    break;
                case 'list_ciudad':
                    $this->goto_page('views/ciudad/list.php');
                    break;
                case 'edit_ciudad':
                    $this->goto_page('views/ciudad/form.php');
                    break;

                /*Filial*/

                case 'new_filial':
                    $this->goto_page('views/filial/form.php');
                    break;
                case 'list_filial':
                    $this->goto_page('views/filial/list.php');
                    break;
                case 'edit_filial':
                    $this->goto_page('views/filial/form.php');
                    break;

                /*Plan*/

                case 'new_plan':
                    $this->goto_page('views/plan/form.php');
                    break;
                case 'list_plan':
                    $this->goto_page('views/plan/list.php');
                    break;
                case 'edit_plan':
                    $this->goto_page('views/plan/form.php');
                    break;

                /*Log*/

                case 'logout':
                    $loginController::logout();
                    echo '<script>location.href="index.php";</script>';
                    break;

                default:
                    $this->goto_page('views/home/list.php');
                    break;
            }
        }

        function goto_page($view)
        {
            $NotFoundController = new NotFoundController();

            if(isset($_SESSION['log_user']) && file_exists($view))
                include $view;
            else if(!isset($_SESSION['log_user']) && file_exists('views/login/login.php'))
                include 'views/login/login.php';
            else
                $NotFoundController::view();
        }
    }
?>
