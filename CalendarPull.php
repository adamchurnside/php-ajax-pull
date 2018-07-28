<?php
	$CalendarURL = "https://25livepub.collegenet.com/calendars/csuf-all-events.xml";
    	$CalendarXML = simplexml_load_file($CalendarURL);
	$CalendarItem = "";
	$count = 0;
	
	//adjust timezone for 25Live dates
	$timezone = 'America/Los_Angeles';
	date_default_timezone_set($timezone);

    	foreach($CalendarXML->entry as $Entry)
    	{
		while($Count < 8) 
		{
    			//format the date of event from GMT to LA timezone
			$Two5LiveUTC = strtotime($Entry->published);
			$Two5LivePDT = date('Y-m-d H:i:s', $Two5LiveUTC);
			$Two5LivePDT_Month = date('M', $Two5LiveUTC);      
			$Two5LivePDT_Day = date('d', $Two5LiveUTC);      

			//build your page's data the way you want it
			$CalendarItem .= "<li>";
			$CalendarItem .= "<a href='". $Entry->link[0]['href'] . "'>";		  
			$CalendarItem .= "<span class='month'>" . $Two5LivePDT_Month . "</span><br />";
 			$CalendarItem .= "<span class='date'>"  . $Two5LivePDT_Day . "</span><hr />";
			$CalendarItem .= $Entry->title . "</a>";
			$CalendarItem .= "</li>";

			$Count++;
			break;
		} 
    	}
	
	echo $Count;
    	echo $CalendarItem;
?>
