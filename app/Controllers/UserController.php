<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
public function myProfile()
{
    $userId = session()->get('id_user');
    $userModel = new UserModel();
    $data['user'] = $userModel->find($userId);
    return view('my-profile', $data);
}

public function updateProfile()
{
    $userModel = new UserModel();
    $id = $this->request->getPost('id_user');

    $data = [
        'username' => $this->request->getPost('username'),
        'nama'     => $this->request->getPost('nama'),
        'no_hp'    => $this->request->getPost('no_hp'),
    ];

    if ($this->request->getPost('password')) {
        $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
    }

    $foto = $this->request->getFile('foto');
    if ($foto && $foto->isValid() && !$foto->hasMoved()) {
        $newName = $foto->getRandomName();
        $foto->move('public/uploads/profil/', $newName);
        $data['foto'] = $newName;
    }

    $userModel->update($id, $data);
    return redirect()->to('my-profile')->with('success', 'Profil berhasil diperbarui.');
}

}
    