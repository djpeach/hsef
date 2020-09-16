<?php

// Post and Error objects to make usage in form easier
$post = new Post();
$errors = new Errors();

// default values for gender and department
$post->gender = isset($post->gender) ? $post->gender : 'male';
$post->department = isset($post->department) ? $post->department : 'computerScience';

$req_fields = ['firstName', 'lastName', 'email', 'emailConfirmation', 'password', 'passwordConfirmation', 'gender', 'department', 'status', 'termsAndPolicies'];

// Find and create validation errors
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  foreach ($req_fields as $field) {
    if (!$post->{$field}) {
      $errors->{$field} = "You must set a value for {$field}";
    }
  }

  // extra email validation
  if (!$errors->email && !filter_var($post->email, FILTER_VALIDATE_EMAIL)) {
    $errors->email = 'Value set is not a valid email';
  }
  if (!$errors->emailConfirmation && !filter_var($post->emailConfirmation, FILTER_VALIDATE_EMAIL)) {
    $errors->emailConfirmation = 'Value set is not a valid email';
  }
  if (!$errors->email && !$errors->emailConfirmation && $post->email !== $post->emailConfirmation) {
    $errors->emailConfirmation = 'Emails do not match';
  }

  // extra password validation
  if (!$errors->password && !$errors->passwordConfirmation && $post->password !== $post->passwordConfirmation) {
    $errors->passwordConfirmation = 'Passwords do not match';
  }
}

