<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::all()->reverse());
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $item = User::find($id);
        $item->update($request->all());
        return $item;
    }
}
