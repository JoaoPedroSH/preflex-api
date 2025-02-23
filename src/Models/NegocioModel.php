<?php

namespace Preflex\Models;

use Exception;
use Illuminate\Database\Capsule\Manager as DB;

class NegocioModel
{

    public function __construct()
    {}

    /**
     * @throws Exception
     */
    public function getAll(): \Illuminate\Support\Collection
    {
        try {
            return DB::table('negocios')->get();
        } catch (\Illuminate\Database\QueryException $e) {
            error_log('Erro na consulta SQL: ' . $e->getMessage());
            throw new Exception('Ocorreu um erro ao buscar os usuários.');
        } catch (Exception $e) {
            error_log('Erro desconhecido: ' . $e->getMessage());
            throw new Exception('Ocorreu um erro inesperado.');
        }

    }

    public function create(array $data): bool
    {
        try {
            DB::table('negocios')->insert($data);
            return true;
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = 'Ocorreu um erro ao tentar criar o negócio: ' . $e->getMessage();
            error_log($errorMessage);
            throw new Exception('Ocorreu um erro ao tentar criar o negócio.');
        } catch (Exception $e) {
            $errorMessage = 'Erro desconhecido: ' . $e->getMessage();
            error_log($errorMessage);
            throw new Exception('Ocorreu um erro inesperado.');

        }

    }

}
