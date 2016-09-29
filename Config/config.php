<?php

return array(
    'name'        => 'YameEmailIdToken by Yame',
    'description' => 'Enables EmailID token in Email',
    'version'     => '1.0',
    'author'      => 'Yame',


	
    'services'    => array(
    	'events' => array(
	        'plugin.yametoken.emailbundle.subscriber' => array(
	            'class' => 'MauticPlugin\YameEmailIdTokenWebhookBundle\EventListener\EmailSubscriber'
	        )
	    ),
        /*'events' => array(
            'OnMailSendWebhook' => array(
                'class' => 'MauticPlugin\YameOnSendWebHookBundle\EventListener\OnSendMail'
            )
        )*/
    )

);