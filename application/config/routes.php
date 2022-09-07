<?php

return [
	'' => [
		'controller' => 'main',
		'action' => 'login',
	],

	'login' => [
		'controller' => 'main',
		'action' => 'login',
	],

	'register' => [
		'controller' => 'main',
		'action' => 'register',
	],

	'exit' => [
		'controller' => 'main',
		'action' => 'exit',
	],

	'cabinet' => [
		'controller' => 'main',
		'action' => 'cabinet',
	],

	'cabinet/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'cabinet',
	],

	'createpost' => [
		'controller' => 'main',
		'action' => 'createpost',
	],

	'createpost/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'createpost',
	],
	
];