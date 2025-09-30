<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'Dashboardcontroller';


// dashboard
$route['dashboard'] = 'Dashboardcontroller';
$route['maintenance'] = 'Dashboardcontroller/maintenance';

//dms
$route['red_inbox'] = 'Inboxcontroller/red_inbox';
$route['inbox'] = 'Inboxcontroller/inbox';
$route['inbox/new'] = 'Inboxcontroller/new';
$route['inbox/process/(:any)'] = 'Inboxcontroller/process/$1';

$route['outbox'] = 'Outboxcontroller/outbox';
$route['all'] = 'Inboxcontroller/all_transactions';
$route['confidential'] = 'Inboxcontroller/confidential_transactions';
$route['closed'] = 'Inboxcontroller/closed';


// Disposition Form
$route['df/(:any)'] = 'Inboxcontroller/df/$1';
$route['all/df/(:any)'] = 'Inboxcontroller/df/$1';
$route['inbox/process/df/(:any)'] = 'Inboxcontroller/df/$1';
$route['ar/(:any)'] = 'Inboxcontroller/ar/$1';
$route['validator/(:any)'] = 'Inboxcontroller/validator/$1';
$route['all/validator/(:any)'] = 'Inboxcontroller/validator/$1';
$route['inbox/process/validator/(:any)'] = 'Inboxcontroller/validator/$1';

// Configuration
$route['conf/category'] = 'Settingscontroller/settings';
$route['conf/ann'] = 'Settingscontroller/announcements';

//SO/MEMO/NOTICE
$route['notice'] = 'Noticecontroller/list';
$route['notice/so'] = 'Noticecontroller/so';
$route['notice/so/view/(:any)'] = 'Noticecontroller/view_so/$1';
$route['notice/memo'] = 'Noticecontroller/memo';
$route['notice/nom'] = 'Noticecontroller/nom';
$route['notice/letter'] = 'Noticecontroller/letter';