<form class="formJoin" id="formJoin" method="post" > 
    
    <label for="fname">First name:</label><br><input type="text" id="fname" name="fname" required><br> 

    <label for="lname">Last name:</label><br><input type="text" id="lname" name="lname" required><br> 

    <label for="uname">Username:</label><br><input type="text" id="uname" name="uname" required><br> 

    <label for="passw">Password:</label><br><input type="text" id="passw" name="passw" required><br> 

    <label for="phone_number">phone_number:</label><br><input type="text" id="phone_number" name="phone_number" required><br><br>

    Package:
        <select name="package_name"> 
                <option value="Monthly">Monthly </option>
                <option value="Seasonal">Seasonal</option>
                <option value=" Yearly "> Yearly </option>
        </select>
    <br><input type="submit" value="Click to send form" formaction="createcustomer.php"> 
</form>