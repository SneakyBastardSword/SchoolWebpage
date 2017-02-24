function main(){
    var entryTemplate = '<li class="calendarEntry"><span></span></li>';
    for(var i = 0; i < calendarList.length; i++){
        $('.calendar ul').append(entryTemplate);
        $('.calendarEntry:last-child').text(calendarList[i][0]);
        $('.calendarEntry:last-child span').text(calendarList[i][1]);
    }
}
$(document).ready(main);