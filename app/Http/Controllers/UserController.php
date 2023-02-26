<?php

namespace App\Http\Controllers;

use App\Models\User;
// use App\Transformer\UserTransformer;
use App\Repository\UsersRepository;
// use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use Laravel\Passport\Bridge\UserRepository;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Middleware;
use GuzzleHttp\Client;
use App\Http\Resources\UserResource;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    // use Helpers;
    
    protected $userRepository;
    // protected $userTransformer;



    public function __construct(UsersRepository $userRepository){
        $this->userRepository = $userRepository;
        // $this->userTransformer = $userTransformer;
    }

    public function show(Request $request){
      $verifiedUser = $request->user()->verified;
      
      if ($verifiedUser == false) {
       
        return "You're account is not verified";
      }
      else {
        $users = $this->userRepository->getAll();

        $response = collect($users, new UserResource($users));
        return $response;
      } 
    }
    public function showById($id){
        $user = $this->userRepository->getByID($id);
        // $response = $this->response->item($user, $this->userTransformer);
        return $response;
    }
    public function showUserDetails(Request $request){
      $user =  $request->user('api');
      $response = new UserResource($user);
      return $response;
    }
     public function register(Request $request){
        $this->validate($request, [
         'first_name' => 'required|string',
         'last_name' => 'required|string',
         'email' => 'required|string',
         'contact_no' => 'required|digits:11',
         'password' => 'required|string'
        ]);
        $user = $this->userRepository->store($request);
        $response = new UserResource($user);

        return $response;
    }
}
