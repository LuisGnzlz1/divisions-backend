<?php

namespace App\Http\Controllers;

use App\Http\Requests\DivisionRequest;
use App\Http\Requests\ListSubdivisionRequest;
use App\Models\Division;
use DB;

class DivisionController extends Controller
{
    public function show($id)
    {
        $model = Division::findOrFail($id);
        return response()->json(['code' => 200, 'data' => $model]);
    }

    public function create(DivisionRequest $request)
    {
        DB::beginTransaction();

        try{
            $input = $request->all();
            Division::create($input);
            DB::commit();
            return response()->json(['code' => 200, 'msj' => 'Division creada exitosamente']);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'msj' => 'Ocurrio un problema al crear la division. Consulte al administrador' ]);
        }
    }

    public function delete($id)
    {
        $model = Division::findOrFail($id);
        $model->delete();
        return response()->json(['code' => 200, 'msj' => 'Division removida exitosamente']);
    }

    public function update(DivisionRequest $request)
    {
        DB::beginTransaction();

        try{
            $input = $request->all();
            $divisionid = array_key_exists('id', $request->all()) ? $request->all()['id'] : null;

            if(!$divisionid) {
                return response()->json(['code' => 200, 'msj' => 'El id de la Division es obligatorio para actualizar']);
            }
            $model = Division::where('id', $divisionid)->update($input);
            DB::commit();
            return response()->json(['code' => 200, 'msj' => 'Division actualizada exitosamente']);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['code' => 500, 'msj' => 'Ocurrio un problema al modificar division. Consulte al administrador' ]);
        }
    }

    public function all()
    {
        $model = Division::all();
        return response()->json(['code' => 200, 'data' => $model]);
    }

    public function listSubdivision($id)
    {
        $model = [];
        if(is_numeric($id)){
            $model = Division::where('parent_division_id', $id)->get();
        }
        return response()->json(['code' => 200, 'data' => $model]);
    }
}
