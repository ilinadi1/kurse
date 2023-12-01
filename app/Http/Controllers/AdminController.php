<?php

namespace App\Http\Controllers;
use App\Models\Aplication;
use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class AdminController extends Controller
{


    public function index(){
        $aplications = Aplication::all();
        foreach($aplications as $key=>$item){
            $aplications[$key]->course_id = $this->get_course_from_id($item->course_id);
        }

        return view("admin.admin", [
            "all_aplications"=>$aplications,
            "categories" =>Category::all()
        ]);
        
    }
    protected function get_course_from_id($id_course){
    return Course::find($id_course)->title;
}
}
