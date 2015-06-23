<?php

class UsersController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//

	}

    public function admin(){
        $users = \User::all();
        return View::make('User.admin')->withUsers($users);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
        $user = \User::find($id);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
        $roles = array(
            'admin' => 'admin',
            'pharmacy1' => 'Manager(Pharmacy_1)',
            'pharmacy2' => 'Manager(Pharmacy_2)',
            'pharmacy3' => 'Manager(Pharmacy_3)',
            'pharmacy4' => 'Manager(Pharmacy_4)',
            'pharmacy5' => 'Manager(Pharmacy_5)',
            'pharmacy6' => 'Manager(Pharmacy_6)',
            'pharmacy7' => 'Manager(Pharmacy_7)',
            'pharmacy8' => 'Manager(Pharmacy_8)',
        );

        $user = \User::find($id);
        return View::make('User.edit', array('user'=>$user, 'roles'=>$roles));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
        $user = User::find($id);
        $user->role = Input::get('role');
        $user->save();
        Session::flash('message', 'User Role updated');
        return Redirect::to('/admin');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function destroy($id)
    {
        // delete
        $user = User::find($id);
        $role = $user->role;
        $user->delete();

        // redirect
        Session::flash('message', 'Successfully deleted Manger for '." ".$role);
        return Redirect::to('/admin');
    }


}
