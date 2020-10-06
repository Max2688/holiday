<p><strong>Description</strong></p>
<p>You should develop very basic web service. 
This service should receive some date from user and check it for certain holidays. 
For example, user enters date 01.01.2018. 
Service checks this date and outputs statement like that: “It’s New Year on that date!”.</p>

<p>UI should be very simple: just one field for date and one button to submit this date for processing. 
And don’t forget about validation! System should not fall down in case of incorrect date filled.</p>

<p><strong>Technical details</strong></p>
<p>All holidays must be stored in one array. 
To add new holiday or edit existing one - only array should be modified. 
All other code must remain untouched.</p>

<p><strong>Date of holiday must not depend on year.</strong></p> 
<p>Also, all elements in holidays array must have same structure. 
In other words, array must be easily portable to the database.</p>

<p>You should use MVC pattern. Business logic should be separated from controller. 
The perfect way is to create certain php class (laravel service) which will include all required business logic.</p>

<p>You should not use tricks like “second day of may” and similar within “strtotime” function. 
However using of “strtotime” function for other needs is permitted.</p>

<p>If holiday falls on Saturday or Sunday, the additional day off will be on nearest Monday.
 For example, Easter is always celebrated on Sunday and next Monday is always an official day off.</p>
<p><strong>List of holidays</strong></p>
<p>Below you can find list of holidays. You must include all of them in your web service.</p>
<ul>
<li>1st of January</li>
<li>7th of January</li>
<li>From 1st of May till 7th of May</li>
<li>Monday of the 3rd week of January</li>
<li>Monday of the last week of March</li>
<li>Thursday of the 4th week of November</li>
</ul>