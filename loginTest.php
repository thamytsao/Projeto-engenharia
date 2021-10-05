<?php

use function PHPUnit\Framework\assertEquals;
class loginTest extends \Codeception\Test\Unit
{
    /**
     * @var \ExemplosTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }
    // LOGINS CORRETOS

    // tests
    public function testLoginDiretorCorreto()
    {
        $stringDeConexao = mysqli_connect('Localhost', 'root', '', 'teste');
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($stringDeConexao, $sql);

        $registro  = mysqli_fetch_array($resultado);

        $usuarioC = $registro['usuario'];
        $senha = $registro ['senha']; 

        assertEquals("123", $usuarioC);
        //assertEquals('321', $senha);
    }

    // test
    public function testLoginPorteiroCorreto(){
        $stringDeConexao = mysqli_connect('Localhost', 'root', '', 'teste');
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($stringDeConexao, $sql);
        $cont = 0;
        while($registro  = mysqli_fetch_array($resultado)){
            $usuarioC = $registro['usuario'];
            if($cont >= 1){
                break;
            }
            $cont++;
        }

        assertEquals("456", $usuarioC);
    }

    // test
    public function testLoginResponsavelCorreto(){
        $stringDeConexao = mysqli_connect('Localhost', 'root', '', 'teste');
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($stringDeConexao, $sql);
        $cont = 0;
        while($registro  = mysqli_fetch_array($resultado)){
            $usuarioC = $registro['usuario'];
            if($cont >= 2){
                break;
            }
            $cont++;
        }

        assertEquals("789", $usuarioC);
    }

    //LOGINS ERRADOS
    // tests
    public function testLoginDiretorErrado()
    {
        $stringDeConexao = mysqli_connect('Localhost', 'root', '', 'teste');
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($stringDeConexao, $sql);
        $registro  = mysqli_fetch_array($resultado);
        $usuarioC = $registro['usuario'];

        assertEquals("111", $usuarioC);
    }

    // test
    public function testLoginPorteiroErrado(){
        $stringDeConexao = mysqli_connect('Localhost', 'root', '', 'teste');
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($stringDeConexao, $sql);
        $cont = 0;
        while($registro  = mysqli_fetch_array($resultado)){
            $usuarioC = $registro['usuario'];
            if($cont >= 1){
                break;
            }
            $cont++;
        }

        assertEquals("222", $usuarioC);
    }

    public function testLoginResponsavelErrado(){
        $stringDeConexao = mysqli_connect('Localhost', 'root', '', 'teste');
        $sql = "SELECT * FROM usuario";
        $resultado = mysqli_query($stringDeConexao, $sql);
        $cont = 0;
        while($registro  = mysqli_fetch_array($resultado)){
            $usuarioC = $registro['usuario'];
            if($cont >= 2){
                break;
            }
            $cont++;
        }

        assertEquals("333", $usuarioC);
    }

}