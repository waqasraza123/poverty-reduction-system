<?php

namespace App\Providers;
use App\externalFiles\UserInfo;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider {

    protected $currentUser, $allUsers;
    protected $userInfo;

    /*public function __construct()
    {
        $this->userInfo = new UserInfo();
        $currentUser = $this->userInfo->module_user_id(Auth::user()->id, "./problem_sharing");
        $allUsers = $this->userInfo->module_users("delta", "./problem_sharing");
    }*/

    /**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
        //return $userInfoFile;
        //return  __DIR__."/../../../registration/php/user_info.php";
        //pass the request id that is currently being viewed
		$str = $_SERVER['PHP_SELF'];

		//current problem id
		$id = preg_replace('/\D/', '', $str);

		view()->share(['id' => $id, 'currentUser' => $this->currentUser, 'allUsers' => $this->allUsers]);
	}

	/**
	 * Register any application services.
	 *
	 * This service provider is a great spot to register your various container
	 * bindings with the application. As you can see, we are registering our
	 * "Registrar" implementation here. You can add your own bindings too!
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind(
			'Illuminate\Contracts\Auth\Registrar',
			'App\Services\Registrar'
		);
	}

}
