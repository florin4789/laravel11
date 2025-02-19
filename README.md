WEBSITE TRACKER

Hi, This is a laravel 11 project with docker that contains a few things:

A welcome page with authentication:
-an authenticated user has access to /services page
-there is an admin role that can access the page that displays
the analytics for all the tracked users

*In order to asign a user the admin role enter tinker through
php artisan tinker and enter:

*Find the user (use their actual ID)
$user = User::find(1);
$role = Role::findOrCreate('admin'); // Ensure the role exists
$user->assignRole('admin');//asign admin to user

How does the website tracker work?

1: The tracker is located in file public/tracker.js and is responsible for tracking unique visitors and
sending visit data to the Laravel backend It works like this:
    *function getVisitorID() checks if there is a cookie associated with the visitor id and
    if not it creates one that expires after 30 days and if found it extracts the id from 
    cookie.
    *func sendVisitData() sends a POST request to the API (/api/track-visit)
        it sends page url, visitor id and a timestamp.
2: After the request is sent the Laravel API (/api/track-visit) receives the request.
    Route is defined in routes/api.php and sends data in VisitController.php where it is 
    sanitised and added to the database where it will be stored in table 'visits'
For the client to view the analytics they can access page /admin/analytics as an admin.
the route goes back to VisitController in function  getAnalytics() where it retrieves all
the unique visitors and the pages they accessed.

    
    
