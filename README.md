# PHP-form-project

## Introduction

> Make a contact form that people can send to your email. 

## Code Samples

> code for displaying error messages 

if (isset($_POST["submit"])) {
    $message = $_POST['message'];
    $email = $_POST['mail'];
    $name = $_POST['name'];

    if (!$_POST['name']){
        $nameErr = 'enter name';
    }
    if (!$_POST['message']){
        $messageErr = 'enter message';
    }
    if (!$_POST['name']){
        $emailErr = 'enter email';
    }

}

## Installation

> Used PHPmailer as an easy solution for the connecting problem.