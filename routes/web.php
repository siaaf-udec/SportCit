<?php

use App\Events\StateOrganizationModified;
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

    Route::get('/mail', function () {
        return view('mail.index');
    })->name('root');

    $controller = "\\App\\Container\\Users\\Src\\Controllers\\";
    Route::get('/container', [
        'uses' => $controller . 'UserController@index',
        'as' => 'sportcit.index'
    ]);

    Route::group(['prefix' => 'components'], function () {
        //Submenu 1
        Route::get('buttons', function () {
            return view('examples.buttons');
        })->name('components.buttons');
        Route::get('icons', function () {
            return view('examples.icons');
        })->name('components.icons');

        Route::get('portlet', function () {
            return view('examples.portlet');
        })->name('components.portlet');

        Route::get('sidebar', function () {
            return view('examples.sidebar');
        })->name('components.sidebar');

        Route::get('datatables', function () {
            return view('examples.datatables');
        })->name('components.datatables');

        Route::get('datatables/index', [
            'as' => 'components.datatables.data',
            'uses' => function (Request $request) {
                if ($request->ajax()) {
                    return Datatables::of(User::all())
                        ->addIndexColumn()
                        ->make(true);
                } else {
                    return response()->json([
                        'message' => 'Incorrect request',
                        'code' => 412
                    ], 412);
                }
            }]);

    });

    Route::group(['prefix' => 'forms'], function () {
        Route::get('fields', function () {
            return view('examples.fields');
        })->name('forms.fields');
        Route::get('validation', function () {
            return view('examples.validation');
        })->name('forms.validation');
    });

    Route::group(['prefix' => 'user'], function () {
        $controller = "\\App\\Container\\Users\\Src\\Controllers\\";
        Route::get('profile', [
            'uses' => $controller . 'ProfileController@index',
            'as' => 'user.profile'
        ]);
        Route::post('profile/update/{id}', [
            'uses' => $controller . 'ProfileController@update',
            'as' => 'user.profile.update'
        ])->where(['id' => '[0-9]+']);
        Route::post('check/email',[
            'uses' => $controller.'UserController@checkEmail',
            'as' => 'users.check.email'
        ]);
    });

    Route::group(['prefix' => 'permissions'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index', [
            'uses' => $controller . 'PermissionController@index',
            'as' => 'permissions.index'
        ]);
        Route::get('data', [
            'uses' => $controller . 'PermissionController@data',
            'as' => 'permissions.data'
        ]);

        Route::get('edit/{id?}', [
            'uses' => $controller . 'PermissionController@edit',
            'as' => 'permissions.edit'
        ])->where(['id' => '[0-9]+']);

        Route::post('store', [
            'uses' => $controller . 'PermissionController@store',
            'as' => 'permissions.store'
        ]);
        Route::post('update/{id?}', [
            'uses' => $controller . 'PermissionController@update',
            'as' => 'permissions.update'
        ])->where(['id' => '[0-9]+']);
        Route::delete('delete/{id?}', [
            'uses' => $controller . 'PermissionController@destroy',
            'as' => 'permissions.destroy'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'roles'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index', [
            'uses' => $controller . 'RoleController@index',
            'as' => 'roles.index'
        ]);
        Route::get('data', [
            'uses' => $controller . 'RoleController@data',
            'as' => 'roles.data'
        ]);
        Route::post('store', [
            'uses' => $controller . 'RoleController@store',
            'as' => 'roles.store'
        ]);
        Route::post('update/{id?}', [
            'uses' => $controller . 'RoleController@update',
            'as' => 'roles.update'
        ])->where(['id' => '[0-9]+']);
        Route::delete('delete/{id?}', [
            'uses' => $controller . 'RoleController@destroy',
            'as' => 'roles.destroy'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'modules'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index', [
            'uses' => $controller . 'ModuleController@index',
            'as' => 'modules.index'
        ]);
        Route::get('data', [
            'uses' => $controller . 'ModuleController@data',
            'as' => 'modules.data'
        ]);
        Route::post('store', [
            'uses' => $controller . 'ModuleController@store',
            'as' => 'modules.store'
        ]);
        Route::post('update/{id?}', [
            'uses' => $controller . 'ModuleController@update',
            'as' => 'modules.update'
        ])->where(['id' => '[0-9]+']);
        Route::delete('delete/{id?}', [
            'uses' => $controller . 'ModuleController@destroy',
            'as' => 'modules.destroy'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'role/permission'], function () {
        $controller = "\\App\\Container\\Permissions\\Src\\Controllers\\";
        Route::get('index', [
            'uses' => $controller . 'RolePermissionController@index',
            'as' => 'roles.permission.index'
        ]);
        Route::get('data/role/{id?}', [
            'uses' => $controller . 'RolePermissionController@data',
            'as' => 'roles.permission.data'
        ]);
        Route::post('update/{id?}', [
            'uses' => $controller . 'RolePermissionController@update',
            'as' => 'role.permission.update'
        ])->where(['id' => '[0-9]+']);
    });

    Route::group(['prefix' => 'forms'], function () {
        Route::post('dropzone/store', function (Request $request) {
            $files = $request->file('file');
            foreach ($files as $file) {
                $url = Storage::disk('developer')->putFile('avatars', $file);
            }
        })->name('forms.dropzone.store');
    });

    Route::group(['prefix' => 'organization'], function (){
        $controller = "\\App\\Container\\SportCit\\Src\\Controllers\\";
        Route::get('menu/{id?}',[
            'uses' => $controller.'MenuOrganizationController@index',
            'as' => 'organization.menu.index'
        ]);
        Route::get('index',[
            'uses' => $controller.'OrganizationController@index',
            'as' => 'organization.index'
        ]);
        Route::get('create', [
            'uses' => $controller . 'OrganizationController@create',
            'as' => 'organization.create'
        ]);
        Route::get('edit/{id?}',[
            'uses' => $controller.'OrganizationController@edit',
            'as' => 'organization.edit'
        ]);
        Route::get('viewfile/{id?}',[
            'uses' => $controller.'OrganizationController@viewfile',
            'as' => 'organization.viewfile'
        ]);
        Route::post('store', [
            'uses' => $controller . 'OrganizationController@store',
            'as' => 'organization.store'
        ]);
        Route::post('update/{id?}', [
            'uses' => $controller . 'OrganizationController@update',
            'as' => 'organization.update'
        ]);
        Route::post('update_state/{id?}', [
            'uses' => $controller . 'OrganizationController@update_state',
            'as' => 'organization.update_state'
        ]);
        Route::get('data',[
            'uses' => $controller.'OrganizationController@data',
            'as' => 'organization.data'
        ]);
        Route::get('index/ajax',[
            'uses' => $controller.'OrganizationController@index_ajax',
            'as' => 'organization.index.ajax'
        ]);
        Route::post('delete/{id?}', [
            'uses' => $controller . 'OrganizationController@destroy',
            'as' => 'organization.destroy'
        ]);
        Route::group(['prefix' => 'category'], function (){
            $controller = "\\App\\Container\\SportCit\\Src\\Controllers\\";
            Route::get('index/ajax/{id?}',[
                'uses' => $controller.'CategoryPlayerController@index_ajax',
                'as' => 'organization.category.index.ajax'
            ]);
            Route::get('data/{id?}',[
                'uses' => $controller.'CategoryPlayerController@data',
                'as' => 'organization.category.data'
            ]);
            Route::post('store', [
                'uses' => $controller . 'CategoryPlayerController@store',
                'as' => 'organization.category.store'
            ]);
            Route::get('edit/{id?}', [
                'uses' => $controller . 'CategoryPlayerController@edit',
                'as' => 'organization.category.edit'
            ])->where(['id' => '[0-9]+']);
            Route::post('update', [
                'uses' => $controller . 'CategoryPlayerController@update',
                'as' => 'organization.category.update'
            ])->where(['id' => '[0-9]+']);
            Route::delete('delete/{id?}', [
                'uses' => $controller . 'CategoryPlayerController@destroy',
                'as' => 'organization.category.destroy'
            ])->where(['id' => '[0-9]+']);
        });
        Route::group(['prefix' => 'player'], function (){
            $controller = "\\App\\Container\\SportCit\\Src\\Controllers\\";
            Route::get('index/ajax/{id?}',[
                'uses' => $controller.'PlayerController@index_ajax',
                'as' => 'organization.player.index.ajax'
            ]);
        });
        Route::group(['prefix' => 'team'], function (){
           $controller =  "\\App\\Container\\SportCit\\Src\\Controllers\\";
           Route::get('index/ajax/{id?}',[
              'uses' => $controller.'TeamController@index_ajax',
               'as' => 'organization.team.index.ajax'
           ]);
            Route::get('data/{id?}',[
                'uses' => $controller.'TeamController@data',
                'as' => 'organization.team.data'
            ]);
        });
    });


    Route::get('emails', function () {
        $organ = \App\Container\SportCit\Src\Organization::find(1);
        event(new StateOrganizationModified($organ));
    })->name('forms.fields');

});


/*
 * Fin de las rutas de ejemplo.
 */
Auth::routes();
