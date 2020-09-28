
@extends('layouts.app')
   @section('content')
     
    `   <div class="title m-b-md">
           Бинар
        </div>
        <div class="links">                    
            <a href="/binar">Показать весь бинар</a>
            <!-- <a href="https://vapor.laravel.com">Показать бинар</a> -->
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
        
            <?php 
                
                function createtree(&$binar,&$i = 0){
                    $arrayResult = array();
                   
                    foreach($binar as $key => $value){
                        
                            echo'<div class ="level'.$value['level'].'">'.$value['path'].'</div>';
                            
                        
                        $i++;                    
                        if(isset($value['children'])){
                            createtree($value['children'],$i);
                        }                                
                    }                       
                }
                createtree($binar);
            ?>
            
        <!-- <button type="button" class="btn btn-secondary">Добавить ячейку</button> -->
    
    @endsection

