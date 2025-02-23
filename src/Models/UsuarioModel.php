<?php

namespace Preflex\Models;

use Exception;
use Illuminate\Database\Capsule\Manager as DB;

class UsuarioModel
{

    public function __construct()
    {}

    /**
     * @throws Exception
     */
    public function getAll()
    {
        try {
            return DB::table('usuarios')->get();
        } catch (\Illuminate\Database\QueryException $e) {
            error_log('Erro na consulta SQL: ' . $e->getMessage());
            throw new Exception('Ocorreu um erro ao buscar os usuários.');
        } catch (Exception $e) {
            error_log('Erro desconhecido: ' . $e->getMessage());
            throw new Exception('Ocorreu um erro inesperado.' . $e->getMessage());
        }
    }

    /**
     * @throws Exception
     */
    public function create(array $data)
    {
        try {
            DB::table('usuarios_dados_pessoais')->insert($data);
            DB::table('usuarios')->insert($data);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = 'Ocorreu um erro ao tentar criar o usuário: ' . $e->getMessage();
            error_log($errorMessage);
            throw new Exception('Ocorreu um erro ao tentar criar o usuário.');
        } catch (Exception $e) {
            $errorMessage = 'Erro desconhecido: ' . $e->getMessage();
            error_log($errorMessage);
            throw new Exception('Ocorreu um erro inesperado.');

        }
    }

}
