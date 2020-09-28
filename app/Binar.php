<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class Binar extends Model
{
   public function createCell($data){
      
        $binarCell = $this->where('parent_id', '=', $data['parent_id'])->where('position', '=', $data['position'])->get()->first();            
            if(!$binarCell){                
                if($this->where('id', '=', $data['parent_id'])->exists()){
                    $parentCell = $this->where('id', '=', $data['parent_id'])->get()->toArray();
                    $statement = DB::select("show table status like 'binars'");
                    $data['path'] = $parentCell[0]['path'].'.'.$statement[0]->Auto_increment;
                    $data['level'] = $parentCell[0]['level'] + 1;
                    if($data['level'] > 6){
                        return Response::json(['success' => false, 'messages' => 'Unable to create cell max binar level 6'],400);
                    }                
                    try {                
                        $parentCell = $this->insert($data);
                    } catch (\Throwable $th) {
                        return $th;
                    }
                }else{
                    return Response::json(['success' => false, 'messages' => 'Parent_id not found'],404); 
                }
            }else{
                 return Response::json(['success' => false, 'messages' => 'Cell exists'],417);
            }
            return  Response::json(['success' => true],200);

   }
}
