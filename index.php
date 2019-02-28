<?php
require 'includes/session.php';
?>
<!DOCTYPE html >
<html lang="en">
<head>
    <title>Fuel Consumption Calculator </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/p2.css' rel='stylesheet'>
</head>
<body>
<section class="content">
    <h1 class="header">Fuel Consumption Calculator</h1>
    <p class="subHeader">Use the steps below to calculate your fuel consumption.</p>
    <ol>
        <li>Enter the odometer reading from the last time you filled your gas tank.</li>
        <li>Enter the odometer reading at the time of your current fill up.</li>
        <li>Enter the amount of fuel required to completely fill you tank at this fill up.</li>
        <li>Be sure to select the units you are using to measure your distance and the amount of gas.</li>
    </ol>
    <p class="note">
        Note: before you use this the first time completely fill up your gas tank
        and save the distance read from your odometer.
    </p>
    <form method='GET' action='includes/process.php'>
        <table id="formTable">
            <tr>
                <td class="leftTD">
                    <label for="startDistance">Odometer reading - last fill-up </label>
                    <input id="startDistance" name="startDistance" type="text"
                           value="<?= $results['startDistance'] ?? ''; ?>"/>
                    <p class="attention">*required, must be greater than 0</p>
                    <label for="endDistance">Odometer reading - this fill-up </label>
                    <input id="endDistance" name="endDistance" type="text"
                           value="<?= $results['endDistance'] ?? ''; ?>"/>
                    <p class="attention">*required, must be greater than 0</p>
                </td>
                <td class="rightTD">
                    <input type="radio" name="distanceUnit" id="miles" value="miles"
                        <?php if ($results['distanceUnit'] == 'miles') : ?>
                            checked="checked"
                        <?php endif ?>/>
                    <label for="miles">Miles</label>
                    <br/>
                    <input type="radio" name="distanceUnit" id="kilometers" value="kilometers"
                        <?php if ($results['distanceUnit'] == 'kilometers') : ?>
                            checked="checked"
                        <?php endif ?>/>
                    <label for="kilometers">Kilometers</label>
                    <p class="attention">*required, one option must be selected.</p>
                </td>
            </tr>
            <tr>
                <td class="leftTD">
                    <label for="fuelVolume">Fuel Reading from Gas Pump </label>
                    <input id="fuelVolume" name="fuelVolume" type="text"
                           value="<?= $results['fuelVolume'] ?? ''; ?>"/>
                    <p class="attention">*required, must be greater than 0</p>
                </td>
                <td class="rightTD">
                    <select id="volumeUnit" name="volumeUnit">
                        <option> </option>
                        <option value="gallon"
                            <?php if ($results['volumeUnit'] == 'gallon') : ?>
                                selected
                            <?php endif ?>>
                            Gallons
                        </option>
                        <option value="liter"
                            <?php if ($results['volumeUnit'] == 'liter') : ?>
                                selected
                            <?php endif ?>>
                            Liters
                        </option>
                    </select>
                    <label for="volumeUnit">Select option</label>
                    <p class="attention">*required, one option must be selected</p>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="buttonTD">
                    <input type='submit' value='Calculate Fuel Consumption'>
                </td>
            </tr>
        </table>
    </form>
    <?php if (!(is_null($results)) && !$results['hasErrors'] && $results['fuelConsumed']) : ?>
        <p class="calculationResult">
            Fuel consumption is <?= $results['fuelConsumed'] ?? '' ?>
            <?= $results['distanceUnit'] ?? '' ?> /
            <?= $results['volumeUnit'] ?? '' ?>
        </p>
    <?php endif ?>
    <?php if (!(is_null($results)) && ($results['hasErrors'] || $results['customError'] != '')) : ?>
        <div class='alert alert-danger'>
            <ul>Please correct the following:
                <?php foreach ($results['formErrors'] as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
                <?php if ($results['customError'] != '') : ?>
                    <li><?= $results['customError'] ?></li>
                <?php endif ?>
            </ul>
        </div>
    <?php endif ?>
</section>
</body>
</html>
