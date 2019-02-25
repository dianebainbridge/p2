<!DOCTYPE html >
<html lang="en">
<head>
    <title>Fuel Consumption Calculator </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='css/p2.css' rel='stylesheet'>
</head>
<body>
<div class="content">
    <p class="header">Fuel Consumption Calculator</p>
    <input type="text" placeholder="Mileage at last fill up"/>&#160;
    <input type="text" placeholder="Mileage at this fill up"/><br/>
    <input type="radio" name="distance" id="miles" value="miles"/>
    <label for="miles">Miles</label><br/>
    <input type="radio" name="distance" id="kilometers" value="kilometers"/>
    <label for="kilometers">Kilometers</label><br/>
    <input type="text" placeholder="Amount of gas"/>
    <label for="unit">Units</label>
    <select id="unit">
        <option value="gallons">Gallons</option>
        <option value="liters">Liters</option>
    </select>
</div>
</body>
</html>
