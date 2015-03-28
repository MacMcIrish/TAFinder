<html>
	<head>
		<link rel="stylesheet" type="text/css" href="form_css.css" />
		<?php
		include 'user-check.php';
		include "form-check.php";

		function endSession() {
			session_destroy();
		}
		?>
	</head>
	<body>
		<div>
			<form id="form" name="applicantForm" method="post" action="db_connect.php">

				<fieldset>
					<legend>
						Name
					</legend>
					First Name:
					<input type="text" name="fName"/>
					<br>
					Last Name:
					<input type="text" name="lName"/>
					<br>
					Student No.
					<input type="text" name="sNumber"/>
				</fieldset>
				<fieldset>
					<legend>
						UBC
					</legend>

					<div class="radioInput">
						<input type="radio" name="studentType" value="0" id="gradRadio">
						<label for="gradRadio">Graduate</label>
						<input type="radio"  name="studentType" value="1" id="underRadio"/>
						<label for="underRadio">Undergraduate</label>
					</div>
					Please Select Student Type:
					<br>
					Faculty:
					<select name="faculty">
						<option value="Arts">Arts</option>
						<option value="Applied Science">Applied Science</option>
						<option value="Dentistry">Dentistry</option>
						<option value="Education">Education</option>
						<option value="Forestry">Forestry</option>
						<option value="Land and Food Systems">Land and Food Systems</option>
						<option value="Law">Law</option>
						<option value="Medicine">Medicine</option>
						<option value="Pharmaceutical Studies">Pharmaceutical Studies</option>
						<option value="Science">Science</option>
					</select>
					Year of Study:
					<select name="applicantYear">
						<option value="1">First</option>
						<option value="2">Second</option>
						<option value="3">Third</option>
						<option value="4">Fourth</option>
					</select>
					<br>
					UBC Employee ID:
					<input type="text" name="UBCID"/>
					<br>
					UBC Email Address:
					<input type="email" name="UBCemail"/>
					<br>
				</fieldset>

				<fieldset>
					<legend>
						Address
					</legend>
					Address:
					<input type="text" name="address"/>
					<br>
					City:
					<input type="text" name="city"/>
					Postal Code:
					<input type="text" name="posCode"/>
					<br>
					Telephone:
					<input type="text" placeholder="Home" name="homeNumber"/>
					,
					<input type"text" placeholder="Cell" name="cellNumber"/>
				</fieldset>

				<div class="yesNo">
					<div class="radioInput">
						<input type="radio" name="workInCanada" value="1" id="workYes"/>
						<label for="yes">Yes</label>
						<input type="radio" name="workInCanada" value="0" id="workNo"/>
						<label for="workNo">No</label>
					</div>
					<p> Are you eligible to work in Canada? </p>
				</div>

				<div class="yesNo">

					<div class="radioInput">
						<input type="radio" name="fullTime" value="1" id="fullYes"/>
						<label for"fullYes">Yes</label>
						<input type="radio" name="fullTime" value="0" id="fullNo"/>
						<label for"fullNo">No</label>
					</div>
					<p> Will you be a full-time graduate/undergraduate student during the study period? </p>
				</div>

				<div class="yesNo">
					<div class="radioInput">
						<input type="radio" name="previousPos" value="1" id="preYes"/>
						<label for="preYes">Yes</label>
						<input type="radio" name="previousPos" value="0" id="preNo"/>
						<label for="preNo">No</label>
					</div>
					<p> Have you held a previous Teaching Assistantship position at UBC Okanagan? </p>
				</div>
				<div>
					If yes, please list previous (max 4) assignments:
					<table>
						<tr>
							<th>Year</th>
							<th>Course</th>
							<th>Instructor</th>
						</tr>
						<tr>
							<td><input type="text" name="year1" /></td>
							<td><input type="text" name="course1" /></td>
							<td><input type="text" name="instructor1" /></td>
						</tr>
						<tr>
							<td><input type="text" name="year2" /></td>
							<td><input type="text" name="course2" /></td>
							<td><input type="text" name="instructor2" /></td>
						</tr>
						<tr>
							<td><input type="text" name="year3" /></td>
							<td><input type="text" name="course3" /></td>
							<td><input type="text" name="instructor3" /></td>
						</tr>
						<tr>
							<td><input type="text" name="year4" /></td>
							<td><input type="text" name="course4" /></td>
							<td><input type="text" name="instructor4" /></td>
						</tr>
					</table>
				</div>
				<div>
					Departments you wish to apply for (select all that apply):
					<br>
					<input type="checkbox" name="applyCourse" value="cosc"/>
					Computer Science
					<br>
					<input type="checkbox" name="applyCourse" value="phys"/>
					Physics
					<br>
					<input type="checkbox" name="applyCourse" value="math"/>
					Mathematics
					<br>
					<input type="checkbox" name="applyCourse" value="stat"/>
					Statistics
				</div>

				<p>How many hours per week would you like to work? (min 2, max 12)</p>
				Preferred: 
				<input type="number" min="2" max="12" name="prefferedHours"/>
				<br>
				Maximum:
				<input type="number" min="2" max="12" name="maxHours"/>
				<br>
				<textarea placeholder="Additional Comments"></textarea>
				<input type="submit" name="buttonthing"/>

			</form>
			<form action="http://localhost/tafinder/logout.php">
				<input type="submit" value="Cancel"/>
			</form>
		</div>
	</body>
</html>