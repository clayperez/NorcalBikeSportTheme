function initCalFeed(){
  var apiKey = 'AIzaSyDnvtgF0gkP2KABcDC2gAAqZjJx4M5DGYs';
  var scopes = 'https://www.googleapis.com/auth/calendar';
  var calendarFeedKey = "dchgjpo2h3h7qjmenjhf2gfbjg"; //calendar feed
  var calendarId = calendarFeedKey + "%40group.calendar.google.com";
  var maxEvents = 100; //should be enough calendar events for one week. Increase if it's not.
  
  //Simple utility function to test whether a value has been seen before given the value and an array to key-compare with
  function isCachedID( id, cachePot ){
    //CACHED (true) if index is >= 0, meaning it has been found
    return cachePot[id] === true;
  }

  function populateCalendar(result){
    var eventSet = result.items; //the whole set of events returned but drilled down to the entries
    var recurringEvents = []; //keep track of recurring events so we can display them differently

    for(var i=0;i<=365;i++){
      var currentLoopDay = moment().startOf("day").add(i, "days");
      var tomorrow = moment().startOf("day").add(i+1, "days");

      //get the set of events for the current loop's day only
      var loopEvents = SQLike.q({
        Select:["*"],
        From:eventSet,
        Where:function(){
          var googleDateTime = this.start.dateTime || this.start.date; //whole day events use date, rather than dateTime
          var eventFirstStart = moment( googleDateTime );
          return eventFirstStart.unix() >= currentLoopDay.unix() && eventFirstStart.unix() < tomorrow.unix();
        }
      });

      //for each event found in this day's loop, post it in the day field
      loopEvents.forEach(function(e,x,a){
        e.summary = e.summary || "";
        e.description = e.description || "";
        e.start = e.start || "";
        e.end = e.end || "";

        var googleDateTime = e.start.dateTime || e.start.date; //whole day events use date, rather than dateTime
        var dateAndTime = moment(googleDateTime).format("dddd MMM D");

        //Put it together
        if( !isCachedID( e.recurringEventId, recurringEvents ) && e.summary ) { //only proceed if a recurring event ID hasn't been cached
          var locationImage = e.location ? "<a href='https://www.google.com/maps/place/"+e.location+"' target='_blank'><img src='https://maps.googleapis.com/maps/api/staticmap?center="+e.location+"&zoom=13&size=300x150&maptype=roadmap&markers=size:mid&markers=color:red%7C"+e.location+"'/></a>" : "";
          $("#clayperez_eventGrid").append(
            "<div class='large-4 columns'><h3>" + e.summary + "</h3><p>" + dateAndTime + "</p><p>" + e.description + "</p>" + locationImage + "</div>"
          );
        }

        //Cache the recurring event id.
        //If there's a recurring event id, place it into the array of recurring events
        //doesn't duplicate, because if it's already in there, it'll just be re-written
        if( typeof e.recurringEventId !== "undefined" ){
          recurringEvents[ e.recurringEventId ] = true;
        }
      });
    }

    //Use the Foundation5 "end" class to indicate the last item in the column list
    $("#clayperez_eventGrid .columns").last().addClass("end");
  }

  function loadFeed(){
    //empty and prepare the days for populating
    $("#clayperez_eventGrid").empty();

    firstDay = moment(); //The first day of the feed content, might want to subtract time to make up for when UTC passes into tomorrow
    lastDay = moment().add(365, "days"); //the last day of the feed fetch

    var feedURL = "https://www.googleapis.com/calendar/v3/calendars/"+calendarId+"/events?maxResults="+maxEvents+"&orderBy=startTime&singleEvents=true&timeMin="+firstDay.toISOString()+"&timeMax="+lastDay.toISOString()+"&fields=description,items&key="+apiKey+"&callback=populateCalendar";
    $.getJSON(feedURL)
      .error(function(err){ if(console){ console.log("getJSON ERROR:", err); } })
      .complete(function(result){ eval(result.responseText); });

  }
  loadFeed();

}
