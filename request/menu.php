<?php

    include 'controllers/NotFoundController.php';
    include 'controllers/loginController.php';

    class menu{

        function __construct($var1 = "", $var2 = "") 
        {
            $this->var1 = $var1;
            $this->var2 = $var2;
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
                    if($this->var2 == 5)
                        $this->goto_page('views/titular/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_titular':
                    if($this->var2 == 5)
                        $this->goto_page('views/titular/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_titular':
                    if($this->var2 == 5)
                        $this->goto_page('views/titular/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;

                /*Estudiante*/

                case 'new_estudiante':
                    if($this->var2 == 5)
                        $this->goto_page('views/estudiante/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_estudiante':
                    if($this->var2 == 5)
                        $this->goto_page('views/estudiante/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_estudiante':
                    if($this->var2 == 5)
                        $this->goto_page('views/estudiante/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;

                /*Pais*/

                case 'new_pais':
                    if($this->var2 == 5)
                        $this->goto_page('views/pais/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_pais':
                    if($this->var2 == 5)
                        $this->goto_page('views/pais/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_pais':
                    if($this->var2 == 5)
                        $this->goto_page('views/pais/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;

                /*Departamento*/

                case 'new_departamento':
                    if($this->var2 == 5)
                        $this->goto_page('views/departamento/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_departamento':
                    if($this->var2 == 5)
                        $this->goto_page('views/departamento/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_departamento':
                    if($this->var2 == 5)
                        $this->goto_page('views/departamento/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;

                /*Ciudad*/

                case 'new_ciudad':
                    if($this->var2 == 5)
                        $this->goto_page('views/ciudad/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_ciudad':
                    if($this->var2 == 5)
                        $this->goto_page('views/ciudad/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_ciudad':
                    if($this->var2 == 5)
                        $this->goto_page('views/ciudad/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;

                /*Filial*/

                case 'new_filial':
                    if($this->var2 == 5)
                        $this->goto_page('views/filial/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_filial':
                    if($this->var2 == 5)
                        $this->goto_page('views/filial/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_filial':
                    if($this->var2 == 5)
                        $this->goto_page('views/filial/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;

                /*Plan*/

                case 'new_plan':
                    if($this->var2 == 5)
                        $this->goto_page('views/plan/form.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'list_plan':
                    if($this->var2 == 5)
                        $this->goto_page('views/plan/list.php');
                    else
                        $this->goto_page('views/home/list.php');
                    break;
                case 'edit_plan':
                    if($this->var2 == 5)
                        $this->goto_page('views/plan/form.php');
                    else
                        $this->goto_page('views/home/list.php');
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
