<?php 

    include('header.php');

?>
<h1>ABOUT PROJECT</h1>
<h3>Name: Residential architecture planner</h3>

User Login system built with PHP and MySQLi for managing residential architecture plans.<br><br>

There are four types of users: administrator, moderator, registered and unregistered users.<br><br>

Each user has its own functionalities which will be listed below.<br><br>


UNREGISTERED USER:<br>
	-has access to homepage, Login, categories and number of projects which have that category listed.<br><br>

REGISTERED USER: <br>
	-all functionalities above, can request a new project plan during which he chooses the moderator (date and time will be entered automatically).
	 Registered users can check his requests on which all of the details will be shown. If the project is locked by the moderator he can see added items (pictures and video).<br><br>
	
MODERATOR:<br>
	-all functionalities above, can see requests that were sent to him and accept them. If he accepts the project he must enter the name of the project and description and after that he can add, update and view project items. Each category can be picked only once and after all of them are chosen (or at least all of the mandatory ones)
	 he can lock the project.<br><br>

ADMINISTRATOR:<br>
	-all functionalities above, can update, add and view system users and categories, can see the total number of requests per moderator and filter data based on which user has sent
	 it and inside of what time frame. <br><br>

<?php 

include('footer.php');

?>
