<?php


class Usuario
{
    private $id;
    private $name;
    private $email;
    private $senha;
    private $active;
    private $date;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function loadById($id)
    {
        $sql = new Sql();
        $results = $sql->select('SELECT * FROM users WHERE id = :ID', array(
            ':ID' => $id,
        ));
        if (count($results) > 0) {
            $row = $results[0];

            $this->setId($row['id']);
            $this->setName($row['name']);
            $this->setEmail($row['email']);
            //  $this->setSenha($row['senha']);
            $this->setActive($row['active']);
            $this->setDate(new DateTime($row['created_at']));
        }
    }

    public function getList()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM users ORDER BY name;');
    }

    public static function search()
    {
        $sql = new Sql();

        return $sql->select('SELECT * FROM users WHERE name LIKE :SEARCH ORDER BY id', array(
            '$:SEARCH' => '%'.$login.'%',
        ));
    }

    public function login($email, $senha)
    {
        $sql = new Sql();
        $results = $sql->select('SELECT * FROM users WHERE email = :EMAIL AND senha= :SENHA ', array(
            ':EMAIL' => $email,
            ':SENHA' => $senha,
        ));
        if (count($results) > 0) {
            $row = $results[0];

            $this->setId($row['id']);
            $this->setName($row['name']);
            $this->setEmail($row['email']);
            //  $this->setSenha($row['senha']);
            $this->setActive($row['active']);
            $this->setDate(new DateTime($row['created_at']));
        } else {
            throw new Exception('Email ou Senha inválidos!', 1);
        }
    }

    public function __toString()
    {
        return json_encode((array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            //'senha' => $this->getSenha(),
            'active' => $this->getActive(),
            'created_at' => $this->getDate()->format('d/m/Y'),
        )));
    }
}
