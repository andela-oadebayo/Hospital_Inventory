<?php

class PharmaciesController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}
    public function inventOne(){
    $items = Pharmacy::getInventory('Pharmacy1');
    return View::make('Inventory-1.index')->with('items',$items);
    }
    public function inventTwo(){
        $items = Pharmacy::getInventory('Pharmacy2');
        return View::make('Inventory-2.index')->with('items',$items);
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
        $roles = array(
            'pharmacy1' => 'Manager(Pharmacy_1)',
            'pharmacy2' => 'Manager(Pharmacy_2)'
        );

        return View::make('includes._form')->with('roles', $roles);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
        $input = Input::all();

        $rules = array(
            'item' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'expiry' => 'required',
            'nafdac' => 'required',
            'pharmacy_id' => 'required'
        );

        $valid = Validator::make($input, $rules);

        if($valid->passes()){

            $phar = new \Pharmacy();
            $phar->item = $input['item'];
            $phar->quantity = $input['quantity'];
            $phar->price = $input['price'];
            $phar->expiry = $input['expiry'];
            $phar->nafdac = $input['nafdac'];
            $phar->pharmacy_id = $input['pharmacy_id'];
            $phar->save();

            if(Auth::user()->role == 'admin'){
                return Redirect::to('/admin')->with('message', 'Item Created');
            }elseif((Auth::user()->role == 'pharmacy1')){
                return Redirect::to('/inventory-1')->with('message', 'Item Created');
            }else{
                return Redirect::to('/inventory-2')->with('message', 'Item Created');
            }

        }else{
            return Redirect::to('pharmacy/create')->withInput()->withErrors($valid);
        }
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
        $phar = Pharmacy::find($id);
        return View::make('includes._edit')->with('phar', $phar);
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
        $input = Input::all();

        $rules = array(
            'item' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'expiry' => 'required',
            'nafdac' => 'required',
        );

        $valid = Validator::make($input, $rules);

        if($valid->passes()){

            $phar = new Pharmacy();
            $phar->item = $input['item'];
            $phar->quantity = $input['quantity'];
            $phar->price = $input['price'];
            $phar->expiry = $input['expiry'];
            $phar->nafdac = $input['nafdac'];
            $phar->save();

            return Redirect::to('/admin')->with('message', 'Item Updated !!');
        }else{
            return Redirect::to('pharmacy/'.$id.'/edit')->withInput()->withErrors($valid);
        }
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
        $phar = Pharmacy::find($id);
        $role = $phar->role;
        $phar->delete();

        // redirect
        Session::flash('message', 'Successfully deleted Item');
        if(Auth::user()->role == 'admin'){
            return Redirect::to('/admin');
        }elseif((Auth::user()->role == 'pharmacy1')){
            return Redirect::to('/inventory-1');
        }else{
            return Redirect::to('/inventory-2');
        }
    }


}
