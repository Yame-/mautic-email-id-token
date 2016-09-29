<?php
// plugins/HelloWorldBundle/EventListener/EmailSubscriber.php

namespace MauticPlugin\YameEmailIdTokenWebHookBundle\EventListener;

use Mautic\CoreBundle\EventListener\CommonSubscriber;
use Mautic\EmailBundle\EmailEvents;
use Mautic\EmailBundle\Event\EmailBuilderEvent;
use Mautic\EmailBundle\Event\EmailSendEvent;

/**
 * Class EmailSubscriber
 */
class EmailSubscriber extends CommonSubscriber
{

    /**
     * @return array
     */
    static public function getSubscribedEvents()
    {
        return array(
            EmailEvents::EMAIL_ON_SEND    => array('onEmailGenerate', 0),
            EmailEvents::EMAIL_ON_DISPLAY => array('onEmailGenerate', 0)
        );
    }

    /**
     * Search and replace tokens with content
     *
     * @param EmailSendEvent $event
     */
    public function onEmailGenerate(EmailSendEvent $event)
    {

        $emailID = ( $event->getEmail() !== null ) ? $event->getEmail()->getId() : '[emailid]';

        // Get content
        $content = $event->getContent();

        // Search and replace tokens
        $content = str_replace('{emailid}', $emailID, $content);

        // Set updated content
        $event->setContent($content);
    }
}