<?php
/**
 * Created by PhpStorm.
 * User: Ishan
 * Date: 8/17/18
 * Time: 4:57 PM
 */
namespace App\Http\Controllers;

use App\Models\Team;

class TeamsController extends Controller{

    public function getAll(){

        $teams = Team::all();
        return response()->json($teams, 200);
    }

}
