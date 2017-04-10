function addRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;

	if(rowCount <= 5){
		var row = table.insertRow(rowCount);
		var colCount = table.rows[0].cells.length;
		for(var i=0; i<colCount; i++) {
			var newcell = row.insertCell(i);
			newcell.innerHTML = table.rows[0].cells[i].innerHTML;
			if(table.rows[0].cells[i].innerHTML.indexOf("Fra") != -1 || table.rows[0].cells[i].innerHTML.indexOf("Til") != -1) {
				$(row.cells[i]).datepicker({
        			format: 'M. yyyy',
        			autoclose: true,
        			minViewMode: 1,
        			language: 'nb-NO'
        			}).on('changeDate', function(selected){
            		startDate = new Date(selected.date.valueOf());
            		startDate.setDate(startDate.getDate(new Date(selected.date.valueOf())));
        		});
			}
		}

	}else{
		 alert("Maks antall rader er 5");
			   
	}
}

function deleteRow(tableID) {
	var table = document.getElementById(tableID);
	var rowCount = table.rows.length;
	for(var i=0; i<rowCount; i++) {
		var row = table.rows[i];
		var chkbox = row.cells[0].childNodes[0];
		if(null != chkbox && true == chkbox.checked) {
			if(rowCount <= 1) { 		
				alert("Må ha minimum en rad.");
				break;
			}
			table.deleteRow(i);
			rowCount--;
			i--;
		}
	}
}