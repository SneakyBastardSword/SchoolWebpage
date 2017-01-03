function main(){
    var rowTemplate = "<tr> <td></td> <td></td > <td></td> </tr>";
    for(var i = 0; i < sportsArray.length; i++){
        var sportName = sportsArray[i][0]
        switch(sportName){
            case 'cross country':
            case 'archery':
            case 'track':
            case 'golf':
            case 'swim':
            case 'tennis':
                var eventType = 'Meet';
                break;
            
            case 'soccer':
            case 'football':
            case 'baseball':
            case 'basketball':
            case 'volleyball':
                var eventType = 'Game';
                break;
        }
        var eventDate = sportsArray[i][1];
        var eventNotes = sportsArray[i][2];
        var eventPlace = sportsArray[i][3];

        $('#' + sportName).append(rowTemplate);
        $('#' + sportName + ' tr:last-child td:first-child').text(eventDate);
        $('#' + sportName + ' tr:last-child td:nth-child(2)').text(eventType + ' at ' + eventPlace);
        $('#' + sportName + ' tr:last-child td:last-child').text(eventNotes);

        $('.sportCalendar table').hide();
        $('.sportCalendar h4').on('click', function(){
            $(this).next().slideToggle();
        });
    }
}
$(document).ready(main);