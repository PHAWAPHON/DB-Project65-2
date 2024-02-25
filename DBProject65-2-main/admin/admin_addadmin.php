<!DOCTYPE html>
<html>
<body>
<?php include 'assets/headAdmin.php'; ?>
<div class="totalin"><a>เพิ่มAdmin</a></div>
<form class="addadmin" action="editadmindb.php" method="POST">
    <ul>
        <table>
			<tr>
				<td>
					<label>username</label><br> 
					<input type="text" name="username" placeholder="username">
					<br>
					<label>password</label><br>
					<input type="text"  name="password" placeholder="password">
					<br>
					<button type="submit"> Create </button>
				</td>	
			</tr>	
		</table>
    </ul>
</form>
</html>