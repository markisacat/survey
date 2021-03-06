<?php
return [	
	'controllers' => [
		'invokables' => [
			'Survey\Question'	=> 'Survey\Controller\QuestionController'
		]
	],

	'router' => [
        'routes' => [
			// =============================================== Workcenter ============================================
			'questions'	=> [
			'type'		=> 'literal',
				'options'	=> [
					'route'		=> '/questions',
					'defaults'	=> [
						'controller'	=> 'Survey\Question',
						'action'		=> 'list'
					]
				],
				'may_terminate'	=> true,
				'child_routes'	=> [
					'new'	=> [
						'type'		=> 'literal',
						'options'	=> [
							'route'		=> '/new',
							'defaults'	=> [
								'action'	=> 'new'
							]
						]
					],
					'get'	=> [
						'type'		=> 'segment',
						'options'	=> [
							'route'		=> '/:id',
							'defaults'	=> [
								'action'	=> 'get'
							],
							'constraints'	=> [
								'id'	=> '[0-9]+'
							]
						],
						'may_terminate'	=> true,
						'child_routes'	=> [
							'edit'		=> [
								'type'		=> 'literal',
								'options'	=> [
									'route'		=> '/edit',
									'defaults'	=> [
										'action'	=> 'edit'
									]
								]
							],
							'delete'	=> [
								'type'		=> 'literal',
								'options'	=> [
									'route'		=> '/delete',
									'defaults'	=> [
										'action'	=> 'delete'
									]
								]
							],
							'answers'	=> [
								'type'		=> 'literal',
								'options'	=> [
									'route'		=> '/answers',
									'defaults'	=> [
										'action'	=> 'answers'
									]
								]
							],
							'submit'	=> [
								'type'		=> 'literal',
								'options'	=> [
									'route'		=> '/submit',
									'defaults'	=> [
										'action'	=> 'submit'
									]
								]
							],
							'submission-stats'	=> [
								'type'		=> 'literal',
								'options'	=> [
									'route'		=> '/submission-stats',
									'defaults'	=> [
										'action'	=> 'submission-stats'
									]
								]
							]
						]
					]
				]
			]
        ]
    ],

	'view_manager' => [
	    'template_path_stack' => [
	        __DIR__ . '/../view'
	    ]
	]
];