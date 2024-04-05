<?php

namespace App\Providers;

class Validator
{
    private $errors = array();
    private $key;
    private $value;
    private $name;


    public function field($key, $value, $name = null)
    {
        $this->key = $key;
        $this->value = $value;
        if ($name == null) {
            $this->name = ucfirst($key);
        } else {
            $this->name = ucfirst($name);
        }
        return $this;
    }


    public function required()
    {
        if (empty($this->value)) {
            $this->errors[$this->key] = "$this->name is required.";
        }
        return $this;
    }


    public function max($length)
    {
        if (strlen($this->value) > $length) {
            $this->errors[$this->key] = "$this->name must be less than $length characters";
        }
        return $this;
    }


    public function min($length)
    {
        if (strlen($this->value) < $length) {
            $this->errors[$this->key] = "$this->name must be bigger than $length characters";
        }
        return $this;
    }


    public function email()
    {
        if (!empty($this->value) && !filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->key] = "Invalid $this->name format";
        }
        return $this;
    }


    public function unique($model)
    {
        $model = 'App\\Models\\' . $model;
        $model = new $model;
        $unique = $model->unique($this->key, $this->value);
        if ($unique) {
            $this->errors[$this->key] = "This $this->name must be unique";
        }
        return $this;
    }


    public function password()
    {
        if (!empty($this->value)) {
            if (strlen($this->value) < 5 || strlen($this->value) > 20) {
                $this->errors[$this->key] = "$this->name doit contenir entre 5 et 20 caractères.";
            } elseif (!preg_match('/[a-z]/', $this->value)) {
                $this->errors[$this->key] = "$this->name doit contenir au moins une lettre minuscule.";
            } elseif (!preg_match('/[A-Z]/', $this->value)) {
                $this->errors[$this->key] = "$this->name doit contenir au moins une lettre majuscule.";
            }
        }
        return $this;
    }


    public function isSuccess()
    {
        if (empty($this->errors)) return true;
    }


    public function getErrors()
    {
        if (!$this->isSuccess()) return $this->errors;
    }
}
