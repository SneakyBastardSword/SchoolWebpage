<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Management</title>
<link type="text/css" rel="stylesheet" href="/dev/dev.css"/>
</head>
<body>
<script>
	<?php
	require '../files/connect.php';

	function generate_random_string($length = 8) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	if(isset($_POST['submit'])){

		if($_POST['actionType'] == 'slideshow-rm'){
			for($i=0; $i<sizeof($_POST['imageSelection']); $i++){
				$query = "DELETE FROM `{$database}`.`{$table}` WHERE `id`=\"{$_POST['imageSelection'][$i]}\"";
				mysqli_query($connection, $query);
			}
		}

		if($_POST['actionType'] == 'slideshow-add'){
			mysqli_query($connection, "INSERT INTO `webmain`.`slideshow` (`name`, `id`, `type`, `description`) 
										   VALUES ('{$name}', '{$id}','{$type[1]}', '{$description}');");
		}

		if($_POST['actionType'] == 'calendarEditor'){
			if(isset($_POST['calendar']['newRows']){
				foreach($_POST['calendar']['newRows'] as $number => $data){
					$datestamp = $data['year'].'-'.$data['month'].'-'.$data['day'].' '.$data['hour'].':'.$data['minute'].':00'
					$id = mysqli_fetch_row(mysqli_query($connection, "SELECT id FROM `webmain`.`calendar`
																		ORDER BY id DESC
																		LIMIT 1"))[0] + 1; //find the id of the last item in the db
																						   //and make this id 1 + that id
					mysqli_query($connection, "INSERT INTO `webmain`.`calendar` (`datestamp`, `content`, `id`)
													VALUES ('{$datestamp}', '{$data['content']}', '{$id}');");
				}
			}

			if(isset($_POST['calendar']['rm'])){
				foreach($_POST['calendar']['rm'] as $key => $event){
					
				}
			}
		}

	}
	//output all relevant database queries as javascript objects
	query_as_jsvar('slideshow_query', 'SELECT * FROM `webmain`.`slideshow`');
	query_as_jsvar('calendar_query', 'SELECT * FROM `webmain`.`calendar`');
	query_as_jsvar('sportevents_query', 'SELECT * FROM `webmain`.`sportevents`');

	mysqli_close($connection)
	?>
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<form name-"nullbuttons"></form>
<form name="Editor" method="post">
<!--editor selector-->
	<select id="actionSelect" name="actionType">
		<option value="selectme">select an editor</option>
		<option value="slideshow-add">add slideshow image</option>
		<option value="slideshow-rm">delete slideshow images</option>
		<option value="calendarevent">edit calendar events</option>
		<option value="sportevent">edit sports events</option>
	</select>

	<!--slideshow image removal editor-->
	<div class="dbEditor" id="slideshowEditor-rm">
		<!--editor populated by javascript-->
	</div>

	<!--slideshow image addition editor-->
	<div class="dbEditor" id="slideshowEditor-add">
		<input type="hidden" name="slideshowDelete">
		select a new slideshow image: <input type="file" name="newImage">
	</div>

	<!--calendar editor-->
	<div class="dbEditor" id="calendarEditor">
		<input type="hidden" name="calendar">
		<table>
			<tr>
				<th>edit/delete entry</th>
				<th>event date</th>
				<th>event description</th>
			</tr>
		</table>
		<button name="newCalendar" form="nullbuttons">add new calendar event</button>
	</div>

	<!--sport event editor-->
	<div class="dbEditor" id="sporteventEditor">
		<input type="hidden" name="sportevent">
		<table>
			<tr>
				<th>edit/delete entry</th>
				<th>sport</th>
				<th>date and time</th>
				<th>season</th>
				<th>location</th>
				<th>notes</th>
			</tr>	
		</table>
		<button name="newSportevent" form="nullbuttons">Add new sports event</button><br>
	</div><br>
	<button name="submit" value="true">update database</button>
</form>
<script>
	//function for generating a date/time input
	function insert_datestamp_editor(postID, editType){
		return '\
			<td>\
				<input type="number" max="31" min="1" name="calendar[' + editType + 'Rows][' + postID + '][day]">/\
					<select name="calendar[' + editType + 'Rows][' + postID + '][month]">\
					<option value="jan">january</option>\
					<option value="feb">febuary</option>\
					<option value="mar">march</option>\
					<option value="apr">april</option>\
					<option value="may">may</option>\
					<option value="jun">june</option>\
					<option value="jul">july</option>\
					<option value="aug">august</option>\
					<option value="sep">september</option>\
					<option value="oct">october</option>\
					<option value="nov">november</option>\
					<option value="dec">december</option>\
				</select>/\
				<input type="number" max="2025" min="2017" name="calendar[' + editType + 'Rows][' + postID + '][year]"><br><br>\
				<input type="number" max="12" min="1" name="calendar[' + editType + 'Rows][' + postID + '][hour]">:\
				<input type="number" max="59" min="1" name="calendar[' + editType + 'Rows][' + postID + '][minute]">\
				<input type="radio" value="TRUE" name="calendar[' + editType + 'Rows][' + postID + '][isMorning]"> am\
				<input type="radio" value="FALSE" name="calendar[' + editType + 'Rows][' + postID + '][isMorning]"> pm\
			</td>\
		';
	} 

	//generate image removal editor
	for(var query in slideshow_query){
		var filename = query['id'] + '.' + query['type'];
		$('#slideshowEditor-rm').append('\
			<div class="selector">\
				<img src="/src"' + filename + '" class="selectorImage"/>\
				<input type="checkbox" form="Editor" class="checkbox" name="imageSelection[]" value="' + query['type'] + '"/>\
			</div>\
		');
	}
	//populate calendar editor
	for(var event in calendar_query){
		$('#calendarEditor table').append('\
			<tr><data value="' + event['id'] + '">\
				<td>\
					delete: <input type="checkbox" name="calendar[rm]" form="Editor"><br>\
					<button name="calEdit-row" form="nullbuttons">edit</button>\
				</td>\
				<td><p>' + event['datestamp'] + '</p><td>\
				<td><p>' + event['content'] + '</p><td>\
			</data></tr>\
		');
	}
	//populate sportevent editor
	for(var event in sportevents_query){
		$('#sporteventEditor table').append('\
			<tr><data value="' + event['id'] + '">\
				<td>\
					delete: <input type="checkbox" name="sport-rm" form="Editor"><br>\
					<button name="sportEdit-row" form="nullbuttons">edit</button>\
				</td>\
				<td><p>' + event['sport'] + '</p></td>\
				<td><p>' + event['datestamp'] + '</p></td>\
				<td><p>' + event['season'] + '</p></td>\
				<td><p>' + event['location'] + '</p></td>\
				<td><p>' + event['notes'] + '</p></td>\
			</data></tr>\
		');
	}
	//set editor dropdown to reset when the page is loaded
	$('#actionSelect').val('selectme');

	//hide all the editors at first
	$('.dbEditor').hide();

	//change visible UI based on selected option
	$('#actionSelect').change(function(){
		switch ($(this).val()){
			case 'slideshow-add':
				$('.dbEditor').hide();
				$('#slideshowEditor-add').show();
				break;
			case 'slideshow-rm':
				$('.dbEditor').hide();
				$('#slideshowEditor-rm').show();
				break;
			case 'calendarevent':
				$('.dbEditor').hide();
				$('#calendarEditor').show();
				break;
			case 'sportevent':
				$('.dbEditor').hide();
				$('#sporteventEditor').show();
				break;
			default:
				$('.dbEditor').hide();
		}
	});
	//add new calendar event form
	var newCalendarRows = 0;
	$("button[name='newCalendar']").click(function(){
		$('#calendarEditor table').append('\
			<tr name="newRow">\
				<td>\
					delete: <input type="checkbox" disabled><br>\
					<button disabled>edit</button>\
				</td>\
				' + insert_datestamp_editor(newCalendarRows) + '\
				<td><textarea rows="3" cols="50" form="Editor" name="calendar[newRows][' + newCalendarRows + '][content]"></textarea></td>\
			</tr>\
		');
		newCalendarRows++;
	});
	//add new sportevent form
	var newSportRows = 0;
	$("button[name='newSportevent']").click(function(){
		$('#sporteventEditor table').append('\
			<tr name="newRow">\
				<td>\
					<input type="checkbox" disabled><br>\
					<button disabled>edit</button>\
				</td>\
				<td><input type="text" form="Editor" name="sports[newRows][' + newSportRows + '][sportname]"></td>\
				<td><select name="sports[newRows][' + newSportRows + '][season]" form="Editor">\
					<option value="fall">fall</option>\
					<option value="winter">winter</option>\
					<option value="spring">spring</option>\
				</select></td>\
				' + insert_datestamp_editor(newSportRows) + '\
				<td><input type="text" form="Editor" name="sports[newRows][' + newSportRows + '][location]"></td>\
				<td><textarea rows="3" cols="50" form="Editor" name="sports[newRows][' + newSportRows + '][notes]"></textarea></td>\
				</tr>'
		);
		newSportRows++;
	});
	//allow editing of existing fields
	$('button[name="editCalendarRow"]').click(function(){
		//iterate over every td tag in the same row as the button that was pressed
		//and change the static display to editable fields
		var rowID = $(this).parent().parent().val()
		$(this).parent().parent().children().each(function(){ //select <data> and iterate over its children
			switch($(this).index()){
				case 1:
					//disable each input in column 1
					$(this).each(function(){
						$(this).prop('disabled', true);
					});
					break;
				case 2:
					//clears the element and fills with date/time editor
					$(this).empty();
					$(this).append(insert_datestamp_editor(rowID));
					break;
				case 3:
					var originalText = $(this).index()
					break;
			}
		});
		
	});
</script>	
</body>
</html>