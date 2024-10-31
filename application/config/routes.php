<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Dashboardcontroller';


// dashboard
$route['dashboard'] = 'Dashboardcontroller';

//dms
$route['inbox'] = 'Inboxcontroller/inbox';
$route['inbox/new'] = 'Inboxcontroller/new';