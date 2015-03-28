function addNewRow() {

	table = document.getElementById('table');
	
	session = document.getElementById('session').innerHTML;
	
	tr = document.createElement('tr');

	newCourse = document.createElement('input');
	td1 = document.createElement('td');
	td1.appendChild(newCourse);

	newSemester = document.createElement('input');
	td2 = document.createElement('td');
	td2.appendChild(newSemester);

	newHours = document.createElement('input');
	td3 = document.createElement('td');
	td3.appendChild(newHours);

	newType = document.createElement('input');
	td4 = document.createElement('td');
	td4.appendChild(newType);
	
	newDay = document.createElement('input');
	td5 = document.createElement('td');
	td5.appendChild(newDay);
	
	newStart = document.createElement('input');
	td6 = document.createElement('td');
	td6.appendChild(newStart);
	
	newEnd = document.createElement('input');
	td7 = document.createElement('td');
	td7.appendChild(newEnd);
	
	newSemester = document.createElement('input');
	td8 = document.createElement('td');
	td8.appendChild(newSemester);
	

	tr.appendChild(td1);
	tr.appendChild(td2);
	tr.appendChild(td3);
	tr.appendChild(td4);
	tr.appendChild(td5);
	tr.appendChild(td6);
	tr.appendChild(td7);
	tr.appendChild(td8);
	
	table.appendChild(tr);

	newCourse.setAttribute('name', 'course[]');
	newCourse.setAttribute('type', 'text');

	newSemester.setAttribute('name', 'term[]');
	newSemester.setAttribute('type', 'text');

	newHours.setAttribute('name', 'hours[]');
	newHours.setAttribute('type', 'number');

	newType.setAttribute('name', 'type[]');
	newType.setAttribute('type', 'text');
	
	newDay.setAttribute('name', 'day[]');
	newDay.setAttribute('type', 'text');
	
	newStart.setAttribute('name', 'start[]');
	newStart.setAttribute('type', 'text');
	
	newEnd.setAttribute('name', 'end[]');
	newEnd.setAttribute('type', 'text');
	
	newSemester.setAttribute('name', 'semester[]');
	newSemester.setAttribute('value', session);
	newSemester.readOnly = true;

}
