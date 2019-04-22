<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Customer;
use App\Models\Employee;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:45'],
            'lastName' => ['required', 'string', 'max:45'],
            'emailAddress' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorSuperAdmin(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:45'],
            'lastName' => ['required', 'string', 'max:45'],
            'emailAddress' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorEmployee(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:45'],
            'lastName' => ['required', 'string', 'max:45'],
            'emailAddress' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorCustomer(array $data)
    {
        return Validator::make($data, [
            'firstName' => ['required', 'string', 'max:45'],
            'lastName' => ['required', 'string', 'max:45'],
            'emailAddress' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phoneNumber' => ['required', 'string', 'min:50', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createSuperAdmin(Request $request)
    {
        $data = $request->all();
        User::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'emailAddress' => $data['emailAddress'],
            'password' => Hash::make($data['password']),
            'phoneNumber' => $data['phoneNumber'],
            'notes' => $data['notes'],
        ]);
        
        self::sendPostRequest($data);
        
        return view('home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Employee
     */
    protected function createEmployee(Request $request)
    {
        $data = $request->all();
        $myCheckboxes = $request->input('OnRouteDetails_tbl');

        dd($data);
        Employee::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'emailAddress' => $data['emailAddress'],
            'password' => Hash::make($data['password']),
            'phoneNumber' => $data['phoneNumber'],
            'employeeAlias' => $data['employeeAlias'],
        ]);

        self::sendPostRequest($data);

        return view('home');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\Customer
     */
    protected function createCustomer(Request $request)
    {
        $data = $request->all();
        Customer::create([
            'firstName' => $data['firstName'],
            'lastName' => $data['lastName'],
            'emailAddress' => $data['emailAddress'],
            'password' => Hash::make($data['password']),
            'phoneNumber' => $data['phoneNumber'],
        ]);

        self::sendPostRequest($data);

        return view('home');
    }

    protected function sendPostRequest($data){
        $client = new \GuzzleHttp\Client();
        $url = "http://homestead.ace_mobility/api/registerUser";
       
        $response = $client->request('POST', $url, [
            'form_params' => [
                'firstName' => $data['firstName'],
                'lastName' => $data['lastName'],
                'emailAddress' => $data['emailAddress'],
                'password' => Hash::make($data['password']),
                'Roles_Permissions_JSON' => '{ "Groups": { "Super_Admin": "Super_Admin" } }',
            ]
        ]);
    }
}
