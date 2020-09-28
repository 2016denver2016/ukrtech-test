
@extends('layouts.app')
   @section('content')
     
    `   <div class="title m-b-md">
           Бинар
        </div>
        <div class="links">                    
            <a href="/binar">Показать бинар</a>
            <!-- <a href="https://vapor.laravel.com">Показать бинар</a> -->
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
        <a type="button" href="/binar/fill-in-binar" class="fill-binar btn btn-primary">Заполнить бинар</a>
            <?php 
                
                function createtree(&$binar,&$i = 0){
                    $arrayResult = array();
                   
                    foreach($binar as $key => $value){
                        if($i > 0){
                            echo'<div class ="level'.$value['level'].'">'.$value['path'].'
                            <a type="button" href="/binar/cell/delete/'.$value['id'].'" class="btn-delete btn btn-link">delete</a>
                            <a type="button" href="/binar/get-cell-by-id/'.$value['id'].'" >get cell by id</a></div>';
                            
                        }else{
                            echo'<div class ="level'.$value['level'].'">'.$value['path'].'</div>';
                        }
                        $i++;                    
                        if(isset($value['children'])){
                            createtree($value['children'],$i);
                        }                                
                    }                       
                }
                createtree($binar);
            ?>
            <div class="container">
                <form id="myForm" method="post" action="/binar/create-cell">                   
                    <div class="form-group row">
                    <label for="parent_id" class="col-3 col-form-label">parent_ID</label>
                    <div class="col-5">
                        <input type="text" class="form-control" id="parent_id" name="parent_id">
                    </div>
                    </div>
                    <div class="form-group row">
                    <label for="position" class="col-3 col-form-label">position</label>
                    <div class="col-5">
                        <input type="text" class="form-control" id="position" name="position">
                    </div>
                    </div>
                    <div class="form-group row">
                    <div class="offset-3 col-5">
                        <button type="submit" class="btn btn-primary">Добавить ячейку</button>
                    </div>
                    </div>
                </form>
            </div>
        <!-- <button type="button" class="btn btn-secondary">Добавить ячейку</button> -->
    
    @endsection

