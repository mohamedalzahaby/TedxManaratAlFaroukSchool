<?php  $userData = $data['userData'];?>
<ul style="list-style-type:circle">


<li><label><?php echo $data['registrationFormName'];?></label><br></li>
<li><label>First name</label></li>
<li><p><?php echo $userData['fname'];?></p></li>
<li><label>Last name</label></li>
<li><p><?php echo $userData['lname'];?></p></li>
<li><label>Email</label></li>
<li><p><?php echo $userData['email'];?></p></li>
<li><label>Birth Date</label></li>
<li><p><?php echo $userData['birthDate'];?></p></li>
<li><label>Gender</label></li>
<li><p><?php echo $userData['ismale'] = ($userData['ismale'])? 'Male': 'Female';?></p></li>
<li><label>User Type</label></li>
<li><p><?php echo $data['userTypeName'];?></p></li>
<?php foreach ($data['questionValues'] as $key => $value) {?>
    <li><label><?php echo $key;?></label></li>
    <li><p><?php echo $value;?></p></li>
<?php } ?>

</ul>
<a href="../testt"><button>test</button></a>
