<?php
namespace NFHub\Easy;

use Exception;
use NFHub\Common\Tools as ToolsBase;
/**
 * Classe Tools
 *
 * Classe responsável pela comunicação com a API do Easy do FuganholiSistemas
 *
 * @category  NFEasy
 * @package   FuganholiSistemas\NFEasy\Tools
 * @author    Call Seven <callseven7 at gmail dot com>
 * @copyright 2024  Fuganholi Sistemas - NFSERVICE
 * @license   https://opensource.org/licenses/MIT MIT
 */
class Tools extends ToolsBase
{

    /**
     * Lista os Bancos cadastrados no Easy
     *
     * @param int $company_id ID da empresa a ser verificada
     * @param array $params Parametros adicionais para a requisição
     *
     * @access public
     * @return array
     */
    function listBanks(int $company_id, array $params = []) :array
    {
        try {
            $params = array_filter($params, function($item) {
                return $item['name'] !== 'company_id';
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($company_id)) {
                $params[] = [
                    'name' => 'company_id',
                    'value' => $company_id
                ];
            }

            $dados = $this->get('/listBanks', $params);

            if (!isset($dados['body']->message)) {
                return $dados;
            }

            throw new Exception($dados['body']->message, 1);
        } catch (Exception $error) {
            throw new Exception($error, 1);
        }
    }

    /**
     * Lista as Categorias cadastradas no Easy
     *
     * @param int $company_id ID da empresa a ser verificada
     * @param array $params Parametros adicionais para a requisição
     *
     * @access public
     * @return array
     */
    function listCategories(int $company_id, array $params = []) :array
    {
        try {
            $params = array_filter($params, function($item) {
                return $item['name'] !== 'company_id';
            }, ARRAY_FILTER_USE_BOTH);

            if (!empty($company_id)) {
                $params[] = [
                    'name' => 'company_id',
                    'value' => $company_id
                ];
            }

            $dados = $this->get('/listBanks', $params);

            if (!isset($dados['body']->message)) {
                return $dados;
            }

            throw new Exception($dados['body']->message, 1);
        } catch (Exception $error) {
            throw new Exception($error, 1);
        }
    }
}
