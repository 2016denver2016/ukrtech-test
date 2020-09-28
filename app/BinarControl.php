<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Binar;

class BinarControl extends Binar
{
    protected $table = "binars";
   
   
    public function fillInBinar()
    {         
        
        for ($i=1; $i <= 5 ; $i++) {
            $cell = $this->where('level', '=', $i)->get()->toArray();             
            foreach ($cell as $key => $value) {
                
                for ($j=1; $j <= 2 ; $j++) { 
                 $data = array();
                 $data['parent_id'] = $value['id'];
                 $data['position'] = $j;
                 $this->createCell($data);                
                }                
            }            
            
        }

   }

   public function CellsById($id)
   {
       $cell = $this->where('id', '=', $id)->get()->toArray();
       $parent = explode(".", $cell[0]['path']);
       unset($parent[count($parent)-1]);
    
       $binarParent = array();
        foreach ($parent as $key => $value) {
            $binar = $this->where('id', $value)->get()->toArray();
            $binarParent[] = $binar[0];
        }        
    
       $binarChildren = $this->where('path', 'like', $cell[0]['path'] . '%')->get()->toArray();
       $binar = array_merge($binarParent,$binarChildren);
       
       
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
        return $arrayBinar;  

   }
}
