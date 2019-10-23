<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nom'=>'required|max:100',
            'prenom'=>'required|max:100',
            'email'=>'required|unique:users',
            'password'=>'required|min:6',
            'ville'=>'required|max:100'
        ],[
            'required'=>'Ce champ est obligatoire'
        ]);
        $user = new User();
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->ville = $request->ville;
        $user->save();
        return redirect()->route('index')->with(['success'=>'Compte crée avec succés']);
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
        //
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
        //
        $user = User::find($id);
        $user->is_admin = 1;
        $user->update();
        return redirect()->route('admin.users.index')->with(['success'=>'Nouveau admin ajouté']);
    }
    public function removeAdmin(Request $request, $id)
    {
        //
        $user = User::find($id);
        $user->is_admin = 0;
        $user->update();
        return redirect()->route('admin.users.index')->with(['success'=>'Admin retiré']);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with(['success'=>'Compte supprimé avec succés']);
    }
    public function getLogin(){
        return view('users.login');
    }
    public function login(Request $request){
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required|min:6'
        ],[
            'required'=>'Ce champ est obligatoire'
        ]);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect()->route('index');
        }else{
            return redirect()->route('user.login')->with(['fail'=>'Email ou mot de passe est incorrect']);
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
    public function admin(){
        return view('admin.index');
    }
}
