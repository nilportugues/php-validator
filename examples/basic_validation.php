<?php
include realpath(dirname(__FILE__)).'/../vendor/autoload.php';

class Request
{
    /**
     * @var string
     */
    public $username;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    /**
     * @var int
     */
    public $gender;

    /**
     * @param string $username
     * @param string $password
     * @param string $email
     * @param string $gender
     */
    public function __construct($username, $password, $email, $gender)
    {
        settype($username, 'string');
        settype($password, 'string');
        settype($email, 'string');
        settype($gender, 'int');

        $this->username = $username;
        $this->password = $password;
        $this->email    = $email;
        $this->gender   = $gender;
    }
}

class UserValidator
{
    /**
     * @var NilPortugues\Validator\Validator
     */
    private $validator;

    /**
     * @var array
     */
    private $errors = [];

    /**
     * @var bool
     */
    private $isValid = true;

    /**
     * @param \NilPortugues\Validator\Validator $validator
     */
    public function __construct(\NilPortugues\Validator\Validator $validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function validate(Request $request)
    {
        $this->validateUsername($request);
        $this->validatePassword($request);
        $this->validateEmail($request);
        $this->validateGender($request);

        return $this->isValid;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param Request $request
     *
     * @return boolean|null
     */
    private function validateGender(Request $request)
    {
        $gender = $this->validator->isInteger('gender');

        $result = $gender
            ->isRequired()
            ->isPositive()
            ->isBetween(0, 2, true)
            ->validate($request->gender);

        $this->isValid = $this->isValid && $result;
        $this->errors  = array_merge($this->errors, $gender->getErrors());
    }

    /**
     * @param Request $request
     *
     * @return boolean|null
     */
    private function validateEmail(Request $request)
    {
        $email = $this->validator->isString('email');

        $result = $email
            ->isRequired()
            ->isEmail()
            ->validate($request->email);

        $this->isValid = $this->isValid && $result;
        $this->errors  = array_merge($this->errors, $email->getErrors());
    }

    /**
     * @param Request $request
     *
     * @return boolean|null
     */
    private function validatePassword(Request $request)
    {
        $password = $this->validator->isString('password');

        $result = $password
            ->isRequired()
            ->isBetween(5, 72, true)
            ->isAlphanumeric()
            ->validate($request->password);

        $this->isValid = $this->isValid && $result;
        $this->errors  = array_merge($this->errors, $password->getErrors());
    }

    /**
     * Validates is a username has alphanumeric values and is between 3 to 12 characters long.
     *
     * @param Request $request
     *
     * @return boolean|null
     */
    private function validateUsername(Request $request)
    {
        $username = $this->validator->isString('username');

        $result = $username
            ->isRequired()
            ->isAlpha()
            ->isBetween(4, 12, true)
            ->validate($request->username);

        $this->isValid = $this->isValid && $result;
        $this->errors  = array_merge($this->errors, $username->getErrors());
    }
}

$validator     = new \NilPortugues\Validator\Validator();
$userValidator = new UserValidator($validator);

$request1 = new Request('nilportugues', 'password', 'hello@world.com', '1');
$request2 = new Request('nil', 'password', 'not-an-email.com', '');

var_dump($userValidator->validate($request1)); //true
print_r($userValidator->getErrors()); //no errors

var_dump($userValidator->validate($request2)); //false
print_r($userValidator->getErrors()); //array with errors
