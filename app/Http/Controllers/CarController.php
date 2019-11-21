<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\User;

class CarController extends Controller
{
  public $carBrands = ["Alfa Romeo"," Aston Martin"," Audi"," Autovaz"," Bentley"," Bmw"," Cadillac"," Caterham"," Chevrolet"," Chrysler"," Citroen"," Daihatsu"," Dodge"," Ferrari"," Fiat"," Ford"," Honda"," Hummer"," Hyundai"," Isuzu"," Jaguar"," Jeep"," Kia"," Lamborghini"," Lancia"," Land Rover"," Lexus"," Lotus"," Maserati"," Mazda"," Mercedes Benz"," MG"," Mini"," Mitsubishi"," Morgan"," Nissan"," Opel"," Peugeot"," Porsche"," Renault"," Rolls Royce"," Rover"," Saab"," Seat"," Skoda"," Smart"," Ssangyong"," Subaru"," Suzuki"," Tata"," Toyota"," Volkswagen"," Volvo"];
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $cars = Car::paginate(15);
    $newCar = new Car;
    $users = User::orderBy('last_name', 'desc')->get();
    $carBrands = $this->carBrands;
    return view('cars.index', compact('cars', 'newCar', 'users', 'carBrands'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'owner_id' => 'required',
      'driver_id' => 'required',
      'register' => 'required|unique:cars|max:6',
      'color' => 'required|max:255',
      'brand' => 'required|max:255',
      'type' => 'required|max:255'
    ]);
    //validar existencia de foraneas
    $owner = User::findOrFail($request->owner_id);
    $driver = User::findOrFail($request->driver_id);
    $car = new Car;
    $car->owner_id = $owner->id;
    $car->driver_id = $driver->id;
    $car->register = $request->register;
    $car->color = $request->color;
    $car->brand = $request->brand;
    $car->type = $request->type;
    $car->save();

    flash('Registro guardado')->success();
    return redirect()->route('cars.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $car = Car::findOrFail($id);
    $users = User::orderBy('last_name', 'desc')->get();
    $carBrands = $this->carBrands;
    return view('cars.edit', compact('car', 'users', 'carBrands'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    $car = Car::findOrFail($id);
    $validatedData = $request->validate([
      'owner_id' => 'required',
      'driver_id' => 'required',
      'register' => 'required|unique:cars,register,'.$car->id.'|max:6',
      'color' => 'required|max:255',
      'brand' => 'required|max:255',
      'type' => 'required|max:255'
    ]);

    //validar existencia de foraneas
    $owner = User::findOrFail($request->owner_id);
    $driver = User::findOrFail($request->driver_id);
    $car->owner_id = $owner->id;
    $car->driver_id = $driver->id;
    $car->register = $request->register;
    $car->color = $request->color;
    $car->brand = $request->brand;
    $car->type = $request->type;
    $car->save();

    flash('Registro actualizado')->success();
    return redirect()->route('cars.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $car = Car::findOrFail($id);
    $car->delete();
    flash('Registro borrado')->success();
    return redirect()->route('cars.index');
  }
}
