<?php

class user
{
    public function __construct(
        public string $email,
        public string $password,
        public string $password2,
        public string $first_name,
        public string $last_name,

    )
    {
    }
    public function verify_incription(): bool
    {
        $isValid = true;
        if ($this->email === '' || $this->first_name === '' || $this->last_name==='') {
            $isValid = false;
        }
        if ($this->password !== $this->password2 || $this->password === '') {
            $isValid = false;
        }
        return $isValid;
    }
    public function verify_connexion(): bool
    {
        $isValid = true;
        if ($this->email === '' || $this->password === '' ) {
            $isValid = false;
        }
        return $isValid;
    }
}
?>

