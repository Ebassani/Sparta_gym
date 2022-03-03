
<form class="formJoinstf" id="formJoinstf" method="post">

        <label for="name">full name:</label><br>
        <input type="text" id="name" name="name" required><br> 

        <label for="password">Password:</label><br> 
        <input type="text" id="password" name="password" required><br> 

        Profession:<br>
        <select name="profession"> 
                <option value="Personal Trainer">Personal Trainer </option>
                <option value="Receptionist"> Receptionist</option>
                <option value="Manager "> Manager </option>
                <option value="Cleaner"> Cleaner </option>
        </select>

      <br>  <input type="submit" value="Submit" formaction="createstaff.php">
</form>