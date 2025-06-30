<?php
class ControllerPage {
    public function homePage(){
        $modelUser = new ModelUser();
        $users = $modelUser->getUsers();
        var_dump($users);
        require './view/page/homepage.php';
    }
}