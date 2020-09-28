<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Binar;
use App\BinarControl;


class BinarController extends Controller
{
    public function getBinar() {

        $binar = Binar::orderBy('parent_id', 'ASC')->get()->toArray();
        function createtree(&$binar,$parentId = 0){
            $arrayResult = array();
            foreach($binar as $key => $value){
                if($value['parent_id'] == $parentId) {
                    $result = array(
                        'id' => $value['id'],
                        'name' => $value['path'],
                        'pid' => $value['parent_id'],
                        'level' => $value ['level'],
                        'path' => $value['path']
                    );
                    //echo'<div class ="level'.$value['level'].'">'.$value['path'].'</div>';
                    unset($binar[$key]);
                    $children = createtree($binar, $value['id']);
                    if (count($children) > 0) {
                        $result['children'] = $children;                
                    }
                    $arrayResult[] = $result;
                }
            }
            return $arrayResult;
        }
        $arrayBinar = createtree($binar);

        return view('show-binar')->with('binar', $arrayBinar);

    }


    public function createCell(Request $request) {   
        $this->validate(request(), [
            'position' => 'required|regex:([1-2])',
        ]);
       
        $data = $request->all(); 
          
        if($data){
            $model = new BinarControl();
            $response = $model->createCell($data);
            
            return $response;
        }
        
    }
    public function deleteCell($id)
    {      
            
            $cell = Binar::where('id', '=', $id)->get()->toArray();
            if($cell){                
                try {                
                    $delete = Binar::where('path', 'like', $cell[0]['path'] . '%')->delete();
                } catch (\Throwable $th) {
                    return $th;
                }               
                return redirect()->action('BinarController@getBinar');         

            }else{
                return Response::json(['success' => false, 'messages' => 'Cell not found'],404);
            }
            
    }
    public function fillInBinar()
    {            
        $model = new BinarControl();
        $response = $model->fillInBinar();
        return redirect()->action('BinarController@getBinar');    
    }
    
    public function getCellById($id)
    {
        $model = new BinarControl();
        $response = $model->CellsById($id);
        return view('show-by-id')->with('binar', $response);
    }
}
