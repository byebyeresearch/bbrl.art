<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we handle tag filtering and paginating notes in the controller,
 * before we pass the currently active tag and the notes to the template.
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */
return function ($page) {

    $tag   = urldecode(param('tag'));
    /**
     * We use the collection helper to fetch the notes collection defined in `/site/collections/notes.php`
     * 
     * More about collections:
     * http://getkirby.test/docs/guide/templates/collections
     */
    $events = collection('events');
    $upcomingevents = collection('events');
    $pastevents = collection('events');

    if (empty($tag) === false) {
        $events = $events->filterBy('tags', $tag, ',');
    }

    if (empty($tag) === true) {
        $upcomingevents = $upcomingevents->filter(function ($child) {return $child->date()->toDate() > time();});
        $pastevents = $pastevents->filter(function ($child) {return $child->date()->toDate() < time();});
    }

    return [
        'tag'   => $tag,
        'events' => $events->paginate(0),
        'upcomingevents' => $upcomingevents->paginate(0),
        'pastevents' => $pastevents->paginate(0)
    ];

};
