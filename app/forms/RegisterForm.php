<?php
namespace App\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Password;

use Phalcon\Forms\Element\Submit;

use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Forms\Element\Email;

class RegisterForm extends Form
{
    public function initialize()
    {
        
        //1.NAME FIELDS
            // form name field
            $name = new Text(
                'name',
                [
                    "class" => "form-control",
                    "placeholder" => "Enter Full Name"
                ]
            );

            //form name field validation
            $name->addValidator(
                new PresenceOf(['message' => 'The name is required'])
            );

        //2.EMAIL FIELDS
            // form email field
            $email = new Email(
                'email',
                [
                    "class" => "form-control",
                    "placeholder" => "Enter Email Address"
                ]
            );

            //form email field validation
            $email->addValidators([
                new PresenceOf(['message' => 'The email is valid']),
                new PresenceOf(['message' => 'The email is not valid!'])
                ]);


        //3.PASSWORD FIELD
            // form password field
            $password = new Password(
                'password',
                [
                    "class" => "form-control",
                    "placeholder" => "Your Desired Password"
                ]
            );

            //form password field validation
            $password->addValidators([
                new PresenceOf(['message' => 'Password Is Required!']),
                new StringLength(['min' => 5, 'message' => 'Password is too short. Must be minimum 5 characters.']),
                new Confirmation(['with' => 'password_confirm', 'message' => 'Passwords don\'t match.'])
            ]);

        //4.PASSWORD CHECK FIELD
            $passwordNewConfirm = new Password(
                'password_confirm',
                [
                    "class" => "form-control",
                    "placeholder" => "Re-Type Your Desired Password"
                ]
            );

            //form password field validation
            $passwordNewConfirm->addValidators([
                new PresenceOf(['message' => 'The confirmation password is required!']),
            ]);



        // form submit button
        $submit = new Submit(
            'submit',
            [
                "value" => "Register A New User",
                "class" => "btn btn-danger col-md-12",
            ]
        );

        $this->add($name);
        $this->add($email);
        $this->add($password);
        $this->add($passwordNewConfirm);
        $this->add($submit);
    }
}