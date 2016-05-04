<?php

namespace App\Contracts;

use Illuminate\Http\Request;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * 
 */
interface RepositoryInterface {
    
    public function getAll();    
    
    public function find($id);    

    public function create(Request $request);

    public function update(Request $request, $id);

    public function delete($id);
}
