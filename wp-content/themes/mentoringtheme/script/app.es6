import {$} from './lib/jquery.es6';
import Accordion from './Accordion.es6';

$(document).ready( () => {

    let accordion = new Accordion($('body'));
    accordion.init();

});