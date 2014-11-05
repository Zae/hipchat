<?php

namespace Zae\HipChat;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Command\Guzzle\Description as GuzzleServiceDescription;
use GuzzleHttp\Command\Guzzle\GuzzleClient as GuzzleServiceClient;

class Client extends GuzzleServiceClient {
    public function __construct(GuzzleClient $guzzleClient = NULL) {
        $guzzleClient = is_null($guzzleClient) ? new GuzzleClient() : $guzzleClient;

        $hipchatDescription = new GuzzleServiceDescription([
            'baseUrl' => 'https://api.hipchat.com/v1/',
            'operations' => [
                'createRoom' => [
                    'httpMethod' => 'POST',
                    'uri' => 'rooms/create',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'name' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'owner_user_id' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'privacy' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'postField',
                            'default' => 'public',
                            'enum' => ['public', 'private']
                        ],
                        'topic' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'postField'
                        ],
                        'guest_access' => [
                            'type' => 'integer',
                            'required' => false,
                            'default' => 0,
                            'enum' => [0,1],
                            'location' => 'postField'
                        ]
                    ]
                ],
                'deleteRoom' => [
                    'httpMethod' => 'POST',
                    'uri' => 'rooms/delete',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'room_id' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ]
                    ]
                ],
                'historyRoom' => [
                    'httpMethod' => 'GET',
                    'uri' => 'rooms/history',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ],
                        'room_id' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ],
                        'date' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                            'default' => 'recent'
                        ],
                        'timezone' => [
                            'type' => 'string',
                            'required' => false,
                            'location' => 'query',
                            'default' => 'UTC'
                        ]
                    ]
                ],
                'listRoom' => [
                    'httpMethod' => 'GET',
                    'uri' => 'rooms/list',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ]
                    ]
                ],
                'sendMessage' => [
                    'httpMethod' => 'POST',
                    'uri' => 'rooms/message',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'room_id' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                        ],
                        'from' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                            'maxLength' => 15
                        ],
                        'message' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                            'maxLength' => 10000
                        ],
                        'message_format' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false,
                            'default' => 'html',
                            'enum' => ['html', 'text']
                        ],
                        'notify' => [
                            'type' => 'integer',
                            'location' => 'postField',
                            'default' => 0,
                            'required' => false,
                            'enum' => [0,1]
                        ],
                        'color' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'default' => 'yellow',
                            'required' => false,
                            'enum' => [ "yellow", "red", "green", "purple", "gray", "random"]
                        ]
                    ]
                ],
                'topicRoom' => [
                    'httpMethod' => 'POST',
                    'uri' => 'rooms/topic',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'room_id' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                        ],
                        'topic' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                            'maxLength' => 250
                        ],
                        'from' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false,
                            'default' => 'API'
                        ]
                    ]
                ],
                'showRoom' => [
                    'httpMethod' => 'GET',
                    'uri' => 'rooms/show',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ],
                        'room_id' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => true,
                        ]
                    ]
                ],

                'createUser' => [
                    'httpMethod' => 'POST',
                    'uri' => 'users/create',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'email' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                        ],
                        'name' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                        ],
                        'mention_name' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false,
                        ],
                        'title' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false,
                        ],
                        'is_group_admin' => [
                            'type' => 'integer',
                            'location' => 'postField',
                            'required' => false,
                            'default' => 0,
                            'enum' => [0,1]
                        ],
                        'password' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false
                        ],
                        'timezone' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false,
                            'default' => 'UTC'
                        ]
                    ]
                ],
                'deleteUser' => [
                    'httpMethod' => 'POST',
                    'uri' => 'users/delete',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'user_id' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true,
                        ]
                    ]
                ],
                'listUser' => [
                    'httpMethod' => 'GET',
                    'uri' => 'users/list',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ],
                        'include_deleted' => [
                            'type' => 'integer',
                            'location' => 'query',
                            'required' => false,
                            'default' => 0,
                            'enum' => [0,1]
                        ]
                    ]
                ],
                'showUser' => [
                    'httpMethod' => 'GET',
                    'uri' => 'users/show',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'query'
                        ],
                        'user_id' => [
                            'type' => 'string',
                            'location' => 'query',
                            'required' => true
                        ]
                    ]
                ],
                'undeleteUser' => [
                    'httpMethod' => 'POST',
                    'uri' => 'users/undelete',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'user_id' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true
                        ]
                    ]
                ],
                'updateUser' => [
                    'httpMethod' => 'POST',
                    'uri' => 'users/update',
                    'responseModel' => 'getResponse',
                    'parameters' => [
                        'auth_token' => [
                            'type' => 'string',
                            'required' => true,
                            'location' => 'postField'
                        ],
                        'user_id' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => true
                        ],
                        'email' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false
                        ],
                        'name' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false
                        ],
                        'mention_name' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false
                        ],
                        'title' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false
                        ],
                        'is_group_admin' => [
                            'type' => 'integer',
                            'location' => 'postField',
                            'required' => false,
                            'default' => 0,
                            'enum' => [0,1]
                        ],
                        'password' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false
                        ],
                        'timezone' => [
                            'type' => 'string',
                            'location' => 'postField',
                            'required' => false,
                            'default' => 'UTC'
                        ]
                    ]
                ],
            ],
            'models' => [
                'getResponse' => [
                    'type' => 'object',
                    'properties' => [
                        'statusCode' => [
                            'location' => 'statusCode',
                        ],
                        'reason' => [
                            'location' => 'reasonPhrase',
                        ],
                        'ratelimit-limit' => [
                            'location' => 'header',
                            'sentAs' => 'x-ratelimit-limit'
                        ],
                        'ratelimit-remaining' => [
                            'location' => 'header',
                            'sentAs' => 'x-ratelimit-remaining'
                        ],
                        'ratelimit-reset' => [
                            'location' => 'header',
                            'sentAs' => 'x-ratelimit-reset'
                        ],
                    ],
                    'additionalProperties' => [
                        'location' => 'json'
                    ]
                ]
            ]
        ]);

        return parent::__construct($guzzleClient, $hipchatDescription);
    }
} 