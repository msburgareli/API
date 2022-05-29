<?php
    use Illuminate\Support\Facades\Validator;

    function is_sqlinjection($paramName, $paramType, $input){
        $validator = Validator::make([$paramName => $input], [
            $paramName => $paramType
        ]);
        
        if ($validator->fails()) {
            return true;
        }else {
            return false;
        }
    }
?>