<?php

namespace yogaclass\src\Controller;
use Illuminate\Http\Request;
class YogaClassController extends Controller{

    public function getAllYogaClasses(){
        return response()->json("Hello getAllYogaClasses");
    }

}