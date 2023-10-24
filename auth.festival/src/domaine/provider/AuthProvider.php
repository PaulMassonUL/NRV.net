<?php

namespace festochshop\auth\domaine\provider;

use festochshop\auth\domaine\entities\User;
use festochshop\auth\domaine\service\AuthProviderCredentialsException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AuthProvider
{
    private User $currentAuthenticatedUserEntity;

    /**
     * @throws \Exception
     */
    private function generateRefreshToken(User $user): void
    {
        $user->refresh_token = bin2hex(random_bytes(32));
        $user->refresh_token_expiration = date('Y-m-d H:i:s', time() + 3600);
        $user->save();
    }

    /**
     * @throws AuthProviderCredentialsException
     */
    public function checkCredentials(string $username, string $password): void
    {
        try {
            $user = User::where('email', $username)->firstOrFail();

        } catch (ModelNotFoundException $e) {
            throw new AuthProviderCredentialsException("User not found");
        }

        if (!password_verify($password, $user->password)) {
            throw new AuthProviderCredentialsException("Wrong password");
        } else {
            $this->generateRefreshToken($user);
            $this->currentAuthenticatedUserEntity = $user;

        }
    }

    public function getAuthenticatedUser(): array
    {
        return [
            'username' => $this->currentAuthenticatedUserEntity->userName,
            'email' => $this->currentAuthenticatedUserEntity->email,
            'refreshToken' => $this->currentAuthenticatedUserEntity->refresh_token
        ];
    }

}