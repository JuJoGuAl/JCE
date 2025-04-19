<?php
namespace App\Entities;

use App\Core\EntidadBase;

class Usuarios extends EntidadBase {
    public function __construct() {
        parent::__construct('adm_usuarios', 'cusuario',[
            //['name' => 'cusuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'cusuario', 'type' => 'public', 'insert' => true, 'update' => false],
            ['name' => 'clave', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'nombre', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'status', 'type' => 'public', 'insert' => true, 'update' => true],
            ['name' => 'creacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(creacion_fecha, '%d/%m/%Y %T')", 'insert' => false, 'update' => false],
            ['name' => 'creacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'creacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_fecha', 'type' => 'system', 'definition' => "DATE_FORMAT(actualizacion_fecha, '%d/%m/%Y %T')", 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_usuario', 'type' => 'system', 'insert' => false, 'update' => false],
            ['name' => 'actualizacion_IP', 'type' => 'system', 'insert' => false, 'update' => false],
        ]);
    }

    /**
     * Autenticar usuario.
     * @param string $user Nombre de usuario.
     * @param string $pass Contraseña en texto plano.
     * @return array Retorna los datos del usuario si la autenticación es exitosa.
     * @throws \Exception Si el usuario o clave son inválidos o el usuario está inactivo (excepto si es administrador).
     */
    public function logUser(string $user, string $pass): array
    {
        $usuario = strtoupper($user);
        $claveMd5 = md5($pass);
        $filtros = [
            ['column' => 'cusuario', 'operator' => '=', 'value' => $usuario],
            ['column' => 'clave', 'operator' => '=', 'value' => $claveMd5],
        ];
        $resultado = $this->findAll($filtros);

        // Validar resultados
        if (empty($resultado)) {
            throw new \Exception('Usuario o clave inválidos.');
        }

        $usuarioData = $resultado[0];
        if ((int) $usuarioData['status'] === 0 && $usuarioData['cusuario'] !== 'ADMINISTRADOR') {
            throw new \Exception('El usuario está inactivo.');
        }

        return $usuarioData;
    }
}
