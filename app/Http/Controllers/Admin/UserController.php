<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::latest()->get();

        return view('pages.admin.user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'nim' => 'required',
            'semester' => 'required',
            'email' => 'required|string|email|unique:users',
        ]);
        try {
            $data = $request->all();
            $data['password'] = Hash::make('1234');
            $user = User::create($data);
            return redirect()->route('dashboard.user.index')->with('success', 'Pengurus berhasil ditambah!!');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('dashboard.user.index')->with('error', 'Pengurus Gagal ditambah!!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::findOrFail($id);

        return view('pages.admin.user.detail', compact('data'));
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
        $request->validate([
            'name' => 'required|min:3|max:255',
            'nim' => 'required',
        ]);
        try {
            $data = $request->all();

            $profil = User::findOrFail($id);
            $profil->update($data);

            return redirect()->route('dashboard.user.index')->with('success', 'Pengurus berhasil diubah!!');
        } catch (Exception $e) {
            dd($e->getMessage());
            return redirect()->route('dashboard.user.index')->with('error', 'Pengurus Gagal diubah!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            return redirect()->route('dashboard.user.index')->with('success', 'Pengurus berhasil dihapus!!');
        } catch (Exception $e) {
            return redirect()->route('dashboard.user.index')->with('error', 'Pengurus Gagal dihapus!!');
        }
    }
}
