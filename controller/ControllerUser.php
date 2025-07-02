<?php
class ControllerUser {
    public function oneUserById(int $id) {
        $modelUser = new ModelUser();
        $user = $modelUser->getOneUserByid($id);
         if($user == null) {
            http_response_code(404);
            require './view/404.php';
            exit;
         }

         require './view/user/one-user.php';
    }

    public function deleteUser(int $id) {
        $modelUser = new ModelUser();
        $user = $modelUser->getOneUserByid($id);
         if($user == null) {
            http_response_code(404);
            require './view/404.php';
            exit;
         }

         $modelUser->deleteUserById($id);
    }
}
