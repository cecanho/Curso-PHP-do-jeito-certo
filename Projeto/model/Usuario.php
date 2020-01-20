<?php
/**
 * Created by PhpStorm.
 * User: Cristiano
 * Date: 18/01/2020
 * Time: 14:57
 */

class Usuario
{
    private $login;
    private $password;
    private $nome;
    private $last_access;

    public  function conn()
    {
        //conexão com o banco de dados
        require_once '../../rb-mysql.php';
        R::setup( 'mysql:host=localhost;dbname=phpdojeitocerto', 'root', '' );
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getLastAccess()
    {
        return $this->last_access;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setLastAccess($last_access)
    {
        $this->last_access = $last_access;
    }

    public function getOneUser($login)
    {
        try {
            //recuperar informação
            $result = R::find('usuario', ' login LIKE ? ', [ $login ]);
            foreach($result as $row)
            if (isset($result)) {
                    $this->setLogin($row['login']);
                    $this->setPassword($row['password']);
                    $this->setNome($row['nome']);
                    $this->setLastAccess($row['last_access']);
            }else{
                echo 'Email não cadastrado, ou inválido';
            }
        }catch (exception $e){
            echo 'Falha de conexão: ' . $e;
        }
    }

    public function newUser(Usuario $u)
    {
        $usuario = R::dispense( 'usuario' );

        //preparando o bean
        $usuario->login = $u->getLogin();
        $usuario->password = password_hash($u->getPassword());
        $usuario->nome = $u->getNome();
        $usuario->last_access = date(DATE_RFC822);

        try {
            $id = R::store($usuario);
        }catch (exception $e){
            echo 'Falha ao gravar no banco de dados: ' . $e;
        }
    }

    public function updateUser(Usuario $u)
    {
        $usuario = R::dispense( 'usuario' );

        //recuperar informação
        $result = R::find('usuario', ' login LIKE ? ', [ $u->getLogin() ]);

        //recupera o id para update do mesmo bean
        foreach($result as $row) {
            $usuario->id = $row['id'];
            $usuario->password = $row['password'];
        }

        //preparando o bean
        $usuario->login = $u->getLogin();
        if (strcmp($usuario->password, $u->getPassword())!=0) {
            $usuario->password = md5($u->getPassword());
        }
        $usuario->nome = $u->getNome();
        $usuario->last_access = date(DATE_RFC822);

        try {
            R::store( $usuario );
        }catch (exception $e){
            echo 'Falha ao gravar no banco de dados: ' . $e;
        }
    }
}