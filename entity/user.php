<?php
class User {
    private int $id = 12;
    private string $pseudo = 'toto';
    private string $email = 'toto@gmail.com';
    private string $password = '123456';
    private DateTimeImmutable $created_at;

    public function __construct($id, $pseudo, $email, $password){
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->password = $password;
    }


    public function getId() : int {
        return $this->id;
    }

    public function setId(int $id) : void {
        $this->id = $id;
    }

    public function getPseudo() : string {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo) : void {
        $this->pseudo = $pseudo;
    }

       public function getEmail() : string {
        return $this->email;
    }

    public function setEmail(string $email) : void {
        $this->email = $email;
    }

       public function getPassword() :string {
        return $this->password;
    }

    public function setPassword(string $password) :void {
        $this->password = $password;
    }

    public function getCreated_at() : DateTimeImmutable {
        return $this->created_at;
    }

    // public function setCreated_at()

}