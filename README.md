DUser
=====

Requires:
YiiBooster

Add Routes:
    'admin/user/<action:(update|delete)>/<id:\d+>' => 'user/admin/<action>',
    'admin/user/<action:(update|delete)>' => 'user/admin/<action>',
    'admin/user' => 'user/admin/index',
    
    'admin/user/<module:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => 'user/<module>/<controller>/<action>', 
    'admin/user/<module:\w+>/<controller:\w+>/<action:\w+>/' => 'user/<module>/<controller>/<action>',
    'admin/user/<module:\w+>/<controller:\w+>/' => 'user/<module>/<controller>/index',
    'admin/user/<module:\w+>/' => 'user/<module>',
	
    'user/login' => 'user/default/login',
    'user/register' => 'user/default/register',
    'user/logout' => 'user/default/logout',
	
Add Imports:
	'user.models.*',
    'user.components.*',
    'user.forms.*',
	
Add Module:
    'user' => array(
        'appLayout' => 'application.views.layout.main',
    ),
	
Add Components
	'user => array(
		'class' => 'UWebUser'
	),
	'authManager' => array(
		'class' => 'UAuthManager',
	)
	