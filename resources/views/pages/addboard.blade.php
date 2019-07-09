<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>event</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="res\css\event.css">


</head>


<body>
<?php if ( isset($_SESSION['IsSignedUpIn']) && $_SESSION['userTypeId'] == 2) : ?>
    <h1>Add New Board</h1>
    <form id="form" action="<?php echo $GLOBALS['ASSET'] . $GLOBALS['Board'] . $GLOBALS['submit']; ?>" method="POST">
        <label>name: </label><input type="text" name="name">
        <label>opening date: </label><input type="date" name="openingDate">
        <label>closing date: </label><input type="date" name="closingDate">
        <label>image: </label><input type="text" name="BoardImage">
        <br>
        <br>

        <br>
        <br>



        <br>
        <br>
        <label>academicYear: </label>
        <select name="academicYearId">
            <?php foreach ($data as $key1 => $v) { ?>
                <?php foreach ($v as $key => $value) { ?>
                    <?php if ($key1 == 'academicYears') { ?>
                        <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

        </select>
                        
        <input type="submit" name="submit" >
    </form>
    <?php endif ?>
    <a href=<?php echo $GLOBALS['ASSET'].$GLOBALS['ourTeam'];?>> <button value="ourteam">SSS</button></a>
    