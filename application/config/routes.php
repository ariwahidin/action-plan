<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//Auth
$route['auth'] = 'auth/index';
$route['logout'] = 'auth/logout';
$route['auth/process'] = 'auth/prosesLogin';
$route['auth/success'] = 'auth/loginSuccess';

//Admin
$route['admin'] = 'admin/index';
$route['admin/master/users'] = 'admin/master/User';
$route['admin/master/modaledit'] = 'admin/master/showModalEdit';
$route['admin/master/editaccessuser'] = 'admin/master/editAccessUser';

//Issue
$route['issue/myissue'] = 'pic/myissue';

$route['kirimissue/email'] = 'pic/kirimissue';
$route['kirimissue/wa'] = 'pic/kirimissuewa';
$route['issue/pic/modalpic'] = 'pic/showModalPic';
$route['issue/createissue'] = 'pic/createIssue';
$route['issue/detailissue'] = 'pic/detailIssue';
$route['issue/trackingissue'] = 'pic/trackingIssue';
$route['issue/sendcomment'] = 'pic/createComment';
$route['issue/loadcomment'] = 'pic/loadComment';
$route['issue/closeissue'] = 'pic/closeIssue';
$route['myissue/response/(:num)'] = 'pic/loadResponseMyIssue/$1';
$route['issue/updateisread'] = 'pic/updateIsReadComment';
$route['myissue/cancel/(:num)'] = 'pic/cancelIssue/$1';

//IssueRequest
$route['issuerequest/issuein'] = 'pic/loadIssueRequest';
$route['issuerequest/detailissue'] = 'pic/detailIssueRequest';
$route['issuerequest/detailclosedissue'] = 'pic/detailCloseIssue';
$route['issuerequest/loadmodalcommentimage'] = 'pic/loadModalCommentImage';
$route['issuerequest/createcommentimage'] = 'pic/createCommentImage';
$route['issuerequest/closedissue'] = 'pic/loadCloseIssue';
$route['issuerequest/response/(:num)'] = 'pic/loadResponseIssue/$1';
$route['issuerequest/loadboxcomment/(:num)'] = 'pic/loadBoxComment/$1';
$route['issuerequest/sendcomment'] = 'pic/sendComment';

//Settings
$route['dashboard/profile'] = 'pic/loadProfile';
$route['settings/profile'] = 'pic/loadProfile';
$route['settings/profile/gantifoto'] = 'pic/gantiFotoProfile';
$route['settings/profile/gantipassword'] = 'pic/gantiPassword';
$route['settings/profile/gantiwa'] = 'pic/gantiwa';


//Team
$route['team/issuerequest'] = 'pic/loadIssueRequestOurTeam';
$route['team/issuerequest/detail'] = 'pic/teamDetailIssueRequest';
$route['team/issuerequest/trackingissue'] = 'pic/teamTrackingIssue';
$route['team/closedissue'] = 'pic/loadClosedIssueOurTeam';
$route['team/dashboard'] = 'pic/loadTeamDashboard';
$route['team/issueopen/pic/(:num)'] = 'pic/loadIssueOpen/$1';
$route['team/issue/(:num)'] = 'pic/loadIssueForMyTeam/$1';
$route['team/closedissue/pic/(:num)'] = 'pic/loadCloseIssue/$1';
