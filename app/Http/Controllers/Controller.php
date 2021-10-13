<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use App\Exceptions\Handler;
use Exception;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    const TABLE_LIST    = 0;
    const TABLE_EXTERNO = 1;

    const ERROR_VERIFY_ID = 'O código informado não corresponde com o código da validação';

    private $route;
    private $id;


    public function getId()
    {
        return $this->id;
    }

    public function getRoute()
    {
        return $this->route;
    }

    public function setRoute($route)
    {
        $this->route = $route;
    }

    public function saveIdToVerify($id)
    {
        $this->id = $id;
    }

    public function verifyId($idQuestionado)
    {
        try {
            if ($this->id != $idQuestionado) {
                return true;
            }
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getDataTable($list, $route, $type)
    {
        $this->setRoute($route);

        switch ($type) {
            case self::TABLE_LIST:
                return DataTables::of($list)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return [
                        'id' => $item->id,
                        'route' => $this->getRoute()
                    ];
                })
                ->rawColumns(['action'])
                ->make(true);
                break;

            case self::TABLE_EXTERNO:
                return DataTables::of($list)
                ->addIndexColumn()
                ->addColumn('action', function($item){
                    return [
                        'id' => $item->id,
                    ];
                })
                ->rawColumns(['action'])
                ->make(true);
                break;
            default:
                # code...
                break;
        }

    }


    /**
     * @param $model Classe
     * @param $id Código
     */
    public function listDataAndMessage($model, $id)
    {
        if (isset($id)) {
            $data = DB::table($model::TABLE)->where('id', $id)->get()->first();
            if ($data !== null) {
                $message = $model::SINGULAR . ' retornado com sucesso!';
            } else {
                $message = 'Não há esse registro em nossos dados!';
            }
        } else {
            $data = DB::table($model::TABLE)->orderBy('id')->get();
            $message = $model::SINGULAR . ' retornados com sucesso!';
        }
        return [$data, $message];
    }

    public static function responseJsonSuccess(array $data)
    {
        return response()->json((
            array_merge(['success' => true], $data)
        ), 200);
    }

    public static function responseJsonFailed(array $data, Exception $error)
    {
        return response()->json((
            Handler::returnError($data, $error)
        ), Handler::getHttpStatusCode($error));
    }

}
