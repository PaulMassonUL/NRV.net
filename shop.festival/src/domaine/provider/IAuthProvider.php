<?php

namespace festochshop\shop\domaine\provider;

interface iAuthProvider
{

    public function checkCredentials(string $user, string $pass): void;

    public function checkToken(string $token): void;

    public function register(string $user, string $pass, string $first_name, string $last_name): void;

    public function activate(string $token): void;

    public function resetPassword(string $token, string $old_pass, string $new_pass): void;

    public function getAuthenticatedUser(): array;

}