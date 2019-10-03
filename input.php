<?php

$form = $modules->get('InputfieldForm');

$field = $modules->get('InputfieldText');
$field->attr('name', 'your_name');
$field->label = 'Your Name';
$form->add($field);

$field = $modules->get('InputfieldEmail');
$field->attr('name', 'your_email');
$field->label = 'Your Email Address';
$field->required = true;
$form->add($field);

$submit = $modules->get('InputfieldSubmit');
$submit->attr('name', 'submit_subscribe');
$form->add($submit);

if($input->post('submit_subscribe')) {
  // form submitted
  $form->processInput($input->post);
  $errors = $form->getErrors();
  if(count($errors)) {
    // unsuccessful submit, re-display form
    echo "<h3>There were errors, please fix</h3>";
    echo $form->render();
  } else {
    // successful submit (save $name and $email somewhere)
    $name = $form->get('your_name')->attr('value');
    $email = $form->get('your_email')->attr('value');
    echo $email;
    echo "<h3>Thank you, you have been subscribed!</h3>";
  }
} else {
  // form not submitted, just display it
  echo $form->render();
}

?>
