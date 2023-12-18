<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'nama_ormas' => ['string', 'max:255'],
            'alamat_sekretariat' => ['string', 'max:255'],
            'no_tlp' => ['required', 'string', 'max:255'],
            'photo' => ['image', 'max:2048', 'mimes:jpg,jpeg,png'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $img = Storage::putFile('public/img', $input['photo']);
            if ($input['photo'] != 'avatar.png') {
                Storage::delete($user->photo);
            }
        } else {
            $img = $user->photo;
        }

        if (isset($input['nama_ormas'])) {
            $nama_ormas = $input['nama_ormas'];
        } else {
            $nama_ormas = $user->nama_ormas;
        }

        if (isset($input['alamat_sekretariat'])) {
            $alamat_sekretariat = $input['alamat_sekretariat'];
        } else {
            $alamat_sekretariat = $user->alamat_sekretariat;
        }

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'nama' => $input['nama'],
                'email' => $input['email'],
                'nama_ormas' => $nama_ormas,
                'alamat_sekretariat' => $alamat_sekretariat,
                'jabatan' => $input['jabatan'],
                'no_tlp' => $input['no_tlp'],
                'photo' => $img,
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
