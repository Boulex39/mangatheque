<?php
class ControllerPage
{
    public function homePage()
    {
        if (isset($_SESSION['id'])) {
            header('Location: /mangateque/login');
            exit;
        } else {
            $modelUser = new ModelUser();
            $users = $modelUser->getUsers();
            require './view/page/homepage.php';
        }
    }
}
