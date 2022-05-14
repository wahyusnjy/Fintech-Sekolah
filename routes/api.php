<?php

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/topup', function () {
    $saldo = Saldo::where("user_id", Auth::user()->id)->first();

    return response()->json([
        "status" => 200,
        "message" => "Berhasil Top Up, Menunggu Konfirmasi",
        "data" => $saldo
    ]);
});

Route::prefix('data_user')->group(function (){
    Route::get('/', function () {
        $users = User::all();

        return response()->json([
            "status" => 200,
            "message" => "Berhasil Mengambil Data User",
            "data"  => $users
        ]);
    });

    Route::post('/add', function (Request $request) {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
            'role_id' => ['required', 'numeric']
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->name),
            "role_id" =>$request->role_id,
        ]);

        if($user->role_id == 4){
           $saldo = Saldo::create([
                         "user_id"=> $user->id,
                         "saldo"=> 0,
                      ]);
        }
        return response()->json([
            "status" => 200,
            "message" => "Berhasil Menambahkan User Dan Saldo Awal",
            "data" =>[$user, $saldo]
            ]);
     Route::put('/edit/{id}', function (Request $request, $id) {
                if($request->password == null){
                 $userer = User::find($id)->update([
                        "name" =>$request->name,
                        "email"=>$request->email,
                        "role_id"=>$request->role_id,
                    ]);
                    return response()->json([
                        "status" => 200,
                        "message" => "Berhasil Mengedit User",
                        "data" => $userer
                    ]);
                }
              $userer2 =  User::find($id)->update([
                        "name" =>$request->name,
                        "email"=>$request->email,
                        "password"=>Hash::make($request->password),
                        "role_id"=>$request->role_id
                ]);
                return response()->json([
                    "status" => 200,
                    "message" => "Berhasil Mengedit User",
                    "data" => $userer2
                ]);
            });


            Route::get('/delete/{id}', function ($id) {
                $user = User::find($id);

                $saldo = Saldo::where("user_id", $user->id)->delete();

                $user->delete();

                return response()->json([
                    "status" => 200,
                    "message" => "Berhasil Menghapus User & Saldo",
                    "data" => [$user , $saldo]
                ]);
                return redirect()->back()->with("status","Berhasil Menghapus User & Saldo");
            });
        });
    });
