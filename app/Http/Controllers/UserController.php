<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $user = auth()->user();

        return view('perpus.profil.index', compact('user'));
    }

    /**
     * @param \App\Models\User $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(User $id)
    {
        $password = request('password') == '' ? $id->password : Hash::make(request('password'));

        $id->update([
            'name'     => request('name'),
            'email'    => request('email'),
            'password' => $password
        ]);

        return redirect()->route('perpusku.profil.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public function bayar($id)
    {
        $this->validate(request(), [
            'bayar' => 'required|numeric|alpha_num'
        ]);

        $user = User::find($id);

        if ($user->denda > request('bayar')) {
            session()->flash('bayar', 'Uang Kurang');

            return back();
        } elseif ($user->denda == request('bayar')) {
            $bayar = $user->denda - request('bayar');
            session()->put('kembalian', 0);
        } else {
            $bayar = request('bayar') - $user->denda;
            session()->put('kembalian', $bayar);
            $bayar = 0;
        }

        User::where('id', $user->id)->update([
            'denda' => $bayar,
        ]);

        session()->flash('bayar', 'pembayaran berhasil kembalian : Rp. ' . session()->get('kembalian'));

        return redirect()->route('perpusku.profil.index');
    }
}
