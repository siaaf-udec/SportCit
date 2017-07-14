<?php

use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

use App\Container\Users\Src\User;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
 * Rutas de Ejemplo
 *
 * Las siguientes rutas son sólo de muestras
 * y documentación de los componentes que se van a usar
 * para el desarrollo del proyecto.
 *
 * Deben ser elminadas al iniciar con el desarrollo
 * del proyecto
 */

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', function () {
        return view('material.sample');
    })->name('root');

    $controller = "\\App\\Container\\Users\\Src\\Controllers\\";
    Route::get('/container', [
        'uses' => $controller.'UserController@index',
        'as' => 'sportcit.index'
    ]);

    Route::group(['prefix' => 'components'], function () {
        //Submenu 1
        Route::get('buttons', function ()    {
            return view('examples.buttons');
        })->name('components.buttons');
        Route::get('icons', function ()    {
            return view('examples.icons');
        })->name('components.icons');

        Route::get('portlet', function ()    {
            return view('examples.portlet');
        })->name('components.portlet');

        Route::get('sidebar', function ()    {
            return view('examples.sidebar');
        })->name('components.sidebar');

        Route::get('datatables', function ()    {
            return view('examples.datatables');
        })->name('components.datatables');

        Route::get('datatables/index',[
            'as' => 'components.datatables.data',
            'uses' => function (Request $request)    {
                if($request->ajax()){
                    return Datatables::of(User::all())
                        ->addIndexColumn()
                        ->make(true);
                }else{
                    return response()->json([
                        'message' => 'Incorrect request',
                        'code' => 412
                    ],412);
                }
            }]);

    });

    Route::group(['prefix' => 'forms'], function () {
        Route::get('fields', function ()    {
            return view('examples.fields');
        })->name('forms.fields');
        Route::get('validation', function ()    {
            return view('examples.validation');
        })->name('forms.validation');
    });

    Route::group(['prefix' => 'user'], function () {
        $controller = "\\App\\Container\\Users\\Src\\Controllers\\";
        Route::get('profile',[
            'uses' => $controller.'ProfileController@index',
            'as' => 'user.profile'
        ]);
        Route::post('profile/update/{id}',[
            'uses' => $controller.'ProfileController@update',
            'as' => 'user.profile.update'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'organization'], function () {
        $controller = "\\App\\Container\\SportCit\\Src\\Controllers\\";
        Route::get('create',[
            'uses' => $controller.'OrganizationController@index',
            'as' => 'organization.create'
        ]);
    });

    Route::group(['prefix' => 'permissions'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index',[
            'uses' => $controller.'PermissionController@index',
            'as' => 'permissions.index'
        ]);
        Route::get('data',[
            'uses' => $controller.'PermissionController@data',
            'as' => 'permissions.data'
        ]);
        Route::post('store',[
            'uses' => $controller.'PermissionController@store',
            'as' => 'permissions.store'
        ]);
        Route::post('update/{id?}',[
            'uses' => $controller.'PermissionController@update',
            'as' => 'permissions.update'
        ])->where(['id' => '[0-9]+']);
        Route::delete('delete/{id?}',[
            'uses' => $controller.'PermissionController@destroy',
            'as' => 'permissions.destroy'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'roles'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index',[
            'uses' => $controller.'RoleController@index',
            'as' => 'roles.index'
        ]);
        Route::get('data',[
            'uses' => $controller.'RoleController@data',
            'as' => 'roles.data'
        ]);
        Route::post('store',[
            'uses' => $controller.'RoleController@store',
            'as' => 'roles.store'
        ]);
        Route::post('update/{id?}',[
            'uses' => $controller.'RoleController@update',
            'as' => 'roles.update'
        ])->where(['id' => '[0-9]+']);
        Route::delete('delete/{id?}',[
            'uses' => $controller.'RoleController@destroy',
            'as' => 'roles.destroy'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'role/permission'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index',[
            'uses' => $controller.'RolePermissionController@index',
            'as' => 'roles.permission.index'
        ]);
        Route::get('data/role',[
            'uses' => $controller.'RolePermissionController@show_roles',
            'as' => 'roles.permission.data.role'
        ]);
    });

});




/*
 * Fin de las rutas de ejemplo.
 */
Auth::routes();