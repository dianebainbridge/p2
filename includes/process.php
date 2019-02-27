<?php
/**
 * This is the page that index.php submits to.
 * The process is outlined below
 * Instantiate a Form object and validate the data
 * Create custom error if necessary (to do - extend Form class to include this custom error)
 * Instantiate the Fuel Calculation object and calculated the fuel consumed
 * Store the results in the SESSION object
 * Redirect user back to index.php
 */
require '../helpers/Form.php';
require 'FuelCalculation.php';

use DWA\Form;
use P2\FuelCalculation as FuelCalculation;

#instantiate Form object
$form = new Form($_GET);

#validate the form
$errors = $form->validate(
    [
        'startDistance' => 'required|numeric|min:1',
        'endDistance' => 'required|numeric|min:1',
        'fuelVolume' => 'required|numeric|min:1',
        'distanceUnit' => 'required',
        'volumeUnit' => 'required'
    ]
);

# Start the session
session_start();

# Add a custom error if the start distance is greater than the end distance
$customError = '';
if ((float)number_format($form->get('startDistance'), 1, '.', '') >
    (float)number_format($form->get('endDistance'), 1, '.', ''))
    $customError = 'The value for startDistance can not be greater than  the value for endDistance';

#If no errors calculate fuel consumed
$fuelConsumed = 0;
if (!$form->hasErrors && $customError == '') {
    #instantiate Fuel Calculation from form values
    $fuelCalculation = new FuelCalculation(
        $form->get('fuelVolume'),
        $form->get('startDistance'),
        $form->get('endDistance')

    );
    $fuelConsumed = $fuelCalculation->getFuelConsumed();
}

# Store results in the session
$_SESSION['results'] = [
    'hasErrors' => $form->hasErrors,
    'formErrors' => $errors,
    'fuelConsumed' => $fuelConsumed,
    'startDistance' => $form->get('startDistance'),
    'endDistance' => $form->get('endDistance'),
    'fuelVolume' => $form->get('fuelVolume'),
    'distanceUnit' => $form->get('distanceUnit'),
    'volumeUnit' => $form->get('volumeUnit'),
    'customError' => $customError
];
# Redirect the user page to the page that shows the form
header('Location: ../index.php');